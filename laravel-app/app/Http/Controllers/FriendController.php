<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Friend;

use Illuminate\Http\Request;

class FriendController extends Controller
{

    public function showNonFriends()
    {
        $users = User::whereNotIn('id', auth()->user()->friends()->pluck('friend_id')->toArray())
            ->where('id', '!=', auth()->user()->id)
            ->get();

        return view('friends.non-friends', compact('users'));
    }


    public function addFriend(Request $request, $friend_id)
    {
        $friendship = new Friend();
        $friendship->user_id = auth()->user()->id;
        $friendship->friend_id = $friend_id;
        $friendship->status = 'pending';
        $friendship->save();

        return redirect()->back();
    }


    public function showFriendRequests()
    {
        $loggedInUserId = auth()->id();
        $friendRequests = Friend::where('friend_id', $loggedInUserId)
            ->where('status', Friend::PENDING)
            ->get();
        return view('dashboard', compact('friendRequests'));
    }

    public function acceptFriendRequest($friendshipId)
    {
        $friendship = Friend::find($friendshipId);
        $friendship->status = Friend::ACCEPTED;
        $friendship->save();

        return redirect()->back();
    }

}
