@extends('layouts.app')

@section('content')

    <div class="card">
        @include('partials.discussion-header')

        <div class="card-body">
            <div class="text-center">
                <strong>{{ $discussion->title }}</strong>
            </div>

            <hr>

            {!! $discussion->content !!}

            @if( $discussion->bestReply)
                <div class="card mt-4">
                   <div class="card-header bg-success text-white">
                        <div class="d-flex justify-content-between">
                            <div>
                                <img class="rounded-circle img-thumbnail border-0" width="30" src="{{Gravatar::src($discussion->bestReply->owner->email)}}" alt="">
                                <strong>{{ $discussion->bestReply->owner->name }}</strong>
                            </div>
                            <div>
                                <strong>BEST REPLY</strong>
                            </div>
                        </div>
                   </div>
                    <div class="card-body text-success">
                        {!! $discussion->bestReply->content !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    @foreach($discussion->replies()->paginate(3) as $reply)

        <div class="card my-2">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <img class="rounded-circle img-thumbnail" width="30" src="{{ Gravatar::src($reply->owner->email) }}" alt="">
                        <span>{{ $reply->owner->name }}</span>
                    </div>
                    <div>
                        @if(auth()->user()->id === $discussion->user_id)
                            <form action="{{ route('discussions.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply->id ]) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-primary" type="submit">Mark as best reply</button>

                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! $reply->content !!}

            </div>
        </div>


    @endforeach
    {{ $discussion->replies()->paginate(3)->links() }}

    <div class="card my-2">
        <div class="card-header">
            Add a replay
        </div>
        <div class="card-body">
            @auth
            <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
                @csrf
                <input type="hidden" name="content" id="content">
                <trix-editor input="content"></trix-editor>
                <button type="submit" class="btn btn-success btn-sm my-1">Add reply</button>
            </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-info text-white">Sign in to add a reply</a>
            @endauth
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
@endsection
