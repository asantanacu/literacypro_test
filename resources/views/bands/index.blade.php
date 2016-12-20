@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row-fluid">
        <h1>
            Bands
            <a href="{{ route('band.create') }}">
              <span class="btn btn-lg glyphicon glyphicon-plus-sign"></span>
            </a>
        </h1>
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
                <td>Actions</td>
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
                <td>
                    {{ Form::open(array('url' => route('band.destroy',$value->id), 'class' => 'form-inline')) }}
                        <a href="{{ route('band.show',$value->id) }}">
                              <span class="btn btn-xs btn-success glyphicon glyphicon-eye-open"></span>
                        </a>
                        <a href="{{ route('band.edit', $value->id) }}">
                              <span class="btn btn-xs btn-info glyphicon glyphicon-pencil"></span>
                        </a>                    
                        {{ Form::hidden('_method', 'DELETE') }}
                        <button class="btn btn-warning btn-xs glyphicon glyphicon-trash" type="submit" ></button>
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
    {{ $bands->appends(\Request::except('page'))->render() }}
    
</div>

@endsection