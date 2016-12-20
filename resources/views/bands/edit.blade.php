@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(isset($band))
                        <h2>Edit Band: <i class="text-primary">{{ $band->name }}</i></h2>
                    @else
                        <h2>Add new Band</h2>
                    @endif
                </div>
                <div class="panel-body">

                    @if(isset($band))
                        {{ Form::model($band, ['route' => ['band.update', $band->id], 'method' => 'PUT','class' => 'form-horizontal']) }}
                    @else
                        {{ Form::open(['route' => 'band.store', 'class' => 'form-horizontal']) }}
                    @endif                

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

                    <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                        
                        <label for="start_date" class="col-md-4 control-label">Start Date</label>

                        <div class="col-md-6">
                            {{ Form::date('start_date', null, array('class' => 'form-control', 'required')) }}

                            @if ($errors->has('start_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('start_date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                        
                        <label for="website" class="col-md-4 control-label">Website</label>

                        <div class="col-md-6">
                            {{ Form::text('website', null, array('class' => 'form-control', 'required')) }}

                            @if ($errors->has('website'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('website') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>    

                    <div class="form-group{{ $errors->has('still_active') ? ' has-error' : '' }}">
                        
                        <label for="still_active" class="col-md-4 control-label">Still Active</label>

                        <div class="col-md-6">
                            {{Form::hidden('still_active',0)}}
                            {{ Form::checkbox('still_active', 1, null) }}

                            @if ($errors->has('still_active'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('still_active') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                                {{ Form::submit('Save band!', array('class' => 'btn btn-primary')) }}
                                <a class="btn btn-warning" href="{{ route('band.index') }}">Cancel</a>
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection