<li class="nav-item mT-30 actived">
    <a class="sidebar-link" href="{{ route("admin.index") }}">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-home"></i>
                </span>
        <span class="title @active('admin.index')">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link" href="{{ route("admin.product.index") }}">
                <span class="icon-holder">
                  <i class="c-brown-500 ti-game"></i>
                </span>
        <span class="title @active('admin.product.*')">Products</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link" href="{{ route("admin.category.index") }}">
                <span class="icon-holder">
                  <i class="c-red-500 ti-folder"></i>
                </span>
        <span class="title @active('admin.category.*')">Categories</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link" href="{{ route("admin.order.index") }}">
                <span class="icon-holder">
                  <i class="c-green-500 ti-shopping-cart"></i>
                </span>
        <span class="title @active('admin.order.*')">Orders</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link" href="{{ route("admin.announcement.index") }}">
                <span class="icon-holder">
                  <i class="c-purple-500 ti-list"></i>
                </span>
        <span class="title @active('admin.announcement.*')">Announcements</span>
    </a>
</li>



