@if(Session::get('isLogged') == true)
	<li><a href="/user/{{Session::get('username')}}">{{Session::get('username')}}</a></li>
	<li><a href="/item">View Items</a></li>
	<li><a href="/user/logout">Logout</a></li>
@else
	<li><a href="/user/login">Login</a></li>
	<li><a href="/user/signup">Signup</a></li>
@endif