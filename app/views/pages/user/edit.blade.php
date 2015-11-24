@extends('layouts.default')

@section('pageTitle')
	<title>Edit {{ $user->username }}'s profile</title>

@stop

@section('content')
	<?php 
		if(Session::has('isAdmin') || Session::get('username') == $user->username){
			/*DO NOTHING*/
		} else {
			echo Redirect::to('/');
		}
	?>

    <div class="container">
		
		<h1>Edit {{ $user->username }}'s profile</h1>
		
		{{ Form::open(array('url'=>'/user/update/'.$user->username, 'files'=> true)) }}
			{{
				Form::macro('inputRow', function($inputType, $id, $placeholder, $rowSize, $val){
					echo '<div class="col '.$rowSize.' input-field">';
					echo Form::input($inputType, $id, $val , array('id'=>$id, 'placeholder'=>$placeholder));
					echo Form::label($id, $placeholder, array('for'=>$id));
					echo '</div>';
				})
			}}
		
			<div class="row">
				{{ Form::inputRow('text', 'first_name','First Name','s4',$user->first_name) }}
				{{ Form::inputRow('text', 'middle_name','Middle Name','s4',$user->middle_name) }}
				{{ Form::inputRow('text', 'last_name','Last Name','s4',$user->last_name) }}
			</div>

			<div class="row">
				{{ Form::inputRow('text', 'bank_acct_no','Bank Account No','s12',$user->bank_acct_no) }}
			</div>
		
			<div class="row">
				<div class="col s6 input-field">
					{{ Form::input('date','birthday', $profile->birthday , array('class'=>'datepicker','id'=>'birthday')) }}
					{{ Form::label('birthday', 'Birthday', array('for'=>'birthday')) }}
				</div>
				{{ Form::inputRow('number', 'age','Age','s6',$profile->age) }}
			</div>
		
			<div class="row">
			</div>
			<div class="row">
				{{ Form::hidden('interestNo',sizeof($interests),array('id'=>'interestNo')) }}
				@for($i = 1; $i <= sizeof($interests); $i += 1)
				<div class="col s11 input-field">
					{{ Form::input('text','interest'.$i, $interests[$i-1]->interest , array('class'=>'interest','id'=>'interest'.$i)) }}
					{{ Form::label('interest', 'Interest '.$i, array('class' => '', 'for' => 'interest'.$i)) }}
				</div>
				@endfor
				<div class="col s1">
					<a id="incrementInterest" class="btn-floating addInterest"><i class="material-icons">add</i></a>
				</div>
			</div>

			<div class="row">
				{{ Form::inputRow('text', 'username','Username','s12',$user->username) }}
			</div>

			<div class="row">
				{{ Form::inputRow('password', 'password','Password','s6', '') }}
				{{ Form::inputRow('password', 'retype_password','Retype Password','s6', '') }}
			</div>

			<div class="row">
				{{ Form::inputRow('text', 'address','Address','s12',$user->address) }}
			</div>
			
			<div class="row">
				<div class="file-field input-field">
					<div class="btn-flat btn waves-ripple waves-effect waves-teal">
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

	<script>
		$('#incrementInterest').on('click',function(){
			var incre = ($('.interest').length + 1);
			var html = '' +
				'<div class="col s11 input-field">' +
					'<label for="interest'+incre+'" class="active">Interest '+incre+'</label>' +
					'<input class="interest" id="interest' + incre +'" name="interest'+incre+'" type="text" autocomplete="off">' +
				'</div>';
			$('#interestNo').val(incre);
			$(this).closest('.row').find('.col').last().after(html);
		});

		$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 100 // Creates a dropdown of 15 years to control year
		});
	</script>
@stop