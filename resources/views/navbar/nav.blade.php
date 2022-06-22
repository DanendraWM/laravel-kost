<nav class="navbar navbar-expand-lg navbar-light border-bottom">
    <div class="container">
        <a class="navbar-brand text-success"><strong>DKOST</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ $title === 'home' ? 'active font-weight-bold' : '' }}">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item {{ $title === 'kategori' ? 'active font-weight-bold' : '' }}">
                    <a class="nav-link" href="/kategori">kategori</a>
                </li>
                <li class="nav-item {{ $title === 'feed' ? 'active font-weight-bold' : '' }}">
                    <a class="nav-link" href="/feed">kost</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                            <img src="{{ url('image/' . auth()->user()->image) }}" class="nav-img rounded-circle">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (auth()->user()->level == 'admin')
                                <a class="dropdown-item" href="/admin">Data Kost <i class="bi bi-archive-fill"></i></a>
                            @elseif (auth()->user()->level == 'user')
                                <a class="dropdown-item text-center" href="/profile">Profile <i
                                        class="bi bi-person-circle"></i></a>
                                <hr>
                                <a class="dropdown-item " href="/sewa">Booking <i class="bi bi-archive-fill"></i></a>
                                <a class="dropdown-item " href="/history">history <i class="bi bi-clock-fill"></i></a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item" style="cursor: pointer">Log Out
                                    <i class="bi bi-box-arrow-right"></i></button>
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item {{ $title === 'login' ? 'active font-weight-bold' : '' }}">
                        <a class="nav-link" href="/login">login</a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
