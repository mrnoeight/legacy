<?php

namespace App\Http\Requests\Admin\TalentUser;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateTalentUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.talent-user.edit', $this->talentUser);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'string'],
            'hometown' => ['nullable', 'string'],
            'birthday' => ['nullable', 'date'],
            'current_career' => ['nullable', 'string'],
            'has_agency' => ['nullable', 'boolean'],
            'agency_name' => ['nullable', 'string'],
            'want_agency' => ['sometimes', 'boolean'],
            'your_experience' => ['nullable', 'string'],
            'socials' => ['nullable', 'string'],
            'searching_for' => ['nullable', 'string'],
            'profile_picture' => ['nullable', 'string'],
            'file_cv' => ['nullable', 'string'],
            'weight' => ['nullable', 'boolean'],
            'height' => ['nullable', 'boolean'],
            
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
