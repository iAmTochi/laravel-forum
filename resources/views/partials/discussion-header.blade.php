<div class="card-header">
    <div class="d-flex justify-content-between">
        <div>
            <img class="img-thumbnail rounded-circle" width="40" src="{{ Gravatar::src($discussion->author->email) }}" alt="">
            <small class="ml-2 font-weight-bold">{{ $discussion->author->name }}</small>

        </div>
        <div>
            <a href="{{ route('discussions.show', $discussion->slug) }}" class="btn btn-success btn-sm">View</a>
        </div>
    </div>
</div>
