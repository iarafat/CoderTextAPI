<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class Show extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->isJson();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => 'required|exists:pages,slug',
        ];
    }

    /**
     * Get data to be validated from the request.
     *
     * Use route parameters for validation.
     * @return array
     */
    public function validationData()
    {
        return array_merge($this->all(),  $this->route()->parameters());
    }
}
