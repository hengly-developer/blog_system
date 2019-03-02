<?php

namespace App\Model\User;

use App\Model\Post\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class User extends Model
{

    /**
     * @var string $table
     */
    protected $table = 'posters';

    /**
     * @var array $fillable
     */
    protected $fillable = ['*'];

    /**
     * @var array $hidden
     */
    protected $hidden = ['password'];

    public function post() {
        return $this->hasMany(Post::class);
    }

    /**
     * Validation rule
     *
     * @return array
     */
    protected static function validationRule() {
        return [
            'name' => 'required|max:200',
            'email' => 'required|unique:posters,email|regex:/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/',
            'password' => 'required|confirmed'
        ];
    }

    protected static function validationLoginRule() {
        return [
            'email' => 'required|regex:/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/',
            'password' => 'required'
        ];
    }

    /**
     * Validation message
     *
     * @return array
     */
    protected static function validationLoginMessage() {
        return [
            'email.required' => 'Email required',
            'email.regex' => 'Email not valid',
            'password.required' => 'Password required'
        ];
    }

    /**
     * Validation message
     *
     * @return array
     */
    protected static function validationMessage() {
        return [
            'name.required' => 'Name required',
            'email.required' => 'Email required',
            'email.unique' => 'Email already taken',
            'email.regex' => 'Email not valid',
            'password.required' => 'Password required',
            'password.confirmed' => 'Password not matched'
        ];
    }

    /**
     * @param $where
     * @return mixed
     */
    protected static function getUser($where) {
        return User::where($where)->first();
    }

    protected static function generateKey() {
        return md5(str_random(32));
    }

    /**
     * Check if user already activates telegram
     *
     * @return bool
     */
    protected static function isActivated() {
        if (Session::has('poster')) {
            $user = User::where(['id' => decrypt(Session::get('poster')->id)])->first();
            if (is_object($user) && ! empty($user->tg_id)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get list of posts
     *
     * @param array $option
     *
     * @return array
     */
    protected static function getPosts(array $option) {
        $posts = [];
        if (Session::has('poster')) {
            $posts = Post::where(['user_id' => decrypt(Session::get('poster')->id)]);
            if (isset($option['offset']) && isset($option['limit'])) {
                $posts = $posts->skip($option['offset'])->take($option['limit']);
            }

            if (! isset($option['offset'])) {
                $posts = $posts->take(env('LIMIT'));
            }

            $posts = $posts->get();
        }

        return $posts;
    }
}
