@extends('admin.components.template')
@section('title', 'Daftar Pembicara')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pembicara /</span> Daftar Pembicara</h4>

	<div class="row mb-5" id="speaker-cards">
		
	</div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel1">Hapus Pembicara</h5>
				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				></button>
			</div>
			<div class="modal-body">
				Apakah Anda yakin ingin menghapus pembicara ini?
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
	<script src="{{ asset('dashboard') }}/js/pembicara/index.js"></script>
@endsection