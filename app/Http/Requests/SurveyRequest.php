<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SurveyRequest extends Request {

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
            'title' => 'required',
            'description' => 'required',
            'instructions' => 'required',
            'start_date' => 'required|date',
            'expires' => 'required|date',
            'per_page' => 'required|numeric',
            'schedule_id' => 'required',
            'faculty_id' => 'required'
		];
	}

    public function messages()
    {
        return [
            "schedule_id.required" => "Please select a subject",
            "faculty_id.required" => "Please select a faculty",
        ];
    }

}
