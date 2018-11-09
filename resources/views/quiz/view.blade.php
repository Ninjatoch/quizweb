@extends("shared.teacher-dashboard")
@section("content")
    <div style="height: 100px;"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="text-left" style="float: left;">
                    Quizzes
                </h2>
                
                <a href="/quizzes" type="button" style="float: right;" class="btn btn-info">Make a Quiz</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table table-striped">
                    <tr style="background-color: #efefef">
                        <th>Status</th>
                        <th>Noº</th>
                        <th>Name</th>
                        <th>Created Date</th>
                        <th></th>
                    </tr>
                    @if($quizzes !== null)
                        @foreach($quizzes as $quiz)
                            <tr>
                                <td><input type="checkbox" name="status" @if($quiz->status) checked @endif></td>
                                <td>{{$quiz->id}}</td>
                                <td>{{$quiz->name}}</td>
                                <td>{{date("d-M-Y", strtotime($quiz->created_at))}}</td>
                                <td>
                                    <a href="quizzes/{{$quiz->id}}">View</a> |
                                    <a href="quizzes/{{$quiz->id}}/edit">Edit</a> |
                                    <a href="" onclick="event.preventDefault(); document.getElementById('disable-quiz').submit();">Disable</a>
                                    <form style="display: none;" id="disable-quiz" method="POST" action="quizzes/{{$quiz->id}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            {{$quizzes->links()}}
                        </tr>
                    @else
                        <tr>
                            <td colspan="5" style="background-color: #f4f4f4; padding: 5%;" class="text-center">
                                <a href="/quizzes">Create A Quiz</a>
                            </td>
                        </tr>
                    @endif
                    
                </table>
            </div>
        </div>
    </div>
    <footer style="height: 100px;">

    </footer>
@endsection