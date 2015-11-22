@extends('layouts.default')

@section('pageTitle')
	<title>Sign up</title>

@stop

@section('content')
    <div class="container">
		
		<h1>Create a new account</h1>
		
		{{ Form::open(array('url'=>'/user/signup', 'files'=> true)) }}
			{{
				Form::macro('inputRow', function($inputType, $id, $placeholder, $rowSize){
					echo '<div class="col '.$rowSize.' input-field">';
					echo Form::input($inputType, $id, '' , array('id'=>$id));
					echo Form::label($id, $placeholder, array('for'=>$id));
					echo '</div>';
				})
			}}
		
			<div class="row">
				{{ Form::inputRow('text', 'first_name','First Name','s4') }}
				{{ Form::inputRow('text', 'middle_name','Middle Name','s4') }}
				{{ Form::inputRow('text', 'last_name','Last Name','s4') }}
			</div>

			<div class="row">
				{{ Form::inputRow('text', 'bank_acct_no','Bank Account No','s12') }}
			</div>

			<div class="row">
				{{ Form::inputRow('text', 'username','Username','s12') }}
			</div>

			<div class="row">
				{{ Form::inputRow('password', 'password','Password','s6') }}
				{{ Form::inputRow('password', 'retype_password','Retype Password','s6') }}
			</div>

			<div class="row">
				{{ Form::inputRow('text', 'address','Address','s12') }}
			</div>
			
			<div class="row">
				<div class="file-field input-field">
					<div class="btn">
						<span>File</span>
						{{ Form::file('avatar') }}
					</div>
					<div class="file-path-wrapper">
						{{ Form::text('avatarPath','',array('class'=>'file-path')) }}
					</div>
				</div>
			</div>
			
			<div class="row">
				<button type="submit" class="btn waves-effect waves-light green">Submit</button>
			</div>
		{{ Form::close() }}
		
	</div>
@stop