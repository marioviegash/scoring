<li class="nav-item start @if(Route::currentRouteName() === "home" || 
Route::currentRouteName() === null) active open @endif">
    <a href="/home" class="nav-link">
    <i class="icon-home"></i>
    <span class="title">Dashboard</span>
    <span class="selected"></span>
</a>
</li>
<li class="nav-item start @if(Route::currentRouteName() === "event") active open @endif" >
    <a href="/admin/event" class="nav-link">
        <i class="icon-calendar"></i>
        <span class="title">Event</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start @if(Route::currentRouteName() === "admin_document") active open @endif">
    <a href="/admin/document" class="nav-link">
        <i class="fa fa-file-archive-o"></i>
        <span class="title">Manage Document</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start">
    <a href="/admin/user" class="nav-link">
        <i class="icon-user"></i>
        <span class="title">User Management</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start @if(Route::currentRouteName() === "group") active open @endif">
    <a href="/group" class="nav-link">
        <i class="icon-users"></i>
        <span class="title">Group Management</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start">
    <a href="/admin/result" class="nav-link">
        <i class="fa fa-file"></i>
        <span class="title">View Result</span>
        <span class="selected"></span>
    </a>
</li>