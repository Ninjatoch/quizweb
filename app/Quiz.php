<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Quiz extends Model
{
    protected $table = "quizzes";
    protected $fillable = [
        "user_id", "name", "status"
    ];

    public function default(int $user_id)
    {
        $quiz = new Quiz();
        $quiz->user_id = $user_id;
        $quiz->name = "untitled quiz";
        $quiz->status = 0;
        $quiz->save();
        $get_quiz_id = Quiz::select("id")->orderBy("id", "desc")->first();
        session(["hasQuiz" => 1, "quiz_id" => $get_quiz_id->id, "quiz_name" => "Untitled Quiz"]);
        return $get_quiz_id->id; 
    }

    public function show(int $user_id)
    {
        $quizzes = Quiz::where("status", 1)->where("user_id", $user_id)->paginate(8);
        if(count($quizzes) === 0) return null;
        return $quizzes;
    }

    public function edit(int $id, string $name)
    {
        $quiz = Quiz::where("id", $id)->update(["name" => $name, "status" => 1]);
        session(["quiz_name" => $name]);
    }

    public function getQuiz(int $id)
    {
        $quiz = Quiz::join('users', 'quizzes.user_id', '=', 'users.id')
                    ->where("quizzes.id", $id)
                    ->select('users.*', 'quizzes.*', 'users.name as username')
                    ->first();
        return $quiz;
    }

    public function getAllQuizzes(int $id)
    {

    }
}
