<ul class="menu-inner py-1">
	<!-- Dashboard -->
	<li class="menu-item active">
		<a href="{{ url('admin') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-home-circle"></i>
			<div data-i18n="Dashboard">Dashboard</div>
		</a>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Main</span>
	</li>
	<li class="menu-item">
		<a href="javascript:void(0);" class="menu-link menu-toggle">
			<i class="menu-icon tf-icons bx bxs-user-account"></i>
			<div data-i18n="Jadwal">Panitia</div>
		</a>
		<ul class="menu-sub">
			<li class="menu-item">
				<a href="daftar-acara.html" class="menu-link">
					<div data-i18n="Hari">Divisi</div>
				</a>
			</li>
			<li class="menu-item">
				<a href="hari.html" class="menu-link">
					<div data-i18n="Hari">Daftar Panitia</div>
				</a>
			</li>
		</ul>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Pages</span>
	</li>
	<li class="menu-item">
		<a href="javascript:void(0);" class="menu-link menu-toggle">
			<i class="menu-icon tf-icons bx bx-dock-top"></i>
			<div data-i18n="Account Settings">Account Settings</div>
		</a>
		<ul class="menu-sub">
			<li class="menu-item">
				<a href="pengaturan-akun.html" class="menu-link">
					<div data-i18n="Account">Account</div>
				</a>
			</li>
		</ul>
	</li>
</ul>