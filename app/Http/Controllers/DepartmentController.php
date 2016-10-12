<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DepartmentController extends Controller{

  public function index(){
    $departments = Department::all();
    return $this->prepareResponse($departments, "Success get data !");
  }

  public function get($id){
    $department = Department::find($id);
    return $this->prepareResponse($department, "Success find id = ".$id." !");
  }

  public function create(Request $request){
    $department = Department::create($request->all());
    return $this->prepareResponse($department, "Success create new data !");
  }

  public function delete($id){
    $department = Department::find($id);
    $department->delete();
    return $this->prepareResponse($department, "Success delete data !");
  }

}
?>
