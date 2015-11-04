@extends('layouts.default')

@section('pageTitle')
	<title>Post Item</title>

@stop

@section('content')
    <div class="container">
		
		{{ Form::open(array('route' => 'item.create')) }}
			
			<h1>Post a new item</h1>
		
			<div class="input-field">
<!--				<input placeholder="Item Name" type="text" name="item_name" id="item_name">-->
				{{ Form::text('item_name', array('id'=>'item_name','placeholder'=>'Item Name')) }}
<!--				<label for="item_name">Item Name</label>-->
				{{ Form::label('item_name', 'Item Name', array('for'=>'item_name')) }}
			</div>

			<div class="input-field">
				<input placeholder="Item Price" type="text" name="price" id="price">
				<label for="price">Price</label>
			</div>

			<div class="input-field col s12">
				<select name="category" id="category">
					<option value="" disabled selected>Category</option>
					<option value="Food">Food</option>
					<option value="Clothes">Clothes</option>
					<option value="Gadget">Gadget</option>
				</select>
				<label>Categories</label>
			</div>

			<button type="submit" class="btn waves-effect waves-light green">Submit</button>
		
		{{ Form::close() }}
		
	</div>
@stop