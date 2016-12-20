@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row-fluid">
        <h1>HOME PAGE</h1>
    </div>
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <td>@sortablelink('id','ID',\Request::except('order','sort'))</td>
                <td>@sortablelink('name','Name',\Request::except('order','sort'))</td>
                <td>@sortablelink('start_date','Start Date',\Request::except('order','sort'))</td>
                <td>@sortablelink('website','Website',\Request::except('order','sort'))</td>
                <td>@sortablelink('still_active','Active',\Request::except('order','sort'))</td>
                <td>@sortablelink('user.name','Owner Name',\Request::except('order','sort'))</td>
                <td>Albums</td>
            </tr>
        </thead>
        <tbody>
        @foreach($bands as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->start_date }}</td>
                <td>{{ $value->website }}</td>
                <td>
                    <span class="glyphicon glyphicon-{{ $value->still_active ? 'ok text-success' : 'remove text-danger' }}"></span>
                </td>
                <td>{{ $value->user->name}}</td>
                <td class="dropdown">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-music"></span> {{ $value->albums()->count() }}
                    </button>
                    <ul class="dropdown-menu pull-right well">
                        @forelse ($value->albums as $album)
                            <li class="text-nowrap">
                                <p>
                                <i>{{ $album->name }}</i> 
                                <strong>{{ $album->number_of_tracks }} Tracks</strong>
                                </p>
                            </li>
                        @empty
                            <li>No albums in this band.</li>
                        @endforelse
                    </ul>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    
    {{ $bands->appends(\Request::except('page'))->render() }}
    
</div>
@endsection
