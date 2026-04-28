<section class="navbar">
    <nav class="navbar-left">
        <div class="logo"></div>
        <a href="{{ url('/') }}" class="nav-link"><i class="bi bi-house-door-fill"></i> Dashboard</a>
        <a href="{{ url('/tasks/list') }}" class="nav-link active"><i class="bi bi-kanban"></i> Kanban</a>
        <a href="{{ url('/tasks/filter') }}" class="nav-link"><i class="bi bi-file-bar-graph-fill"></i> Reports</a>
    </nav>
    <div class="navbar-right">
        <span class="bell">&#128276;</span>
        <div class="avatar"></div>
    </div>
</section>