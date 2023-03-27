<?php

namespace App\Actions\Fortify;

use App\Models\Game\Wotlk;
use App\Models\Team;
use App\Models\User;
use App\Models\User\Referrals;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input): User
    {
        $message = array(
            'username.regex' => 'Логин может содержать только латинские буквы, цифры и дефис'
        );

        Validator::make($input, [
            'name' => ['required', 'string', 'max:15', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:15', 'unique:WotlkAuth.account,username', 'regex:/(^([a-zA-Z0-9-]+)(\d+)?$)/u'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ], $message)->validate();

        $cookie = Cookie::get('referral');
        $referred_by = $cookie ? \Hashids::decode($cookie)[0] : null;

        return DB::transaction(function () use ($input, $referred_by) {
            return tap(User::create([
                'name' => $input['name'],
                'username' => $input['username'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'referrer_id' => $referred_by,
            ]), function (User $user) use ($input, $referred_by) {
                ///$this->createTeam($user);
                ///$this->createItem($user);
                $this->createGameAccount($user, $input);
                $this->createReferralAward($user, $referred_by);
                $this->createForumAccount($user, $input);
            });
        });
    }

    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }

    protected function createItem(User $user)
    {
        User\Gifts::create([
            'users_id' => $user->id,
            'item' => 1878,
            'countItem' => 1,
            'title' => 'Быстрый старт',
            'status' => 0
        ]);
    }

    protected function createGameAccount(User $user, $input)
    {
        $user->wotlk()->save(Wotlk::forceCreate([
            'username' => $input['username'],
            'email' => $input['email'],
            'reg_mail' => $input['email'],
            'sha_pass_hash' => strtoupper(sha1(strtoupper($input['username'] . ':' . $input['password']))),
        ]));
    }

    protected function createForumAccount(User $user, $input)
    {
        $dir = '/var/www/www-root/data/www/community.nighthold.pro';

        require($dir.'/src/XF.php');

        \XF::start($dir);
        $appXF = \XF::app();

        $userXF = $appXF->repository('XF:User')->setupBaseUser();

        $userXF->username = $user->name;
        $userXF->email = $user->email;
        $userXF->Auth->setPassword($input['password']);
        $userXF->save();
    }

    protected function createReferralAward(User $user, $referred_by)
    {
        if ($referred_by) {

            $referred = Referrals::where('ref_id', $referred_by)->get();

            if (count($referred) === 0) {
                $bonus = 10;
            } else {
                $bonus = 5;
            }

            if (count($referred) === 10) {
                $reward = 'vip';
            }  else {
                $reward = '';
            }

            Referrals::create([
                'user_id' => $user->id,
                'ref_id' => $referred_by,
                'bonus' => $bonus,
                'reward' => $reward
            ]);

        }
    }
}
