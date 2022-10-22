<?php

namespace App\Http\Requests\Admin\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCompany extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.company.edit', $this->company);
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
            'representative' => ['nullable', 'string'],
            'tel' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'enabled' => ['sometimes', 'boolean'],
            'registration_id' => ['nullable', 'integer'],
            'company_email' => ['nullable', 'string'],
            'website' => ['nullable', 'string'],
            'establish_date' => ['nullable', 'string'],
            'number_pj_monthly' => ['nullable', 'string'],
            'number_pj_annually' => ['nullable', 'string'],
            'feature_film_pj' => ['nullable', 'string'],
            'broadcast_pj' => ['nullable', 'string'],
            'music_video_pj' => ['nullable', 'string'],
            'film_ott_pj' => ['nullable', 'string'],
            'tv_ott_pj' => ['nullable', 'string'],
            'web_dramma_pj' => ['nullable', 'string'],
            'tvc_pj' => ['nullable', 'string'],
            'excutive_producer_name' => ['nullable', 'string'],
            'director_name' => ['nullable', 'string'],
            'producer_name' => ['nullable', 'string'],
            'cast_name' => ['nullable', 'string'],
            'cast_email' => ['nullable', 'string'],
            'cast_phone' => ['nullable', 'string'],
            'cast_time' => ['nullable', 'string'],
            'know_us' => ['nullable', 'string'],
            
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
