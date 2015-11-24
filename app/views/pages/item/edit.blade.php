@extends('layouts.default')

@section('pageTitle')
	<title>Edit {{ $item->item_name }}</title>

@stop

@section('content')
	<?php
		if(Session::has('isLogged')){
			if(Session::get('username') == $item->posted_by){
				// do nothing
			} else {
				echo Redirect::to('/user/login');
			}
		} else {
			echo Redirect::to('/user/login');
		}
	?>
    <div class="container">
		
		{{ Form::open(array('url'=>'/item/update/'.$item->item_name, 'files'=>true)) }}
			{{
				Form::macro('inputRow', function($inputType, $id, $placeholder, $rowSize, $val){
					echo '<div class="col '.$rowSize.' input-field">';
					echo Form::input($inputType, $id, $val , array('id'=>$id,'placeholder'=>$placeholder));
					echo Form::label($id, $placeholder, array('for'=>$id));
					echo '</div>';
				})
			}}
			<h1>Post a new item</h1>
		
			{{ Form::inputRow('text', 'item_name', 'Item Name', 's12', $item->item_name) }}
			{{ Form::inputRow('text', 'price', 'Price', 's12', $item->price) }}
			<div class="input-field col s12">
				<select name="category" id="category" value="{{$item->category}}">
					<option value="" disabled selected>Category</option>
					<option value="Food">Food</option>
					<option value="Clothes">Clothes</option>
					<option value="Gadget">Gadget</option>
				</select>
				<label>Categories</label>
			</div>
		
			<div class="row">
				<div class="file-field input-field">
					<div class="btn">
						<span>File</span>
						{{ Form::file('avatar', array('value'=>$item->avatar)) }}
					</div>
					<div class="file-path-wrapper">
						{{ Form::text('avatarPath',$item->avatar,array('class'=>'file-path')) }}
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