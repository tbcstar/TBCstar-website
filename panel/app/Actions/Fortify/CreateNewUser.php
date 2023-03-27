<?php

namespace App\Actions\Fortify;

use App\Models\Game\AccountDonate;
use App\Models\Team;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     * @throws \Illuminate\Validation\ValidationException
     */

    public function create(array $input)
    {
        $message = array(
            'username.regex' => 'Логин может содержать только латинские буквы, цифры и дефис',
            'name.unique' => 'NightHoldTag занят, укажите другой.'
        );

        Validator::make($input, [
            'username' => ['required','string','min:3','max:16', 'unique:auth.account,username', 'regex:/(^([a-zA-Z0-9-]+)(\d+)?$)/u'],
            'name' => ['required', 'string', 'min:3','max:16', 'unique:forums.xf_user,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:auth.account,email'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ], $message)->validate();

        $cookie = Cookie::get('referral');
        $referred_by = $cookie ? \Hashids::decode($cookie)[0] : null;

        return DB::transaction(function () use ($input, $referred_by) {
            return tap(User::create([
                'username' => $input['username'],
                'email' => $input['email'],
                'reg_mail' => $input['email'],
                'sha_pass_hash' => strtoupper(sha1(strtoupper($input['username'] . ':' . $input['password']))),
            ]), function (User $user) use ($input, $referred_by) {
                $this->createDonate($user);
                $this->createForum($input);
                $this->createUserData($user, $referred_by);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param $input
     * @return void
     */

    protected function createUserData(User $user, $referred_by)
    {
        UserData::create([
            'user_id' => $user->id,
            'free_name' => 0,
            'first_name' => '',
            'country' => '',
            'day' => '',
            'month' => '',
            'year' => '',
            'phone_number' => '',
            'referred_by' => $referred_by,
        ]);
    }

    protected function createForum($input)
    {
        $dir = '/var/www/www-root/data/www/community.nighthold.pro';

        require($dir.'/src/XF.php');

        \XF::start($dir);
        $appXF = \XF::app();
        $userXF = $appXF->repository('XF:User')->setupBaseUser();
        $userXF->username = $input['name'];
        $userXF->email = $input['email'];
        $userXF->Auth->setPassword($input['password']);
        $userXF->save();

    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */

    protected function createDonate(User $user)
    {
        AccountDonate::create([
            'id' => $user->id,
            'bonuses' => 0,
            'votes' => 0,
            'total_votes' => 0,
            'total_bonuses' => 0,
        ]);
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */

    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
