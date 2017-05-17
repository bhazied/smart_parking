<?php

namespace App\Http\Requests;

class UserRequest extends BaseFormrequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge([
            'name' => 'required|alpha',
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:6|max:20',
            'remember_toke' => 'nullable'
        ], parent::rules());
    }
}
