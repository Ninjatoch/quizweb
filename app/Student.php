<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    protected $fillable = [
        "room_id", "quiz_id", "name", "status"
    ];

    public function add(array $data)
    {
        $room_id = $data["room_id"];
        $quiz_id = $data["quiz_id"];
        $name = $data["nickname"];
        $student = new Student;
        $student->room_id = $room_id;
        $student->quiz_id = $quiz_id;
        $student->name = $name;
        $student->save();
        $stu = Student::select("id")->orderBy("id", "desc")->first();
        return $stu->id;
    }
}
