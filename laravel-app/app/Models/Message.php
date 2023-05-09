<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
}
