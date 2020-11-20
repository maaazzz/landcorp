<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ auth()->user()->name }} </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Propery managment  -->
    <li class="nav-item {{request()->is('admin/add-resource') ? 'active' : '' }} ">
        <a class="nav-link" href="/admin/add-resource">
            <i class="fa fa-caret-square-right"></i>
            <span>Propery Management</span></a>
    </li>

    <!-- schedule managment  -->
    {{-- <li class="nav-item {{request()->is('admin/schedule') ? 'active' : '' }} ">
    <a class="nav-link" href="{{route('schedule.index')}}">
        <i class="fa fa-home"></i>
        <span>Schedule Management</span></a>
    </li> --}}
    {{-- <!-- transaction managment  -->
    <li class="nav-item {{request()->is('admin/transaction') ? 'active' : '' }} ">
    <a class="nav-link" href="{{route('transaction.index')}}">
        <i class="fa fa-home"></i>
        <span>Transactions Management</span></a>
    </li> --}}

    <!-- dispatch managment  -->
    <li class="nav-item {{request()->is('admin/dispatch') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('dispatch.index')}}">
            <i class="fa fa-home"></i>
            <span>Dispatch Management</span></a>
    </li>

    <!-- property listing  -->
    <li class="nav-item {{request()->is('admin/property') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('property.index')}}">
            <i class="fa fa-house-user"></i>
            <span>Property Listing</span></a>
    </li>

    <!-- property listing  -->
    <li class="nav-item {{request()->is('admin/property-type') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('property-type.index')}}">
            <i class="fa fa-house-user"></i>
            <span>Property Type Listing</span></a>
    </li>

    <!-- property-brand listing  -->
    <li class="nav-item {{request()->is('admin/property-brand') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('property-brand.index')}}">
            <i class="fa fa-code-branch"></i>
            <span>Property Brand Listing</span></a>
    </li>

    <!-- property-building listing  -->
    <li class="nav-item {{request()->is('admin/property-building') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('property-building.index')}}">
            <i class="fa fa-building"></i>
            <span>Property Building Listing</span></a>
    </li>

    <!-- Rooms listing  -->
    <li class="nav-item {{request()->is('admin/room') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('room.index')}}">
            <i class="fa fa-restroom"></i>
            <span>Room Listing </span></a>
    </li>

    <!-- Room Type listing  -->
    <li class="nav-item {{request()->is('admin/room-type') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('room-type.index')}}">
            <i class="fa fa-restroom"></i>
            <span>Room Type Listing </span></a>
    </li>

    <!-- Service listing  -->
    <li class="nav-item {{request()->is('admin/service') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('service.index')}}">
            <i class="fa fa-server"></i>
            <span>Service Listing </span></a>
    </li>

    <!-- Attendant listing  -->
    <li class="nav-item {{request()->is('admin/attendant') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('attendant.index')}}">
            <i class="fa fa-server"></i>
            <span>Attendant Listing </span></a>
    </li>

    <!-- Inspector listing  -->
    <li class="nav-item {{request()->is('admin/inspector') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('inspector.index')}}">
            <i class="fa fa-user"></i>
            <span>Inspector Listing </span></a>
    </li>

    <!-- HouseMan listing  -->
    <li class="nav-item {{request()->is('admin/houseman') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('houseman.index')}}">
            <i class="fa fa-user-astronaut"></i>
            <span>HouseMan Listing </span></a>
    </li>

    <!-- Supervisor listing  -->
    <li class="nav-item {{request()->is('admin/supervisor') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('supervisor.index')}}">
            <i class="fa fa-user-check"></i>
            <span>Supervisor Listing </span></a>
    </li>

    <!-- Room Status  listing  -->
    <li class="nav-item {{request()->is('admin/room-status') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('room-status')}}">
            <i class="fa fa-certificate"></i>
            <span>Room Status Listing </span></a>
    </li>





    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
