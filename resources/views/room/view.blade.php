@extends("shared.teacher-dashboard")
@section("content")
    <div style="height: 100px;"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="text-left" style="float: left;">
                    Rooms
                </h2>
                
                <a href="rooms" type="button" style="float: right;" class="btn btn-info">Create a Room</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table table-striped">
                    <tr>
                        <th>Status</th>
                        <th>Room</th>
                        <th>Free Space</th>
                        <th>Created By</th>
                        <th>Created Date</th>
                        <th></th>
                    </tr>
                    @if($rooms !== null)
                        @foreach($rooms as $room)
                            <tr>
                                <td><input type="checkbox" name="status" @if($room->status) checked @endif></td>
                                <td>{{$room->name}}</td>
                                <td>{{$room->participants}}</td>
                                <td>{{date("d-M-Y", strtotime($room->created_at))}}</td>
                                <td>
                                    <a href="rooms/{{$room->id}}">View</a> |
                                    <a href="rooms/{{$room->id}}/edit">Edit</a> |
                                    <a href="" onclick="event.preventDefault(); document.getElementById('disable-room').submit();">Disable</a>
                                    <form style="display: none;" id="disable-room" method="POST" action="rooms/{{$room->id}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" style="background-color: #f4f4f4; padding: 5%;" class="text-center">
                                <a href="/rooms">Create A Room</a>
                            </td>
                        </tr>
                    @endif
                    <tr>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <footer style="height: 100px;">

    </footer>
@endsection