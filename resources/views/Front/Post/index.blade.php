@extends('Layout.front')
@section('title', $title)

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
                    <div class="panel-default">
                        <p class="pull-right" style="margin-top: 2px;">
                            <a href="{{ action('Front\Post\PostController@add') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                        </p>
                        <div class="panel-heading">
                            <h3 class="panel-title">My Posts</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover table-stripped">
                                <thead>
                                <tr>
                                    <th>N&deg;</th>
                                    <th>Detail</th>
                                    <th>Photos</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>001</td>
                                    <td>Test</td>
                                    <td>test</td>
                                    <td>
                                        <i class="fa fa-pencil"></i>
                                        &nbsp;
                                        <i class="fa fa-trash"></i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            Pagination
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection