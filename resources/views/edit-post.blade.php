@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Post') }}</div>

                <div class="card-body">
                    @if($posts)
                    <form method="POST" action="{{ route('update-post', $posts->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="postTitle" class="col-md-4 col-form-label text-md-right">{{ __('Post Title') }}</label>

                            <div class="col-md-6">
                                <input id="postTitle" type="text" class="form-control @error('postTitle') is-invalid @enderror" name="postTitle" value="{{ $posts->postTitle }}" required autocomplete="postTitle" autofocus>

                                @error('postTitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="post" class="col-md-4 col-form-label text-md-right">{{ __('Post') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control  @error('post') is-invalid @enderror" name="post" id="post" required autocomplete="post">{{ $posts->post }}</textarea>
                                @error('post')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
