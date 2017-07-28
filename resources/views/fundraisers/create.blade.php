@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Add New Fundraiser</div>
            		@if(count($errors) > 0)
        				<div class="alert alert-danger">
            				@foreach($errors->all() as $error)
            					<p>{{$error}}</p>
            				@endforeach
        				</div>
					@endif                
                <div class="panel-body">
                    {!! Form::open(['url' => 'fundraisers/store']) !!}
                    	<div class="form-group">
                    		{{Form::label('title', 'Title')}}
                    		{{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Name of Fundraiser'])}}
                    	</div>
                    	<!-- <div class="form-group">
                    		{{Form::label('description', 'Description')}}
                    		{{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Describe what the fundraiser is about'])}}
                    	</div> -->
                    	<div class="form-group">
                    		{{Form::label('comment', 'Comment')}}
                    		{{Form::textarea('comment', '', ['class' => 'form-control', 'placeholder' => 'Leave a comment'])}}
                    	</div>
                    	<div class="form-group">
                    		{{Form::label('rating', 'Rating')}}
                    		{{Form::text('rating', '', ['class' => 'form-control', 'placeholder' => 'A number between 1 - 5'])}}
                    	</div>
                    	<div>
                    		{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    		<a href="{{ url('/') }}" role="button" class="btn btn-default">Cancel</a>
                    	</div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection