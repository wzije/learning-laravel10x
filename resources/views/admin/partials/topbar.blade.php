<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

    </ul>
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>
                @auth
                    {{ Auth::user()->name }} ({{ Auth::user()->role }})
                @endauth
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                <li><a class="dropdown-item" href="javascript:void()"
                        onclick="if(confirm('Are you sure?')) event.preventDefault(); document.getElementById('logoutForm').submit() ">Logout</a>
                    <form action="/logout" method="POST" id="logoutForm">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
