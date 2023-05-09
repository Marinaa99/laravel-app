<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Friend;

use Illuminate\Http\Request;

class FriendController extends Controller
{




    public function getFriendshipStatus($friend_id)
    {
        $loggedInUserId = auth()->id();
        $friendship = Friend::where(function($query) use ($loggedInUserId, $friend_id) {
            $query->where('user_id', $loggedInUserId)
                ->where('friend_id', $friend_id);
        })
            ->orWhere(function($query) use ($loggedInUserId, $friend_id) {
                $query->where('user_id', $friend_id)
                    ->where('friend_id', $loggedInUserId);
            })
            ->first();

        if (!$friendship) {
            return 'none';
        } elseif ($friendship->status === Friend::PENDING) {
            return 'pending';
        } elseif ($friendship->status === Friend::ACCEPTED) {
            return 'accepted';
        } elseif ($friendship->status === Friend::REJECTED) {
            return 'rejected';
        }
    }



    public function addFriend(Request $request, $friend_id)
    {
        $friendshipStatus = $this->getFriendshipStatus($friend_id);

        if ($friendshipStatus === 'none') {
            $friendship = new Friend();
            $friendship->user_id = auth()->user()->id;
            $friendship->friend_id = $friend_id;
            $friendship->status = Friend::PENDING;
            $friendship->save();
        } elseif ($friendshipStatus === 'rejected') {
            Friend::where('user_id', $friend_id)
                ->where('friend_id', auth()->id())
                ->update(['status' => Friend::PENDING]);
        }

        return redirect()->back();
    }


    public function showFriendRequests()
    {
        $loggedInUserId = auth()->id();
        $friendRequests = Friend::where('friend_id', $loggedInUserId)
            ->where('status', Friend::PENDING)
            ->get();

        return view('friends.requests', compact('friendRequests'));
    }

    public function acceptFriendRequest($id)
    {
        $friendship = Friend::where('id', $id)->first();
        $friendship->status = Friend::ACCEPTED;
        $friendship->save();
        $friends = new Friend;
        $friends->user_id = $friendship->friend_id;
        $friends->friend_id = $friendship->user_id;
        $friends->status = Friend::ACCEPTED;
        $friends->save();

        return redirect()->back();
    }

    public function rejectFriendRequest($friendshipId)
    {
        $friendship = Friend::find($friendshipId);
        $friendship->status = Friend::REJECTED;
        $friendship->save();
        return redirect()->back();
    }

}
