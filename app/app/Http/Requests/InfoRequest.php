<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class InfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'height' => 'numeric|min:1|max:254',
            'weight' => 'numeric|min:1|max:254',
            'hair_color' => 'numeric|min:1|max:5',
            'boobs_size' => 'numeric|min:0|max:254',
            'ass_girth' => 'numeric|min:1|max:254',
            'waistline' => 'numeric|min:1|max:254',
            'dick_length' => 'numeric|min:1|max:254',
            'goal_here' => 'numeric|min:1|max:3',
        ];
    }
}
