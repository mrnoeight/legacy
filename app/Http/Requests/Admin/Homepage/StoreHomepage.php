<?php

namespace App\Http\Requests\Admin\Homepage;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Brackets\Translatable\TranslatableFormRequest;

class StoreHomepage extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.homepage.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // public function rules(): array
    // {
    //     return [
            
            
    //     ];
    // }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @param mixed $locale
     * @return array
     */
    public function translatableRules($locale)
    {
        return [
            'head_tag1' => ['nullable', 'string'],
            'head_title1' => ['nullable', 'string'],
            'head_desc1' => ['nullable', 'string'],
            'mid_tag1' => ['nullable', 'string'],
            'mid_title1' => ['nullable', 'string'],
            'mid_desc1' => ['nullable', 'string'],
            'info1' => ['nullable', 'string'],
            'info2' => ['nullable', 'string'],
            'info3' => ['nullable', 'string'],
            'info4' => ['nullable', 'string'],
            'info5' => ['nullable', 'string'],
            'seo_title' => ['nullable', 'string'],
            'seo_description' => ['nullable', 'string'],
            'seo_author' => ['nullable', 'string'],
            
        ];
    }

    /**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules()
    {
        return [
            'page_name' => ['nullable', 'string'],
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
}
