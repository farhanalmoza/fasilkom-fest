@extends('participant.pendaftaran.components.template')
@section('title', 'PUBG Mobile')

@section('css')
    <style>
        #buktiBayar::before {
            content: 'Bukti Pembayaran';  
        }
    </style>
@endsection

@section('content')
<section id="contact" class="contact-area pt-80 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-form pt-20">
                    <form id="contact-form" action="{{asset('front')}}/contact.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="text" id="teamName" name="teamName" placeholder="Team name">
                                    <i class="lni-users"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="text" id="leader" name="leader" placeholder="Team Leader Name">
                                    <i class="lni-user"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="text" id="noWa" name="noWa" placeholder="WhatsApp Team Leader">
                                    <i class="lni-phone-handset"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <select name="department" id="department">
                                        <option value="">Major</option>
                                        <option value="informatika">Informatika</option>
                                        <option value="sistem informasi">Information System</option>
                                        <option value="sains data">Data Science</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="text" id="player_2" name="player_2" placeholder="Player 2 Name">
                                    <i class="lni-user"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="text" id="player_3" name="player_3" placeholder="Player 3 Name">
                                    <i class="lni-user"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="text" id="player_4" name="player_4" placeholder="Player 4 Name">
                                    <i class="lni-user"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="text" id="player_5" name="player_5" placeholder="Player 5 Name">
                                    <i class="lni-user"></i>
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