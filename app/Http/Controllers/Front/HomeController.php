<?php

namespace App\Http\Controllers\Front;

use App\Model\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{

    /**
     * Switch template if session set, display dashboard for poster or default home page template
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('Front.index');
    }

    /**
     * Get sign-in form
     *
     * Redirect to default home page if session not set
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function signin() {
        if (! Session::has('poster')) {
            return view('Front.User.signin');
        }

        return redirect('/posts');
    }

    /**
     * Get sign-form
     *
     * Redirect to default home page if session not set
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function signup() {
        if (! Session::has('poster')) {
            return view('Front.User.signup');
        }

        return redirect('/posts');
    }

    /**
     * Sign-out and clear session
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function signout() {
        Session::forget('poster');
        return redirect(URL::previous());
    }
}
