<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementComments extends Model
{
    use HasFactory;
    protected $table="announcement_comments";

    public function announcement() {
        return $this->belongsTo('App\Models\Announcement', 'announcement_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
        
    }


        //each category might have one parent
    public function parent() {
        return $this->belongsToOne(static::class, 'parent_comment_id');
    }

    //each category might have multiple children
    public function children() {
        return $this->hasMany(static::class, 'parent_comment_id')->orderBy('id', 'desc');
    }
}
