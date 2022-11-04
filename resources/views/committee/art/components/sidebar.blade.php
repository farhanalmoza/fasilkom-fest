<ul class="menu-inner py-1">
	<!-- Dashboard -->
	<li class="menu-item {{ 'panitia-art' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-art') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-home-circle"></i>
			<div data-i18n="Dashboard">Dashboard</div>
		</a>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Main</span>
	</li>
	<li class="menu-item {{ 'panitia-art/photography' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-art/photography') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="Photography">Photography</div>
		</a>
	</li>
	<li class="menu-item {{ 'panitia-art/Videography' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-art/Videography') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="Videography">Videography</div>
		</a>
	</li>
	<li class="menu-item {{ 'panitia-art/solo-cover' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-art/solo-cover') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-user-detail"></i>
			<div data-i18n="Solo-Cover">Solo Cover</div>
		</a>
	</li>

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Pengaturan</span>
	</li>
	<li class="menu-item {{ 'panitia-art/ganti-password' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('panitia-art/ganti-password') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-dock-top"></i>
			<div data-i18n="Account">Ganti Password</div>
		</a>
	</li>
</ul>