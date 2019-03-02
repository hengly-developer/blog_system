<?php

namespace App\Http\Controllers\Front\Post;

use App\Model\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    protected $param;

    public function index() {
        $activated = User::isActivated() ? true : false;
        $this->param = [
            'title' => 'Posts',
            'isActivated' => $activated
        ];
        return view('Front.Post.index', $this->param);
    }

    public function add() {
        $this->param = [
            'title' => 'Add new post'
        ];
        return view('Front.Post.add', $this->param);
    }

    public function edit($id) {

    }

    public function save(Request $request) {
        $description = $request->get('description');
        if (strlen($description) > env('TG_MESSAGE_MAX_LENGTH')) {
            return redirect()->back()->withErrors(['description' => 'Description is limited to 3000 characters']);
        }

        // Check photo upload
        if ($request->hasFile('file')) {
            var_dump($request->all());die();
        }
    }

    public function disableEnable($id, $status) {

    }

    public function delete($user, $id) {

    }

    public function setScheduler(Request $request) {

    }
}
