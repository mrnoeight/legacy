<?php

namespace App\Http\Requests\Admin\Registration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreRegistration extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        //return Gate::allows('admin.registration.create');
        return true;
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
            'want_agency' => ['nullable', 'boolean'],
            'your_experience' => ['nullable', 'string'],
            'searching_for' => ['nullable', 'string'],
            'youtube_link' => ['nullable', 'string'],
            'facebook_link' => ['nullable', 'string'],
            'instagram_link' => ['nullable', 'string'],
            'tiktok_link' => ['nullable', 'string'],
            'bio' => ['nullable', 'string'],
            'weight' => ['nullable', 'integer'],
            'height' => ['nullable', 'integer'],
            'chest' => ['nullable', 'integer'],
            'waist' => ['nullable', 'integer'],
            'hip' => ['nullable', 'integer'],
            'shoes' => ['nullable', 'integer'],
            'phone_number' => ['nullable', 'string'],
            'parent_name' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'type' => ['nullable', 'integer'],
            'status' => ['nullable', 'integer'],
            'enabled' => ['nullable', 'boolean'],
            
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

    public function getCareers(): array
    {
        if ($this->has('careers')) {
            $careers = $this->get('careers');

            if (\is_array($careers))
                return array_column($careers, 'id');
            else
                return [];
        }
        return [];
    }

    public function getCareerName(): string
    {
        if ($this->has('careers')) {
            $careers = $this->get('careers');

            
            if (\is_array($careers)) {
                $arr_name = array_column($careers, 'tag_name');
                return implode(',', $arr_name);
            }   
            else
                return "";
        }
        return "";
    }

    public function getExperience(): array
    {
        if ($this->has('experience')) {
            $experience = $this->get('experience');

            if (\is_array($experience))
                return array_column($experience, 'id');
            else
                return [];
        }
        return [];
    }

    public function getExperienceName(): string
    {
        if ($this->has('experience')) {
            $experience = $this->get('experience');
            
            if (\is_array($experience)) {
                $arr_name = array_column($experience, 'tag_name');
                return implode(',', $arr_name);
            }              
            else
                return "";
        }
        return "";
    }

    public function getLooking(): array
    {
        if ($this->has('looking')) {
            $looking = $this->get('looking');

            if (\is_array($looking))
                return array_column($looking, 'id');
            else
                return [];
        }
        return [];
    }

    public function getLookingName(): string
    {
        if ($this->has('looking')) {
            $looking = $this->get('looking');
            

            if (\is_array($looking)) {
                $arr_name = array_column($looking, 'tag_name');
                return implode(',', $arr_name);
            }
            else
                return "";
        }
        return "";
    }

    public function getLookingRoles(): array
    {
        if ($this->has('looking_roles')) {
            $arr = $this->get('looking_roles');

            if (\is_array($arr))
                return array_column($arr, 'id');
            else
                return [];
        }
        return [];
    }

    public function getAcceptRoles(): array
    {
        if ($this->has('accept_roles')) {
            $arr = $this->get('accept_roles');

            if (\is_array($arr))
                return array_column($arr, 'id');
            else
                return [];
        }
        return [];
    }

    public function getLanguages(): array
    {
        if ($this->has('speaking_languages')) {
            $arr = $this->get('speaking_languages');

            if (\is_array($arr))
                return array_column($arr, 'id');
            else
                return [];
        }
        return [];
    }

    public function getEthnicities(): array
    {
        if ($this->has('ethnicities')) {
            $arr = $this->get('ethnicities');

            if (\is_array($arr))
                return array_column($arr, 'id');
            else
                return [];
        }
        return [];
    }

    public function getNationalities(): array
    {
        if ($this->has('nationalities')) {
            $arr = $this->get('nationalities');

            if (\is_array($arr))
                return array_column($arr, 'id');
            else
                return [];
        }
        return [];
    }

    public function getVoiceVocals(): array
    {
        if ($this->has('voice_vocals')) {
            $arr = $this->get('voice_vocals');

            if (\is_array($arr))
                return array_column($arr, 'id');
            else
                return [];
        }
        return [];
    }

    public function getInstruments(): array
    {
        if ($this->has('instruments')) {
            $arr = $this->get('instruments');

            if (\is_array($arr))
                return array_column($arr, 'id');
            else
                return [];
        }
        return [];
    }

    public function getTattoos(): array
    {
        if ($this->has('tattoos')) {
            $arr = $this->get('tattoos');

            if (\is_array($arr))
                return array_column($arr, 'id');
            else
                return [];
        }
        return [];
    }

    public function getSports(): array
    {
        if ($this->has('sports')) {
            $arr = $this->get('sports');

            if (\is_array($arr))
                return array_column($arr, 'id');
            else
                return [];
        }
        return [];
    }

    public function getDances(): array
    {
        if ($this->has('dances')) {
            $arr = $this->get('dances');

            if (\is_array($arr))
                return array_column($arr, 'id');
            else
                return [];
        }
        return [];
    }

    public function getMartialArts(): array
    {
        if ($this->has('martial_arts')) {
            $arr = $this->get('martial_arts');

            if (\is_array($arr))
                return array_column($arr, 'id');
            else
                return [];
        }
        return [];
    }

    public function getStatus()
    {
        if ($this->has('statuses') && $this->get('statuses') != ''){
            return intval($this->get('statuses')['id']);
        }
        return 0;
    }

    public function getGender()
    {
        if ($this->has('genders') && $this->get('genders') != ''){
            return $this->get('genders')['name'];
        }
        return "";
    }
}
