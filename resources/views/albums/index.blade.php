@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row-fluid">
		<h1>
			Albums
			<a href="{{ route('album.create') }}">
	          <span class="btn btn-lg glyphicon glyphicon-plus-sign"></span>
	        </a>
		</h1>
	</div>
	<!-- will be used to show any messages -->
	@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	<div class="form-group">
	    {!! Form::Label('item', 'Filter by bands:') !!}
	    {!! Form::select('band_id', $bands, \Request::get('band_id'), ['class' => 'form-control','placeholder' => 'Select band...', 'onchange' => 'window.location.href=updateURLParameter(window.location.href, "band_id", this.value);']) !!}
	</div>

	<table class="table table-striped table-responsive">
		<thead>
			<tr>
				<td>@sortablelink('id','ID',\Request::except('order','sort'))</td>
				<td>@sortablelink('name','Name',\Request::except('order','sort'))</td>
				<td>@sortablelink('recorded_date','Recorded Date',\Request::except('order','sort'))</td>
				<td>@sortablelink('number_of_tracks','# Tracks',\Request::except('order','sort'))</td>
				<td>@sortablelink('label','Label',\Request::except('order','sort'))</td>
				<td>@sortablelink('producer','Producer',\Request::except('order','sort'))</td>
				<td>@sortablelink('genre','Genre',\Request::except('order','sort'))</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
		@foreach($albums as $key => $value)
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->name }}</td>
				<td>{{ $value->recorded_date }}</td>
				<td>{{ $value->number_of_tracks }}</td>
				<td>{{ $value->label }}</td>
				<td>{{ $value->producer }}</td>
				<td>{{ $value->genre }}</td>

				<td>
					{{ Form::open(array('url' => route('album.destroy',$value->id), 'class' => 'form-inline')) }}
						<a href="{{ route('album.show',$value->id) }}">
	          				<span class="btn btn-xs btn-success glyphicon glyphicon-eye-open"></span>
	        			</a>
						<a href="{{ route('album.edit', $value->id) }}">
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
	
	{{ $albums->appends(\Request::except('page'))->render() }}
	
</div>

@endsection