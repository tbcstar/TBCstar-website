<?php

namespace App\Actions\Fortify;

use App\Models\Forum\ForumsXF;
use App\Services\Soap;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'current_password' => ['required', 'string'],
            'password' => $this->passwordRules(),
        ])->after(function ($validator) use ($user, $input) {
            $password = strtoupper(sha1(strtoupper($user->username . ':' . $input['current_password'])));

            if (! isset($input['current_password']) || $password != $user->sha_pass_hash) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
            }
        })->validateWithBag('updatePassword');

        $soap = new Soap();
        $soap->cmd('.account set password ' . $user->username . ' ' . $input['password'] . ' ' . $input['password']);

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
