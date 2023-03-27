<?php

namespace App\Services;

use App\Services\Logs\Log;
use Illuminate\Support\Facades\DB;

class Item
{
    private $entry        = 0;
    private $equipped     = false;
    private $loaded       = false;
    private $m_bag        = 0;
    private $m_count      = 0;
    private $m_guid       = 0;
    private $m_ench       = array();
    private $m_ilvl       = 0;
    private $m_owner      = 0;
    private $m_proto      = null;
    private $m_server     = 0;
    private $m_slot       = 0;
    private $m_socketInfo = array();
    private $m_values     = array();
    private $tc_data      = null;
    private $tc_ench      = null;
    private $itemset_o    = 0;
    private $itemset      = 0;
    private $itempieces   = null;
    private $bonuses      = array();

    public function LoadFromDB($data, $owner_guid) {
        $this->m_owner = $owner_guid;
        $this->m_guid = $data->item;

        $this->tc_data = DB::connection('WotlkChar100')->selectOne("SELECT * FROM item_instance WHERE guid = ? AND owner_guid = ?", [$this->m_guid, $this->m_owner]);
        if(!$this->tc_data) {
            Log::WriteError('%s : item (GUID: %d) was not found in `item_instance` table!', __METHOD__, $this->m_guid);
            return false;
        }
        if(isset($this->tc_data->enchantments)) {
            $this->tc_ench = explode(' ', $this->tc_data->enchantments);
            // _LoadIntoDataField
            $length = 12 * 3;
            $count = 1;
            if($count == count($this->tc_ench)) {
                // Load enchantment fields into m_values field
                for($index = 0; $startOffset < $count; ++$index) {
                    $this->m_values[$startOffset + $index] = $this->tc_ench[$index];
                }
            }
        }
        $this->entry = $this->tc_data->itemEntry;
        $item_data = DB::connection('WotlkWorld')->selectOne("SELECT ItemLevel, itemset, MaxDurability FROM item_template WHERE entry = ?", [$this->GetEntry()]);
        $this->tc_data->maxdurability = $item_data->MaxDurability;
        $this->m_count = $this->tc_data->count;

        if($data->bag == 0 && $data->slot < 19) {
            $this->equipped = true;
        }
        $this->m_slot = $data->slot;
        $this->m_bag = $data->bag;
        $this->m_ench = $data->enchants;
        $this->m_socketInfo = array();
        $this->m_ilvl = $item_data->ItemLevel;
        $this->itemset_o = $item_data->itemset;
        $this->loaded = true;
        return true;
    }

    public function LoadFromDBByEntry($item_guid, $item_template) {
        $item_data = array(
            'item' => $item_guid,
            'slot' => 0,
            'item_template' => $item_template,
            'bag' => 0,
            'enchants' => array()
        );
        $this->LoadFromDB($item_data, Account::GetActiveCharacterInfo('guid'));
    }

    /**
     * @return bool
     **/
    public function IsCorrect() {
        if($this->m_guid > 0 && $this->entry > 0 && $this->loaded == true) {
            return true;
        }
        Log::WriteLog('%s : item #%d failed (GUID: %d, owner: %d, loaded: %s)', __METHOD__, $this->GetEntry(), $this->GetGUID(), $this->loaded ? 'true' : 'false');
        return false;
    }

    /**
     * @return bool
     **/
    public function IsEquipped() {
        return $this->equipped;
    }

    /**
     * Returns item GUID
     * @category Item class
     * @access   public
     * @return   int
     **/
    public function GetGUID() {
        return $this->m_guid;
    }

    /**
     * @return object
     **/
    public function GetProto() {
        if(!$this->m_proto) {
            $this->m_proto = new WoW_ItemPrototype();
            $this->m_proto->LoadItem($this->GetEntry(), $this->GetGUID(), $this->GetOwnerGUID());
            if(!$this->m_proto || !$this->m_proto->IsCorrect()) {
                WoW_Log::WriteError('%s : unable to find item with entry %d in `item_template` table.', __METHOD__, $this->GetEntry());
                return false;
            }
        }
        return $this->m_proto;
    }

    /**
     * @return int
     **/
    public function GetEntry() {
        return $this->entry;
    }

    /**
     * @return int
     **/
    public function GetOwnerGUID() {
        return $this->m_owner;
    }

    /**
     * @return object
     **/
    public function GetOwner() {
        return $this->GetOwnerGUID(); //PH
    }

    /**
     * @return bool
     **/
    public function IsBroken() {
        if(in_array($this->GetSlot(), array(EQUIPMENT_SLOT_NECK, EQUIPMENT_SLOT_BODY, EQUIPMENT_SLOT_TABARD, EQUIPMENT_SLOT_TRINKET1, EQUIPMENT_SLOT_TRINKET2, EQUIPMENT_SLOT_FINGER1, EQUIPMENT_SLOT_FINGER2))) {
            return false; // Can't be broken
        }
        return ($this->GetMaxDurability() > 0 && $this->GetCurrentDurability() == 0);
    }

    /**
     * @return int
     **/
    public function GetItemRandomPropertyId() {
        if($this->m_server == SERVER_MANGOS) {
            return $this->GetUInt32Value(ITEM_FIELD_RANDOM_PROPERTIES_ID);
        }
        elseif($this->m_server == SERVER_TRINITY) {
            return $this->tc_data['randomPropertyId'];
        }
        return 0;
    }

    /**
     * @return int
     **/
    public function GetItemSuffixFactor() {
        if($this->m_server == SERVER_MANGOS) {
            return $this->GetUInt32Value(ITEM_FIELD_PROPERTY_SEED);
        }
        return 0;
    }

    /**
     * @return int
     **/
    public function GetEnchantmentId() {
        return $this->m_ench;
    }

    public function GetEnchantmentIdBySlot($slot) {
        return $this->GetUInt32Value(ITEM_FIELD_ENCHANTMENT_1_1 + $slot * MAX_ENCHANTMENT_OFFSET + ENCHANTMENT_ID_OFFSET);
    }

    public function GetEnchantmentDurationBySlot($slot) {
        return $this->GetUInt32Value(ITEM_FIELD_ENCHANTMENT_1_1 + $slot * MAX_ENCHANTMENT_OFFSET + ENCHANTMENT_DURATION_OFFSET);
    }

    public function GetEnchantmentChargesBySlot($slot) {
        return $this->GetUInt32Value(ITEM_FIELD_ENCHANTMENT_1_1 + $slot * MAX_ENCHANTMENT_OFFSET + ENCHANTMENT_CHARGES_OFFSET);
    }

    public function HasBonusEnchantmentSlot() {
        return $this->GetUInt32Value(ITEM_FIELD_ENCHANTMENT_7_1) != 0;
    }

    /**
     * @return false
     **/
    public function GetSocketInfo($num, $enchant_id_only = false) {
        if($num <= 0 || $num > 4) {
            return 0;
        }
        if(isset($this->m_socketInfo[$num])) {
            return $enchant_id_only ? $this->m_socketInfo[$num]['enchant_id'] : $this->m_socketInfo[$num];
        }
        $data = array();
        $socketfield = array(
            1 => 6,
            2 => 9,
            3 => 12
        );
        $socketInfo = $this->tc_ench[$socketfield[$num]];


        return false;
    }

    /**
     * @return int
     **/
    public function GetUInt32Value($index) {
        return (isset($this->m_values[$index])) ? $this->m_values[$index] : 0;
    }

    /**
     * @return int
     **/
    public function GetSlot() {
        return $this->m_slot;
    }

    /**
     * @return int
     **/
    public function GetBag() {
        return $this->m_bag;
    }

    /**
     * @return int
     **/
    public function GetSkill() {
        $item_weapon_skills = array(
            SKILL_AXES,     SKILL_2H_AXES,  SKILL_BOWS,          SKILL_GUNS,      SKILL_MACES,
            SKILL_2H_MACES, SKILL_POLEARMS, SKILL_SWORDS,        SKILL_2H_SWORDS, 0,
            SKILL_STAVES,   0,              0,                   SKILL_UNARMED,   0,
            SKILL_DAGGERS,  SKILL_THROWN,   SKILL_ASSASSINATION, SKILL_CROSSBOWS, SKILL_WANDS,
            SKILL_FISHING
        );
        $item_armor_skills = array(
            0, SKILL_CLOTH, SKILL_LEATHER, SKILL_MAIL, SKILL_PLATE_MAIL, 0, SKILL_SHIELD, 0, 0, 0, 0
        );
        $item_info = DB::World()->selectRow("SELECT `class`, `subclass` FROM `item_template` WHERE `entry`=%d", $this->GetEntry());
        if(!$item_info) {
            return 0;
        }
        switch($item_info['class']) {
            case ITEM_CLASS_WEAPON:
                if($item_info['subclass'] > MAX_ITEM_SUBCLASS_WEAPON) {
                    return 0;
                }
                return (isset($item_weapon_skills[$item_info['subclass']])) ? $item_weapon_skills[$item_info['subclass']] : 0;
                break;
            case ITEM_CLASS_ARMOR:
                if($item_info['subclass'] > MAX_ITEM_SUBCLASS_ARMOR) {
                    return 0;
                }
                return (isset($item_armor_skills[$item_info['subclass']])) ? $item_armor_skills[$item_info['subclass']] : 0;
                break;
            default:
                return 0;
        }
    }

    /**
     * @return int
     **/
    public function GetCurrentDurability(): int
    {
        return $this->tc_data->durability;
    }

    /**
     * @return int
     **/
    public function GetMaxDurability(): int
    {
        return $this->tc_data->maxdurability; // assigned in Item::LoadFromDB()
    }

    /**
     * @return array
     **/
    public function GetItemDurability(): array
    {
        return array('current' => $this->GetCurrentDurability(), 'max' => $this->GetMaxDurability());
    }

    /**
     * @return array
     **/
    public function GetRandomSuffixData() {
        if($this->m_server != SERVER_MANGOS) {
            WoW_Log::WriteError('%s : this method is usable with MaNGOS servers only.', __METHOD__);
            return false;
        }
        return array(
            $this->GetUInt32Value(ITEM_FIELD_ENCHANTMENT_8_1),
            $this->GetUInt32Value(ITEM_FIELD_ENCHANTMENT_9_1),
            $this->GetUInt32Value(ITEM_FIELD_ENCHANTMENT_10_1)
        );
    }

    public function GetItemLevel() {
        return $this->m_ilvl;
    }

    public function GetItemSetID() {
        return $this->itemset;
    }

    public function GetOriginalItemSetID() {
        return $this->itemset_o;
    }

    public function GetItemSetPieces() {
        return $this->itempieces;
    }

    /**
     * Calculates item's enchant/gems bonuses
     */
    private function CalculateItemBonuses() {
        if(is_array($this->bonuses) && $this->bonuses) {
            return true;
        }
        $this->bonuses = array(); // Clear storage
        $bonuses_info = array(); // Local storage
        $allowed_ench_types = array(
            ITEM_MOD_MANA,
            ITEM_MOD_HEALTH,
            ITEM_MOD_AGILITY,
            ITEM_MOD_STRENGTH,
            ITEM_MOD_INTELLECT,
            ITEM_MOD_SPIRIT,
            ITEM_MOD_STAMINA,
            ITEM_MOD_DEFENSE_SKILL_RATING,
            ITEM_MOD_DODGE_RATING,
            ITEM_MOD_PARRY_RATING,
            ITEM_MOD_BLOCK_RATING,
            ITEM_MOD_HIT_MELEE_RATING,
            ITEM_MOD_HIT_RANGED_RATING,
            ITEM_MOD_HIT_SPELL_RATING,
            ITEM_MOD_CRIT_MELEE_RATING,
            ITEM_MOD_CRIT_RANGED_RATING,
            ITEM_MOD_CRIT_SPELL_RATING,
            ITEM_MOD_HIT_TAKEN_MELEE_RATING,
            ITEM_MOD_HIT_TAKEN_RANGED_RATING,
            ITEM_MOD_HIT_TAKEN_SPELL_RATING,
            ITEM_MOD_CRIT_TAKEN_MELEE_RATING,
            ITEM_MOD_CRIT_TAKEN_RANGED_RATING,
            ITEM_MOD_CRIT_TAKEN_SPELL_RATING,
            ITEM_MOD_HASTE_MELEE_RATING,
            ITEM_MOD_HASTE_RANGED_RATING,
            ITEM_MOD_HASTE_SPELL_RATING,
            ITEM_MOD_HIT_RATING,
            ITEM_MOD_CRIT_RATING,
            ITEM_MOD_HIT_TAKEN_RATING,
            ITEM_MOD_CRIT_TAKEN_RATING,
            ITEM_MOD_RESILIENCE_RATING,
            ITEM_MOD_HASTE_RATING,
            ITEM_MOD_EXPERTISE_RATING,
            ITEM_MOD_ATTACK_POWER,
            ITEM_MOD_RANGED_ATTACK_POWER,
            ITEM_MOD_FERAL_ATTACK_POWER,
            ITEM_MOD_SPELL_HEALING_DONE,
            ITEM_MOD_SPELL_DAMAGE_DONE,
            ITEM_MOD_MANA_REGENERATION,
            ITEM_MOD_ARMOR_PENETRATION_RATING,
            ITEM_MOD_SPELL_POWER,
            ITEM_MOD_HEALTH_REGEN,
            ITEM_MOD_SPELL_PENETRATION,
            ITEM_MOD_BLOCK_VALUE
        );
        $gems_info = array();
        $enchant_ids = array($this->GetEnchantmentId());
        for($i = 0; $i < 3; ++$i) {
            $gems_info[$i] = $this->GetSocketInfo($i, true);
            if($gems_info[$i] > 0) {
                $enchant_ids[] = $gems_info[$i];
            }
        }
        unset($gems_info);
        $enchants_data = DB::WoW()->select("SELECT `id`, `type_1`, `type_2`, `type_3`, `spellid_1`, `spellid_2`, `spellid_3`, `amount_1`, `amount_2`, `amount_3`, `condition`, `slot` FROM `DBPREFIX_enchantment` WHERE `id` IN(%s)", $enchant_ids);
        if(is_array($enchants_data)) {
            foreach($enchants_data as $ench_info) {
                for($i = 1; $i < 4; ++$i) {
                    if($ench_info['type_' . $i] == 0) {
                        continue;
                    }
                    $type = $ench_info['type_' . $i];
                    switch($type) {
                        case ITEM_ENCHANTMENT_TYPE_STAT: // 5
                            if(!in_array($ench_info['spellid_' . $i], $allowed_ench_types)) {
                                break;
                            }
                            if($ench_info['amount_' . $i] == 0) {
                                break;
                            }
                            if(!isset($bonuses_info[$ench_info['spellid_' . $i]])) {
                                $bonuses_info[$ench_info['spellid_' . $i]] = 0;
                            }
                            $bonuses_info[$ench_info['spellid_' . $i]] += $ench_info['amount_' . $i];
                            break;
                        case ITEM_ENCHANTMENT_TYPE_EQUIP_SPELL: // 3
                            $spell_data = DB::WoW()->selectRow("SELECT `id`, `Effect_1`, `EffectDieSides_1`, `EffectBasePoints_1`, `EffectMiscValue_1`, `EffectApplyAuraName_1` FROM `DBPREFIX_spell` WHERE `id` = %d LIMIT 1", $ench_info['spellid_' . $i]);
                            if(!$spell_data) {
                                break;
                            }
                            if($spell_data['Effect_1'] != 6/*SPELL_EFFECT_APPLY_AURA*/) {
                                break; // SPELL_EFFECT_APPLY_AURA only ATM
                            }
                            if($spell_data['EffectApplyAuraName_1'] != 29/*SPELL_AURA_MOD_STAT*/) {
                                break; // SPELL_AURA_MOD_STAT only ATM (Do we need some more? I hope no...)
                            }
                            if($spell_data['EffectDieSides_1'] == 0 && $spell_data['EffectBasePoints_1'] == 0) {
                                break;
                            }
                            $val = $spell_data['EffectDieSides_1'] + $spell_data['EffectBasePoints_1'];
                            if($val <= 0) {
                                break; // But can we have negative value?
                            }
                            $stat_type = $spell_data['EffectMiscValue_1'];
                            switch($stat_type) {
                                default:
                                    break;
                                case -1:
                                    // All stats
                                    $stats_array = array(
                                        ITEM_MOD_STRENGTH,
                                        ITEM_MOD_AGILITY,
                                        ITEM_MOD_STAMINA,
                                        ITEM_MOD_INTELLECT,
                                        ITEM_MOD_SPIRIT
                                    );
                                    foreach($stats_array as $s_mod) {
                                        if(!isset($bonuses_info[$s_mod])) {
                                            $bonuses_info[$s_mod] = $val;
                                        }
                                        else {
                                            $bonuses_info[$s_mod] += $val;
                                        }
                                    }
                                    break;
                                case STAT_STRENGTH:
                                    if(!isset($bonuses_info[ITEM_MOD_STRENGTH])) {
                                        $bonuses_info[ITEM_MOD_STRENGTH] = $val;
                                    }
                                    else {
                                        $bonuses_info[ITEM_MOD_STRENGTH] += $val;
                                    }
                                    break;
                                case STAT_AGILITY:
                                    if(!isset($bonuses_info[ITEM_MOD_AGILITY])) {
                                        $bonuses_info[ITEM_MOD_AGILITY] = $val;
                                    }
                                    else {
                                        $bonuses_info[ITEM_MOD_AGILITY] += $val;
                                    }
                                    break;
                                case STAT_STAMINA:
                                    if(!isset($bonuses_info[ITEM_MOD_STAMINA])) {
                                        $bonuses_info[ITEM_MOD_STAMINA] = $val;
                                    }
                                    else {
                                        $bonuses_info[ITEM_MOD_STAMINA] += $val;
                                    }
                                    break;
                                case STAT_INTELLECT:
                                    if(!isset($bonuses_info[ITEM_MOD_INTELLECT])) {
                                        $bonuses_info[ITEM_MOD_INTELLECT] = $val;
                                    }
                                    else {
                                        $bonuses_info[ITEM_MOD_INTELLECT] += $val;
                                    }
                                    break;
                                case STAT_SPIRIT:
                                    if(!isset($bonuses_info[ITEM_MOD_SPIRIT])) {
                                        $bonuses_info[ITEM_MOD_SPIRIT] = $val;
                                    }
                                    else {
                                        $bonuses_info[ITEM_MOD_SPIRIT] += $val;
                                    }
                                    break;
                            }
                            break;
                    }
                }
            }
            $this->bonuses = $bonuses_info;
            return true;
        }
        return false;
    }

    public function GetItemBonuses() {
        if(!$this->bonuses || !is_array($this->bonuses)) {
            if(!$this->CalculateItemBonuses()) {
                return false;
            }
        }
        return $this->bonuses;
    }

    public function GetStackCount() {
        return $this->m_count;
    }
}
