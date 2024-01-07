<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
    'title',
    'body',
    'user_id',
    ];
    
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    //public function user()
    //{
        //return $this->belongsTo(User::class);
    //}
    
    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }
 
    public function likes() 
    {
        return $this->hasMany('App\Models\Like');
    }
    
}


