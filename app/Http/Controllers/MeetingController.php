<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\Staff;
use App\TransactionMeeting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MeetingController extends Controller{

  public function index(){
    $meetings = Meeting::with('transmeeting.staff')->orderBy('id','desc')->get();
    return $this->prepareResponse($meetings, "Success get data !");
  }

  public function get($id){
    $meeting = Meeting::with('transmeeting.staff','transmeeting.staff.department')->find($id);
    return $this->prepareResponse($meeting, "Success find id = ".$id." !");
  }

  public function create(Request $request){
    $total_staff = Staff::count();
    $meeting = Meeting::create(array('name' => $request->name,
                                     'explanation'=>$request->explanation,
                                     'total_staff'=>$total_staff));
    $staff = Staff::all();
    foreach ($staff as $key => $value) {
        TransactionMeeting::create(
              array('meeting_id' => $meeting->id,
                    'staff_id'=> $value->id,
                    'status_id'=> 1)
            );
    }
    return $this->prepareResponse("Success create new data !");
  }

  public function delete($id){
    $meeting = Meeting::find($id);
    $meeting->delete();
    return $this->prepareResponse($meeting, "Success delete data !");
  }

  public function update(Request $request, $id){
    $meeting = Meeting::find($id);
    $meeting->name = $request->input('name');
    $meeting->total_staff = $request->input('total_staff');
    $meeting->explanation = $request->input('explanation');
    $meeting->save();
    return $this->prepareResponse($meeting, "Success update data !");
  }
}
?>
