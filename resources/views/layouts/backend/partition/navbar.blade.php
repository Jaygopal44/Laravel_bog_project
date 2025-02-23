<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"> {{ Auth::user()->name }}</a>
            <a class="navbar-brand hidden" href="./"> {{ Auth::user()->name }}</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            @if (Auth::user()->role_id==1)


            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('Admin/Dashboard') }}"><i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                </li>
                <h3 class="menu-title">CMS</h3>
                <li class="active">
                    <a href="{{ url('Admin/Users') }}"><i class="menu-icon fa fa-user"></i>Users</a>
                </li>
                <li class="active">
                    <a href="{{ url('Admin/Category') }}"><i class="menu-icon fa fa-user"></i>Category</a>
                </li>
                <li class="active">
                    <a href="{{ url('Admin/Post') }}"><i class="menu-icon fa fa-user"></i>Post</a>
                </li>
                <li class="active">
                    <a href="{{ url('Admin/Comment') }}"><i class="menu-icon fa fa-user"></i>Comments</a>
                </li>
            </ul>
            @else
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('user/dashboard') }}"><i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                </li>
                <h3 class="menu-title">CMS</h3>
                <li class="active">
                    <a href="{{ url('User/Comment') }}"><i class="menu-icon fa fa-user"></i>Comments</a>
                </li>
                <li class="active">
                    <a href="{{ url('user/reply_comments') }}"><i class="menu-icon fa fa-user"></i>Reply Comments</a>
                </li>
                {{-- <li class="active">
                    <a href="{{ url('Admin/Post') }}"><i class="menu-icon fa fa-user"></i>Post</a>
                </li> --}}
            </ul>
            @endif
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
