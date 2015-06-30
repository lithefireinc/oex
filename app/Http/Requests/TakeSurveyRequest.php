<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TakeSurveyRequest extends Request {

    protected $survey;
    protected $question_set;
    protected $question_categories;
    protected $questions;

    public function __construct()
    {
        $this->survey = session()->get('survey');
        $this->question_set = $this->survey->questionSet()->first();
        $this->question_categories = $this->question_set->questionCategory();
//        $this->questions = $this->question_set->questions();

    }
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
        $rules = [
        ];

        foreach($this->question_categories->get() as $question_category) {
            foreach ($question_category->questions()->get() as $question) {
                if ($question->required)
                    $rules[$this->survey->code . 'X' . $this->question_set->id . 'X' . $question_category->id . 'X' . $question->id] = 'required';
            }
        }
		return $rules;
	}

    public function messages()
    {
        $messages = [];
        $count = 1;

        foreach($this->question_categories->get() as $question_category) {
            foreach ($question_category->questions()->get() as $question) {
                if ($question->required)
                    $messages[$this->survey->code . 'X' . $this->question_set->id . 'X' . $question_category->id . 'X' . $question->id . '.required'] = "Item $count is required";

                $count++;
            }
        }
        return $messages;
    }

}
