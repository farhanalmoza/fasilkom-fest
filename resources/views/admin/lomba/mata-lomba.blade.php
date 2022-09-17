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

@section('modal')
<div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel1">Hapus Mata Lomba</h5>
				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				></button>
			</div>
			<div class="modal-body">
				Apakah Anda yakin ingin menghapus lomba ini?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
					Batal
				</button>
				<button type="button" class="btn btn-danger submit-hapus">hapus</button>
			</div>
		</div>
	</div>
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