<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Navbar">
    <div class="container-xl ">
        <a class="navbar-league" href="{{ route('home') }}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homes.index') }}">Location</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homes.index') }}">Styles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homes.index') }}">Style interior</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homes.index') }}">Homes</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
