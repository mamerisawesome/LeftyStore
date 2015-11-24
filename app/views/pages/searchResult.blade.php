@extends('layouts.default')

@section('pageTitle')
	<title>Search Result</title>

@stop

@section('content')
    <div class="container">
		<div class="col-md-12" id="reg-form-title">
			<h2>User search result</h2>
        </div>

        @include('pages.user.userCards')
		
        <div class="col-md-12" id="reg-form-title">
			<h2>Item search result</h2>
        </div>

        @include('pages.item.itemCards')
		
    </div>
@stop