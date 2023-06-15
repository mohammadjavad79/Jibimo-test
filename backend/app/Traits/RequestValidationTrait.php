<?php

namespace App\Traits;


trait RequestValidationTrait
{
    /**
     * @param array $rules Rules.
     *
     * @return array
     */
    public function password(array $rules = []): array
    {
        return array_merge(
            [
                'required',
                'string',
                'min:8',
                'max:16',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            ],
            $rules
        );
    }

    /**
     * @param array $rules Rules.
     *
     * @return array
     */
    public function mobile(array $rules = []): array
    {
        return array_merge(
            ['numeric', 'regex:/^09{1}[0-9]{9}/'],
            $rules
        );
    }

    /**
     * @param array $rules Rules.
     *
     * @return array
     */
    public function dateRules(array $rules = ['required']): array
    {
        return array_merge(
            ['date', 'after:' . now()->format('Y-m-d'), 'date_format:Y-m-d'],
            $rules
        );
    }
}
