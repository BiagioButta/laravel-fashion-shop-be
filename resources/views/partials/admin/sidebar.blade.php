<nav id="sidebarMenu" class="bg-dark navbar-dark d-flex flex-column justify-content-between">

    <div>

        <div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="{{url('/') }}"><i class="fa-solid fa-house-user fa-lg fa-fw"></i> {{ __('Home') }}</a></li>
            </ul>
        </div>

        <div>
            <ul class="nav flex-column">

                <li class="nav-item"> <a
                        class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                    </a></li>
        
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.products.index' ? 'bg-secondary' : '' }}"
                        href="{{ route('admin.products.index') }}">
                        <i class="fa-solid fa-folder-open fa-lg fa-fw"></i> Products
                    </a>
                </li>
        
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.brands.index' ? 'bg-secondary' : '' }}"
                        href="{{ route('admin.brands.index') }}"> <i class="fa-solid fa-folder-open fa-lg fa-fw"></i>
                        Brands
                    </a>
                </li>
        
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.textures.index' ? 'bg-secondary' : '' }}"
                        href="{{ route('admin.textures.index') }}"> <i class="fa-solid fa-folder-open fa-lg fa-fw"></i>
                        Textures
                    </a>
                </li>
        
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.categories.index' ? 'bg-secondary' : '' }}"
                        href="{{ route('admin.categories.index') }}"> <i class="fa-solid fa-folder-open fa-lg fa-fw"></i>
                        Categories
                    </a>
                </li>
        
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.tags.index' ? 'bg-secondary' : '' }}"
                        href="{{ route('admin.tags.index') }}"> <i class="fa-solid fa-folder-open fa-lg fa-fw"></i>
                        Tags
                    </a>
                </li>
        
            </ul>
        </div>
    </div>
    
    <div>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket fa-lg fa-fw"></i> {{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
            </li>
        </ul>
        
    </div>
        

    
</nav>
