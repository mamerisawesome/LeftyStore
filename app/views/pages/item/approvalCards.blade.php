<?php
	if(Session::has('isLogged')){
		/* DO NOTHING */
	} else {
		echo Redirect::to('/user/login');
	}
?>

<div class="row" id="reg-form-body">
	@if(sizeof($items))
		@foreach($items as $item)
		<div class="col l4 m4 s6">
			<div class="card">
				<div class="card-image">
					<img src="/res/laptop.jpg">
					<span class="card-title"><a class="white-text" href="/item/{{ $item->item_name }}">{{ $item->item_name }}</a></span>
				</div>
				<div class="card-content">
					<h5><span style="font-weight:bold">Price: </span>PHP {{ $item->price }}</h5>
					<p><span style="font-weight:bold">Posted by: </span><a href="/user/{{ $item->posted_by }}">{{ $item->posted_by }}</a></p>
					<p><span style="font-weight:bold">Category: </span>{{ $item->category }}</p>
				</div>
				<div class="card-action">
					<form method="post" action="#">
						<button formmethod="post" 
								formaction="/admin/item/approve/{{ $item->item_name }}" 
								class="btn-floating waves-effect waves-light blue" type="submit">
							<i class="material-icons">thumb_up</i>
						</button>
						<button formmethod="post" 
								formaction="/admin/item/disapprove/{{ $item->item_name }}" 
								class="btn-floating waves-effect waves-light red" type="submit">
							<i class="material-icons">thumb_down</i>
						</button>
					</form>
				</div>
			</div>
		</div>
		@endforeach
	@else
	<div class="col l12 s12 m12">
		<div class="card">
			<div class="card-content">
				<span class="black-text card-title">Items search error</span>
				<p>Unfortunately, we can't help you with what you need right now. Try adding an item.</p>
			</div>
		</div>
	</div>
	@endif
</div>