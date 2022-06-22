<nav class="navbar navbar-expand-lg navbar-light border-bottom">
    <div class="container">
        <div id="mySidebar" class="sidebar">
            <a href="#" class="closebtn" onclick="closeNav()"><i class="bi bi-x-lg"></i></a>
            <a href="/">Home</a>
            <a href="/kategori">kategori</a>
            <a href="/feed">Kost</a>
            <a href="/admin">Data</a>
            <form action="/logout" method="post">
                @csrf
                <button class="btn btn-success mx-4 mt-2" type="submit">Log Out <i
                        class="bi bi-box-arrow-right"></i></button>
            </form>
        </div>
        <div id="main">
            <button class="openbtn" onclick="openNav()"><i class="bi bi-three-dots-vertical"></i>Dashboard</button>
        </div>
        <ul class="navbar-nav ml-auto">
            @auth
                {{ auth()->user()->name }}
            </ul>
        @endauth
    </div>
</nav>
<script src="{{ url('js/dom.js') }}"></script>
