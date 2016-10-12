<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    public function prepareResponse($data, $message){
      return response()->json([
          'error'          => isset($data) ? false : true,
          'data'           => $data,
          'message'         => !isset($message) ? 'Failed !' : $message
      ]);
    }
    public function prepareResponsePost($message){
      return response()->json([
          'error'          => isset($message) ? false : true,
          'data'           => null,
          'message'         => !isset($message) ? 'Failed !' : $message
      ]);
    }
}
