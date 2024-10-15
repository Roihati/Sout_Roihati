<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="#">
                        <div class="shrink-0 flex items-center">
                            <a href="#">
                                {{--  <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />  --}}
                                <img src="{{ asset('assets/images/l.webp') }}" width="65px"></img>
                            </a>
                 </div>   
                </div>
                <!-- Navigation Links -->
      <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
               
    @php
    $route = '';
    $active = false;

@endphp
<x-nav-link :href="$route" :active="$active">
    <i class="fas fa-tachometer-alt"></i> {{ __('Home') }}
</x-nav-link>
                {{--  liens user  --}}
                @if(Auth::user()->role_id==1)
                <x-nav-link href="{{ route('client.order') }}" :active="request()->routeIs('client.order')">
                 
                    <i class="fas fa-shopping-cart"></i> {{ __('Commandes') }}
                </x-nav-link>

                <x-nav-link href="{{ route('client.products') }}" :active="request()->routeIs('client.products')">
                    <i class="fas fa-box"></i> {{ __('Product') }}

                </x-nav-link>
                <x-nav-link href="{{ route('client.favorite') }}" :active="request()->routeIs('client.favorite')">

                    <i class="fas fa-shopping-cart"></i> {{ __('Cart') }}

                </x-nav-link>
                
                <x-nav-link href="{{ route('client.favorite') }}" :active="request()->routeIs('client.favorite')">
               
                </x-nav-link>

                <x-nav-link href="{{ route('profile.edit') }}" :active="request()->routeIs('profile.edit')">
                    <i class="fas fa-user-edit"></i> {{ __('Profile') }}
                </x-nav-link>

                <x-nav-link href="{{ route('client.create')}}" :active="request()->routeIs('client.create')">
                    <i class="fas fa-comments"></i> {{ __('Avis Utilisateurs') }}

                </x-nav-link>
                @endif
                </div>
            </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                               <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
