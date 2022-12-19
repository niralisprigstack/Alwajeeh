<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementView extends Model
{
    use HasFactory;
    protected $table="announcement_views";
  
    public function announcement() {
        return $this->belongsTo('App\Models\Announcement', 'announcement_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
