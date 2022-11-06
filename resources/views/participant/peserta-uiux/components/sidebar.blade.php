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
	@if (Carbon\Carbon::now()->greaterThanOrEqualTo(Carbon\Carbon::create(2022, 12, 5)))
	<li class="menu-item {{ 'peserta-uiux/penyisihan' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('peserta-uiux/penyisihan') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-notepad"></i>
			<div data-i18n="Penyisihan">Penyisihan</div>
		</a>
	</li>
	@endif
	@if ($final == '1')
	<li class="menu-item {{ 'peserta-uiux/final' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('peserta-uiux/final') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bxs-trophy"></i>
			<div data-i18n="Final">Final</div>
		</a>
	</li>
	@endif

	<li class="menu-header small text-uppercase">
		<span class="menu-header-text">Pengaturan</span>
	</li>
	<li class="menu-item {{ 'peserta-uiux/ganti-password' == request()->path() ? 'active' : '' }}">
		<a href="{{ url('peserta-uiux/ganti-password') }}" class="menu-link">
			<i class="menu-icon tf-icons bx bx-dock-top"></i>
			<div data-i18n="Account">Ganti Password</div>
		</a>
	</li>
</ul>