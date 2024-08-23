<?php 

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;

trait HttpResponse
{
    public function response (string $message, string|int $status, array|MessageBag|Model $data = [])
    {
        return response()->json([
            'message' => $message,
            'status' => $status,
            'data' => $data
        ], $status);
    }

    public function error (string $message, string|int $status, array|MessageBag $error = [], array|MessageBag $data = [])
    {
        return response()->json([
            'message' => $message,
            'status' => $status,
            'error' => $error,
            'data' => $data
        ], $status);
    }
}
?>
