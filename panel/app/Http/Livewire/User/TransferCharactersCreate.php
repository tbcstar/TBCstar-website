<?php

namespace App\Http\Livewire\User;

use App\Models\Game\AccountTransfer;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;
use Livewire\WithFileUploads;

class TransferCharactersCreate extends Component
{
    use WithFileUploads;

    public $login;
    public $password;
    public $nameOld;
    public $name;
    public $server;
    public $faction;
    public $gender;
    public $rasa;
    public $class;
    public $specializacia;

    protected $rules = [
        'login' => 'required',
        'password' => 'required',
        'nameOld' => 'required',
        'name' => 'required|unique:account_transfer|unique:characters',
        'server' => 'required',
        'faction' => 'required',
        'gender' => 'required',
        'rasa' => 'required',
        'class' => 'required',
        'specializacia' => 'required',
    ];

    protected $messages = [
        'login.required' => '账户名不能为空。',
        'password.required' => '密码不能为空。',
        'nameOld.required' => '旧角色名不能为空。',
        'name.required' => '新角色名不能为空。',
        'name.unique' => '该角色名已被占用。',
        'server.required' => '服务器不能为空。',
        'faction.required' => '阵营不能为空。',
        'gender.required' => '性别不能为空。',
        'rasa.required' => '种族不能为空。',
        'class.required' => '职业不能为空。',
        'specializacia.required' => '专精不能为空。',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveValidate()
    {
        $validatedData = $this->validate();
    }

    public function save(): RedirectResponse|Redirector
    {
        $validatedData = $this->validate();

        AccountTransfer::create([
            'accountid' => auth()->user()->wotlk->id,
            'status' => 0,
            'login' => $this->login,
            'password' => $this->password,
            'nameOld' => $this->nameOld,
            'name' => $this->name,
            'server' => $this->server,
            'faction' => $this->faction,
            'gender' => $this->gender,
            'rasa' => $this->rasa,
            'class' => $this->class,
            'specializacia' => $this->specializacia,
        ]);

        return redirect()->route('profile.transfer');

    }

    public function render()
    {
        return view('livewire.user.transfer-characters-create');
    }

    public function parse_chardump($file_loc)
    {
        $file_loc = str_replace("public", "storage", $file_loc);
        @$chardump_data = file_get_contents(asset($file_loc));
        @$chardump_data = str_replace('CHD_CLIENT = "','',$chardump_data);
        @$chardump_data = str_replace('"','',$chardump_data);
        @$chardump_decoded = base64_decode($chardump_data);
        @$chardump_json = json_decode($chardump_decoded, true);

        $char_data = array();

        if(!empty($chardump_json))
        {
            if(!empty($chardump_json["player"]["name"]))
            {
                return $chardump_json;
            }
        }
        return false;
    }

    public function GetRaceID($race)
    {
        switch( $race )
        {
            case "HUMAN":
                return 1;
            case "ORC":
                return 2;
            case "DWARF":
                return 3;
            case "NIGHTELF":
                return 4;
            case "SCOURGE":
                return 5;
            case "TAUREN":
                return 6;
            case "GNOME":
                return 7;
            case "TROLL":
                return 8;
            case "BLOODELF":
                return 10;
            case "DRAENEI":
                return 11;
            default:
                exit( "error" );
        }
    }

    public function GetClassID($class)
    {
        switch( $class )
        {
            case "WARRIOR":
                return 1;
            case "PALADIN":
                return 2;
            case "HUNTER":
                return 3;
            case "ROGUE":
                return 4;
            case "PRIEST":
                return 5;
            case "DEATHKNIGHT":
                return 6;
            case "SHAMAN":
                return 7;
            case "MAGE":
                return 8;
            case "WARLOCK":
                return 9;
            case "DRUID":
                return 11;
            default:
                exit( "<br>您的角色职业不符合3.3.5a的游戏要求。<br>" );
        }
    }
}
