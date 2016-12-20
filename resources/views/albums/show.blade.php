@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Album : {{ $album->name }}</h2>
                </div>
                <div class="panel-body">
                    <p>
                        <strong>Band Name:</strong> <a class="btn btn-link" href="{{ route('band.show', $album->band->id) }}">{{ $album->band->name }}</a>
                    </p>
                    <p>
                        <strong>Name:</strong> {{ $album->name }}
                    </p>
                    <p>
                        <strong>Recorded Date:</strong> {{ $album->recorded_date }}
                    </p>
                    <p>
                        <strong>Number of Tracks:</strong> {{ $album->number_of_tracks }}
                    </p>
                    <p>
                        <strong>Label:</strong> {{ $album->label }}
                    </p>
                    <p>
                        <strong>Producer:</strong> {{ $album->producer }}
                    </p>    
                    <p>
                        <strong>Genre:</strong> {{ $album->genre }}
                    </p>
                    <p>
                        <a class="btn btn-primary" href="{{ route('album.edit', $album->id) }}">Edit</a>
                        <a class="btn btn-warning" href="{{ route('album.index') }}">Cancel</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection