<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect d-flex gap-2">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true">
                            <path
                                d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z">
                            </path>
                            <path
                                d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z">
                            </path>
                        </svg>
                        <div class="font-semibold">Home</div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.users') }}"
                        class=" waves-effect d-flex gap-2 {{ request()->is('*/user*') ? 'active-link' : '' }}">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true">
                            <path
                                d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z">
                            </path>
                        </svg>
                        <span>{{ __('Manage Users') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.technicians') }}"
                        class=" waves-effect d-flex gap-2 {{ request()->is('*/technician*') ? 'active-link' : '' }} items-center">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                            viewBox="0 0 24 24" fill="currentColor">
                            <g>
                                <rect fill="none" height="24" width="24"></rect>
                                <rect fill="none" height="24" width="24"></rect>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M9,15c-2.67,0-8,1.34-8,4v1c0,0.55,0.45,1,1,1h14c0.55,0,1-0.45,1-1v-1C17,16.34,11.67,15,9,15z">
                                    </path>
                                    <path
                                        d="M4.74,9h8.53c0.27,0,0.49-0.22,0.49-0.49V8.49c0-0.27-0.22-0.49-0.49-0.49H13c0-1.48-0.81-2.75-2-3.45V5.5 C11,5.78,10.78,6,10.5,6S10,5.78,10,5.5V4.14C9.68,4.06,9.35,4,9,4S8.32,4.06,8,4.14V5.5C8,5.78,7.78,6,7.5,6S7,5.78,7,5.5V4.55 C5.81,5.25,5,6.52,5,8H4.74C4.47,8,4.25,8.22,4.25,8.49v0.03C4.25,8.78,4.47,9,4.74,9z">
                                    </path>
                                    <path d="M9,13c1.86,0,3.41-1.28,3.86-3H5.14C5.59,11.72,7.14,13,9,13z"></path>
                                    <path
                                        d="M21.98,6.23l0.93-0.83l-0.75-1.3l-1.19,0.39c-0.14-0.11-0.3-0.2-0.47-0.27L20.25,3h-1.5L18.5,4.22 c-0.17,0.07-0.33,0.16-0.48,0.27L16.84,4.1l-0.75,1.3l0.93,0.83C17,6.4,17,6.58,17.02,6.75L16.09,7.6l0.75,1.3l1.2-0.38 c0.13,0.1,0.28,0.18,0.43,0.25L18.75,10h1.5l0.27-1.22c0.16-0.07,0.3-0.15,0.44-0.25l1.19,0.38l0.75-1.3l-0.93-0.85 C22,6.57,21.99,6.4,21.98,6.23z M19.5,7.75c-0.69,0-1.25-0.56-1.25-1.25s0.56-1.25,1.25-1.25s1.25,0.56,1.25,1.25 S20.19,7.75,19.5,7.75z">
                                    </path>
                                    <path
                                        d="M19.4,10.79l-0.85,0.28c-0.1-0.08-0.21-0.14-0.33-0.19L18.04,10h-1.07l-0.18,0.87c-0.12,0.05-0.24,0.12-0.34,0.19 l-0.84-0.28l-0.54,0.93l0.66,0.59c-0.01,0.13-0.01,0.25,0,0.37l-0.66,0.61l0.54,0.93l0.86-0.27c0.1,0.07,0.2,0.13,0.31,0.18 L16.96,15h1.07l0.19-0.87c0.11-0.05,0.22-0.11,0.32-0.18l0.85,0.27l0.54-0.93l-0.66-0.61c0.01-0.13,0.01-0.25,0-0.37l0.66-0.59 L19.4,10.79z M17.5,13.39c-0.49,0-0.89-0.4-0.89-0.89c0-0.49,0.4-0.89,0.89-0.89s0.89,0.4,0.89,0.89 C18.39,12.99,17.99,13.39,17.5,13.39z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <span>{{ __('Manage Technicians') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.team.members') }}"
                        class=" waves-effect  items-center d-flex gap-2 {{ request()->is('*/team*') ? 'active-link' : '' }}">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M12 11a5 5 0 0 1 5 5v6H7v-6a5 5 0 0 1 5-5zm-6.712 3.006a6.983 6.983 0 0 0-.28 1.65L5 16v6H2v-4.5a3.5 3.5 0 0 1 3.119-3.48l.17-.014zm13.424 0A3.501 3.501 0 0 1 22 17.5V22h-3v-6c0-.693-.1-1.362-.288-1.994zM5.5 8a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zm13 0a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM12 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z">
                                </path>
                            </g>
                        </svg>
                        <span>{{ __('Manage Team Members') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.orders') }}"
                        class=" waves-effect d-flex gap-2 {{ request()->is('*/order*') ? 'active-link' : '' }}">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6.122.392a1.75 1.75 0 011.756 0l5.25 3.045c.54.313.872.89.872 1.514V7.25a.75.75 0 01-1.5 0V5.677L7.75 8.432v6.384a1 1 0 01-1.502.865L.872 12.563A1.75 1.75 0 010 11.049V4.951c0-.624.332-1.2.872-1.514L6.122.392zM7.125 1.69l4.63 2.685L7 7.133 2.245 4.375l4.63-2.685a.25.25 0 01.25 0zM1.5 11.049V5.677l4.75 2.755v5.516l-4.625-2.683a.25.25 0 01-.125-.216zm10.828 3.684a.75.75 0 101.087 1.034l2.378-2.5a.75.75 0 000-1.034l-2.378-2.5a.75.75 0 00-1.087 1.034L13.501 12H10.25a.75.75 0 000 1.5h3.251l-1.173 1.233z">
                            </path>
                        </svg>
                        <span>{{ __('Manage Orders') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.assignOrder') }}"
                        class=" waves-effect d-flex gap-2 {{ request()->is('*/assign*') ? 'active-link' : '' }}">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2.5 1.75a.25.25 0 01.25-.25h8.5a.25.25 0 01.25.25v7.736a.75.75 0 101.5 0V1.75A1.75 1.75 0 0011.25 0h-8.5A1.75 1.75 0 001 1.75v11.5c0 .966.784 1.75 1.75 1.75h3.17a.75.75 0 000-1.5H2.75a.25.25 0 01-.25-.25V1.75zM4.75 4a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5zM4 7.75A.75.75 0 014.75 7h2a.75.75 0 010 1.5h-2A.75.75 0 014 7.75zm11.774 3.537a.75.75 0 00-1.048-1.074L10.7 14.145 9.281 12.72a.75.75 0 00-1.062 1.058l1.943 1.95a.75.75 0 001.055.008l4.557-4.45z">
                            </path>
                        </svg>
                        <span>{{ __('Assign Orders') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.products') }}"
                        class=" waves-effect d-flex gap-2 {{ request()->is('*/product*') ? 'active-link' : '' }}">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480 480"
                            fill="currentColor">
                            <title>list</title>
                            <path
                                d="M180 140l240 0 0-60-240 0 0 60z m-120 260l60 0 0-60-60 0 0 60z m0-130l60 0 0-60-60 0 0 60z m0-130l60 0 0-60-60 0 0 60z m120 260l240 0 0-60-240 0 0 60z m0-130l240 0 0-60-240 0 0 60z">
                            </path>
                        </svg>
                        <span>{{ __('Manage Products') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.solarpanels') }}"
                        class=" waves-effect d-flex gap-2 {{ request()->is('*/panel*') ? 'active-link' : '' }}">
                        <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 512">
                            <path
                                d="M122.2 0C91.7 0 65.5 21.5 59.5 51.4L8.3 307.4C.4 347 30.6 384 71 384H288v64H224c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H352V384H569c40.4 0 70.7-36.9 62.8-76.6l-51.2-256C574.5 21.5 548.3 0 517.8 0H122.2zM260.9 64H379.1l10.4 104h-139L260.9 64zM202.3 168H101.4L122.2 64h90.4L202.3 168zM91.8 216H197.5L187.1 320H71L91.8 216zm153.9 0H394.3l10.4 104-169.4 0 10.4-104zm196.8 0H548.2L569 320h-116L442.5 216zm96-48H437.7L427.3 64h90.4l31.4-6.3L517.8 64l20.8 104z">
                            </path>
                        </svg>
                        <span>{{ __('Manage Panels') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.product.categories') }}"
                        class=" waves-effect d-flex gap-2 {{ request()->is('*/categor*') ? 'active-link' : '' }}">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 4h6v6h-6z"></path>
                            <path d="M4 14h6v6h-6z"></path>
                            <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            <path d="M7 7m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                        </svg>
                        <span>{{ __('Products Categories') }}</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ route('admin.product.tags') }}"
                        class=" waves-effect d-flex gap-2 {{ request()->is('*/tag*') ? 'active-link' : '' }}">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z">
                            </path>
                            <path
                                d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z">
                            </path>
                        </svg>
                        <span>{{ __('Manage Products Tags') }}</span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('admin.base.price') }}"
                        class=" waves-effect d-flex gap-2 items-center {{ request()->is('*/base-price*') ? 'active-link' : '' }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M10.9 2.1l9.899 1.415 1.414 9.9-9.192 9.192a1 1 0 0 1-1.414 0l-9.9-9.9a1 1 0 0 1 0-1.414L10.9 2.1zm2.828 8.486a2 2 0 1 0 2.828-2.829 2 2 0 0 0-2.828 2.829z"></path>
                            </g>
                        </svg>
                        <span>{{ __('Manage Base Price') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.emailtemplates') }}"
                        class=" waves-effect d-flex gap-2 items-center {{ request()->is('*/email-temp*') ? 'active-link' : '' }}">
                        <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            id="mdi-email-fast-outline" viewBox="0 0 24 24">
                            <path
                                d="M22 5.5H9C7.9 5.5 7 6.4 7 7.5V16.5C7 17.61 7.9 18.5 9 18.5H22C23.11 18.5 24 17.61 24 16.5V7.5C24 6.4 23.11 5.5 22 5.5M22 16.5H9V9.17L15.5 12.5L22 9.17V16.5M15.5 10.81L9 7.5H22L15.5 10.81M5 16.5C5 16.67 5.03 16.83 5.05 17H1C.448 17 0 16.55 0 16S.448 15 1 15H5V16.5M3 7H5.05C5.03 7.17 5 7.33 5 7.5V9H3C2.45 9 2 8.55 2 8S2.45 7 3 7M1 12C1 11.45 1.45 11 2 11H5V13H2C1.45 13 1 12.55 1 12Z">
                            </path>
                        </svg>
                        <span>{{ __('Email Templates') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.settings') }}"
                        class=" waves-effect d-flex gap-2 items-center {{ request()->is('*/setting*') ? 'active-link' : '' }} items-center">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z">
                            </path>
                        </svg>
                        <span>{{ __('Settings') }}</span>
                    </a>
                </li>

                <li x-data="{ open: false }" x-cloak>
                    <button @click.prevent="open = ! open"
                        class="p-2 px-4 w-full mb-1 d-flex gap-2 items-center has-arrow waves-effect  font-semibold  {{ request()->is('*/enq*') || request()->is('*/contactus*') ? 'active-link text-white' : 'text-gray-500' }} ">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm2-13c0 .28-.21.8-.42 1L10 9.58c-.57.58-1 1.6-1 2.42v1h2v-1c0-.29.21-.8.42-1L13 9.42c.57-.58 1-1.6 1-2.42a4 4 0 1 0-8 0h2a2 2 0 1 1 4 0zm-3 8v2h2v-2H9z">
                            </path>
                        </svg>
                        <span>{{ __('Manage Enquiries') }}</span>
                    </button>

                    <div x-show="open" @click.outside="open = false">
                        <ul>
                            <li>
                                <a href="{{ route('admin.enquiries') }}"
                                    class=" waves-effect d-flex gap-2 {{ request()->is('*/form*') ? 'active-link' : '' }}">
                                    <span>{{ __('Form Enquiries') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.contactUs') }}"
                                    class="{{ request()->is('*/contact*') ? 'active-link' : '' }}">
                                    <span>
                                        {{ __('Contact Page Enquiries') }}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li x-data="{ open: false }" x-cloak>
                    <button @click.prevent="open = ! open"
                        class="p-2 px-4 w-full d-flex gap-2 items-center has-arrow mb-1 waves-effect font-semibold {{ request()->is('*/content*') ? 'active-link text-white' : 'text-gray-500' }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12 10c0-.36-.01-.711-.027-1.051-.635.034-1.297.051-1.973.051-.676 0-1.338-.017-1.973-.051a19.856 19.856 0 0 0 .026 2.499c.616.034 1.269.052 1.947.052a.75.75 0 1 1 0 1.5c-.604 0-1.193-.013-1.759-.04.106.582.244 1.103.412 1.547.44 1.161.95 1.493 1.347 1.493a.75.75 0 0 1 0 1.5 7.5 7.5 0 1 1 7.5-7.5.75.75 0 0 1-1.5 0c0-.55-.074-1.083-.213-1.59-.655.183-1.443.321-2.319.418.021.383.032.775.032 1.172a.75.75 0 0 1-1.5 0Zm-3.347-4.507c.44-1.161.95-1.493 1.347-1.493.396 0 .907.332 1.347 1.493.207.546.369 1.21.48 1.961-.577.03-1.19.046-1.827.046a35.3 35.3 0 0 1-1.827-.046c.111-.75.273-1.415.48-1.961Zm-1.402-.532c-.26.687-.452 1.493-.576 2.373-.724-.08-1.36-.188-1.88-.32a6.026 6.026 0 0 1 2.61-2.425 6.784 6.784 0 0 0-.154.372Zm-.72 3.867c-.875-.097-1.663-.235-2.318-.417a6.007 6.007 0 0 0-.163 2.367c.493.2 1.229.374 2.176.501l.314.04a21.13 21.13 0 0 1-.008-2.491Zm6.794-1.494c.724-.08 1.36-.188 1.88-.32a6.027 6.027 0 0 0-2.61-2.425c.056.122.107.247.154.372.26.687.452 1.493.576 2.373Zm-8.783 5.162a6.024 6.024 0 0 0 2.862 2.915 6.807 6.807 0 0 1-.153-.372c-.243-.64-.425-1.383-.55-2.193-.231-.024-.457-.05-.675-.08a14.799 14.799 0 0 1-1.484-.27Z"
                                fill="currentColor"></path>
                            <path
                                d="m14.81 13.75 2.47 2.47a.75.75 0 1 1-1.06 1.06l-2.47-2.47v1.19a.75.75 0 0 1-1.5 0v-3a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 0 1.5h-1.19Z"
                                fill="currentColor"></path>
                        </svg>
                        <span>{{ __('Manage Content') }}</span>
                    </button>

                    <div x-show="open" @click.outside="open = false">
                        <ul>
                            <li>
                                <a href="{{ route('admin.faqs') }}"
                                    class=" waves-effect d-flex gap-2 {{ request()->is('*/faq*') ? 'active-link' : '' }}">
                                    <span>{{ __('FAQ Section') }}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.logos') }}"
                                    class=" waves-effect d-flex gap-2 {{ request()->is('*/partner*') ? 'active-link' : '' }}">
                                    <span>{{ __('Partner Logos') }}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.aboutUs') }}"
                                    class=" waves-effect d-flex gap-2 {{ request()->is('*/about*') ? 'active-link' : '' }}">
                                    <span>{{ __('About us Page') }}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.home.page') }}"
                                    class=" waves-effect d-flex gap-2 {{ request()->is('*/home*') ? 'active-link' : '' }}">
                                    <span>{{ __('Home Page') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
