<?php
	if(Session::has('isLogged')){
		/* DO NOTHING */
	} else {
		echo Redirect::to('/user/login');
	}
?>

<div class="row" id="reg-form-body">
	@if(sizeof($users))
		@foreach($users as $user)
		<div class="col l4 m4 s6">
			<div class="card">
				<div class="card-image">
					<img src="{{ "/res/laptop.jpg"//$user->avatar }}">
					<span class="card-title"><a class="white-text" href="/user/{{ $user->username }}">{{ $user->first_name . " " . $user->last_name }}</a></span>
				</div>
				<div class="card-content">
					<p>
						<span style="font-weight:bold">
							Username: </span>
						{{ $user->username }}
					</p>
					<p>
						<span style="font-weight:bold">
							Name: </span>
						{{ $user->first_name . " " . $user->last_name }}
					</p>
					<p>
						<span style="font-weight:bold">
							Address: </span>
						{{ $user->address }}
					</p>
					<p>
						<span style="font-weight:bold">
							Bank account no: </span>
						{{ $user->bank_acct_no }}
					</p>
				</div>
				<div class="card-action">
					<form method="post" action="#">
						<button formmethod="post" 
								formaction="/admin/approve/{{ $user->username }}" 
								class="btn-floating waves-effect waves-light blue" type="submit">
							<i class="material-icons">thumb_up</i>
						</button>
						<button formmethod="post" 
								formaction="/admin/disapprove/{{ $user->username }}" 
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
				<span class="black-text card-title">Users search error</span>
				<p>The user does not exists!</p>
			</div>
		</div>
	</div>
	@endif
</div>