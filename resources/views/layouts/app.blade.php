<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CompanyData') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">
        @include('sweetalert::alert')
            <!-- Page Heading -->
            <header >
                <nav aria-label="menu nav" class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

                    <div class="flex flex-wrap items-center">
                        <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
                            <a href="#" aria-label="Home">
                                <span class="text-xl pl-2"><i class="em em-grinning"></i></span>
                            </a>
                        </div>
            
                        <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
                            <span class="relative w-full">
                                <input aria-label="search" type="search" id="search" placeholder="Search" class="w-full bg-gray-900 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal">
                                <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
                                    <svg class="fill-current pointer-events-none text-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                                    </svg>
                                </div>
                            </span>
                        </div>
            
                        <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
                            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                                <li class="flex-1 md:flex-none md:mr-3">
                                    <div class="relative inline-block">
                                        <button onclick="toggleDD('myDropdown')" class="drop-button text-white py-2 px-2"> <span class="pr-2"><i class="em em-robot_face"></i></span> Hi, {{ Auth::user()->name }} <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg></button>
                                        <div id="myDropdown" class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-2 overflow-auto z-30 invisible">
                                            <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-user fa-fw"></i> Profile</a>
                                            <div class="border border-gray-800"></div>
                                            {{-- <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a> --}}
                                            <a href="{{ route('logout') }}" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
            
                </nav>
            </header>

            <!-- Page Content -->
            <main>
                <div class="flex flex-col md:flex-row">
                    <nav aria-label="alternative nav">
                        <div class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center">
            
                            <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                                <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                                    <li class="mr-3 flex-1">
                                        <a href="{{ route('dashboard') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800
                                        @if (Route::currentRouteName() == 'dashboard')
                                        border-blue-500
                                        @else
                                        hover:border-blue-500
                                        @endif">
                                            <i class="fas fa-tachometer-alt pr-0 md:pr-3 text-blue-600"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="mr-3 flex-1">
                                        <a href="{{ route('editProfile') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800
                                        @if (Route::currentRouteName() == 'editProfile')
                                        border-blue-500
                                        @else
                                        hover:border-blue-500
                                        @endif">
                                            <i class="fa fa-edit pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Edit Profile</span>
                                        </a>
                                    </li>
                                    <li class="mr-3 flex-1">
                                        <a href="{{ route('changePass') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800
                                        @if (Route::currentRouteName() == 'changePass')
                                        border-blue-500
                                        @else
                                        hover:border-blue-500
                                        @endif">
                                            <i class="fa fa-lock pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Change Password</span>
                                        </a>
                                    </li>
                                    {{-- <li class="mr-3 flex-1">
                                        <a href="{{ route('adduser') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800
                                        @if (Route::currentRouteName() == 'adduser')
                                        border-blue-500
                                        @else
                                        hover:border-blue-500
                                        @endif">
                                            <i class="fas fa-user-plus pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Add User</span>
                                        </a>
                                    </li> --}}
                                    {{-- <li class="mr-3 flex-1">
                                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-blue-600">
                                            <i class="fas fa-users pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">All Users</span>
                                        </a>
                                    </li> --}}
                                    {{-- <li class="mr-3 flex-1">
                                        <a href="{{ route('industries.create') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 
                                        @if (Route::currentRouteName() == 'industries.create')
                                        border-blue-500
                                        @else
                                        hover:border-blue-500
                                        @endif">
                                            <i class="fa fa-plus-circle pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Add Industry</span>
                                        </a>
                                    </li> --}}
                                    <li class="mr-3 flex-1">
                                        <a href="{{ route('industries.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800
                                        @if (Route::currentRouteName() == 'industries.index')
                                        border-blue-500
                                        @else
                                        hover:border-blue-500
                                        @endif">
                                            <i class="fas fa-industry pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">All Industries</span>
                                        </a>
                                    </li>
                                    {{-- <li class="mr-3 flex-1">
                                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-blue-500">
                                            <i class="fa fa-plus pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Add Company</span>
                                        </a>
                                    </li> --}}
                                    <li class="mr-3 flex-1">
                                        <a href="{{ route('companies.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800
                                        @if (Route::currentRouteName() == 'companies.index')
                                        border-blue-500
                                        @else
                                        hover:border-blue-500
                                        @endif">
                                            <i class="fa fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">All Companies</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
            
            
                        </div>
                    </nav>
                    {{ $slot }}
                </div>
            </main>

            <script>
    /*Toggle dropdown list*/
    function toggleDD(myDropMenu) {
        document.getElementById(myDropMenu).classList.toggle("invisible");
    }
    /*Filter dropdown options*/
    function filterDD(myDropMenu, myDropMenuSearch) {
        var input, filter, ul, li, a, i;
        input = document.getElementById(myDropMenuSearch);
        filter = input.value.toUpperCase();
        div = document.getElementById(myDropMenu);
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
            var dropdowns = document.getElementsByClassName("dropdownlist");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (!openDropdown.classList.contains('invisible')) {
                    openDropdown.classList.add('invisible');
                }
            }
        }
    }
</script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $("#email").on("keyup", function () {
            let a = $('#company_name').val();
            let filter = a.replace(/ /g, "");
            let b = $('#industry_id').val();
            let c = $('#email').val();
            let sum = filter + b + c;
            console.log(b);
            $('#unique_id').val(sum);
        })

        $("#company_name").on("keyup", function () {
            let a = $('#company_name').val();
            let filter = a.replace(/ /g, "");
            let b = $('#industry_id').val();
            let c = $('#email').val();
            let sum = filter + b + c;
            console.log(b);
            $('#unique_id').val(sum);
        })

        $("#industry_id").on("change", function () {
            let a = $('#company_name').val();
            let filter = a.replace(/ /g, "");
            let b = $('#industry_id').val();
            let c = $('#email').val();
            let sum = filter + b + c;
            console.log(b);
            $('#unique_id').val(sum);
        })

        })
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

    @stack('scripts')
    </body>
</html>
