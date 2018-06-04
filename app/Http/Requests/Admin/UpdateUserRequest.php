<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UpdateUserRequest extends FormRequest
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
        $rules = User::$rules;
        $rules['email'] = $rules['email'] . ',id,' . $this->id;
        $rules['username'] = $rules['username'] . ',id,' . $this->id;
        $rules['password'] = 'confirmed|min:6';
        return $rules;
    }
}
