<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VideosController extends Controller
{
    public function show(Request $request, $id)
    {
        $now_playing = Video::findOrFail($id);
        $user = $request->user();

        $this->ensureUserCanViewVideo($user, $now_playing);

        $user->last_viewed_video_id = $id;
        $user->save();

        return view('videos.show', compact('now_playing'));
    }

    private function ensureUserCanViewVideo($user, $video)
    {
        if ($video->lesson->isFree() || $video->lesson->product_id <= $user->order->product_id) {
            return;
        }

        abort(403);
    }
}
