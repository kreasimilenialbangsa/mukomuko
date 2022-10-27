<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function info(Request $request)
    {
        $userId = isset(auth()->user()->id) ? auth()->user()->id : 0;

        $info = Notification::select('id', 'user_id', 'title', 'body', 'image')
            ->whereUserId($userId)
            ->paginate(isset($request->limit) ? $request->limit : 10);

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $info
        ]);
    }

    public function broadcast(Request $request)
    {
        $broadcast = Notification::select('id', 'user_id', 'title', 'body', 'image', 'created_at')
            ->where('user_id', null)
            ->orderBy('created_at', 'desc')
            ->paginate(isset($request->limit) ? $request->limit : 10);

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $broadcast
        ]);
    }
}
