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
        'login.required' => 'Поле не может быть пустым.',
        'password.required' => 'Поле не может быть пустым.',
        'nameOld.required' => 'Поле не может быть пустым.',
        'name.required' => 'Поле не может быть пустым.',
        'name.unique' => 'Имя персонажа занято.',
        'server.required' => 'Поле не может быть пустым.',
        'faction.required' => 'Поле не может быть пустым.',
        'gender.required' => 'Поле не может быть пустым.',
        'rasa.required' => 'Поле не может быть пустым.',
        'class.required' => 'Поле не может быть пустым.',
        'specializacia.required' => 'Поле не может быть пустым.',
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
                exit( "<br>YOUR CHARACTER CLASS IS NOT BLIZZLIKE FOR 3.3.5a<br>" );
        }
    }
}
