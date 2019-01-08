<li class="nav-item start"
>
    <a href="/home" class="nav-link">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start"
@if(route('/event') == Request::url()) 
    class="active open"
  @endif
>
    <a href="/event" class="nav-link">
        <i class="icon-calendar"></i>
        <span class="title">Event</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start">
    <a href="/document" class="nav-link">
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
