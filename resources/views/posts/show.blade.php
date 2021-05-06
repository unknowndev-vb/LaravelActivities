@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br>
                <div class="card">
                    <div class="card-body">
                       <div class="card-title">
                            <!-- <strong>Post ID:</strong>{{$post[0]->id}}<br> -->
                            <strong>Title:</strong> {{$post[0]->Title}} <br>
                            <strong>Description:</strong> {{$post[0]->Description}} <br>
                       </div>
                       <div class="card">
                            <div class="card-body">
                                    <img src="{{ asset('/storage/img/'.$post[0]->img) }}" alt="No image found" style="width:300px; height:auto;">
                            </div>
                       </div>

                       <br>
                        <form method="post" action="{{ route('comments.store') }}">  
                            @csrf
                        
                            <div class="col-md-6">
                                <span class="h6">New Comment:</span><br>
                                <input id="description" type="text" class="form-control  @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required>
                                <input type="hidden" name="post_id" value="{{ $post[0]->id }}">
                                <br>
                                <input type="submit" class="btn btn-block btn-outline-primary" value="Add Comment">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </form>

                        <div class="card-body">
                            @if ($post[0]->comments)
                                <span class="badge badge-pill badge-secondary h3">Comments:</span><br>
                                <div class="card">
                                    <div class="card-body">
                                        @foreach ($post[0]->comments as $comment)
                                            <div class="display-comment" >
                                                <p>{{ $comment->description }}</p>
                                                <a href="" id="reply"></a>
                                                <form method="post" action="{{ route('comments.store') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="text" name="description" class="form-control" />
                                                        <input type="hidden" name="post_id" value="{{ $comment->post_id }}" />
                                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-success" value="Reply" />
                                                    </div>
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>                            
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection