@extends('committee.uiux.components.template')
@section('title', 'Pendaftar UI & UX')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Peserta /</span> Pendaftar UI & UX</h4>

	<div class="row">
		<div class="col-lg-12 mb-4 order-0">
			<div class="card">
				<h5 class="card-header">Pendaftar UI & UX</h5>
				<div class="table-responsive text-nowrap">
					<table class="table">
						<thead>
							<tr>
								<th>Team</th>
								<th>Agency</th>
								<th>WhatsApp</th>
								<th>Orisinalitas</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody class="table-border-bottom-0" id="tb-pendaftar">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	<script>
		$(document).ready(function () {
			getPendaftar.loadData = "/pendaftar-uiux";
		})
	</script>
	<script src="{{asset('dashboard')}}/js/panitia-uiux/index.js"></script>
@endsection