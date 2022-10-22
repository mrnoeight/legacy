<?php

namespace App\Http\Requests\Admin\Prole;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateProle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.prole.edit', $this->prole);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string'],
            'slug' => ['sometimes', Rule::unique('proles', 'slug')->ignore($this->prole->getKey(), $this->prole->getKeyName()), 'string'],
            'post_id' => ['nullable', 'integer'],
            'company_id' => ['nullable', 'integer'],
            'role_type' => ['nullable', 'string'],
            'role_requirement' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'age' => ['nullable', 'string'],
            'age_range' => ['nullable', 'string'],
            'role_fee_min' => ['nullable', 'integer'],
            'role_fee_max' => ['nullable', 'integer'],
            'description' => ['nullable', 'string'],
            'note' => ['nullable', 'string'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }

    public function getGender()
    {
        if ($this->has('genders')){
            return $this->get('genders')['name'];
        }
        return "";
    }

    public function getRoleType()
    {
        if ($this->has('role_types')){
            return $this->get('role_types')['name'];
        }
        return "";
    }

    public function getCompanyId(){
        if ($this->has('company')){
            return $this->get('company')['id'];
        }
        return null;
    }
}
