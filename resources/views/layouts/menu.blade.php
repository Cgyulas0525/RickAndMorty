<li class="nav-item">
    <a href="{{ route('dashboard') }}"
       class="nav-link {{ Request::is('dashb*') ? 'active' : '' }}">
        <i class="fas fa-tachometer-alt"></i>
        <p>Indító pult</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('characters.index') }}"
       class="nav-link {{ Request::is('characters*') ? 'active' : '' }}">
        <i class="fas fa-users"></i>
        <p>Karakterek</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('series.index') }}"
       class="nav-link {{ Request::is('series*') ? 'active' : '' }}">
        <i class="fas fa-tv"></i>
        <p>Évad</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('episodes.index') }}"
       class="nav-link {{ Request::is('episodes*') ? 'active' : '' }}">
        <i class="fas fa-tasks"></i>
        <p>Epizód</p>
    </a>
</li>




