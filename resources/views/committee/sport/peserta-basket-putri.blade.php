@extends('committee.sport.components.template')
@section('title', 'Peserta Basket Putri')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Peserta /</span> Basket Putri</h4>

	<div class="row">
		<div class="col-lg-12 mb-4 order-0">
			<div class="card">
				<h5 class="card-header">Peserta Basket Putri</h5>
				<div class="table-responsive text-nowrap">
					<table class="table">
						<thead>
							<tr>
								<th>Team</th>
								<th>Captain</th>
								<th>Email</th>
								<th>WhatsApp</th>
								<th>Payment</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody class="table-border-bottom-0" id="tb-sport">
							
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
			// 1 = futsal
			// 2 = basket putra
			// 3 = basket putri
			getSport.loadData = "3"
		})
	</script>
	<script src="{{asset('dashboard')}}/js/panitia-sport/index.js"></script>
@endsection