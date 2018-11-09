<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "rooms";
    protected $fillable = [
        "user_id", "quiz_id", "name", "participants", "status"
    ];

    public function add(array $data)
    {
        $name = $data["name"];
        $participant = $data["participant"];
        $quiz_id = $data["quiz_id"];
        $user_id = $data["user_id"];

        $room = new Room;
        $room->user_id = $user_id;
        $room->quiz_id = $quiz_id;
        $room->name = $name;
        $room->participants = $participant;
        $room->save();
    }

    public function show(int $user_id)
    {
        $rooms = Room::where("user_id", $user_id)->where("status", 1)->paginate(5);
        if(count($rooms) === 0) return null;
        return $rooms;
    }

    public function search(string $room_name)
    {
        $rooms = Room::where("name", "like", "%" . $room_name)->where("status", 1)->get();
        if(count($rooms) !== 0)
        {
            foreach($rooms as $room)
            {
                $room["quiz"] = Quiz::where("id", $room->quiz_id)->where("status", 1)->first()->toArray();
                $room["user"] = User::where("id", $room->user_id)->where("status", 1)->first()->toArray();
            }
        }
        
        return $rooms;
    }

    public function isAvaliable(int $id)
    {
        $room = Room::where("id", $id)->where("participants", ">", 0)->count();
        if($room > 0)
            return true;
        return false;
    }

    public function update_room(int $id)
    {
        $room = Room::where("id", $id)->first();
        Room::where("id", $id)->update(["participants" => ($room->participants - 1)]);
        session(["room_valid" => 1]);
    }
}
