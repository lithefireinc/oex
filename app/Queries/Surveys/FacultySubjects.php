<?php namespace App\Queries\Surveys;

use App\Filesche;
use DB;
class FacultySubjects {
    public function lists($faculty){
        return DB::connection('ogs')->table("FILESCHE")
            ->join("FILESUBJ", "FILESCHE.SUBJIDNO", "=", "FILESUBJ.SUBJIDNO")
            ->where("ADVIIDNO", $faculty)
            ->get(["FILESCHE.SCHEIDNO as value", DB::raw("CONCAT('(', FILESUBJ.SUBJCODE, ') ', FILESUBJ.COURSEDESC) as text")]);
    }

    public function subjectDetails($schedule)
    {
        $days = env('ENGINE').".FILEDAYS";
        $time = env('ENGINE').".FILETIME";
        $room = env('ENGINE').".FILEROOM";
        $course = env('ENGINE').".FILECOUR";
        return response()->json(DB::connection('ogs')->table("FILESCHE")
            ->select("DAYS", "TIME", "ROOM", "SECTION", "COURSE")
            ->leftJoin($days, $days.".DAYSIDNO", "=", "FILESCHE.DAYSIDNO")
            ->leftJoin($time, $time.".TIMEIDNO", "=", "FILESCHE.TIMEIDNO")
            ->leftJoin($room, $room.".ROOMIDNO", "=", "FILESCHE.ROOMIDNO")
            ->leftJoin("FILESECT", "FILESECT.SECTIDNO", "=", "FILESCHE.SECTIDNO")
            ->leftJoin($course, $course.".COURIDNO", "=", "FILESCHE.COURIDNO")
            ->where("SCHEIDNO", $schedule)
            ->first());
    }
}