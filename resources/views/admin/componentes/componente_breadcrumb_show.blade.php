<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard">&nbsp;</i>Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route(request()->segment(2).'.index') }}">{{ ucfirst(request()->segment(2)) }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
    </ol>
</nav>