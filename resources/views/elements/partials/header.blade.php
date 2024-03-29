<nav class="mx-auto fixed w-full shadow md:px-20  bg-white z-50 ">
    <div x-data="{ open: false }">
        <div class=" flex items-center justify-between mx-auto p-4 md:py-6 py-3">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('images/logo.jpg') }}" class="md:w-full w-40 mr-3" alt="Logo">
            </a>
            <button data-collapse-toggle="navbar-default" type="button" @click="open = ! open"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-6 md:mt-0 md:border-0">
                    <li>
                        <a href="{{ route('home') }}"
                            class="  gap-1 text-lg items-center flex py-2  pl-2 pr-4 font-medium 
                            {{ request()->is('*/*') || request()->is('dashboard') ? 'text-green-600' : 'text-gray-500' }}"
                            aria-current="page">
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('aboutus') }}"
                            class=" flex text-lg gap-1 items-center py-2   pl-2 pr-4  rounded hover:bg-gray-100 font-medium
                            {{ request()->is('*about-us*') ? 'text-green-600' : 'text-gray-500' }}">
                            {{ __('About Us') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('howitworks') }}"
                            class=" flex text-lg  gap-1 items-center py-2   pl-2 pr-4  rounded hover:bg-gray-100 font-medium
                            {{ request()->is('*how-it-works*') ? 'text-green-600' : 'text-gray-500' }}">
                            {{__('How It Works')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contactus') }}"
                            class=" flex text-lg  gap-1 items-center py-2   pl-2 pr-4  rounded hover:bg-gray-100 font-medium
                            {{ request()->is('*contact-us*') ? 'text-green-600' : 'text-gray-500' }}">
                            Contact Us</a>
                    </li>

                </ul>
            </div>
            <div class="hidden w-full md:block md:w-auto " id="navbar-default">
                <ul
                    class="font-medium flex  gap-4 p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row  md:mt-0 md:border-0">
                    @if (Auth::user())
                        <li class="relative" x-data="{ open: false }" @click.away="open = false" x-cloak>

                            <button class="flex gap-2 items-center" aria-label="User menu" x-on:click="open = ! open">
                                <div
                                    class="w-10 h-10 ml-auto rounded-full bg-green-100 bg-cover text-green-600 bg-center  leading-10">

                                    <p class="">
                                        {{ substr(Auth::user()->userData->first_name, 0, 1) }}
                                        {{ substr(Auth::user()->userData->last_name, 0, 1) }}
                                    </p>
                                </div>
                                {{ Auth::user()->name }}
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.5 7.5L10.5 12.5L15.5 7.5" stroke="#667085" stroke-width="1.67"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>


                            </button>
                            <div x-ref="panel" class="absolute  rounded top-16 w-44 right-0 shadow bg-white p-2 border"
                                x-show="open" x-transition.origin.top.left
                                class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md" id="dropdown-button-1">

                                @if (Auth::user()->isAdmin)
                                    <a href="{{ route('dashboard') }}"
                                        class="flex items-center gap-2 w-full font-normal first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-base hover:bg-gray-50 ">
                                        Back to dashboard
                                    </a>
                                @else
                                    <a href="{{ route('customer.account.profile') }}"
                                        class="flex items-center gap-2 w-full font-normal first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-base hover:bg-gray-50 ">
                                        Profile
                                    </a>
                                    <a href="{{ route('customer.profie.change.password') }}"
                                        class="flex items-center gap-2 w-full font-normal first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-base hover:bg-gray-50 ">
                                        Change Password
                                    </a>
                                @endif

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button
                                        class="flex items-center gap-2 w-full font-normal first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-base hover:bg-gray-50 text-red-500 ">

                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                                            <line x1="12" y1="2" x2="12" y2="12">
                                            </line>
                                        </svg>
                                        {{ __('Logout') }}
                                    </button>
                                </form>


                            </div>

                        </li>
                    @else
                        <div class="hidden w-full md:block md:w-auto " id="navbar-default">
                            <ul
                                class="font-medium flex  gap-4 p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row  md:mt-0 md:border-0">
                                <li>
                                    <a href="{{ route('login') }}"
                                        class=" text-lg block gray-text  px-6 py-2  font-medium">{{ __('Sign In') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}"
                                        class=" text-lg block  px-6 py-2 text-green-600 border border-green-600  rounded font-medium">{{ __('Sign Up') }}</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </ul>
            </div>


            <!--Mobile Menu-->
            <div class="bg-white shadow sm:hidden  w-full" x-show="open" @click.away="open = false"
                style="display: none;">

                <ul id="cd-primary-nav" class="cd-primary-nav mb-0 align-self-center nav-is-visible shadow-lg">
                    <ul
                        class="cd-secondary-nav container-fluid pr-0 d-block d-md-block d-lg-block d-xl-none border-bottom is-hidden">
                        <li class="p-0 p-md-0 p-lg-0 p-xl-4">
                            <div class="d-flex flex-column">
                                <a href="{{ route('home') }}">
                                    {{ __('Home') }}
                                </a>
                            </div>
                        </li>
                        <li class="p-0 p-md-0 p-lg-0 p-xl-4">
                            <div class="d-flex flex-column">
                                <a href="{{ route('aboutus') }}">
                                    {{ __('About Us') }}
                                </a>
                            </div>
                        </li>

                        <li class="p-0 p-md-0 p-lg-0 p-xl-4">
                            <div class="d-flex flex-column">
                                <a href="{{ route('howitworks') }}">
                                    {{ __('How it works') }}
                                </a>
                            </div>
                        </li>
                        <li class="p-0 p-md-0 p-lg-0 p-xl-4">
                            <div class="d-flex flex-column">
                                <a href="{{ route('contactus') }}">
                                    {{ __('Contact Us') }}
                                </a>
                            </div>
                        </li>
                        <li class="p-0 p-md-0 p-lg-0 p-xl-4">
                            <div class="d-flex flex-column">
                                <a href="{{ route('login') }}">
                                    {{ __('Sign In') }}
                                </a>
                            </div>
                        </li>
                        <li class="p-0 p-md-0 p-lg-0 p-xl-4">
                            <div class="d-flex flex-column">
                                <a class="text-green-600 font-medium" href="{{ route('register') }}">
                                    {{ __('Sign up') }}
                                </a>
                            </div>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
</nav>
