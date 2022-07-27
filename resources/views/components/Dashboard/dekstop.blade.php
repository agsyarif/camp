<!-- Desktop sidebar -->
<aside class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto bg-white md:block" aria-label="aside">
    <div class="text-serv-bg">

        <a class="" href="{{ route('index') }}">
            <img src="{{ asset('/assets/images/logo.png') }}" alt="" class="object-center mx-auto my-4 ">
        </a>

        <div class="flex items-center pt-8 pl-5 space-x-2 border-t border-gray-100">
            <!--Author's profile photo-->

            @if (auth()->user()->first()->profile_photo_path != null)
                {{-- <img src="{{ asset(auth()->user()->profile_photo_path) }}" alt="" --}}
                {{-- class="inline ml-3 h-12 w-12 rounded-full"> --}}
                <img src="{{ asset('assets/images/profile/' . Auth::user()->profile_photo_path) }}" alt="profile photo"
                    class="inline ml-3 h-12 w-12 rounded-full">
            @else
                <img class="inline ml-3 h-12 w-12 rounded-full"
                    src="{{ url('https://randomuser.me/api/portraits/men/1.jpg') }}" alt="">
            @endif


            <div>
                <!--Author name-->
                <p class="font-semibold text-gray-900 text-md">{{ Auth::user()->name ?? '' }}</p>
                <p class="text-sm font-light text-serv-text">
                    {{ Auth::user()->user_roles->name ?? '' }}
                </p>
            </div>

        </div>

        @can('isAdmin')
            <ul class="mt-6">

                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (request()->is('admin/dashboard') ||
                        request()->is('admin/dashboard/*') ||
                        request()->is('admin/*/dashboard') ||
                        request()->is('admin/*/dashboard/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>

                        <a class="inline-flex items-center w-full text-sm font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800 "
                            href="{{ route('admin.dashboard.index') }}">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.5 16V9.02123C19.5 7.75027 18.896 6.55494 17.8728 5.80101L12.3728 1.74838C10.9618 0.708674 9.03823 0.708675 7.6272 1.74838L2.1272 5.80101C1.10401 6.55494 0.5 7.75027 0.5 9.02123V16C0.5 18.2091 2.29086 20 4.5 20H5.75C6.57843 20 7.25 19.3284 7.25 18.5V16C7.25 15.1716 7.92157 14.5 8.75 14.5H11.25C12.0784 14.5 12.75 15.1716 12.75 16V18.5C12.75 19.3284 13.4216 20 14.25 20H15.5C17.7091 20 19.5 18.2091 19.5 16Z"
                                    fill="#082431" />
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    @else
                        <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800 "
                            href="{{ route('admin.dashboard.index') }}">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.5 16V9.02123C19.5 7.75027 18.896 6.55494 17.8728 5.80101L12.3728 1.74838C10.9618 0.708674 9.03823 0.708675 7.6272 1.74838L2.1272 5.80101C1.10401 6.55494 0.5 7.75027 0.5 9.02123V16C0.5 18.2091 2.29086 20 4.5 20H5.75C6.57843 20 7.25 19.3284 7.25 18.5V16C7.25 15.1716 7.92157 14.5 8.75 14.5H11.25C12.0784 14.5 12.75 15.1716 12.75 16V18.5C12.75 19.3284 13.4216 20 14.25 20H15.5C17.7091 20 19.5 18.2091 19.5 16Z"
                                    fill="none" stroke="#082431" />
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    @endif

                </li>

                {{-- mentor --}}
                <li class="relative px-6 py-3">
                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (request()->is('admin/mentor-management') ||
                        request()->is('admin/mentor-management/*') ||
                        request()->is('admin/*/mentor-management') ||
                        request()->is('admin/*/mentor-management/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>

                        <a class="inline-flex items-center w-full text-sm font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800"
                            href="{{ route('admin.mentor-management.index') }}">
                            <svg width="28" height="28" class="svg-icon" viewBox="0 0 20 20" fill="none">
                                <path
                                    d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"
                                    fill="#082431">
                                </path>
                            </svg>
                            <!-- Active Icons -->

                            <span class="ml-3">Mentor Management</span>

                        </a>
                    @else
                        <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                            href="{{ route('admin.mentor-management.index') }}">
                            <svg width="28" height="28" class="svg-icon" viewBox="0 0 20 20">
                                <path
                                    d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z">
                                </path>
                            </svg>
                            <!-- Active Icons -->

                            <span class="ml-3">Mentor Management</span>

                        </a>
                    @endif

                </li>

                {{-- all member --}}
                <li class="relative px-6 py-3">
                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (request()->is('admin/member-management') ||
                        request()->is('admin/member-management/*') ||
                        request()->is('admin/*/member-management') ||
                        request()->is('admin/*/member-management/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                        href="{{ route('admin.member-management.index') }}">
                        <svg width="28" height="28" class="svg-icon" viewBox="0 0 20 20">
                            <path
                                d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z">
                            </path>
                        </svg>
                        <!-- Active Icons -->

                        <span class="ml-3">Member Management</span>

                    </a>
                </li>

                {{-- Transaksi --}}
                <li class="relative px-6 py-3">
                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (request()->is('admin/transaction') ||
                        request()->is('admin/transaction/*') ||
                        request()->is('admin/*/transaction') ||
                        request()->is('admin/*/transaction/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                        href="{{ route('admin.transaction.index') }}">
                        <svg width="28" height="28" class="svg-icon" viewBox="0 0 20 20">
                            <path
                                d="M17.237,3.056H2.93c-0.694,0-1.263,0.568-1.263,1.263v8.837c0,0.694,0.568,1.263,1.263,1.263h4.629v0.879c-0.015,0.086-0.183,0.306-0.273,0.423c-0.223,0.293-0.455,0.592-0.293,0.92c0.07,0.139,0.226,0.303,0.577,0.303h4.819c0.208,0,0.696,0,0.862-0.379c0.162-0.37-0.124-0.682-0.374-0.955c-0.089-0.097-0.231-0.252-0.268-0.328v-0.862h4.629c0.694,0,1.263-0.568,1.263-1.263V4.319C18.5,3.625,17.932,3.056,17.237,3.056 M8.053,16.102C8.232,15.862,8.4,15.597,8.4,15.309v-0.89h3.366v0.89c0,0.303,0.211,0.562,0.419,0.793H8.053z M17.658,13.156c0,0.228-0.193,0.421-0.421,0.421H2.93c-0.228,0-0.421-0.193-0.421-0.421v-1.263h15.149V13.156z M17.658,11.052H2.509V4.319c0-0.228,0.193-0.421,0.421-0.421h14.308c0.228,0,0.421,0.193,0.421,0.421V11.052z">
                            </path>
                        </svg>
                        <!-- Active Icons -->

                        <span class="ml-3">Transaksi</span>
                        {{-- <span class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">{{ auth()->user()->order_freelancer()->count() }}</span> --}}

                    </a>
                </li>

                {{-- webinar --}}
                <li class="relative px-6 py-3">
                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (request()->is('admin/webinar') ||
                        request()->is('admin/webinar/*') ||
                        request()->is('admin/*/webinar') ||
                        request()->is('admin/*/webinar/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                        href="{{ route('admin.webinar.index') }}">
                        <svg width="28" height="28" class="svg-icon" viewBox="0 0 20 20">
                            <path
                                d="M17.237,3.056H2.93c-0.694,0-1.263,0.568-1.263,1.263v8.837c0,0.694,0.568,1.263,1.263,1.263h4.629v0.879c-0.015,0.086-0.183,0.306-0.273,0.423c-0.223,0.293-0.455,0.592-0.293,0.92c0.07,0.139,0.226,0.303,0.577,0.303h4.819c0.208,0,0.696,0,0.862-0.379c0.162-0.37-0.124-0.682-0.374-0.955c-0.089-0.097-0.231-0.252-0.268-0.328v-0.862h4.629c0.694,0,1.263-0.568,1.263-1.263V4.319C18.5,3.625,17.932,3.056,17.237,3.056 M8.053,16.102C8.232,15.862,8.4,15.597,8.4,15.309v-0.89h3.366v0.89c0,0.303,0.211,0.562,0.419,0.793H8.053z M17.658,13.156c0,0.228-0.193,0.421-0.421,0.421H2.93c-0.228,0-0.421-0.193-0.421-0.421v-1.263h15.149V13.156z M17.658,11.052H2.509V4.319c0-0.228,0.193-0.421,0.421-0.421h14.308c0.228,0,0.421,0.193,0.421,0.421V11.052z">
                            </path>
                        </svg>
                        <!-- Active Icons -->

                        <span class="ml-3">Webinar</span>
                        {{-- <span class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">{{ auth()->user()->order_freelancer()->count() }}</span> --}}

                    </a>
                </li>

                {{-- role --}}
                <li class="relative px-6 py-3">
                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (request()->is('admin/role') ||
                        request()->is('admin/role/*') ||
                        request()->is('admin/*/role') ||
                        request()->is('admin/*/role/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                        href="#">
                        <svg width="28" height="28" class="svg-icon" viewBox="0 0 20 20">
                            <path
                                d="M10,1.529c-4.679,0-8.471,3.792-8.471,8.471c0,4.68,3.792,8.471,8.471,8.471c4.68,0,8.471-3.791,8.471-8.471C18.471,5.321,14.68,1.529,10,1.529 M10,17.579c-4.18,0-7.579-3.399-7.579-7.579S5.82,2.421,10,2.421S17.579,5.82,17.579,10S14.18,17.579,10,17.579 M14.348,10c0,0.245-0.201,0.446-0.446,0.446h-5c-0.246,0-0.446-0.201-0.446-0.446s0.2-0.446,0.446-0.446h5C14.146,9.554,14.348,9.755,14.348,10 M14.348,12.675c0,0.245-0.201,0.446-0.446,0.446h-5c-0.246,0-0.446-0.201-0.446-0.446s0.2-0.445,0.446-0.445h5C14.146,12.229,14.348,12.43,14.348,12.675 M7.394,10c0,0.245-0.2,0.446-0.446,0.446H6.099c-0.245,0-0.446-0.201-0.446-0.446s0.201-0.446,0.446-0.446h0.849C7.194,9.554,7.394,9.755,7.394,10 M7.394,12.675c0,0.245-0.2,0.446-0.446,0.446H6.099c-0.245,0-0.446-0.201-0.446-0.446s0.201-0.445,0.446-0.445h0.849C7.194,12.229,7.394,12.43,7.394,12.675 M14.348,7.325c0,0.246-0.201,0.446-0.446,0.446h-5c-0.246,0-0.446-0.2-0.446-0.446c0-0.245,0.2-0.446,0.446-0.446h5C14.146,6.879,14.348,7.08,14.348,7.325 M7.394,7.325c0,0.246-0.2,0.446-0.446,0.446H6.099c-0.245,0-0.446-0.2-0.446-0.446c0-0.245,0.201-0.446,0.446-0.446h0.849C7.194,6.879,7.394,7.08,7.394,7.325">
                            </path>
                        </svg>
                        <!-- Active Icons -->

                        <span class="ml-3">Role Management</span>

                    </a>
                </li>

                {{-- menu --}}
                <li class="relative px-6 py-3">
                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (request()->is('admin/menu') ||
                        request()->is('admin/menu/*') ||
                        request()->is('admin/*/menu') ||
                        request()->is('admin/*/menu/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                        href="#">
                        <svg width="28" height="28" class="svg-icon" viewBox="0 0 20 20">
                            <path
                                d="M10,2.172c-4.324,0-7.828,3.504-7.828,7.828S5.676,17.828,10,17.828c4.324,0,7.828-3.504,7.828-7.828S14.324,2.172,10,2.172M10,17.004c-3.863,0-7.004-3.141-7.004-7.003S6.137,2.997,10,2.997c3.862,0,7.004,3.141,7.004,7.004S13.862,17.004,10,17.004M10,8.559c-0.795,0-1.442,0.646-1.442,1.442S9.205,11.443,10,11.443s1.441-0.647,1.441-1.443S10.795,8.559,10,8.559 M10,10.619c-0.34,0-0.618-0.278-0.618-0.618S9.66,9.382,10,9.382S10.618,9.661,10.618,10S10.34,10.619,10,10.619 M14.12,8.559c-0.795,0-1.442,0.646-1.442,1.442s0.647,1.443,1.442,1.443s1.442-0.647,1.442-1.443S14.915,8.559,14.12,8.559 M14.12,10.619c-0.34,0-0.618-0.278-0.618-0.618s0.278-0.618,0.618-0.618S14.738,9.661,14.738,10S14.46,10.619,14.12,10.619 M5.88,8.559c-0.795,0-1.442,0.646-1.442,1.442s0.646,1.443,1.442,1.443S7.322,10.796,7.322,10S6.675,8.559,5.88,8.559 M5.88,10.619c-0.34,0-0.618-0.278-0.618-0.618S5.54,9.382,5.88,9.382S6.498,9.661,6.498,10S6.22,10.619,5.88,10.619">
                            </path>
                        </svg>
                        <!-- Active Icons -->

                        <span class="ml-3">Menu Management</span>

                    </a>
                </li>

                {{-- profil --}}
                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (request()->is('admin/profil') ||
                        request()->is('admin/profil/*') ||
                        request()->is('admin/*/profil') ||
                        request()->is('admin/*/profil/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                        href="{{ route('admin.profile.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="white" />
                            <circle cx="10.5" cy="5.5" r="2.75" stroke="#082431" stroke-width="1.5" />
                            <path
                                d="M3.75 18.2581C3.75 14.6638 6.66376 11.75 10.2581 11.75H11.7419C15.3362 11.75 18.25 14.6638 18.25 18.2581C18.25 18.8059 17.8059 19.25 17.2581 19.25H4.74194C4.1941 19.25 3.75 18.8059 3.75 18.2581Z"
                                stroke="#082431" stroke-width="1.5" />
                            <path
                                d="M17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981L17.9314 19.9848C17.715 20.3596 17.383 20.6541 16.985 20.8241L15.4217 21.4919C15.3603 21.518 15.2911 21.478 15.2831 21.4119L15.0797 19.7241C15.028 19.2944 15.117 18.8596 15.3333 18.4848L17 15.5981L17.75 14.299Z"
                                fill="white" />
                            <path
                                d="M17 15.5981L15.3333 18.4848C15.117 18.8596 15.028 19.2944 15.0797 19.7241L15.2831 21.4119C15.2911 21.478 15.3603 21.518 15.4217 21.4919L16.985 20.8241C17.383 20.6541 17.715 20.3596 17.9314 19.9848L19.5981 17.0981M17 15.5981L17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75V13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981M17 15.5981L19.5981 17.0981"
                                stroke="#082431" stroke-width="1.5" />
                        </svg>
                        <span class="ml-4">My Profile</span>
                    </a>
                </li>

                {{-- Activity Log --}}
                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (request()->is('admin/activity') ||
                        request()->is('admin/activity/*') ||
                        request()->is('admin/*/activity') ||
                        request()->is('admin/*/activity/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                        href="#">
                        <i class="fas fa-chalkboard-teacher fa-lg"></i>
                        <span class="ml-4">Log Activity</span>
                    </a>
                </li>
            </ul>
        @elsecan('isMentor')
            <ul class="mt-6">

                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (request()->is('mentor/dashboard') ||
                        request()->is('mentor/dashboard/*') ||
                        request()->is('mentor/*/dashboard') ||
                        request()->is('mentor/*/dashboard/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800 "
                            href="{{ route('admin.dashboard.index') }}">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.5 16V9.02123C19.5 7.75027 18.896 6.55494 17.8728 5.80101L12.3728 1.74838C10.9618 0.708674 9.03823 0.708675 7.6272 1.74838L2.1272 5.80101C1.10401 6.55494 0.5 7.75027 0.5 9.02123V16C0.5 18.2091 2.29086 20 4.5 20H5.75C6.57843 20 7.25 19.3284 7.25 18.5V16C7.25 15.1716 7.92157 14.5 8.75 14.5H11.25C12.0784 14.5 12.75 15.1716 12.75 16V18.5C12.75 19.3284 13.4216 20 14.25 20H15.5C17.7091 20 19.5 18.2091 19.5 16Z"
                                    fill="#082431" />
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    @else
                        <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                            href="{{ route('mentor.dashboard.index') }}">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.5 16V9.02123C19.5 7.75027 18.896 6.55494 17.8728 5.80101L12.3728 1.74838C10.9618 0.708674 9.03823 0.708675 7.6272 1.74838L2.1272 5.80101C1.10401 6.55494 0.5 7.75027 0.5 9.02123V16C0.5 18.2091 2.29086 20 4.5 20H5.75C6.57843 20 7.25 19.3284 7.25 18.5V16C7.25 15.1716 7.92157 14.5 8.75 14.5H11.25C12.0784 14.5 12.75 15.1716 12.75 16V18.5C12.75 19.3284 13.4216 20 14.25 20H15.5C17.7091 20 19.5 18.2091 19.5 16Z"
                                    fill="#082431" />
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    @endif

                </li>

                {{-- Course --}}
                <li class="relative px-6 py-3">
                    @if (request()->is('mentor/course') ||
                        request()->is('mentor/course/*') ||
                        request()->is('mentor/*/course') ||
                        request()->is('mentor/*/course/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800"
                            href="{{ route('mentor.course.index') }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="#082431"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="3" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="3" y="14" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="14" y="3" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="14" y="14" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                            </svg>
                            <!-- Active Icons -->

                            <span class="ml-4">My Course</span>
                            <span
                                class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">{{ $courses }}</span>
                        </a>
                    @else
                        <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                            href="{{ route('mentor.course.index') }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="3" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="3" y="14" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="14" y="3" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="14" y="14" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                            </svg>
                            <!-- Active Icons -->

                            <span class="ml-4">My Course</span>
                            <span
                                class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">{{ $courses }}</span>
                        </a>
                    @endif

                </li>

                {{-- exam --}}
                <li class="relative px-6 py-3">
                    @if (request()->is('mentor/exam') ||
                        request()->is('mentor/exam/*') ||
                        request()->is('mentor/*/exam') ||
                        request()->is('mentor/*/exam/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800"
                            href="{{ route('mentor.exam.index') }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="#082431"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="3" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="3" y="14" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="14" y="3" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="14" y="14" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                            </svg>
                            <!-- Active Icons -->

                            <span class="ml-4">My Exam</span>
                            <span
                                class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">{{ $exam->count() }}</span>
                        </a>
                    @else
                        <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                            href="{{ route('mentor.exam.index') }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="3" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="3" y="14" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="14" y="3" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="14" y="14" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                            </svg>
                            <!-- Active Icons -->

                            <span class="ml-4">My Exam</span>
                            <span
                                class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">{{ $exam->count() }}</span>
                        </a>
                    @endif

                </li>

                {{-- webinar --}}
                <li class="relative px-6 py-3">
                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (request()->is('mentor/webinar') ||
                        request()->is('mentor/webinar/*') ||
                        request()->is('mentor/*/webinar') ||
                        request()->is('mentor/*/webinar/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                        href="#">
                        <svg width="28" height="28" class="svg-icon" viewBox="0 0 20 20">
                            <path
                                d="M17.237,3.056H2.93c-0.694,0-1.263,0.568-1.263,1.263v8.837c0,0.694,0.568,1.263,1.263,1.263h4.629v0.879c-0.015,0.086-0.183,0.306-0.273,0.423c-0.223,0.293-0.455,0.592-0.293,0.92c0.07,0.139,0.226,0.303,0.577,0.303h4.819c0.208,0,0.696,0,0.862-0.379c0.162-0.37-0.124-0.682-0.374-0.955c-0.089-0.097-0.231-0.252-0.268-0.328v-0.862h4.629c0.694,0,1.263-0.568,1.263-1.263V4.319C18.5,3.625,17.932,3.056,17.237,3.056 M8.053,16.102C8.232,15.862,8.4,15.597,8.4,15.309v-0.89h3.366v0.89c0,0.303,0.211,0.562,0.419,0.793H8.053z M17.658,13.156c0,0.228-0.193,0.421-0.421,0.421H2.93c-0.228,0-0.421-0.193-0.421-0.421v-1.263h15.149V13.156z M17.658,11.052H2.509V4.319c0-0.228,0.193-0.421,0.421-0.421h14.308c0.228,0,0.421,0.193,0.421,0.421V11.052z">
                            </path>
                        </svg>
                        <!-- Active Icons -->

                        <span class="ml-3">Webinar</span>
                        {{-- <span class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">{{ auth()->user()->order_freelancer()->count() }}</span> --}}

                    </a>
                </li>

                {{-- profil --}}
                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (request()->is('mentor/profil') ||
                        request()->is('mentor/profil/*') ||
                        request()->is('mentor/*/profil') ||
                        request()->is('mentor/*/profil/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                        href="{{ route('mentor.profile.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="white" />
                            <circle cx="10.5" cy="5.5" r="2.75" stroke="#082431" stroke-width="1.5" />
                            <path
                                d="M3.75 18.2581C3.75 14.6638 6.66376 11.75 10.2581 11.75H11.7419C15.3362 11.75 18.25 14.6638 18.25 18.2581C18.25 18.8059 17.8059 19.25 17.2581 19.25H4.74194C4.1941 19.25 3.75 18.8059 3.75 18.2581Z"
                                stroke="#082431" stroke-width="1.5" />
                            <path
                                d="M17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981L17.9314 19.9848C17.715 20.3596 17.383 20.6541 16.985 20.8241L15.4217 21.4919C15.3603 21.518 15.2911 21.478 15.2831 21.4119L15.0797 19.7241C15.028 19.2944 15.117 18.8596 15.3333 18.4848L17 15.5981L17.75 14.299Z"
                                fill="white" />
                            <path
                                d="M17 15.5981L15.3333 18.4848C15.117 18.8596 15.028 19.2944 15.0797 19.7241L15.2831 21.4119C15.2911 21.478 15.3603 21.518 15.4217 21.4919L16.985 20.8241C17.383 20.6541 17.715 20.3596 17.9314 19.9848L19.5981 17.0981M17 15.5981L17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75V13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981M17 15.5981L19.5981 17.0981"
                                stroke="#082431" stroke-width="1.5" />
                        </svg>
                        <span class="ml-4">My Profile</span>
                    </a>
                </li>

                {{-- Activity Log --}}
                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (request()->is('admin/activity') ||
                        request()->is('admin/activity/*') ||
                        request()->is('admin/*/activity') ||
                        request()->is('admin/*/activity/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                        href="#">
                        <i class="fas fa-chalkboard-teacher fa-lg"></i>
                        <span class="ml-4">Log Activity</span>
                    </a>
                </li>
            </ul>
        @elsecan('isMember')
            <ul>
                {{-- Dashboard --}}
                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (request()->is('member/dashboard') ||
                        request()->is('member/dashboard/*') ||
                        request()->is('member/*/dashboard') ||
                        request()->is('member/*/dashboard/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800 "
                            href="{{ route('member.dashboard.index') }}">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.5 16V9.02123C19.5 7.75027 18.896 6.55494 17.8728 5.80101L12.3728 1.74838C10.9618 0.708674 9.03823 0.708675 7.6272 1.74838L2.1272 5.80101C1.10401 6.55494 0.5 7.75027 0.5 9.02123V16C0.5 18.2091 2.29086 20 4.5 20H5.75C6.57843 20 7.25 19.3284 7.25 18.5V16C7.25 15.1716 7.92157 14.5 8.75 14.5H11.25C12.0784 14.5 12.75 15.1716 12.75 16V18.5C12.75 19.3284 13.4216 20 14.25 20H15.5C17.7091 20 19.5 18.2091 19.5 16Z"
                                    fill="#082431" />
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    @else
                        <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                            href="{{ route('member.dashboard.index') }}">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.5 16V9.02123C19.5 7.75027 18.896 6.55494 17.8728 5.80101L12.3728 1.74838C10.9618 0.708674 9.03823 0.708675 7.6272 1.74838L2.1272 5.80101C1.10401 6.55494 0.5 7.75027 0.5 9.02123V16C0.5 18.2091 2.29086 20 4.5 20H5.75C6.57843 20 7.25 19.3284 7.25 18.5V16C7.25 15.1716 7.92157 14.5 8.75 14.5H11.25C12.0784 14.5 12.75 15.1716 12.75 16V18.5C12.75 19.3284 13.4216 20 14.25 20H15.5C17.7091 20 19.5 18.2091 19.5 16Z"
                                    fill="#082431" />
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    @endif

                </li>

                {{-- Progress Belajar --}}
                <li class="relative px-6 py-3">
                    @if (request()->is('member/progress') ||
                        request()->is('member/Progress/*') ||
                        request()->is('member/*/progress') ||
                        request()->is('member/*/progress/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800"
                            href="{{ route('member.progress.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256"
                                xml:space="preserve">
                                <path fill="#082431"
                                    d="m234.615 129.434-44.388 8.464c-2.088.398-2.813 3.018-1.227 4.433l10.928 9.753a2.565 2.565 0 0 1 .15 3.682l-50.982 53.553a4.052 4.052 0 0 1-2.936 1.259H75.863c-2.635 0-5.202.837-7.33 2.393l-46.917 34.29c-1.43 1.045-1.973 3.022-1.08 4.552a3.393 3.393 0 0 0 4.678 1.204l48.448-29.069a4.944 4.944 0 0 1 2.8-.699l72.543 3.72a17.972 17.972 0 0 0 13.429-5.043l53.775-52.121a2.565 2.565 0 0 1 3.493-.072l10.302 9.195c1.586 1.416 4.107.398 4.266-1.722l3.381-45.062a2.562 2.562 0 0 0-3.036-2.71z" />
                                <path fill="#082431"
                                    d="m155.494 113.02-7.241-3.446a1.584 1.584 0 0 1-.505 1.049l-14.665 13.701a3.756 3.756 0 0 1-.62.46c1.212.453 2.326.862 3.201 1.172a1.134 1.134 0 0 1 .365 1.924l-24.092 21.086c.564.473.827 1.283.487 2.05-.228.515-.549 1.173-.814 1.91-.845 2.355.371 5.008 2.709 5.896l6.457 2.453 35.69-29.442c7.061-5.957 5.521-15.796-.972-18.813z" />
                                <path fill="#082431"
                                    d="m147.319 107.993-15.079-7.306a5.89 5.89 0 0 1-4.028 1.887c-6.606.348-15.86-2.885-20.145-4.962a3.733 3.733 0 0 1-2.051-2.637l-3.316 4.159c-4.855 6.088-1.168 15.565 6.235 17.979l20.227 8.012a3.83 3.83 0 0 0 3.922-.8l14.665-13.701a1.604 1.604 0 0 0-.43-2.631z" />
                                <path fill="#082431"
                                    d="M108.934 117.113c-5.532-1.805-8.986-7.553-8.353-12.884L88.523 121.47a2.55 2.55 0 0 0 .708 3.604l14.372 9.261a2.549 2.549 0 0 0 3.306-.472l11.338-13.062-9.313-3.688z" />
                                <path fill="#082431"
                                    d="m103.603 134.335-14.372-9.261a2.526 2.526 0 0 1-.654-.623l-.797 1.145a23.618 23.618 0 0 1-4.056 4.474l-24.678 21.041c.94.343 1.465 1.451.963 2.432-.257.501-.615 1.14-.921 1.861-.977 2.303.086 5.021 2.371 6.04l6.308 2.815 27.287-20.783a42.96 42.96 0 0 0 6.776-6.437c.656-.776 1.383-1.633 2.133-2.516a2.52 2.52 0 0 1-.36-.188z" />
                                <path fill="#082431"
                                    d="m64.059 146.837-5.012 4.274c.94.343 1.465 1.451.963 2.432-.257.501-.615 1.14-.921 1.861-.977 2.303.086 5.021 2.371 6.04l6.308 2.815 7.137-5.437c-3.305-3.712-7.976-8.927-10.846-11.985zM117.113 144.438l-5.176 4.53c.564.473.827 1.283.487 2.05-.228.515-.549 1.173-.814 1.91-.845 2.355.371 5.008 2.709 5.896l6.457 2.453 6.613-5.456a3300.398 3300.398 0 0 0-10.276-11.383z" />
                                <circle transform="rotate(-75.416 157.809 30.295)" fill="#082431" cx="157.809"
                                    cy="30.297" r="15.669" />
                                <path
                                    d="M174.668 23.523a18.053 18.053 0 0 0-9.729-9.938 18.037 18.037 0 0 0-13.905-.147 18.046 18.046 0 0 0-9.937 9.728 18.046 18.046 0 0 0-.148 13.905 18.051 18.051 0 0 0 9.728 9.938 18.116 18.116 0 0 0 7.128 1.468c2.292 0 4.586-.439 6.777-1.32 9.297-3.736 13.822-14.338 10.086-23.634zm-11.949 18.995a13.089 13.089 0 0 1-10.079-.107 13.086 13.086 0 0 1-7.051-7.202c-1.312-3.265-1.273-6.844.107-10.079s3.938-5.74 7.203-7.052a13.154 13.154 0 0 1 4.912-.956c1.753 0 3.505.354 5.167 1.063a13.08 13.08 0 0 1 7.051 7.202c2.707 6.738-.572 14.423-7.31 17.131z" />
                                <path fill="#082431"
                                    d="m145.156 49.132-26.212-8.44a2.762 2.762 0 0 0-3.52 1.934l-4.325 16.62a2.763 2.763 0 0 0 1.79 3.313l8.912 3.006a1.367 1.367 0 0 1 .766 1.944L106.38 92.473c-1.026 1.902-.261 4.196 1.684 5.139 4.285 2.077 13.539 5.31 20.145 4.962a5.86 5.86 0 0 0 4.872-3.068l18.513-35.451c3.074-5.398-.418-13.039-6.438-14.923z" />
                                <path fill="#082431"
                                    d="M163.891 75.939 152.68 58.652c.184 1.858-.135 3.737-1.083 5.403l-11.103 21.261 4.132 6.561a3.007 3.007 0 0 0 4.547.639l14.201-12.702a3.006 3.006 0 0 0 .517-3.875z" />
                                <path fill="#082431"
                                    d="m195.077 82.735-31.79-.584-.91-1.446-13.099 11.716 1.841 2.922a8.665 8.665 0 0 0 7.172 4.046l36.468.669c.293.005.582-.004.868-.027a8.663 8.663 0 0 0-.55-17.296zM109.954 41.287a8.733 8.733 0 0 0-8.207 1.547L73.28 66.092a8.732 8.732 0 0 0 11.048 13.524l24.784-20.25 1.91.617c-.004-.244.013-.49.077-.737l4.222-16.226-5.367-1.733z" />
                                <path fill="#082431"
                                    d="M118.945 40.692a2.762 2.762 0 0 0-3.52 1.934l-4.325 16.62a2.763 2.763 0 0 0 1.79 3.313l8.912 3.006c.56.189.9.699.922 1.242l4.823-2.444a29.026 29.026 0 0 0 13.309-13.889l1.08-2.378-22.991-7.404z" />
                                <path
                                    d="M154.29 54.785c-1.521-3.864-4.653-6.867-8.377-8.036l-26.201-8.438a5.299 5.299 0 0 0-4.146.397 5.287 5.287 0 0 0-2.559 3.287l-4.324 16.62a5.28 5.28 0 0 0 3.411 6.312l7.525 2.538-15.333 23.646a2.338 2.338 0 0 0-.103.174 6.17 6.17 0 0 0-.458 4.863c.527 1.633 1.682 2.951 3.252 3.713 4.49 2.176 13.345 5.236 20.239 5.236.382 0 .758-.01 1.127-.029a8.417 8.417 0 0 0 6.957-4.406l18.47-35.371c1.749-3.073 1.938-6.902.52-10.506zm-4.909 8.113L130.88 98.325c-.554 1.034-1.601 1.688-2.8 1.752-6.034.31-14.812-2.723-18.922-4.714a1.279 1.279 0 0 1-.675-.75 1.185 1.185 0 0 1 .066-.886l16.118-24.858a2.78 2.78 0 0 0 .104-.175 3.86 3.86 0 0 0 .193-3.254 3.86 3.86 0 0 0-2.361-2.245l-8.912-3.006a.262.262 0 0 1-.169-.313l4.324-16.62a.254.254 0 0 1 .128-.165.258.258 0 0 1 .207-.02l26.211 8.44a.505.505 0 0 0 .02.006c2.299.72 4.253 2.626 5.228 5.1.859 2.19.781 4.449-.259 6.281z" />
                                <path
                                    d="m165.989 74.578-11.03-17.008a2.501 2.501 0 0 0-4.195 2.721l11.03 17.008c.137.211.1.484-.087.652l-14.201 12.702a.49.49 0 0 1-.406.123.49.49 0 0 1-.358-.23l-3.854-6.121a2.5 2.5 0 0 0-4.232 2.664l3.854 6.121a5.494 5.494 0 0 0 4.664 2.572 5.492 5.492 0 0 0 3.665-1.401l14.2-12.701a5.48 5.48 0 0 0 .95-7.102z" />
                                <path
                                    d="M202.955 83.649a11.098 11.098 0 0 0-7.832-3.414l-30.44-.559-.03-.048a2.5 2.5 0 0 0-4.232 2.664l.75 1.19a2.502 2.502 0 0 0 2.07 1.168l31.79.584a6.118 6.118 0 0 1 4.324 1.885 6.12 6.12 0 0 1 1.725 4.39 6.138 6.138 0 0 1-6.275 6.049l-36.468-.669a6.146 6.146 0 0 1-5.103-2.878l-1.685-2.675a2.5 2.5 0 1 0-4.23 2.664l1.684 2.675a11.134 11.134 0 0 0 9.242 5.214l36.464.668.226.003a11.12 11.12 0 0 0 11.144-10.959 11.09 11.09 0 0 0-3.124-7.952zM115.595 40.481l-4.874-1.574a11.172 11.172 0 0 0-10.556 1.991L71.698 64.156c-4.796 3.918-5.509 11.007-1.591 15.804a11.243 11.243 0 0 0 9.612 4.089 11.18 11.18 0 0 0 6.191-2.498l23.73-19.388.236.076a2.498 2.498 0 1 0 1.537-4.757l-1.532-.495a2.5 2.5 0 0 0-2.35.443L82.747 77.679a6.196 6.196 0 0 1-3.432 1.386 6.24 6.24 0 0 1-5.336-2.269 6.24 6.24 0 0 1 .882-8.769l28.468-23.258a6.207 6.207 0 0 1 5.856-1.104l4.873 1.574a2.5 2.5 0 0 0 1.537-4.758zM142.874 46.032a2.5 2.5 0 0 0-3.31 1.242l-.983 2.165a26.627 26.627 0 0 1-12.163 12.693l-4.667 2.365a2.5 2.5 0 1 0 2.26 4.459l4.667-2.364a31.652 31.652 0 0 0 14.455-15.085l.983-2.165a2.5 2.5 0 0 0-1.242-3.31z" />
                                <path fill="#082431"
                                    d="M75.518 186.296c-1.753-2.709-3.334-6.512-3.735-10.025l-.881-7.73a5.352 5.352 0 0 0-3.136-4.281l-6.309-2.816c-2.281-1.018-3.357-3.672-2.396-5.978.311-.746.683-1.407.947-1.923.635-1.238-.359-2.701-1.771-2.538l-12.108 4.352c-1.754.939-2.223 3.045-1.117 4.641l16.653 24.025c4.688 6.764 9.724 6.654 11.772 6.255 1.938-.378 3.064-2.464 2.081-3.982z" />
                                <path
                                    d="M77.617 184.938c-1.744-2.695-3.027-6.124-3.35-8.95l-.881-7.729a7.886 7.886 0 0 0-4.601-6.282l-6.309-2.815c-1.044-.466-1.541-1.691-1.107-2.731.198-.475.443-.94.659-1.352l.206-.394a4.243 4.243 0 0 0-.288-4.359 4.237 4.237 0 0 0-3.992-1.803 2.42 2.42 0 0 0-.561.131l-12.107 4.353a2.48 2.48 0 0 0-.333.148c-1.453.777-2.502 2.116-2.878 3.674-.377 1.563-.055 3.238.885 4.594l16.653 24.025c4.348 6.273 9.154 7.482 12.213 7.482.847 0 1.561-.093 2.093-.196 1.826-.357 3.342-1.572 4.056-3.251.65-1.533.52-3.188-.358-4.545zm-4.656 2.886c-1.488.293-5.366.361-9.239-5.226l-16.653-24.025c-.167-.241-.165-.445-.134-.573a.633.633 0 0 1 .266-.37l9.714-3.492c-.054.119-.107.241-.159.366-1.469 3.523.184 7.661 3.685 9.223l6.308 2.814a2.864 2.864 0 0 1 1.671 2.282l.881 7.73c.406 3.563 1.92 7.668 4.057 11.004a.59.59 0 0 1-.397.267z" />
                                <path fill="#082431"
                                    d="M129.764 182.84c-1.904-2.605-3.698-6.313-4.297-9.798l-1.317-7.668a5.35 5.35 0 0 0-3.373-4.096l-6.458-2.454c-2.335-.887-3.56-3.476-2.731-5.832.268-.763.602-1.444.836-1.974.563-1.272-.511-2.676-1.912-2.434l-11.841 5.031c-1.698 1.037-2.047 3.166-.852 4.696l17.988 23.043c5.064 6.487 10.086 6.093 12.107 5.578 1.911-.486 2.916-2.633 1.85-4.092z" />
                                <path
                                    d="M131.782 181.365c-1.894-2.593-3.37-5.943-3.851-8.746l-1.317-7.67a7.888 7.888 0 0 0-4.949-6.009l-6.459-2.454c-1.069-.406-1.634-1.602-1.26-2.665.17-.482.387-.958.578-1.378l.186-.413a4.244 4.244 0 0 0-.535-4.336 4.257 4.257 0 0 0-4.088-1.574 2.512 2.512 0 0 0-.551.163l-11.841 5.031a2.707 2.707 0 0 0-.326.167c-1.406.859-2.377 2.256-2.664 3.833-.288 1.582.129 3.235 1.144 4.535l17.988 23.043c4.37 5.599 8.889 6.797 11.957 6.796 1.141 0 2.082-.165 2.739-.332 1.803-.46 3.249-1.76 3.866-3.477.56-1.565.336-3.21-.617-4.514zm-4.484 3.146c-1.471.369-5.339.663-9.521-4.694l-17.988-23.043c-.18-.231-.19-.435-.166-.564a.64.64 0 0 1 .244-.386l9.5-4.036a13.4 13.4 0 0 0-.138.374c-1.267 3.602.618 7.639 4.201 8.999l6.458 2.454a2.862 2.862 0 0 1 1.798 2.182l1.317 7.669c.607 3.535 2.352 7.548 4.674 10.757a.592.592 0 0 1-.379.288z" />
                                <path
                                    d="M163.484 120.485c-.582-4.346-3.175-7.984-6.917-9.724l-6.669-3.174a2.5 2.5 0 1 0-2.149 4.516l6.69 3.184c2.206 1.024 3.734 3.216 4.088 5.861.434 3.241-.906 6.44-3.653 8.759l-35.342 29.154a2.501 2.501 0 0 0 3.181 3.858l35.363-29.173c4.042-3.409 6.063-8.366 5.408-13.261z" />
                                <path
                                    d="M138.853 126.341a3.597 3.597 0 0 0-2.354-2.74 200.99 200.99 0 0 1-2.708-.988 2.5 2.5 0 0 0-1.743 4.686l.598.223-22.08 19.326a2.5 2.5 0 1 0 3.293 3.762l23.816-20.846a3.655 3.655 0 0 0 1.178-3.423z" />
                                <path
                                    d="M150.704 108.79c-.222-1.354-1.099-2.503-2.295-3.047l-14.616-7.081a2.5 2.5 0 0 0-2.18 4.5l13.473 6.526-13.71 12.809c-.367.345-.888.451-1.295.303l-20.227-8.011c-.048-.02-.096-.036-.145-.053-2.96-.966-5.379-3.498-6.311-6.608-.811-2.708-.354-5.418 1.255-7.436l3.197-4.009a2.5 2.5 0 0 0-3.909-3.118l-3.197 4.009c-2.646 3.318-3.424 7.688-2.136 11.987 1.388 4.631 5.013 8.418 9.473 9.902l20.223 8.008a6.304 6.304 0 0 0 6.485-1.321l14.666-13.702a4.091 4.091 0 0 0 1.249-3.658z" />
                                <path
                                    d="M119.534 119.319a2.498 2.498 0 0 0-3.526.249l-11.051 12.665-14.385-9.33 11.987-17.142a2.5 2.5 0 0 0-4.097-2.865l-11.987 17.142a5.005 5.005 0 0 0-.817 3.867 5.007 5.007 0 0 0 2.22 3.271l14.371 9.26a5.008 5.008 0 0 0 2.725.799c1.426 0 2.84-.597 3.824-1.732l10.986-12.656a2.502 2.502 0 0 0-.25-3.528z" />
                                <path
                                    d="M105.197 133.07a2.498 2.498 0 0 0-3.523.287l-1.753 2.067a40.51 40.51 0 0 1-6.381 6.062l-26.962 20.536a2.5 2.5 0 1 0 3.03 3.978l26.962-20.536a45.46 45.46 0 0 0 7.169-6.812l1.746-2.06a2.498 2.498 0 0 0-.288-3.522zM89.729 122.795a2.502 2.502 0 0 0-3.48.625l-.521.749a21.115 21.115 0 0 1-3.625 3.999l-24.289 20.709a2.5 2.5 0 1 0 3.244 3.804l24.289-20.709a26.09 26.09 0 0 0 4.486-4.948l.521-.749a2.501 2.501 0 0 0-.625-3.48z" />
                                <path
                                    d="M76.534 156.894c-3.129-3.515-7.455-8.342-10.296-11.387a2.5 2.5 0 0 0-3.655 3.412c2.808 3.009 7.106 7.805 10.217 11.299.494.555 1.18.838 1.868.838a2.5 2.5 0 0 0 1.866-4.162zM128.96 153.829c-3.237-3.6-6.484-7.198-9.635-10.674a2.5 2.5 0 0 0-3.704 3.359c3.146 3.47 6.389 7.063 9.622 10.658a2.493 2.493 0 0 0 1.86.828 2.498 2.498 0 0 0 1.857-4.171z" />
                                <g>
                                    <path
                                        d="M238.466 128.174a5.037 5.037 0 0 0-4.32-1.196l-44.387 8.465c-1.907.363-3.415 1.751-3.933 3.622s.06 3.838 1.509 5.132l10.932 9.846-50.981 53.553a1.56 1.56 0 0 1-1.126.482H75.863c-3.188 0-6.232.994-8.805 2.875l-46.917 34.29c-2.491 1.82-3.265 5.261-1.763 7.831a5.85 5.85 0 0 0 3.627 2.741 5.854 5.854 0 0 0 4.496-.654l48.45-29.069c.417-.25.896-.372 1.384-.345l72.542 3.72a20.554 20.554 0 0 0 15.297-5.746l53.864-52.122 10.302 9.195a5.035 5.035 0 0 0 5.269.918 5.037 5.037 0 0 0 3.155-4.317l3.381-45.063a5.025 5.025 0 0 0-1.679-4.158zm-6.693 48.878-.103.011-10.303-9.196a5.086 5.086 0 0 0-6.896.144l-53.776 52.12a15.523 15.523 0 0 1-11.561 4.342l-72.542-3.72a7.479 7.479 0 0 0-4.215 1.053L23.93 250.873a.889.889 0 0 1-1.234-.32c-.218-.374-.037-.956.396-1.272l46.917-34.291a9.855 9.855 0 0 1 5.854-1.911h70.296a6.585 6.585 0 0 0 4.746-2.034l50.981-53.553a5.024 5.024 0 0 0 1.393-3.697 5.023 5.023 0 0 0-1.688-3.574l-10.951-9.776.054-.088 44.388-8.465.076.067-3.385 45.093z" />
                                </g>
                                <g>
                                    <path fill="#082431"
                                        d="M115.227 20.025c-4.5-.8-8-4.3-8.9-8.7 0-.2-.4-.2-.4 0-.9 4.4-4.4 7.9-8.9 8.7-.2 0-.2.3 0 .4 4.5.8 8 4.3 8.9 8.7 0 .2.4.2.4 0 .9-4.4 4.4-7.9 8.9-8.7.2-.1.2-.4 0-.4z" />
                                </g>
                                <g>
                                    <path fill="#082431"
                                        d="M213.894 114.083c-3.192-.567-5.675-3.05-6.313-6.171 0-.142-.284-.142-.284 0-.638 3.121-3.121 5.604-6.313 6.171-.142 0-.142.213 0 .284 3.192.568 5.675 3.05 6.313 6.171 0 .142.284.142.284 0 .638-3.121 3.121-5.604 6.313-6.171.141-.071.141-.284 0-.284z" />
                                </g>
                                <g>
                                    <path fill="#082431"
                                        d="M94.514 244.1h-2.3v-2.3c0-1.8-1.4-3.2-3.2-3.2s-3.2 1.5-3.2 3.2v2.3h-2.3c-1.8 0-3.2 1.4-3.2 3.2 0 1.8 1.5 3.2 3.2 3.2h2.3v2.3c0 1.8 1.4 3.2 3.2 3.2s3.2-1.5 3.2-3.2v-2.3h2.3c1.8 0 3.2-1.4 3.2-3.2 0-1.8-1.5-3.2-3.2-3.2z" />
                                </g>
                                <g>
                                    <path fill="#082431" d="M129.127 0a3.4 3.4 0 1 0 0 6.8 3.4 3.4 0 0 0 0-6.8z" />
                                </g>
                                <g>
                                    <path fill="#082431" d="M117.914 235.825a3.4 3.4 0 1 0 0 6.8 3.4 3.4 0 0 0 0-6.8z" />
                                </g>
                            </svg>
                            <!-- Active Icons -->

                            <span class="ml-4">Progress Belajar</span>
                            {{-- <span --}}
                            {{-- class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">{{ $c }}</span> --}}
                        </a>
                    @else
                        <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                            href="{{ route('member.progress.index') }}">

                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256"
                                xml:space="preserve">
                                <path fill="#ffffff"
                                    d="m234.615 129.434-44.388 8.464c-2.088.398-2.813 3.018-1.227 4.433l10.928 9.753a2.565 2.565 0 0 1 .15 3.682l-50.982 53.553a4.052 4.052 0 0 1-2.936 1.259H75.863c-2.635 0-5.202.837-7.33 2.393l-46.917 34.29c-1.43 1.045-1.973 3.022-1.08 4.552a3.393 3.393 0 0 0 4.678 1.204l48.448-29.069a4.944 4.944 0 0 1 2.8-.699l72.543 3.72a17.972 17.972 0 0 0 13.429-5.043l53.775-52.121a2.565 2.565 0 0 1 3.493-.072l10.302 9.195c1.586 1.416 4.107.398 4.266-1.722l3.381-45.062a2.562 2.562 0 0 0-3.036-2.71z" />
                                <path fill="#ffffff"
                                    d="m155.494 113.02-7.241-3.446a1.584 1.584 0 0 1-.505 1.049l-14.665 13.701a3.756 3.756 0 0 1-.62.46c1.212.453 2.326.862 3.201 1.172a1.134 1.134 0 0 1 .365 1.924l-24.092 21.086c.564.473.827 1.283.487 2.05-.228.515-.549 1.173-.814 1.91-.845 2.355.371 5.008 2.709 5.896l6.457 2.453 35.69-29.442c7.061-5.957 5.521-15.796-.972-18.813z" />
                                <path fill="#ffffff"
                                    d="m147.319 107.993-15.079-7.306a5.89 5.89 0 0 1-4.028 1.887c-6.606.348-15.86-2.885-20.145-4.962a3.733 3.733 0 0 1-2.051-2.637l-3.316 4.159c-4.855 6.088-1.168 15.565 6.235 17.979l20.227 8.012a3.83 3.83 0 0 0 3.922-.8l14.665-13.701a1.604 1.604 0 0 0-.43-2.631z" />
                                <path fill="#ffffff"
                                    d="M108.934 117.113c-5.532-1.805-8.986-7.553-8.353-12.884L88.523 121.47a2.55 2.55 0 0 0 .708 3.604l14.372 9.261a2.549 2.549 0 0 0 3.306-.472l11.338-13.062-9.313-3.688z" />
                                <path fill="#ffffff"
                                    d="m103.603 134.335-14.372-9.261a2.526 2.526 0 0 1-.654-.623l-.797 1.145a23.618 23.618 0 0 1-4.056 4.474l-24.678 21.041c.94.343 1.465 1.451.963 2.432-.257.501-.615 1.14-.921 1.861-.977 2.303.086 5.021 2.371 6.04l6.308 2.815 27.287-20.783a42.96 42.96 0 0 0 6.776-6.437c.656-.776 1.383-1.633 2.133-2.516a2.52 2.52 0 0 1-.36-.188z" />
                                <path fill="#ffffff"
                                    d="m64.059 146.837-5.012 4.274c.94.343 1.465 1.451.963 2.432-.257.501-.615 1.14-.921 1.861-.977 2.303.086 5.021 2.371 6.04l6.308 2.815 7.137-5.437c-3.305-3.712-7.976-8.927-10.846-11.985zM117.113 144.438l-5.176 4.53c.564.473.827 1.283.487 2.05-.228.515-.549 1.173-.814 1.91-.845 2.355.371 5.008 2.709 5.896l6.457 2.453 6.613-5.456a3300.398 3300.398 0 0 0-10.276-11.383z" />
                                <circle transform="rotate(-75.416 157.809 30.295)" fill="#ffffff" cx="157.809"
                                    cy="30.297" r="15.669" />
                                <path
                                    d="M174.668 23.523a18.053 18.053 0 0 0-9.729-9.938 18.037 18.037 0 0 0-13.905-.147 18.046 18.046 0 0 0-9.937 9.728 18.046 18.046 0 0 0-.148 13.905 18.051 18.051 0 0 0 9.728 9.938 18.116 18.116 0 0 0 7.128 1.468c2.292 0 4.586-.439 6.777-1.32 9.297-3.736 13.822-14.338 10.086-23.634zm-11.949 18.995a13.089 13.089 0 0 1-10.079-.107 13.086 13.086 0 0 1-7.051-7.202c-1.312-3.265-1.273-6.844.107-10.079s3.938-5.74 7.203-7.052a13.154 13.154 0 0 1 4.912-.956c1.753 0 3.505.354 5.167 1.063a13.08 13.08 0 0 1 7.051 7.202c2.707 6.738-.572 14.423-7.31 17.131z" />
                                <path fill="#ffffff"
                                    d="m145.156 49.132-26.212-8.44a2.762 2.762 0 0 0-3.52 1.934l-4.325 16.62a2.763 2.763 0 0 0 1.79 3.313l8.912 3.006a1.367 1.367 0 0 1 .766 1.944L106.38 92.473c-1.026 1.902-.261 4.196 1.684 5.139 4.285 2.077 13.539 5.31 20.145 4.962a5.86 5.86 0 0 0 4.872-3.068l18.513-35.451c3.074-5.398-.418-13.039-6.438-14.923z" />
                                <path fill="#ffffff"
                                    d="M163.891 75.939 152.68 58.652c.184 1.858-.135 3.737-1.083 5.403l-11.103 21.261 4.132 6.561a3.007 3.007 0 0 0 4.547.639l14.201-12.702a3.006 3.006 0 0 0 .517-3.875z" />
                                <path fill="#ffffff"
                                    d="m195.077 82.735-31.79-.584-.91-1.446-13.099 11.716 1.841 2.922a8.665 8.665 0 0 0 7.172 4.046l36.468.669c.293.005.582-.004.868-.027a8.663 8.663 0 0 0-.55-17.296zM109.954 41.287a8.733 8.733 0 0 0-8.207 1.547L73.28 66.092a8.732 8.732 0 0 0 11.048 13.524l24.784-20.25 1.91.617c-.004-.244.013-.49.077-.737l4.222-16.226-5.367-1.733z" />
                                <path fill="#ffffff"
                                    d="M118.945 40.692a2.762 2.762 0 0 0-3.52 1.934l-4.325 16.62a2.763 2.763 0 0 0 1.79 3.313l8.912 3.006c.56.189.9.699.922 1.242l4.823-2.444a29.026 29.026 0 0 0 13.309-13.889l1.08-2.378-22.991-7.404z" />
                                <path
                                    d="M154.29 54.785c-1.521-3.864-4.653-6.867-8.377-8.036l-26.201-8.438a5.299 5.299 0 0 0-4.146.397 5.287 5.287 0 0 0-2.559 3.287l-4.324 16.62a5.28 5.28 0 0 0 3.411 6.312l7.525 2.538-15.333 23.646a2.338 2.338 0 0 0-.103.174 6.17 6.17 0 0 0-.458 4.863c.527 1.633 1.682 2.951 3.252 3.713 4.49 2.176 13.345 5.236 20.239 5.236.382 0 .758-.01 1.127-.029a8.417 8.417 0 0 0 6.957-4.406l18.47-35.371c1.749-3.073 1.938-6.902.52-10.506zm-4.909 8.113L130.88 98.325c-.554 1.034-1.601 1.688-2.8 1.752-6.034.31-14.812-2.723-18.922-4.714a1.279 1.279 0 0 1-.675-.75 1.185 1.185 0 0 1 .066-.886l16.118-24.858a2.78 2.78 0 0 0 .104-.175 3.86 3.86 0 0 0 .193-3.254 3.86 3.86 0 0 0-2.361-2.245l-8.912-3.006a.262.262 0 0 1-.169-.313l4.324-16.62a.254.254 0 0 1 .128-.165.258.258 0 0 1 .207-.02l26.211 8.44a.505.505 0 0 0 .02.006c2.299.72 4.253 2.626 5.228 5.1.859 2.19.781 4.449-.259 6.281z" />
                                <path
                                    d="m165.989 74.578-11.03-17.008a2.501 2.501 0 0 0-4.195 2.721l11.03 17.008c.137.211.1.484-.087.652l-14.201 12.702a.49.49 0 0 1-.406.123.49.49 0 0 1-.358-.23l-3.854-6.121a2.5 2.5 0 0 0-4.232 2.664l3.854 6.121a5.494 5.494 0 0 0 4.664 2.572 5.492 5.492 0 0 0 3.665-1.401l14.2-12.701a5.48 5.48 0 0 0 .95-7.102z" />
                                <path
                                    d="M202.955 83.649a11.098 11.098 0 0 0-7.832-3.414l-30.44-.559-.03-.048a2.5 2.5 0 0 0-4.232 2.664l.75 1.19a2.502 2.502 0 0 0 2.07 1.168l31.79.584a6.118 6.118 0 0 1 4.324 1.885 6.12 6.12 0 0 1 1.725 4.39 6.138 6.138 0 0 1-6.275 6.049l-36.468-.669a6.146 6.146 0 0 1-5.103-2.878l-1.685-2.675a2.5 2.5 0 1 0-4.23 2.664l1.684 2.675a11.134 11.134 0 0 0 9.242 5.214l36.464.668.226.003a11.12 11.12 0 0 0 11.144-10.959 11.09 11.09 0 0 0-3.124-7.952zM115.595 40.481l-4.874-1.574a11.172 11.172 0 0 0-10.556 1.991L71.698 64.156c-4.796 3.918-5.509 11.007-1.591 15.804a11.243 11.243 0 0 0 9.612 4.089 11.18 11.18 0 0 0 6.191-2.498l23.73-19.388.236.076a2.498 2.498 0 1 0 1.537-4.757l-1.532-.495a2.5 2.5 0 0 0-2.35.443L82.747 77.679a6.196 6.196 0 0 1-3.432 1.386 6.24 6.24 0 0 1-5.336-2.269 6.24 6.24 0 0 1 .882-8.769l28.468-23.258a6.207 6.207 0 0 1 5.856-1.104l4.873 1.574a2.5 2.5 0 0 0 1.537-4.758zM142.874 46.032a2.5 2.5 0 0 0-3.31 1.242l-.983 2.165a26.627 26.627 0 0 1-12.163 12.693l-4.667 2.365a2.5 2.5 0 1 0 2.26 4.459l4.667-2.364a31.652 31.652 0 0 0 14.455-15.085l.983-2.165a2.5 2.5 0 0 0-1.242-3.31z" />
                                <path fill="#ffffff"
                                    d="M75.518 186.296c-1.753-2.709-3.334-6.512-3.735-10.025l-.881-7.73a5.352 5.352 0 0 0-3.136-4.281l-6.309-2.816c-2.281-1.018-3.357-3.672-2.396-5.978.311-.746.683-1.407.947-1.923.635-1.238-.359-2.701-1.771-2.538l-12.108 4.352c-1.754.939-2.223 3.045-1.117 4.641l16.653 24.025c4.688 6.764 9.724 6.654 11.772 6.255 1.938-.378 3.064-2.464 2.081-3.982z" />
                                <path
                                    d="M77.617 184.938c-1.744-2.695-3.027-6.124-3.35-8.95l-.881-7.729a7.886 7.886 0 0 0-4.601-6.282l-6.309-2.815c-1.044-.466-1.541-1.691-1.107-2.731.198-.475.443-.94.659-1.352l.206-.394a4.243 4.243 0 0 0-.288-4.359 4.237 4.237 0 0 0-3.992-1.803 2.42 2.42 0 0 0-.561.131l-12.107 4.353a2.48 2.48 0 0 0-.333.148c-1.453.777-2.502 2.116-2.878 3.674-.377 1.563-.055 3.238.885 4.594l16.653 24.025c4.348 6.273 9.154 7.482 12.213 7.482.847 0 1.561-.093 2.093-.196 1.826-.357 3.342-1.572 4.056-3.251.65-1.533.52-3.188-.358-4.545zm-4.656 2.886c-1.488.293-5.366.361-9.239-5.226l-16.653-24.025c-.167-.241-.165-.445-.134-.573a.633.633 0 0 1 .266-.37l9.714-3.492c-.054.119-.107.241-.159.366-1.469 3.523.184 7.661 3.685 9.223l6.308 2.814a2.864 2.864 0 0 1 1.671 2.282l.881 7.73c.406 3.563 1.92 7.668 4.057 11.004a.59.59 0 0 1-.397.267z" />
                                <path fill="#ffffff"
                                    d="M129.764 182.84c-1.904-2.605-3.698-6.313-4.297-9.798l-1.317-7.668a5.35 5.35 0 0 0-3.373-4.096l-6.458-2.454c-2.335-.887-3.56-3.476-2.731-5.832.268-.763.602-1.444.836-1.974.563-1.272-.511-2.676-1.912-2.434l-11.841 5.031c-1.698 1.037-2.047 3.166-.852 4.696l17.988 23.043c5.064 6.487 10.086 6.093 12.107 5.578 1.911-.486 2.916-2.633 1.85-4.092z" />
                                <path
                                    d="M131.782 181.365c-1.894-2.593-3.37-5.943-3.851-8.746l-1.317-7.67a7.888 7.888 0 0 0-4.949-6.009l-6.459-2.454c-1.069-.406-1.634-1.602-1.26-2.665.17-.482.387-.958.578-1.378l.186-.413a4.244 4.244 0 0 0-.535-4.336 4.257 4.257 0 0 0-4.088-1.574 2.512 2.512 0 0 0-.551.163l-11.841 5.031a2.707 2.707 0 0 0-.326.167c-1.406.859-2.377 2.256-2.664 3.833-.288 1.582.129 3.235 1.144 4.535l17.988 23.043c4.37 5.599 8.889 6.797 11.957 6.796 1.141 0 2.082-.165 2.739-.332 1.803-.46 3.249-1.76 3.866-3.477.56-1.565.336-3.21-.617-4.514zm-4.484 3.146c-1.471.369-5.339.663-9.521-4.694l-17.988-23.043c-.18-.231-.19-.435-.166-.564a.64.64 0 0 1 .244-.386l9.5-4.036a13.4 13.4 0 0 0-.138.374c-1.267 3.602.618 7.639 4.201 8.999l6.458 2.454a2.862 2.862 0 0 1 1.798 2.182l1.317 7.669c.607 3.535 2.352 7.548 4.674 10.757a.592.592 0 0 1-.379.288z" />
                                <path
                                    d="M163.484 120.485c-.582-4.346-3.175-7.984-6.917-9.724l-6.669-3.174a2.5 2.5 0 1 0-2.149 4.516l6.69 3.184c2.206 1.024 3.734 3.216 4.088 5.861.434 3.241-.906 6.44-3.653 8.759l-35.342 29.154a2.501 2.501 0 0 0 3.181 3.858l35.363-29.173c4.042-3.409 6.063-8.366 5.408-13.261z" />
                                <path
                                    d="M138.853 126.341a3.597 3.597 0 0 0-2.354-2.74 200.99 200.99 0 0 1-2.708-.988 2.5 2.5 0 0 0-1.743 4.686l.598.223-22.08 19.326a2.5 2.5 0 1 0 3.293 3.762l23.816-20.846a3.655 3.655 0 0 0 1.178-3.423z" />
                                <path
                                    d="M150.704 108.79c-.222-1.354-1.099-2.503-2.295-3.047l-14.616-7.081a2.5 2.5 0 0 0-2.18 4.5l13.473 6.526-13.71 12.809c-.367.345-.888.451-1.295.303l-20.227-8.011c-.048-.02-.096-.036-.145-.053-2.96-.966-5.379-3.498-6.311-6.608-.811-2.708-.354-5.418 1.255-7.436l3.197-4.009a2.5 2.5 0 0 0-3.909-3.118l-3.197 4.009c-2.646 3.318-3.424 7.688-2.136 11.987 1.388 4.631 5.013 8.418 9.473 9.902l20.223 8.008a6.304 6.304 0 0 0 6.485-1.321l14.666-13.702a4.091 4.091 0 0 0 1.249-3.658z" />
                                <path
                                    d="M119.534 119.319a2.498 2.498 0 0 0-3.526.249l-11.051 12.665-14.385-9.33 11.987-17.142a2.5 2.5 0 0 0-4.097-2.865l-11.987 17.142a5.005 5.005 0 0 0-.817 3.867 5.007 5.007 0 0 0 2.22 3.271l14.371 9.26a5.008 5.008 0 0 0 2.725.799c1.426 0 2.84-.597 3.824-1.732l10.986-12.656a2.502 2.502 0 0 0-.25-3.528z" />
                                <path
                                    d="M105.197 133.07a2.498 2.498 0 0 0-3.523.287l-1.753 2.067a40.51 40.51 0 0 1-6.381 6.062l-26.962 20.536a2.5 2.5 0 1 0 3.03 3.978l26.962-20.536a45.46 45.46 0 0 0 7.169-6.812l1.746-2.06a2.498 2.498 0 0 0-.288-3.522zM89.729 122.795a2.502 2.502 0 0 0-3.48.625l-.521.749a21.115 21.115 0 0 1-3.625 3.999l-24.289 20.709a2.5 2.5 0 1 0 3.244 3.804l24.289-20.709a26.09 26.09 0 0 0 4.486-4.948l.521-.749a2.501 2.501 0 0 0-.625-3.48z" />
                                <path
                                    d="M76.534 156.894c-3.129-3.515-7.455-8.342-10.296-11.387a2.5 2.5 0 0 0-3.655 3.412c2.808 3.009 7.106 7.805 10.217 11.299.494.555 1.18.838 1.868.838a2.5 2.5 0 0 0 1.866-4.162zM128.96 153.829c-3.237-3.6-6.484-7.198-9.635-10.674a2.5 2.5 0 0 0-3.704 3.359c3.146 3.47 6.389 7.063 9.622 10.658a2.493 2.493 0 0 0 1.86.828 2.498 2.498 0 0 0 1.857-4.171z" />
                                <g>
                                    <path
                                        d="M238.466 128.174a5.037 5.037 0 0 0-4.32-1.196l-44.387 8.465c-1.907.363-3.415 1.751-3.933 3.622s.06 3.838 1.509 5.132l10.932 9.846-50.981 53.553a1.56 1.56 0 0 1-1.126.482H75.863c-3.188 0-6.232.994-8.805 2.875l-46.917 34.29c-2.491 1.82-3.265 5.261-1.763 7.831a5.85 5.85 0 0 0 3.627 2.741 5.854 5.854 0 0 0 4.496-.654l48.45-29.069c.417-.25.896-.372 1.384-.345l72.542 3.72a20.554 20.554 0 0 0 15.297-5.746l53.864-52.122 10.302 9.195a5.035 5.035 0 0 0 5.269.918 5.037 5.037 0 0 0 3.155-4.317l3.381-45.063a5.025 5.025 0 0 0-1.679-4.158zm-6.693 48.878-.103.011-10.303-9.196a5.086 5.086 0 0 0-6.896.144l-53.776 52.12a15.523 15.523 0 0 1-11.561 4.342l-72.542-3.72a7.479 7.479 0 0 0-4.215 1.053L23.93 250.873a.889.889 0 0 1-1.234-.32c-.218-.374-.037-.956.396-1.272l46.917-34.291a9.855 9.855 0 0 1 5.854-1.911h70.296a6.585 6.585 0 0 0 4.746-2.034l50.981-53.553a5.024 5.024 0 0 0 1.393-3.697 5.023 5.023 0 0 0-1.688-3.574l-10.951-9.776.054-.088 44.388-8.465.076.067-3.385 45.093z" />
                                </g>
                                <g>
                                    <path fill="#ffffff"
                                        d="M115.227 20.025c-4.5-.8-8-4.3-8.9-8.7 0-.2-.4-.2-.4 0-.9 4.4-4.4 7.9-8.9 8.7-.2 0-.2.3 0 .4 4.5.8 8 4.3 8.9 8.7 0 .2.4.2.4 0 .9-4.4 4.4-7.9 8.9-8.7.2-.1.2-.4 0-.4z" />
                                </g>
                                <g>
                                    <path fill="#ffffff"
                                        d="M213.894 114.083c-3.192-.567-5.675-3.05-6.313-6.171 0-.142-.284-.142-.284 0-.638 3.121-3.121 5.604-6.313 6.171-.142 0-.142.213 0 .284 3.192.568 5.675 3.05 6.313 6.171 0 .142.284.142.284 0 .638-3.121 3.121-5.604 6.313-6.171.141-.071.141-.284 0-.284z" />
                                </g>
                                <g>
                                    <path fill="#ffffff"
                                        d="M94.514 244.1h-2.3v-2.3c0-1.8-1.4-3.2-3.2-3.2s-3.2 1.5-3.2 3.2v2.3h-2.3c-1.8 0-3.2 1.4-3.2 3.2 0 1.8 1.5 3.2 3.2 3.2h2.3v2.3c0 1.8 1.4 3.2 3.2 3.2s3.2-1.5 3.2-3.2v-2.3h2.3c1.8 0 3.2-1.4 3.2-3.2 0-1.8-1.5-3.2-3.2-3.2z" />
                                </g>
                                <g>
                                    <path fill="#ffffff" d="M129.127 0a3.4 3.4 0 1 0 0 6.8 3.4 3.4 0 0 0 0-6.8z" />
                                </g>
                                <g>
                                    <path fill="#ffffff" d="M117.914 235.825a3.4 3.4 0 1 0 0 6.8 3.4 3.4 0 0 0 0-6.8z" />
                                </g>
                            </svg>
                            <!-- Active Icons -->

                            <span class="ml-4">Progress Belajar</span>
                            {{-- <span
                                class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">{{ $courses->count() }}</span> --}}
                        </a>
                    @endif

                </li>

                {{-- My Course --}}
                <li class="relative px-6 py-3">
                    @if (request()->is('member/course') ||
                        request()->is('member/*/*') ||
                        request()->is('member/course/*') ||
                        request()->is('member/*/course') ||
                        request()->is('member/*/course/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800"
                            href="{{ route('member.course.index') }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="#082431"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="3" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="3" y="14" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="14" y="3" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="14" y="14" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                            </svg>
                            <!-- Active Icons -->

                            <span class="ml-4">My Course</span>
                            <span
                                class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">
                                {{ $courses }}
                            </span>
                        </a>
                    @else
                        <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                            href="{{ route('member.course.index') }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="3" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="3" y="14" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="14" y="3" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                                <rect x="14" y="14" width="7" height="7" rx="2"
                                    stroke="#082431" stroke-width="1.5" />
                            </svg>
                            <!-- Active Icons -->

                            <span class="ml-4">My Course</span>
                            <span
                                class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">
                                {{ $courses }}
                            </span>
                        </a>
                    @endif

                </li>

                {{-- My Transaction --}}

                {{-- My Profile / settings --}}
                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (request()->is('member/profil') ||
                        request()->is('member/profil/*') ||
                        request()->is('member/*/profil') ||
                        request()->is('member/*/profil/*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg"
                            aria-hidden="true"></span>
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                        href="{{ route('mentor.profile.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="white" />
                            <circle cx="10.5" cy="5.5" r="2.75" stroke="#082431" stroke-width="1.5" />
                            <path
                                d="M3.75 18.2581C3.75 14.6638 6.66376 11.75 10.2581 11.75H11.7419C15.3362 11.75 18.25 14.6638 18.25 18.2581C18.25 18.8059 17.8059 19.25 17.2581 19.25H4.74194C4.1941 19.25 3.75 18.8059 3.75 18.2581Z"
                                stroke="#082431" stroke-width="1.5" />
                            <path
                                d="M17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981L17.9314 19.9848C17.715 20.3596 17.383 20.6541 16.985 20.8241L15.4217 21.4919C15.3603 21.518 15.2911 21.478 15.2831 21.4119L15.0797 19.7241C15.028 19.2944 15.117 18.8596 15.3333 18.4848L17 15.5981L17.75 14.299Z"
                                fill="white" />
                            <path
                                d="M17 15.5981L15.3333 18.4848C15.117 18.8596 15.028 19.2944 15.0797 19.7241L15.2831 21.4119C15.2911 21.478 15.3603 21.518 15.4217 21.4919L16.985 20.8241C17.383 20.6541 17.715 20.3596 17.9314 19.9848L19.5981 17.0981M17 15.5981L17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75V13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981M17 15.5981L19.5981 17.0981"
                                stroke="#082431" stroke-width="1.5" />
                        </svg>
                        <span class="ml-4">My Profile</span>
                    </a>
                </li>

            </ul>
        @endcan

        ~~~~~~~~~~~
    </div>
</aside>
