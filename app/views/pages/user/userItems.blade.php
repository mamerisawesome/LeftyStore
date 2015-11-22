<div class="row" id="reg-form-body">
	@if(sizeof($items))
		@foreach($items as $item)
		<div class="col l12 m12 s12">
			<div class="card">
				<div class="card-image">
					<img src="{{ $item->avatar }}">
					<span class="card-title"><a class="white-text" href="/item/{{ $item->item_name }}">{{ $item->item_name }}</a></span>
				</div>
				<div class="card-content">
					<h5><span style="font-weight:bold">Price: </span>PHP {{ $item->price }}</h5>
					<p><span style="font-weight:bold">Posted by: </span><a href="/item/{{ $item->posted_by }}">{{ $item->posted_by }}</a></p>
					<p><span style="font-weight:bold">Category: </span>{{ $item->category }}</p>
				</div>
				<div class="card-action">
					<form method="post" action="#">
						<button formmethod="post" 
								formaction="/item/buy/{{ $item->item_name }}" 
								class="btn-floating waves-effect waves-light blue" type="submit">
							<i class="material-icons">shopping_cart</i>
						</button>
						<button formmethod="post" 
								formaction="/item/delete/{{ $item->item_name }}" 
								class="btn-floating waves-effect waves-light red" type="submit">
							<i class="material-icons">delete</i>
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
			<div class="card-action">
				<form method="post" action="#">
					<button formmethod="get" 
							formaction="/" 
							class="btn waves-effect waves-light green" type="submit">
						Home
					</button>
					<button formmethod="get" 
							formaction="/createItem" 
							class="btn waves-effect waves-light blue" type="submit">
						Add an item
					</button>
				</form>
			</div>
		</div>
	</div>
	@endif
</div>