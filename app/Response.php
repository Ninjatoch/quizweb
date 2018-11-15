<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public $timestamps = false;
    protected $table = "responses";

    protected $fillable = [
        "student_id", "quiz_id", "question_id", "answer", "status"
    ];

    public function add(array $datas)
    {
        foreach($datas["answers"] as $data)
        {
            $student_id = $datas["student_id"];
            $quiz_id = $datas["quiz_id"];
            $question_id = $data["question_id"];
            $answer = $data["answer"];
            $correct = $data["correct"];

            $response = new Response;
            $response->student_id = $student_id;
            $response->quiz_id = $quiz_id;
            $response->question_id = $question_id;
            $response->answer = $answer;
            $response->correction = $correct;
            $response->save();
        }
    }
}
