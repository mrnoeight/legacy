<?php

namespace App\Http\Requests\Admin\BlockInfo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Brackets\Translatable\TranslatableFormRequest;

class UpdateBlockInfo extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.block-info.edit', $this->blockInfo);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    

    public function translatableRules($locale)
    {
        return [
            'head_tag1' => ['nullable', 'string'],
            'head_title1' => ['nullable', 'string'],
            'head_desc1' => ['nullable', 'string'],
            'info1' => ['nullable', 'string'],
            
        ];
    }

    public function untranslatableRules()
    {
        return [
            'block_name' => ['nullable', 'string'],
            'block_type' => ['nullable', 'string'],
            'info2' => ['nullable', 'string'],
            'info3' => ['nullable', 'string'],
            'info4' => ['nullable', 'string'],
            'info5' => ['nullable', 'string'],
            'info6' => ['nullable', 'string'],
            'info7' => ['nullable', 'string'],
            'block_date' => ['nullable', 'date'],
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
