@extends('layouts.default')

@section('pageTitle')
	<title>List of items</title>

@stop

@section('content')
    <div class="container">
        <div class="col-md-12" id="reg-form-title">
			<h2>List of items</h2>
        </div>
		
        @include('pages.item.itemCards')
		
    </div>
@stop