<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Post;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'status',
        'description',
    ];

    protected $table = 'categories';

    public function Post()
    {
        return $this->hasMany(Post::class, 'cat_id', 'id');
    }
}
