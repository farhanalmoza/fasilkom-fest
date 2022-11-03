<ul class="menu-inner py-1">
	<!-- Dashboard -->
	<li class="menu-item {{ 'panitia-sport' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-sport') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-home-circle"></i>
			<div data-i18n="Dashboard">Dashboard</div>
		</a>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Main</span>
	</li>
	<li class="menu-item {{ 'panitia-sport/pes' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-sport/pes') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="PES">PES</div>
		</a>
	</li>
	<li class="menu-item {{ 'panitia-sport/ml' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-sport/ml') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="Mobile Legend">Mobile Legend</div>
		</a>
	</li>
	<li class="menu-item {{ 'panitia-sport/pubg' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-sport/pubg') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="PUBG-Mobile">PUBG Mobile</div>
		</a>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Pengaturan</span>
	</li>
	<li class="menu-item {{ 'panitia-sport/ganti-password' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-sport/ganti-password') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-dock-top"></i>
			<div data-i18n="Account">Ganti Password</div>
		</a>
	</li>
</ul>