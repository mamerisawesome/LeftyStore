<div class="row" id="reg-form-body">
	@foreach($items as $item)
	<div class="col l12 m12 s12">
		<div class="card">
			<div class="card-image">
				<img src="{{ $item->avatar }}">
				<span class="card-title"><a class="white-text" href="/item/{{ $item->item_name }}">{{ $item->item_name }}</a></span>
			</div>
			<div class="card-content">
				<h5><span style="font-weight:bold">Price: </span>PHP {{ $item->price }}</h5>
				<p><span style="font-weight:bold">Category: </span>{{ $item->category }}</p>
			</div>
			<div class="card-action">
				<form method="post" action="#">
					@if(!myProfile($item->posted_by))
					<button formmethod="post" 
							formaction="/item/buy/{{ $item->item_name }}" 
							class="btn-floating waves-effect waves-light blue" type="submit">
						<i class="material-icons">shopping_cart</i>
					</button>
					@endif
					
					@if(myProfile($item->posted_by))
					<button formmethod="post" 
							formaction="/item/delete/{{ $item->item_name }}" 
							class="btn-floating waves-effect waves-light red" type="submit">
						<i class="material-icons">delete</i>
					</button>
					<button formmethod="get" 
							formaction="/item/edit/{{ $item->item_name }}" 
							class="btn-floating waves-effect waves-light orange" type="submit">
						<i class="material-icons">settings</i>
					</button>
					@endif
				</form>
			</div>
		</div>
	</div>
	@endforeach
</div>