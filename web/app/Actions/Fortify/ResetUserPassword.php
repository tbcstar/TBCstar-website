<?php

namespace App\Actions\Fortify;

use App\Models\Forum\ForumsXF;
use App\Services\Soap;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

class ResetUserPassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and reset the user's forgotten password.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function reset($user, array $input)
    {
        Validator::make($input, [
            'password' => $this->passwordRules(),
        ])->validate();

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();

        if ($user->wotlk) {
            $soap = new Soap();
            $soap->cmd('.account set password ' . $user->wotlk->username . ' ' . $input['password'] . ' ' . $input['password']);
        }

        $userXF = ForumsXF::where('email', $user->email)->first();
        if ($userXF) {
            $client = new Client(['base_uri' => config('app.forum_url'), 'timeout'  => 2.0]);

            $client->request('POST', '/index.php?api/users/' . $userXF->user_id, [
                'headers' => [
                    'XF-Api-Key' => config('app.forum_key'),
                    'XF-Api-User' => config('app.forum_user'),
                ],
                'form_params' => [
                    'password' => $input['password']
                ]
            ]);
        }
    }
}
