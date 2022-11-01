<ul class="menu-inner py-1">
	<!-- Dashboard -->
	<li class="menu-item {{ 'peserta-bpc' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('peserta-bpc') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-home-circle"></i>
			<div data-i18n="Dashboard">Dashboard</div>
		</a>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Main</span>
	</li>
	<li class="menu-item {{ 'peserta-bpc/tim' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('peserta-bpc/tim') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="Tim">Tim</div>
		</a>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Pengaturan</span>
	</li>
	<li class="menu-item {{ 'peserta-bpc/ganti-password' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('peserta-bpc/ganti-password') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-dock-top"></i>
			<div data-i18n="Account">Ganti Password</div>
		</a>
	</li>
</ul>