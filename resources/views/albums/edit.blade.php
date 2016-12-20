@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
					@if(isset($album))
						<h2>Edit Album: <i class="text-primary">{{ $album->name }}</i></h2>
					@else
						<h2>Add new Album</h2>
					@endif
                </div>
                <div class="panel-body">

					@if(isset($album))
				    	{{ Form::model($album, ['route' => ['album.update', $album->id], 'method' => 'PUT','class' => 'form-horizontal']) }}
					@else
				    	{{ Form::open(['route' => 'album.store', 'class' => 'form-horizontal']) }}
					@endif  

					<div class="form-group{{ $errors->has('band_id') ? ' has-error' : '' }}">
				        
				        <label for="band_id" class="col-md-4 control-label">Band</label>

				        <div class="col-md-6">
				        	{!! Form::select('band_id', $bands, null, ['class' => 'form-control', 'required', 'autofocus']) !!}

				            @if ($errors->has('band_id'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('band_id') }}</strong>
				                </span>
				            @endif
				        </div>
				    </div>	

					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
				        
				        <label for="name" class="col-md-4 control-label">Name</label>

				        <div class="col-md-6">
				        	{{ Form::text('name', null, array('class' => 'form-control', 'required', 'autofocus')) }}

				            @if ($errors->has('name'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('name') }}</strong>
				                </span>
				            @endif
				        </div>
				    </div>

					<div class="form-group{{ $errors->has('recorded_date') ? ' has-error' : '' }}">
				        
				        <label for="recorded_date" class="col-md-4 control-label">Recorded Date</label>

				        <div class="col-md-6">
				        	{{ Form::date('recorded_date', null, array('class' => 'form-control', 'required')) }}

				            @if ($errors->has('recorded_date'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('recorded_date') }}</strong>
				                </span>
				            @endif
				        </div>
				    </div>	

				    <div class="form-group{{ $errors->has('number_of_tracks') ? ' has-error' : '' }}">
				        
				        <label for="number_of_tracks" class="col-md-4 control-label">Number of Tracks</label>

				        <div class="col-md-6">
				        	{{ Form::number('number_of_tracks', null, array('class' => 'form-control', 'required')) }}

				            @if ($errors->has('number_of_tracks'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('number_of_tracks') }}</strong>
				                </span>
				            @endif
				        </div>
				    </div>

					<div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
				        
				        <label for="label" class="col-md-4 control-label">Label</label>

				        <div class="col-md-6">
				        	{{ Form::text('label', null, array('class' => 'form-control', 'required')) }}

				            @if ($errors->has('label'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('label') }}</strong>
				                </span>
				            @endif
				        </div>
				    </div>				    

					<div class="form-group{{ $errors->has('producer') ? ' has-error' : '' }}">
				        
				        <label for="producer" class="col-md-4 control-label">Producer</label>

				        <div class="col-md-6">
				        	{{ Form::text('producer', null, array('class' => 'form-control', 'required')) }}

				            @if ($errors->has('producer'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('producer') }}</strong>
				                </span>
				            @endif
				        </div>
				    </div>			

					<div class="form-group{{ $errors->has('genre') ? ' has-error' : '' }}">
				        
				        <label for="genre" class="col-md-4 control-label">Genre</label>

				        <div class="col-md-6">
				        	{{ Form::text('genre', null, array('class' => 'form-control', 'required')) }}

				            @if ($errors->has('genre'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('genre') }}</strong>
				                </span>
				            @endif
				        </div>
				    </div>

					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							{{ Form::submit('Save album!', array('class' => 'btn btn-primary')) }}
							<a class="btn btn-warning" href="{{ route('album.index') }}">Cancel</a>
						</div>
                    </div>		

					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection