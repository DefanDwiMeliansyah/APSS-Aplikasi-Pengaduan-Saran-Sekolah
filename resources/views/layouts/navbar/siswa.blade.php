<nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            Apss
        </a>
    </div>

    <section class="navbar-toggler" type="button"
        data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </section>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            @include('layouts.nav-items.siswa-guest')
            @include('layouts.nav-items.siswa-auth')
        </ul>
    </div>
</nav>