@extends('participant.pendaftaran.components.template')
@section('title', 'Closed')

@section('content')
<section id="contact" class="contact-area pt-80 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-form pt-20">
                    <img src="{{ asset('front') }}/images/game.jpg" alt="About">
                    <div class="section-title">
                        <h2 class="title">Pendaftaran sudah ditutup</h2>
                        <p class="text">Silahkan ikuti lomba - lomba yang masih tersedia~</p>
                    </div>
                </div> <!-- contact form -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
@endsection