@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">TOP FUNDRAISING CHARITIES</div>
                		@if(session('success'))
                			<div class="alert alert-success">
                				{{session('success')}}
                			</div>
						@endif                

                <div class="panel-body">
                    <p class="lead">Please Register for a Login if you wish to leave a review.</p>
                </div>
                <div class="container">
    				<div class="row">
        				<div class="col-md-8 col-md-offset-1">
						<table class="table">
							<thead>
								<tr>
									<th>Charity</th>
									<th>Rating</th>
								</tr>
							</thead>
							@if(count($drives) > 0)
    							@foreach($drives as $drive)
    								<tr>
    									<td><a href="/fundraisers/{{$drive->id}}">{{$drive->title}}</a></td>
    									<td>{{$drive->rating}}</td>
    								</tr>
    							@endforeach
							@else
								<tr><td>No Records Found</td></tr>
							@endif
						</table>
						</div>
					</div>
				</div>
						</br>
				<div class="panel-footer">
					<p class="lead">Don't see the charity you would like to review? Add it!</p>
					<a href="/fundraisers" class="btn btn-info" role="button">Add New Fundraiser</a>
				</div>				
            </div>
        </div>
    </div>
</div>
@endsection
