<?php

namespace App\Http\Requests\Config;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConfigRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last_accident' => ['sometimes', 'date_format:Y-m-d'],
            'main_info_text' => ['sometimes', 'string'],
            'marquee_text' => ['sometimes', 'string'],
            'display_main_info' => ['sometimes', 'boolean'],
            'display_media' => ['sometimes', 'boolean'],
            'display_charts' => ['sometimes', 'boolean'],
            'media_id' => ['sometimes', 'integer', 'exists:media,id']
        ];
    }
}
