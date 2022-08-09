<li class="sidebar-item">
    <a href="{{ $link }}" class="sidebar-link {{ request()->url()==$link ? " sidebar-active":"" }}">
        <i class="bi {{ $class }} me-3"></i>
        {{ $name }}
    </a>
</li>
