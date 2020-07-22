<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "telephone" => "required",
            "password" => "required|confirmed",
            "rif" => "required",
            "businessName" => "required"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Nombre es requerido",
            "email.required" => "Email es requerido",
            "email.email" => "El correo ingresado no es válido",
            "email.unique" => "El correo ya ha sido utilizado",
            "telephone.required" => "Teléfono es requerido",
            "password.required" => "Contraseña es requerida",
            "password.confirm" => "Contraseñas no coinciden",
            "rif.required" => "R.I.F es requerido",
            "businessName.required" => "Nombre comercial es requerido"
        ];
    }
}
