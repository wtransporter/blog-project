<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function($query, $search) {
            $query->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('body', 'LIKE', '%' . $search . '%');
        });

        $query->when($filter['category'] ?? false, function($query, $category) {
            $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filter['author'] ?? false, function($query, $author) {
            $query->whereHas('author', function($query) use ($author) {
                $query->where('username', $author);
            });
        });
    }
}
