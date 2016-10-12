<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class StaffController extends Controller{

  public function index(){
    $staff = Staff::with('department')->get();
    return $this->prepareResponse($staff, "Success get data !");
  }

  public function get($id){
    $staff = Staff::with('department')->find($id);
    return $this->prepareResponse($staff, "Success find id = ".$id." !");
  }

  public function create(Request $request){
      // $dept = Department::where('dept_id', '=', $request->dept_id)->firstOrFail();
      // $request->dept_id = $dept->id;
      $check = Staff::where('id_staff', $request->id_staff)->get();
      if (sizeof($check) == 0) {
          $staff = Staff::create($request->all());
          // echo $request->input('dept_id');
          // die();
          return $this->prepareResponse($staff, "Success create new data !");
      }else{
        return $this->prepareResponse(NULL, "Data sudah ada !");
      }
  }

  public function delete($id){
    $staff = Staff::find($id);
    $staff->delete();
    return $this->prepareResponse($staff, "Success delete data !");
  }

  public function update(Request $request, $id){
    $staff = Staff::find($id);
    $staff->id_staff = $request->input('id_staff');
    $staff->fname = $request->input('fname');
    $staff->lname = $request->input('lname');
    $staff->job = $request->input('job');
    $staff->address = $request->input('address');
    $staff->phone_number = $request->input('phone_number');
    $staff->email = $request->input('email');
    $staff->bday = $request->input('bda');
    $staff->ttd = $request->input('explanation');
    $staff->dept_id = $request->input('explanation');
    $staff->save();
    return $this->prepareResponse($staff, "Success update data !");
  }
}
?>
