<?php

namespace App\Traits;


trait HttpResponses {


    protected function success($data = null, $message = 'ok', $code = 200)
    {
      return response()->json([
        'status'  => true,
        'message' => $message,
        'data'    => $data
      ], $code);
    }



    protected function error($error, $message = null, $code = null)
    {
      return response()->json([
        'status'  => false,
        'message' => $message,
        'error'   => $error
      ]);
    }


}
