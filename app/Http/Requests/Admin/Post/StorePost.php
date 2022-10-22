<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Brackets\Translatable\TranslatableFormRequest;

class StorePost  extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
        //Gate::allows('admin.post.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // public function rules(): array
    // {
    //     return [
    //         'name' => ['required', 'string'],
    //         'slug' => ['required', Rule::unique('posts', 'slug'), 'string'],
    //         //'type' => ['nullable', 'string'],
    //         //'city_name' => ['nullable', 'string'],
    //         'gender' => ['nullable', 'string'],
    //         'age' => ['nullable', 'string'],
    //         'company_id' => ['nullable', 'integer'],
    //         'expired_date' => ['nullable', 'date'],
    //         'short_desc' => ['nullable', 'string'],
    //         'description' => ['nullable', 'string'],
    //         'published_at' => ['nullable', 'date'],
    //         'enabled' => ['required', 'boolean'],
            
    //     ];
    // }

    /**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules()
    {
        return [
            'slug' => ['nullable', 'string'], //'required', Rule::unique('posts', 'slug'), 'string'
            'type' => ['nullable', 'string'],
            'city_name' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'age' => ['nullable', 'string'],
            'company_id' => ['nullable', 'integer'],
            'expired_date' => ['nullable', 'date'],
            'published_at' => ['nullable', 'date'],
            'enabled' => ['sometimes', 'boolean'],
            'publish_now' => ['nullable', 'boolean'],
            'unpublish_now' => ['nullable', 'boolean'],
            'other_location' => ['nullable', 'string'],
            'project_budget' => ['nullable', 'string'],
            'start_casting_date' => ['nullable', 'date'],
            'end_casting_date' => ['nullable', 'date'],
            'start_rehearsal_date' => ['nullable', 'date'],
            'end_rehearsal_date' => ['nullable', 'date'],
            'start_photo_date' => ['nullable', 'date'],
            'end_photo_date' => ['nullable', 'date'],
            'contact_name' => ['nullable', 'string'],
            'contact_email' => ['nullable', 'string'],
            'contact_phone' => ['nullable', 'string'],
            'contact_time' => ['nullable', 'string'],
            'genre' => ['nullable', 'string'],
            'producer' => ['nullable', 'string'],
            'director' => ['nullable', 'string'],
        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @param mixed $locale
     * @return array
     */
    public function translatableRules($locale)
    {
        return [
            'name' => ['sometimes', 'string'],
            'short_desc' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            
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

    public function getCompanyId(){
        if ($this->has('company')){
            return $this->get('company')['id'];
        }
        return null;
    }

    public function getCity(){
        if ($this->has('city')){
            return $this->get('city')['name'];
        }
        return "";
    }

    public function getCityId(){
        if ($this->has('city')){
            return $this->get('city')['id'];
        }
        return null;
    }

    public function getGender()
    {
        if ($this->has('genders')){
            return $this->get('genders')['name'];
        }
        return "";
    }

    public function getTags(): array
    {
        if ($this->has('tags')) {
            $tags = $this->get('tags');
            return array_column($tags, 'id');
        }
        return [];
    }

    public function getPostTypes(): array
    {
        if ($this->has('types')) {
            $types = $this->get('types');
            return array_column($types, 'id');
        }
        return [];
    }

    public function getProjectBudget() : string
    {
        if ($this->has('project_budgets')) {
            return $this->get('project_budgets')['name'];
        }
        return "";
    }
}
