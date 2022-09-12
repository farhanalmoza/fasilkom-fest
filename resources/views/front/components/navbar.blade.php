<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="index.html">
        <img src="{{ asset('front') }}/images/logo.png" alt="Logo">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
        <span class="toggler-icon"></span>
        <span class="toggler-icon"></span>
        <span class="toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
        <ul class="navbar-nav m-auto">
            <li class="nav-item active">
                <a class="page-scroll" href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="page-scroll" href="#event">Schedules</a>
            </li>
            <li class="nav-item">
                <a class="page-scroll" href="#team">Speakers</a>
            </li>
            <li class="nav-item">
                <a class="page-scroll" href="#pricing">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="page-scroll" href="#contact">Contact</a>
            </li>
        </ul>
    </div>

    {{-- <div class="navbar-btn d-none d-sm-inline-block">
        <a class="main-btn" href="tiket.html">Get a Ticket</a>
    </div> --}}
</nav>