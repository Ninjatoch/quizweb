<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Response;
use Session;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "quiz_id" => "required|integer",
            "answers" => "required",
            "answers.*" => "required|array"
        ]);
        $quiz_id = $request->quiz_id;
        $answers = $request->answers;
        $student_id = Session::get("student_id");
        //return response()->json($answers[0]["answer"]);
        $response_array = array("quiz_id" => $quiz_id, "answers" => $answers, "student_id" => $student_id);
        $response = new Response;
        $response->add($response_array);
        session()->forget("room_valid");
        session()->forget("student_id");
        return response()->json("success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
