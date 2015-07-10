<?php
namespace App\Queries\Surveys;

use App\Survey;
use DB;
class SurveyQuery {

    protected $scoped;

    public function __construct($scoped = null)
    {
        $this->scoped = $scoped ?: new Survey;
    }

    public function fetchSurveys()
    {
        $days = env('ENGINE').".FILEDAYS";
        $time = env('ENGINE').".FILETIME";
        $room = env('ENGINE').".FILEROOM";
        $course = env('ENGINE').".FILECOUR";
        $section = env('OGS').".FILESECT";
        return Survey::select([
            'surveys.id',
            'question_sets.description',
            'expires',
            'active',
            'surveys.created_at',
            'ADVISER',
            'DAYS as details',
            "TIME",
            $room.".ROOM",
            $section.".SECTION",
            $course.".COURSE",
        ])->leftJoin('question_sets', 'question_sets.id', '=', 'surveys.question_set_id')
            ->leftJoin(env('ENGINE') . '.FILEADVI', 'surveys.faculty_id', '=', env('ENGINE') . '.FILEADVI.ADVICODE')
            ->leftJoin(env('OGS').".FILESCHE", env('OGS').".FILESCHE.SCHEIDNO", "=", "surveys.schedule_id")
            ->leftJoin($days, $days.".DAYSIDNO", "=", "FILESCHE.DAYSIDNO")
            ->leftJoin($time, $time.".TIMEIDNO", "=", "FILESCHE.TIMEIDNO")
            ->leftJoin($room, $room.".ROOMIDNO", "=", "FILESCHE.ROOMIDNO")
            ->leftJoin($section, $section.".SECTIDNO", "=", "FILESCHE.SECTIDNO")
            ->leftJoin($course, $course.".COURIDNO", "=", "FILESCHE.COURIDNO");
    }
}