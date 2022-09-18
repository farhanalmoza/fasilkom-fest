@extends('admin.components.template')
@section('title', 'Daftar Pembicara')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pembicara /</span> Daftar Pembicara</h4>

	<div class="row mb-5" id="speaker-cards">
		
	</div>
</div>
@endsection

@section('js')
	<script src="{{ asset('dashboard') }}/js/pembicara/index.js"></script>
@endsection