<ul class="menu-inner py-1">
	<!-- Dashboard -->
	<li class="menu-item {{ 'admin' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('admin') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-home-circle"></i>
			<div data-i18n="Dashboard">Dashboard</div>
		</a>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Main</span>
	</li>
	<li class="menu-item {{ request()->path() == 'admin/divisi'
							|| request()->path() == 'admin/daftar-panitia' ? 'open' : '' }}">
		<a href="javascript:void(0);" class="menu-link menu-toggle">
			<i class="menu-icon tf-icons bx bxs-user-account"></i>
			<div data-i18n="Jadwal">Panitia</div>
		</a>
		<ul class="menu-sub">
			<li class="menu-item {{ 'admin/divisi' == request()->path() ? 'active' : '' }}">
				<a href="{{ url('admin/divisi') }}" class="menu-link">
					<div data-i18n="Hari">Divisi</div>
				</a>
			</li>
			<li class="menu-item {{ 'admin/daftar-panitia' == request()->path() ? 'active' : '' }}">
				<a href="{{ url('admin/daftar-panitia') }}" class="menu-link">
					<div data-i18n="Hari">Daftar Panitia</div>
				</a>
			</li>
		</ul>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Pages</span>
	</li>
	<li class="menu-item {{ 'admin/pengaturan-akun' == request()->path()
							|| 'admin/ganti-password' == request()->path() ? 'open' : '' }}">
		<a href="javascript:void(0);" class="menu-link menu-toggle">
			<i class="menu-icon tf-icons bx bx-dock-top"></i>
			<div data-i18n="Account Settings">Pengaturan Akun</div>
		</a>
		<ul class="menu-sub">
			<li class="menu-item {{ 'admin/pengaturan-akun' == request()->path() ? 'active' : '' }}">
				<a href="{{ url('admin/pengaturan-akun') }}" class="menu-link">
					<div data-i18n="Account">Akun</div>
				</a>
			</li>
			<li class="menu-item {{ 'admin/ganti-password' == request()->path() ? 'active' : '' }}">
				<a href="{{ url('admin/ganti-password') }}" class="menu-link">
					<div data-i18n="Account">Password</div>
				</a>
			</li>
		</ul>
	</li>
</ul>