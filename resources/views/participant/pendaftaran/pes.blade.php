@extends('participant.pendaftaran.components.template')
@section('title', 'Pro Evolution Soccer')

@section('css')
    <style>
        #buktiBayar::before {
            content: 'Bukti Pembayaran';  
        }
        #ktm::before {
            content: 'Foto KTM';
        }
        #formulir::before {
            content: 'Formulir Pendaftaran';
        }
    </style>
@endsection

@section('content')
<section id="contact" class="contact-area pt-80 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-form pt-20">
                    <form id="daftarPes">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="text" id="name" name="name" placeholder="Name">
                                    <i class="lni-users"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <select name="major" id="major">
                                        <option value="">Major</option>
                                        <option value="1">Informatika</option>
                                        <option value="2">Information System</option>
                                        <option value="3">Data Science</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="email" id="email" name="email" placeholder="Email">
                                    <i class="lni-envelope"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="text" id="npm" name="npm" placeholder="NPM">
                                    <i class="lni-user"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="text" id="noWa" name="noWa" placeholder="WhatsApp Number">
                                    <i class="lni-phone-handset"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="file" id="ktm" name="ktm" title="ll">
                                    <i class="lni-add-file"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="file" id="formulir" name="formulir" title="ll">
                                    <i class="lni-add-file"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="file" id="buktiBayar" name="buktiBayar" title="ll">
                                    <i class="lni-add-file"></i>
                                </div> <!-- single form -->
                            </div>
                            <p class="form-message"></p>
                            <div class="col-md-12">
                                <div class="single-form">
                                    <button type="submit" class="main-btn main-btn-2">Daftar</button>
                                </div> <!-- single form -->
                            </div>
                        </div> <!-- row -->
                    </form>
                </div> <!-- contact form -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
@endsection

@section('js')
    <script src="{{asset('front')}}/js/pendaftaran/pes.js"></script>
@endsection