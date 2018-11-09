@extends("shared.teacher-dashboard")
@section("content")
<div class="register">
    <div class="container">
        <div class="row">
            
            <!-- Register Form -->
            <div class="col-lg-3 col-md-3 col-sm-2"></div>
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                <div class="register_form_container">
                    <div class="register_form_title">Create Room</div>
                    <form action="rooms" method="POST" id="register_form" autocomplete="off" class="register_form">
                        @csrf
                        <div class="row register_row">
                            <div class="col-lg-6 register_col">
                                <input type="text" name="name" class="form_input" placeholder="Room Name" required="required">
                            </div>
                            <div class="col-lg-6 register_col">
                                <input type="text" name="participant" class="form_input" placeholder="Number of Participant" required="required">
                            </div>
                            <div class="col-lg-12 register_col">
                                <select name="quiz_id" class="form_input" required>
                                    <option>Select quiz</option>
                                    @foreach($quizzes as $quiz)
                                        <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <button type="submit" class="form_button trans_200">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection