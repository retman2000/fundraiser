@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @php
        	$drive = $data[0];
        	$comments = $data[1];
        @endphp
    		<h1>
    			{{$drive->title}} | (avg. Rating: {{$drive->rating}})
    		</h1>
    	</div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">COMMENTS</div>
            		@if(count($errors) > 0)
        				<div class="alert alert-danger">
            				@foreach($errors->all() as $error)
            					<p>{{$error}}</p>
            				@endforeach
        				</div>
					@endif                                
                	<div class="panel-body">
                		@if(count($comments) > 0)
                			@foreach($comments as $comment)
                				<ul class="list-group">
                					<li class="list-group-item"><strong>{{$comment->user->name}}:</strong> {{$comment->comment}}</li>
                					<li class="list-group-item"><strong>Rating:</strong> {{$comment->rating}}</li>
            					</ul>                				
                			@endforeach
                		@else
            				Be the first to leave a comment.                		
                		@endif
                	</div>
            </div>
        	<a href="{{$drive->id}}/comments" class="btn btn-primary" role="button">Add Comment</a>
        	<a href="{{ url('/') }}" role="button" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
@endsection