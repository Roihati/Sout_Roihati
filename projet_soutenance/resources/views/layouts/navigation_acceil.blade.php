<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{route('acceil')}}">
                        {{--  <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />  --}}
                        <img src="{{ asset('assets/images/l.webp') }}" width="65px"></img>
                    </a>
                </div> 
                {{-- mstyle  --}}
              
                
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
                
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">


                <x-nav-link :href="route('acceil')" :active="request()->routeIs('acceil')">
                    <i class="fa fa-home" aria-hidden="true"></i>
                        {{ __('Home') }}
                </x-nav-link>


                <!---suppression de service/boutique----->
                <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    {{ __('Qui sommes-nous') }}
                </x-nav-link>
                

                <x-nav-link href="{{ route('contact.submit') }}" :active="request()->routeIs('contact.submit')">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    {{ __('Contactez-nous') }}
                </x-nav-link>


                <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                   <i class="fa fa-user" aria-hidden="true"></i>
                {{ __('Login') }}
                </x-nav-link>


                <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>

                    {{ __('Register') }}
                </x-nav-link>

                <x-nav-link href="#" :active="request()->routeIs('#')" class="text-gray-700 hover:text-gray-900">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> {{ __('Panier') }}
                </x-nav-link>
                </div>
            </div>
            <div > 
                 <style >
                .text-gray-700 {
                        transition: color 0.3s ease;
                    }
                    
                    .text-gray-700:hover {
                        color: #1f2937; /* Couleur plus foncée au survol */
                    }
                    </style>
            <x-nav-link href="#" :active="request()->routeIs('#')" class="text-gray-700 hover:text-gray-900 flex items-center space-x-2">
                <i class="fa fa-search" aria-hidden="true"></i>
                <span>{{ __('Search') }}</span>
            </x-nav-link>
            </div>

           <!-- Hamburger -->
           <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

        </div>
    </div>
</nav>
