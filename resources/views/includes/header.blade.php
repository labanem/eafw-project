<header>
	<nav>
		<div class="header container">
			<div class="firstHeader">
				<br>
				<ul>
					<li><a href="{{ route('home') }}">Home</a></li>
					<li><a href="{{ route('about') }}">About</a></li>
					<li><a href="{{ route('help') }}">Help</a></li>
				</ul>
			</div>
			<div class="thirdHeader">
				<ul>
				@if(Auth::guest())
					<li><a href="{{ url('/login') }}">Login</a></li>
					<li><a href="{{ url('/register') }}">Register</a></li>
				@else
					<li><a href="#">{{ Auth::user()->name }}</a></li>
					<li><a href="#">Logout</a></li>
				@endif
				</ul>
			</div>
			<div id="secondHeader">
				<ul>
					<li><a href="{{ route('extensions') }}">Extension Nos.</a></li>
					<li><a href="{{ route('compmails') }}">Company Emails</a></li>
					<li><a href="{{ route('satoffs') }}">Saturday Off</a></li>
				</ul>
			</div>
			
		</div>
	</nav>
</header>