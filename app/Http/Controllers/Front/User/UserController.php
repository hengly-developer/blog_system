<?php

namespace App\Http\Controllers\Front\User;

use App\Model\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request) {
        $validation = Validator::make($request->all(), User::validationRule(), User::validationMessage());
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = password_hash($request->get('password'), PASSWORD_BCRYPT);
        $user->tg_activation_link = env('TG_ME') . '?key=' . User::generateKey();

        if ($user->save()) {
            return redirect('/');
        }

        return redirect()->back()->withErrors(['oop' => 'Oop! service unavailable!'])->withInput();
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function login(Request $request) {
        $validation = Validator::make($request->all(), User::validationLoginRule(), User::validationLoginMessage());
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        // Validate login
        $user = User::getUser(['email' => $request->get('email')]);

        if (is_object($user) && password_verify($request->get('password'), $user->password)) {
            Session::put('poster', (object)[
                'name' => $user->name,
                'email' => $user->email,
                'id' => encrypt($user->id),
                'tg' => $user->tg_activation_link
            ]);
            return redirect('/posts');
        }

        return redirect()->back()->withErrors(['oop' => 'Wrong user or password!']);
    }

    /**
     * Get profile edit form
     *
     * @param string $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile($slug) {
        $user = User::getUser(['id' => decrypt($slug)]);

        $data = [
            'user' => $user,
            'slug' => $slug
        ];

        return view('Front.User.profile', $data);
    }

    /**
     * @param $slug
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function updateProfile($slug, Request $request) {
        $name = $request->get('name');
        $oldPassword = $request->get('current_password');
        $newPassword = $request->get('new_password');
        $newPasswordConfirmation = $request->get('new_password_confirmation');
        $profile = User::findOrfail(decrypt($slug));

        if (! $name) {
            return redirect()->back()->withErrors(['name', 'Name is required']);
        }

        if ($oldPassword) {
            if (password_verify($oldPassword, $profile->password)) {
                return redirect()->back()->withErrors(['current_password' => 'You current password not correct'])->withInput();
            }

            if ($newPassword && $newPasswordConfirmation && $newPassword != $newPasswordConfirmation) {
                return redirect()->back()->withErrors(['new_password' => 'Password does not match'])->withInput();
            }

            if (! $newPassword || ! $newPasswordConfirmation) {
                return redirect()->back()->withErrors(['new_password' => 'New password cannot be empty'])->withInput();
            }
        }

        if (($newPasswordConfirmation || $newPassword) && ! $oldPassword) {
            return redirect()->back()->withErrors(['current_password' => 'Please enter your current password'])->withInput();
        }

        $profile->id = decrypt($slug);
        $profile->name = $name;

        if ($newPassword) {
            $profile->password = password_hash($newPassword, PASSWORD_BCRYPT);
        }

        if ($profile->save()) {
            return redirect()->back()->with('success', 'Profile updated successfully.');
        }

        return redirect()->back()->withErrors(['oop' => 'Oop! failed to save profile. Service unavailable!']);
    }
}
