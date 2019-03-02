@extends('Layout.front')
@section('title', $user->name)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">My Profile</h3>
                    </div>

                    <form action="{{ action('Front\User\UserController@updateProfile', $slug) }}" method="POST">
                        @if (session('success'))
                            <div class="col-xs-12 text-success">
                                {{ session('success') }}<br><br>
                            </div>
                        @endif

                        {{ csrf_field() }}
                        <div class="panel-body">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}">
                            <br><br>
                            <label for="email">Email</label>
                            <input type="email" id="email" disabled="disabled" readonly="readonly" value="{{ $user->email }}">
                            {{--<br><br>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="profile-pic">Change profile picture</label>
                                    <input type="file" name="profile_pic" id="profile-pic">
                                </div>
                                <div class="col-xs-4" style="margin-top: 10px;">
                                    <img src="{{ asset('storage/image/avatar.png') }}" alt="Avatar" width="50" class="img-circle">
                                </div>
                                <div class="col-xs-2"></div>
                            </div>
                            <div class="clearfix"></div>--}}
                            <br><br>
                            <label for="current-password">Your old password <small class="text-danger">(Leave it blank for old password)</small></label>
                            <input type="password" id="current-password" name="current_password" value="{{ old('current_password') }}">
                            <p>
                                <small class="text-danger">{{ $errors->first('current_password') }}</small>
                            </p>
                            <br><br>
                            <label for="new-password">Your new password</label>
                            <input type="password" id="new-password" name="new_password" value="{{ old('new_password') }}">
                            <p>
                                <small class="text-danger">{{ $errors->first('new_password') }}</small>
                            </p>
                            <br><br>
                            <label for="new-password-confirmation">Retype your new password</label>
                            <input type="password" id="new-password-confirmation" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}">
                            <p>
                                <small class="text-danger">{{ $errors->first('new_password') }}</small>
                            </p>
                        </div>

                        <div class="panel-footer text-right">
                            <a href="/" class="btn btn-danger btn-sm">Cancel</a>
                            <input type="submit" value="Save" class="btn btn-primary btn-sm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection