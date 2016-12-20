@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Band : {{ $band->name }}</h2>
                </div>
                <div class="panel-body">
                    <p>
                        <strong>Name:</strong> {{ $band->name }}
                    </p>
                    <p>
                        <strong>Start Date:</strong> {{ $band->start_date }}
                    </p>
                    <p>
                        <strong>Website:</strong> {{ $band->website }}
                    </p>    
                    <p>
                        <strong>Still Active:</strong> <span class="glyphicon glyphicon-{{ $band->still_active ? 'ok text-success' : 'remove text-danger' }}"></span>
                    </p>
                    <p>
                        <button class="btn btn-link" data-toggle="collapse" data-target="#albums">Albums</button>

                        <ul id="albums" class="collapse list-unstyled text-danger">
                            @forelse ($band->albums as $album)
                                <li>
                                    <i class="glyphicon glyphicon-music"></i> 
                                    <a class="btn btn-link" href="{{ route('album.show', $album->id) }}">{{ $album->name }}</a> 
                                    <strong>{{ $album->number_of_tracks }} Tracks</strong>
                                </li>
                            @empty
                                <li>No albums in this band.</li>
                            @endforelse
                        </ul>
                    </p>
                    <p>                        
                            <a class="btn btn-primary" href="{{ route('band.edit', $band->id) }}">Edit</a>
                            <a class="btn btn-warning" href="{{ route('band.index') }}">Cancel</a>
                    </p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection