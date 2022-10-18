<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class UserRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'type_document_id'                             => 'required|exists:type_documents,id',
            'first_name'                                   => 'required|string',
            'second_name'                                  => 'required|string',
            'lastname'                                     => 'required|string',
            'surname'                                      => 'required|string',
            'identification_number'                        => 'required',
            'email'                                        => 'required|email',
            'password'                                     => 'required',
            'address'                                      => 'required',
            'status'                                       => 'required'
        ];
    }
}
