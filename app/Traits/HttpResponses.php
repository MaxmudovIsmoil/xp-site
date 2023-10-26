<?php

namespace App\Traits;


use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Queue\Jobs\Job;
use PhpParser\Node\Expr\Cast\Object_;

trait HttpResponses {


    protected function success(object $data = null, int $code = 200): JsonResponse
    {
        $array = [
            'status'  => true,
            'message' => 'ok',
        ];

        if($data !== null)
            $array['data'] = $data;

      return response()->json($array, $code);
    }



    protected function error(?string $error, ?int $code = null)
    {
      return response()->json([
        'status'  => false,
        'error'   => $error,
        'code' => $code
      ]);
    }


}
