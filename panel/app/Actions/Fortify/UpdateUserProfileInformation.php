<?php

namespace App\Actions\Fortify;

use App\Models\UserData;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'day' => ['required', 'numeric'],
            'month' => ['required', 'numeric'],
            'year' => ['required', 'numeric'],
            'country' => ['required', 'string'],
        ])->validateWithBag('updateProfileInformation');

        UserData::whereUserId($user->id)->update([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'day' => $input['day'],
            'month' => $input['month'],
            'year' => $input['year'],
            'country' => $input['country'],
        ]);
    }
}
