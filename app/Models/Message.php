<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['from_user_id', 'to_user_id', 'message','img_path'];
    protected $appends = ['time_ago'];

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    public function getTimeAgoAttribute()
    {
        $date = $this->created_at->subHours(5);

        if($date->isToday()){
            return $date->format('h:i a');
        }

        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
