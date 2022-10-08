<ul class="menu-inner py-1">
	<!-- Dashboard -->
	<li class="menu-item {{ 'peserta-uiux' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('peserta-uiux') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-home-circle"></i>
			<div data-i18n="Dashboard">Dashboard</div>
		</a>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Main</span>
	</li>
	<li class="menu-item {{ 'peserta-uiux/tim' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('peserta-uiux/tim') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="Tim">Tim</div>
		</a>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Pages</span>
	</li>
	<li class="menu-item {{ 'peserta-uiux/pengaturan-akun' == request()->path()
							|| 'peserta-uiux/ganti-password' == request()->path() ? 'open' : '' }}">
		<a href="javascript:void(0);" class="menu-link menu-toggle">
			<i class="menu-icon tf-icons bx bx-dock-top"></i>
			<div data-i18n="Account Settings">Pengaturan Akun</div>
		</a>
		<ul class="menu-sub">
			<li class="menu-item {{ 'peserta-uiux/ganti-password' == request()->path() ? 'active' : '' }}">
				<a href="{{ url('peserta-uiux/ganti-password') }}" class="menu-link">
					<div data-i18n="Account">Ganti Password</div>
				</a>
			</li>
		</ul>
	</li>
</ul>