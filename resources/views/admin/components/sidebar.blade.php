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
	<li class="menu-item {{ 'admin/informasi' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('admin/informasi') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-notepad"></i>
			<div data-i18n="Informasi">Informasi</div>
		</a>
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
	<li class="menu-item {{ request()->path() == 'admin/bidang-lomba'
							|| request()->path() == 'admin/mata-lomba'
							|| request()->path() == 'admin/tambah-lomba' ? 'open' : '' }}">
		<a href="javascript:void(0);" class="menu-link menu-toggle">
			<i class="menu-icon tf-icons bx bx-trophy"></i>
			<div data-i18n="Jadwal">Lomba</div>
		</a>
		<ul class="menu-sub">
			<li class="menu-item {{ 'admin/bidang-lomba' == request()->path() ? 'active' : '' }}">
				<a href="{{ url('admin/bidang-lomba') }}" class="menu-link">
					<div data-i18n="Hari">Bidang Lomba</div>
				</a>
			</li>
			<li class="menu-item {{ 'admin/mata-lomba' == request()->path() ? 'active' : '' }}">
				<a href="{{ url('admin/mata-lomba') }}" class="menu-link">
					<div data-i18n="Hari">Mata Lomba</div>
				</a>
			</li>
			<li class="menu-item {{ 'admin/tambah-lomba' == request()->path() ? 'active' : '' }}">
				<a href="{{ url('admin/tambah-lomba') }}" class="menu-link">
					<div data-i18n="Hari">Tambah Mata Lomba</div>
				</a>
			</li>
		</ul>
	</li>

	<li class="menu-item {{ request()->path() == 'admin/tambah-pembicara'
							|| request()->path() == 'admin/daftar-pembicara' ? 'open' : '' }}">
		<a href="javascript:void(0);" class="menu-link menu-toggle">
			<i class="menu-icon tf-icons bx bx-user-voice"></i>
			<div data-i18n="Pembicara">Pembicara</div>
		</a>
		<ul class="menu-sub">
			<li class="menu-item {{ 'admin/daftar-pembicara' == request()->path() ? 'active' : '' }}">
				<a href="{{ url('admin/daftar-pembicara') }}" class="menu-link">
					<div data-i18n="Daftar Pembicara">Daftar Pembicara</div>
				</a>
			</li>
			<li class="menu-item {{ 'admin/tambah-pembicara' == request()->path() ? 'active' : '' }}">
				<a href="{{ url('admin/tambah-pembicara') }}" class="menu-link">
					<div data-i18n="Tambah Pembicara">Tambah Pembicara</div>
				</a>
			</li>
		</ul>
	</li>

	<li class="menu-item {{ request()->path() == 'admin/tambah-sponsor'
							|| request()->path() == 'admin/daftar-sponsor' ? 'open' : '' }}">
		<a href="javascript:void(0);" class="menu-link menu-toggle">
			<i class='menu-icon tf-icons bx bx-briefcase-alt'></i>
			<div data-i18n="Sponsor">Sponsor</div>
		</a>
		<ul class="menu-sub">
			<li class="menu-item {{ 'admin/daftar-sponsor' == request()->path() ? 'active' : '' }}">
				<a href="{{ url('admin/daftar-sponsor') }}" class="menu-link">
					<div data-i18n="Daftar Sponsor">Daftar Sponsor</div>
				</a>
			</li>
			<li class="menu-item {{ 'admin/tambah-sponsor' == request()->path() ? 'active' : '' }}">
				<a href="{{ url('admin/tambah-sponsor') }}" class="menu-link">
					<div data-i18n="Tambah Sponsor">Tambah Sponsor</div>
				</a>
			</li>
		</ul>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Pages</span>
	</li>
	<li class="menu-item {{ 'admin/ganti-password' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('admin/ganti-password') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-dock-top"></i>
			<div data-i18n="Account">Ganti Password</div>
		</a>
	</li>
</ul>