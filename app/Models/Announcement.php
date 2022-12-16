<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $table="announcement";
    
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function announcementfiles(){
        return $this->hasMany('App\Models\AnnouncementFiles','announcement_id');
    }
}
