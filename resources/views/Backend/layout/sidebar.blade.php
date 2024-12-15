<div class="sidebar">
    <a class="navbar-brand" href="{{route('adminDashboard')}}"><h3>Dashboard</h3></a>
    <a href="#userSubMenu" data-bs-toggle="collapse" class="dropdown-toggle">User Management</a>
    <div class="collapse ps-3" id="userSubMenu">
        <a href="{{ route('listOfUser') }}">User List</a>
    </div>

    <a href="{{ route('adminHomeSlider') }}">Home Slider</a>

    <a href="{{ route('adminProducts') }}">All Products</a>








    <hr>
    <a href="{{ route('logOut') }}">Logout</a>
</div>
