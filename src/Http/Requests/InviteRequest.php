<?php
namespace Mixdinternet\Slackin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InviteRequest extends FormRequest
{
    public function rules()
    {
        return [
            #'username' => 'required|max:150',
            'email' => 'required|email'
        ];
    }

    public function authorize()
    {
        return true;
    }
}