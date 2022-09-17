@extends('admin.components.template')
@section('title', 'Mata Lomba')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Lomba /</span> Daftar Mata Lomba</h4>

	{{-- Academic Competitions --}}
	<h5 class="pb-1 mb-3">Academic Competitions</h5>
	<div class="row mb-4" id="row-academic">
		
	</div>
	{{-- End Academic Competitions --}}
	
	{{-- Art Competitions --}}
	<h5 class="pb-1 mb-3">Art Competitions</h5>
	<div class="row mb-4" id="row-art">
		
	</div>
	{{-- End Art Competitions --}}

	{{-- Sport Competitions --}}
	<h5 class="pb-1 mb-3">Sport Competitions</h5>
	<div class="row mb-4" id="row-sport">
		
	</div>
	{{-- End Sport Competitions --}}

	{{-- E-Sport Competitions --}}
	<h5 class="pb-1 mb-3">E-Sport Competitions</h5>
	<div class="row mb-4" id="row-e-sport">
		
	</div>
	{{-- End E-Sport Competitions --}}
</div>
@endsection

@section('js')
	<script>
		$(document).ready(function() {
			getLomba.loadData = "/lomba"
		})
	</script>
	<script src="{{ asset('dashboard') }}/js/lomba/index.js"></script>
@endsection