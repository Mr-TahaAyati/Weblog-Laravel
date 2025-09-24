<?php

namespace App\Models\Admin;

use App\Models\Admin\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
    'title',
    'user_id',
    'status',
    'cat_id',
    'summery',
    'body',
    'image',
];

    protected $table = 'posts';

    public function Category()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }

    
    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
