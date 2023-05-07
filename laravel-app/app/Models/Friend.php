<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Friend extends Model
{

    const PENDING = 'pending';
    const ACCEPTED = 'accepted';
    const REJECTED = 'rejected';

    protected $fillable = [
        'user_id',
        'friend_id',
        'status',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function friend()
    {
        return $this->belongsTo(Friend::class, 'friend_id');
    }






}
