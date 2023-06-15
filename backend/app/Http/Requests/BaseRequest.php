<?php

namespace App\Http\Requests;

use App\Traits\RequestValidationTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

abstract class BaseRequest extends FormRequest
{
    use RequestValidationTrait;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * failed validation
     *
     * @param Validator $validator Validator.
     *
     * @return void
     * @throws ValidationException Validation Response Exception.
     */
    protected function failedValidation(Validator $validator)
    {
        if (request()->wantsJson() || str_starts_with(request()->path(), 'api')) {
            throw new HttpResponseException(
                response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY)
            );
        } else {
            parent::failedValidation($validator);
        }
    }
}
