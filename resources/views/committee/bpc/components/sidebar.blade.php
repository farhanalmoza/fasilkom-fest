<ul class="menu-inner py-1">
	<!-- Dashboard -->
	<li class="menu-item {{ 'panitia-bpc' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-bpc') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-home-circle"></i>
			<div data-i18n="Dashboard">Dashboard</div>
		</a>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Main</span>
	</li>
	<li class="menu-item {{ 'panitia-bpc/pendaftar' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-bpc/pendaftar') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="Pendaftar">Pendaftar</div>
		</a>
	</li>
	<li class="menu-item {{ 'panitia-bpc/tahap-2' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-bpc/tahap-2') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="Tahap-2">Tahap 2</div>
		</a>
	</li>
	<li class="menu-item {{ 'panitia-bpc/final' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-bpc/final') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="Final">Final</div>
		</a>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Pengaturan</span>
	</li>
	<li class="menu-item {{ 'panitia-bpc/ganti-password' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-bpc/ganti-password') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-dock-top"></i>
			<div data-i18n="Account">Ganti Password</div>
		</a>
	</li>
</ul>