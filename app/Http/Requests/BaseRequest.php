<?php

namespace App\Http\Requests;

use App\Traits\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    use ApiResponse;
    /**
     * Handle failed validation.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            $this->responseJson(false, 422, $validator->errors()->first())
        );
    }
}
