@extends('layouts.default')

@section('pageTitle')
	<title>Login</title>

@stop

@section('content')
    <div class="container">
		
		<h1>Login</h1>
		
		{{ Form::open(array('url'=>'/user/login', 'files'=> false)) }}
			{{
				Form::macro('inputRow', function($inputType, $id, $placeholder, $rowSize){
					echo '<div class="col '.$rowSize.' input-field">';
					echo Form::input($inputType, $id, '' , array('id'=>$id));
					echo Form::label($id, $placeholder, array('for'=>$id));
					echo '</div>';
				})
			}}
		
			<div class="row">
				{{ Form::inputRow('text', 'username','Username','s12') }}
			</div>

			<div class="row">
				{{ Form::inputRow('password', 'password','Password','s12') }}
			</div>

			<div class="row">
				<button type="submit" class="btn waves-effect waves-light green">Submit</button>
			</div>
		{{ Form::close() }}
		
	</div>
@stop