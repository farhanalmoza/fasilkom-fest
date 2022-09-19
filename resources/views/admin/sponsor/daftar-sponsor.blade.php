@extends('admin.components.template')
@section('title', 'Daftar Sponsor')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sponsor /</span> Daftar Sponsor</h4>

	<div class="row mb-5" id="sponsor-cards">
		
	</div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel1">Hapus Sponsor</h5>
				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				></button>
			</div>
			<div class="modal-body">
				Apakah Anda yakin ingin menghapus sponsor ini?
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
	<script src="{{ asset('dashboard') }}/js/sponsor/index.js"></script>
@endsection