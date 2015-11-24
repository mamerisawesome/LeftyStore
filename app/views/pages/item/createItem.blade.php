@extends('layouts.default')

@section('pageTitle')
	<title>Post Item</title>

@stop

@section('content')
    <div class="container">
		
		{{ Form::open(array('url'=>'/item/create', 'files'=>true)) }}
			{{
				Form::macro('inputRow', function($inputType, $id, $placeholder, $rowSize){
					echo '<div class="col '.$rowSize.' input-field">';
					echo Form::input($inputType, $id, '' , array('id'=>$id,'placeholder'=>$placeholder));
					echo Form::label($id, $placeholder, array('for'=>$id));
					echo '</div>';
				})
			}}
			<h1>Post a new item</h1>
		
			{{ Form::inputRow('text', 'item_name', 'Item Name', 's12') }}
			{{ Form::inputRow('text', 'price', 'Price', 's12') }}
			<div class="row">
				<div class="input-field col s12">
					<select name="category" id="category">
						<option value="" disabled selected>Category</option>
						<option value="Food">Food</option>
						<option value="Clothes">Clothes</option>
						<option value="Gadget">Gadget</option>
					</select>
					<label>Categories</label>
				</div>
			</div>
		
			<div class="row">
				<div class="file-field input-field">
					<div class="btn">
						<span>File</span>
						{{ Form::file('avatarInput') }}
					</div>
					<div class="file-path-wrapper">
						{{ Form::text('avatar','',array('class'=>'file-path')) }}
					</div>
				</div>
			</div>

			<button type="submit" class="btn waves-effect waves-light green">Submit</button>
		
		{{ Form::close() }}
		
	</div>

	<script>
		$(document).ready(function() {
			$('select').material_select();
		});
	</script>
@stop