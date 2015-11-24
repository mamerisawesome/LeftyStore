@if(Session::has('isLogged'))
	<li><a href="/user/{{Session::get('username')}}">{{Session::get('username')}}</a></li>
	<li><a href="/item">View Items</a></li>
	<li><a href="/item/views/max">Most Viewed</a></li>
	<li><a href="/user/logout">Logout</a></li>
@else
	<li><a href="/user/login">Login</a></li>
	<li><a href="/user/signup">Signup</a></li>
@endif
@if(Session::has('isAdmin'))
	<li><a href="/admin/approve">Approve users</a></li>
	<li><a href="/admin/item/approve">Approve items</a></li>
@endif