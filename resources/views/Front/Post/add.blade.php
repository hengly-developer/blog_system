@extends('Layout.front')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">New Post</h3>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="panel-body">
                            <label for="description">Description <small class="text-danger">(3000 characters limit)</small></label>
                            <textarea name="description" id="description" cols="30" rows="30" maxlength="3000">{{ old('description') }}</textarea>
                            <p>
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                            </p>

                            <label for="file">Upload images <small>(10 max)</small></label>
                            <input type="file" name="file[]" multiple="multiple">
                        </div>
                        <div class="panel-footer text-right">
                            <a href="{{ action('Front\Post\PostController@index') }}" class="btn btn-sm btn-danger">Cancel</a>
                            <input type="submit" value="Create" class="btn btn-primary btn-sm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        document.emojiType = 'unicode';
        document.emojiSource = '{{ asset('storage/summernote-emoji/tam-emoji/img') }}';
        $('#description').summernote({
            placeholder: 'Enter your post description',
            height: 200,
            toolbar: [
                    ['format', ['undo', 'redo', 'clear']],
                    ['style', ['bold', 'italic', 'emoji']],
                    ['link', ['linkDialogShow', 'unlink']],
                    ['misc', ['fullscreen']]
            ]
        });
    </script>
@endsection