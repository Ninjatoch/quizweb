@extends("shared.teacher-dashboard")
@section("content")
<div style="height: 100px;"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form method="POST" action="quizzes/{{$quiz_id}}">
                @csrf
                @method('PUT')
                <h2>Create A Quiz</h2>
                <input type="submit" name="quiz" class="btn btn-primary" style="float: right; margin-bottom: 10px;" value="Save & Exit"/>
                <input type="text" class="form-control" name="quiz_name" value="{{$quiz_name}}" required/>
            </form> 
            <h4 style="margin-top: 20px;">Question</h4>
            <button type="button" name="question_type" value="qcm" class="btn btn-warning">Multiple Choice</button>
            <button type="button" name="question_type" value="tnf" class="btn btn-danger">True & False</button>
            <button type="button" name="question_type" value="sa" class="btn btn-success">Short Answer</button>
                <form id="form-question" hidden style="background-color: snow; padding: 10px; margin-top: 20px;">
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <strong>#1</strong>
                            <button type="reset" class="btn btn-danger" style="float: right;">Delete</button>
                            <button type="button" name="save" data-type="qcm" class="btn btn-primary" style="float: right; margin-right: 10px;">Save</button>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                            <label for="photo">
                                <i class="fa fa-picture-o fa-4x" aria-hidden="true"></i>
                                <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                            </label>
                            <input type="file" id="photo" name="photo" style="display: none;"/>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6">
                            <input type="hidden" name="user_id" value="{{$user_id}}"/>
                            <input type="hidden" name="quiz_id" value="{{$quiz_id}}"/>
                            <input type="text" name="question" class="form-control" placeholder="question"/>
                        </div>
                    </div>
                    <div id="qcm" hidden >
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table class="table">
                                    <tr>
                                        <th style="width: 35px;">Answer</th>
                                        <th></th>
                                        <th></th>
                                        <th style="width: auto;">Correct?</th>
                                    </tr>
                                    @for($index = 0; $index < 4; $index++)
                                    <tr data-tr="{{$index}}">
                                        <td><button class="btn btn-warning">{{$index}}</button></td>
                                        <td><input type="text" name="{{$index}}" class="form-control"/></td>
                                        <td><button class="btn btn-danger" data-close="{{$index}}" >&times;</button></td>
                                        <td><input type="radio" name="correct" data-correct="{{$index}}" ></td>
                                    </tr>
                                    @endfor
                                    <tr>
                                        <td><button class="btn btn-info" id="add-answer">Add Answer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="tnf" hidden>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h4>Correct Answer:</h4>
                                <input class="btn btn-light" type="button" name="tnf" value="TRUE">
                                <input class="btn btn-light" type="button" name="tnf" value="FALSE">
                            </div>
                        </div>
                    </div>
                    <div id="sa" hidden>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h4>Answer (optional)</h4>
                                <input type="text" name="answer" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection