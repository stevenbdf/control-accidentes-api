<?php

namespace App\Http\Requests\ChartData;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChartDataRequest extends FormRequest
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
            'x_value' => ['sometimes', 'string', 'max:255'],
            'y_value' => ['sometimes', 'numeric'],
            'color' => ['sometimes', 'string', 'size:7', 'regex:/^#(([0-9a-fA-F]{2}){3}|([0-9a-fA-F]){3})$/']
        ];
    }
}
