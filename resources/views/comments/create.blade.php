@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Add New Comment | fundraiser_id:{{session('fundraiser_id')}}</div>
            		@if(count($errors) > 0)
        				<div class="alert alert-danger">
            				@foreach($errors as $error)
            					<p>{{$error}}</p>
            				@endforeach
        				</div>
					@endif                
                <div class="panel-body">
                    {!! Form::open(['route' => 'comments.store']) !!}
                    	<div class="form-group">
                    		{{Form::label('comment', 'Comment')}}
                    		{{Form::textarea('comment', '', ['class' => 'form-control', 'placeholder' => 'Leave a comment'])}}
                    	</div>
                    	<div class="form-group">
                    		{{Form::label('rating', 'Rating')}}
                    		{{Form::text('rating', '', ['class' => 'form-control', 'placeholder' => 'A number between 1 - 5'])}}
                    		{{Form::hidden('fundraiser', session('fundraiser_id'))}}
                    		{{Form::hidden('user', Auth::user()->id)}}
                    	</div>
                    	<div>
                    		{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    		<a href="{{ route('fundraisers.show', session('fundraiser_id')) }}" role="button" class="btn btn-default">Cancel</a>
                    	</div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection