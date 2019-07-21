<?php

namespace App\Models\Chat;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    protected $fillable = ['body'];
    protected $appends = ['owner'];

    public function getOwnerAttribute()
    {
        return $this->user_id == auth()->user()->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d/m/Y h:m');
    }
}
