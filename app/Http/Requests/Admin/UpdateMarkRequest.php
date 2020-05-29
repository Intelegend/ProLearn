<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMarkRequest extends FormRequest
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
            
            'course_id' => 'required',
            'lessons_id' => 'required',
            'test_id' => 'required',
            'student_id' => 'required',
            'tests_result' => 'required',
            'mark' => 'required',
        ];
    }
}
