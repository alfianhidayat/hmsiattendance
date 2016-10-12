<?php

namespace App\Http\Controllers;

use App\TransactionMeeting;
use App\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TransMeetingController extends Controller{

  public function index(){
    $trans = TransactionMeeting::with('staff')->get();
    return $this->prepareResponse($trans, "Success get data !");
  }

  public function get($id){
    $tran = TransactionMeeting::with('staff')->find($id);
    return $this->prepareResponse($tran, "Success find id = ".$id." !");
  }

  public function getByMeeting($id){
    $tran = TransactionMeeting::with('staff')->where('meeting_id', $id)->get();
    return $this->prepareResponse($tran, "Success find id = ".$id." !");
  }

  public function create(Request $request){
    $tran = TransactionMeeting::create($request->all());
    return $this->prepareResponse($tran, "Success create new data !");
  }

  public function delete($id){
    $tran = TransactionMeeting::find($id);
    $tran->delete();
    return $this->prepareResponse($tran, "Success delete data !");
  }

  public function update(Request $request){
    $staff = Staff::where('id_staff', '=', $request->staff_id)->firstOrFail();
    $tran = TransactionMeeting::where('meeting_id',$request->meeting_id)->where('staff_id',$staff->id)->update(['status_id'=> $request->status_id]);
    return $this->prepareResponse($staff, "Success update data !");
  }
}
?>
