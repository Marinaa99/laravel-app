<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;


class MessageController extends Controller
{


    public function create($friend_id)
    {
        $friend = User::findOrFail($friend_id);
        $messages = Message::where(function($query) use ($friend_id) {
            $query->where('user_id', auth()->user()->id)
                ->where('friend_id', $friend_id);
        })->orWhere(function($query) use ($friend_id) {
            $query->where('user_id', $friend_id)
                ->where('friend_id', auth()->user()->id);
        })
            ->orderBy('created_at', 'asc')
            ->get();
        return view('messages.create', compact('friend', 'messages'));
    }



    public function store(Request $request)
    {
        $message = new Message;
        $message->fromUser()->associate(Auth::user());
        $message->toUser()->associate(User::find($request->input('friend_id')));
        $message->message = $request->input('message');
        $message->save();

        return redirect()->route('messages.create', ['friend_id' => $request->input('friend_id'), 'messages' => $message]);
    }



    public function show($friend_id)
    {
        $user_id = Auth::user();

        $messages = Message::where(function ($query) use ($user_id, $friend_id) {
            $query->where('user_id', $user_id->id)
                ->where('friend_id', $friend_id);
        })->orWhere(function ($query) use ($user_id, $friend_id) {
            $query->where('friend_id', $friend_id)
                ->where('user_id', $user_id->id);
        })->orderBy('created_at', 'asc')->get();

        dd($messages->all());

        return view('messages.create', [
            'friend_id' => $friend_id,
            'user_id'=>$user_id,
            'message' => $message,
        ]);
    }

    public function delete($friend_id, Message $message)
    {
        if ($message->user_id != Auth::id()) {
            return redirect()->back();
        }

        $message->delete();

        return redirect()->back();
    }

}
