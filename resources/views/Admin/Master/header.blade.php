 <!-- Cai nay la Icon -->
 			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><span>Vietpro</span>Shop</a>
			<ul class="user-menu">
            @if (isset(Auth::User()->email))

				<li class="dropdown pull-right">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{Auth::User()->full}} <span class="caret"></span></a>
					<ul id="" class="dropdown-menu" role="menu">
						<li><a href="{{ route('User.Profile', [Auth::User()->id])}}"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hồ sơ</a></li>
						<li><a href="{{ route('Admin.Logout') }}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
					</ul>
				</li>
			{{--  @else
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong><i class="fas fa-user" ></i>&nbsp;&nbsp; {{ $user->full }}</strong>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu alert alert-info" role="menu">
                            <li><a href="{{ route('Admin.Logout') }}"><font size="3px"><i class="fas fa-user-plus" ></i> &nbsp;&nbsp;Đăng xuất </font></a></li>
                        </ul>
                    </li>  --}}
			@endif
			</ul>
            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
