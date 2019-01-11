<li class="nav-item start  @if(Route::currentRouteName() === "home" 
                        || Route::currentRouteName() === null) active open 
                        @endif">
    <a href="/home" class="nav-link">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start  @if(Route::currentRouteName() === "event") active open @endif"
    
>
    <a href="/event" class="nav-link">
        <i class="icon-calendar"></i>
        <span class="title">Event Management</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start">
    <a href="/admin/document" class="nav-link">
        <i class="fa fa-file-archive-o"></i>
        <span class="title">Manage Document</span>
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
