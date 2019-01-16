<li class="nav-item start @if(Route::currentRouteName() === "home" ||
Route::currentRouteName() === null) @endif">
    <a href="/home" class="nav-link">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start
@if(Route::currentRouteName() === "document") active open @endif">
    <a href="/document" class="nav-link">
        <i class="fa fa-file-archive-o"></i>
        <span class="title">View Document</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start ">
    <a href="/scoring" class="nav-link">
        <i class="fa fa-file-archive-o"></i>
        <span class="title">Scoring</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start
@if(Route::currentRouteName() === "result") active open @endif">
    <a href="/result" class="nav-link">
        <i class="fa fa-file-archive-o"></i>
        <span class="title">View Result</span>
        <span class="selected"></span>
    </a>
</li>