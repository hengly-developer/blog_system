<?php

namespace App\Model\Post;

use App\Model\User\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * @var array $fillable
     */
    protected $fillable = ['*'];

    /**
     * @var string $table
     */
    protected $table = 'users_posts';

    public function user() {
        return $this->belongsTo(User::class);
    }
}
