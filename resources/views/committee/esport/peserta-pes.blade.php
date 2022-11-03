@extends('committee.esport.components.template')
@section('title', 'Peserta PES')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Peserta /</span> PES</h4>

	<div class="row">
		<div class="col-lg-12 mb-4 order-0">
			<div class="card">
				<h5 class="card-header">Peserta PES</h5>
				<div class="table-responsive text-nowrap">
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>NPM</th>
								<th>Email</th>
								<th>WhatsApp</th>
								<th>Major</th>
								<th>KTM</th>
								<th>Payment</th>
							</tr>
						</thead>
						<tbody class="table-border-bottom-0" id="tb-pes">
							
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
			getPes.loadData = "/pes";
		})
	</script>
	<script src="{{asset('dashboard')}}/js/panitia-esport/index.js"></script>
@endsection