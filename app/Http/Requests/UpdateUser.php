<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUser extends Request
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
            'name' => 'required|max:255',
            'phone' => ['required', 'regex:/^1[34578][0-9]{9}$/'],
        ];
    }
}
