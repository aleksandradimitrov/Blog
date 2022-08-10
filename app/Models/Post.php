<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $querded = ['id'];

    protected $with = ['category', 'author'];
    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id', 'user_id', 'thumbnail'];
    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query->where(fn ($query) =>
        $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')));

        $query->when($filters['category'] ?? false, fn ($query, $category) =>
        $query->whereExists(fn ($query) =>
        $query->from('categories')->whereColumn('categories.id', 'posts.category_id')->where('categories.slug', $category)));

        // $query->when($filters['author'] ?? false, fn ($query, $author) =>
        // $query->whereExists(fn ($query) =>
        // $query->from('author')->whereColumn('users.id', 'posts.user_id')->where('username', $author)));

        $query->when($filters['author'] ?? false, fn ($query, $author) =>
        $query->whereHas('author', fn ($query) =>
        $query->where('username', $author)));
    }
    public function category()
    {
        //hasOne, hasMany, belongsTo, belongsMany
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
