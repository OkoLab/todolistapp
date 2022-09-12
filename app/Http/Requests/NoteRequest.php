<?php

namespace App\Http\Requests;

use App\Rules\NumberRecordsInTable;
use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "note.name" => ['required', 'min:3', 'max:50', new NumberRecordsInTable(50)],
        ];
    }

        /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            //"inputname.required" => "Please write a title",
            //"title.min" => "The title has to have at least :min characters.",
            //"title.max" => "The title has to have no more than :max characters.",
        ];
    }
}
