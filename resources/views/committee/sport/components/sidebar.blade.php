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
	<li class="menu-item {{ 'panitia-sport/futsal' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-sport/futsal') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="Futsal">Futsal</div>
		</a>
	</li>
	<li class="menu-item {{ 'panitia-sport/basket-putra' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-sport/basket-putra') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="Basket-Putra">Basket Putra</div>
		</a>
	</li>
	<li class="menu-item {{ 'panitia-sport/basket-putri' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-sport/basket-putri') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="Basket-Putri">Basket Putri</div>
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