<ul class="menu-inner py-1">
	<!-- Dashboard -->
	<li class="menu-item {{ 'panitia-uiux' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-uiux') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-home-circle"></i>
			<div data-i18n="Dashboard">Dashboard</div>
		</a>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Main</span>
	</li>
	<li class="menu-item {{ 'panitia-uiux/pendaftar' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-uiux/pendaftar') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="Pendaftar">Pendaftar</div>
		</a>
	</li>
	<li class="menu-item {{ 'panitia-uiux/tahap-2' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-uiux/tahap-2') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="Tahap-2">Tahap 2</div>
		</a>
	</li>
	<li class="menu-item {{ 'panitia-uiux/final' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-uiux/final') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="Final">Final</div>
		</a>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Pengaturan</span>
	</li>
	<li class="menu-item {{ 'panitia-uiux/ganti-password' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-uiux/ganti-password') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-dock-top"></i>
			<div data-i18n="Account">Ganti Password</div>
		</a>
	</li>
</ul>