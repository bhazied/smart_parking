<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;

class UserRequest extends BaseFormrequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (Str::lower($this->method()) == 'post') {
            return array_merge([
                'name' => 'required|alpha',
                'email' => 'required|email',
                'password' => 'required|alpha_num|min:6|max:20',
                'remember_toke' => 'nullable'
            ], parent::rules());
        } elseif (Str::lower($this->method()) == 'put' || Str::lower($this->method()) == 'patch') {
            return array_merge([
                'name' => 'required|alpha',
                'email' => 'required|email',
            ], parent::rules());
        }
    }
}
