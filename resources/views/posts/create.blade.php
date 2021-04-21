@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" value="{{ old('title')}}" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <br>

                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" name="description" value="{{ old('description')}}"  autofocus></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <br>
                                    
                                </div> 
                                <div class="form-group">
                                    <label for="img" class="col-from-label">{{__('Post Image')}}</label>
                                    <input type="file" class="form-control-file @error('img') is-invalid @enderror" name="img">

                                    @error('img')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>

                                <input type="submit" class="btn button btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection