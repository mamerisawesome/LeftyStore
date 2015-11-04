@extends('layouts.default')

@section('pageTitle')
	<title>List of users</title>

@stop

@section('content')
    <div class="container">
        <div class="col-md-12" id="reg-form-title">
        <h2>List of accounts</h2>
        </div>

        <div class="col-md-12" id="reg-form-body">
        <table class = "centered bordered">
			<thead>
					<tr>
						<th data-field="id">Username</th>
						<th data-field="name">Address</th>
					</tr>
        		</thead>
        @foreach($users as $user)
			<tr>
				<td>{{ $user->username }}</td>
				<td>{{ $user->address }}</td>
			</tr>
		@endforeach
        </table>
        </div>
    </div>
@stop