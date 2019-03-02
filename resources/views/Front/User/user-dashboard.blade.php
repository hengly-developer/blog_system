@extends('Layout.front')
@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            @if (! $isActivated)
                <div class="col-sm-6 col-sm-offset-3">
                    <p class="text-primary">
                        <strong>Important Notice: </strong>Please activate your telegram account in order to create awesome posts and send to our telegram group and facebook page from our system.
                    </p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p>
                        Below is the link to activate your telegram account: <br>
                        <a href="{{ \Illuminate\Support\Facades\Session::get('poster')->tg }}">Telegram</a>
                    </p>
                    <p>
                        Don't know how to activate? Watch <a href="">here</a>
                    </p>
                </div>
            @else
                <div class="col-xs-12">
                    Post list
                </div>
            @endif
        </div>
    </div>
@endsection