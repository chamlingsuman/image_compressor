@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Compress Image') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('compress.image') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="image_format" class="col-md-4 col-form-label text-md-end">{{ __('Image Format') }}</label>

                            <div class="col-md-6">
                                <select name="image_format" class="form-control">
                                    <option value="">Select the Image Type</option>
                                    <option value=".jpg">JPG</option>
                                    <option value=".png">PNG</option>
                                    <option value=".webp">WEBP</option>
                                </select>

                                @error('image_format')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Upload Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Compress') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                         {!! session('success') !!}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
