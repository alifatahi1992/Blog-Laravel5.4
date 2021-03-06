<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegisterForm
 * @package App\Http\Requests
 */
class RegisterForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required||unique:users|email',
            'password' => 'required|confirmed'
        ];
    }


    //If Authorize & Rules passes we Come to this method for Create new user
    public function persist()
    {
        $user = User::create([
           'name'      => request('name'),
           'email'     => request('email'),
            'password' => bcrypt(request('password'))
//            $this->only(['name','email','password'])
        ]);
        auth()->login($user);

        Mail::to($user)->send(new Welcome($user));

    }
}
