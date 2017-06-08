<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="/css/admin.css" rel="stylesheet">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="dg">
    <div class="app" id="app">
        <header class="header header-fixed navbar">
            <div class="brand">
                <a href="javascript:;" class="ti-menu off-left visible-xs" data-toggle="offscreen" data-move="ltr"></a>
                <a href="/dashboard" class="navbar-brand">
                    <img src="/static/admin/logo.png" alt="">
                    <span class="heading-font">
                        Digiscripts
                    </span>
                </a>
            </div>
            <ul class="nav navbar-nav">
                <li class="hidden-xs">
                    <a href="javascript:;" class="toggle-sidebar">
                        <i class="ti-menu"></i>
                    </a>
                </li>
            </ul>
        </header>
        <section class="layout">
            <aside class="sidebar offscreen-left">
                <nav class="main-navigation" data-height="auto" data-size="6px" data-distance="0" data-rail-visible="true" data-wheel-step="10">
                    <p class="nav-title">MENU</p>
                    <ul class="nav">
                        <li>
                            <router-link to="/admin">
                                <i class="ti-home"></i>
                                <span>Dashboard</span>
                            </router-link>
                        </li>
                        @if (Auth::User()->isPhysician())
                            <li>
                                <router-link to="/admin/prescriptions">
                                    <i class="ti-layout-media-overlay-alt-2"></i>
                                    <span>Prescriptions</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/admin/diagnostics">
                                    <i class="ti-support"></i>
                                    <span>Diagnostics</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/admin/patients">
                                    <i class="ti-user"></i>
                                    <span>Patients</span>
                                </router-link>
                            </li>
                             <li>
                               <router-link to="/physician/profile">
                                    <i class="ti-control-record text-danger"></i>
                                    <span>Profile</span>
                                </router-link>
                            </li>
                        @endif
                        @if (Auth::User()->isPharmacist())
                            @if (Auth::User()->isAdmin())
                                <li>
                                    <router-link to="/pharmacy/pharmacists">
                                        <i class="ti-user"></i>
                                        <span>Pharmacists</span>
                                    </router-link>
                                </li>  
                                <li>
                                    <router-link to="/pharmacy/disbursements">
                                        <i class="ti-user"></i>
                                        <span>Disbursements</span>
                                    </router-link>
                                </li>
                                 <li>
                                   <router-link to="/pharmacy/profile">
                                        <i class="ti-control-record text-danger"></i>
                                        <span>Profile</span>
                                    </router-link>
                                </li>
                            @endif
                            @if (!Auth::User()->isAdmin())
                            <li>
                                <router-link to="/pharmacist">
                                    <i class="ti-support"></i>
                                    <span>Prescriptions</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/pharmacist/repeats">
                                    <i class="ti-user"></i>
                                    <span>Partials / Repeats</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/admin/patients">
                                    <i class="ti-user"></i>
                                    <span>Archived</span>
                                </router-link>
                            </li>
                            @endif
                        @endif
                        @if (Auth::User()->isTechnician())
                           @if (Auth::User()->isAdmin())
                            <li>
                                <router-link to="/test-center/technicians">
                                    <i class="ti-map"></i>
                                    <span>Locations</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/test-center/profile">
                                    <i class="ti-map"></i>
                                    <span>Profile</span>
                                </router-link>
                            </li>
                            @endif
                              @if (!Auth::User()->isAdmin())
                            <li>
                                <router-link to="/technician/diagnostics">
                                    <i class="ti-user"></i>
                                    <span>Incoming Request</span>
                                </router-link>
                            </li>
                             <li>
                                <router-link to="/technician/diagnostics/closed">
                                    <i class="ti-user"></i>
                                    <span>Sent Request</span>
                                </router-link>
                            </li>
                            @endif
                        @endif
                    </ul>
                    <p class="nav-title">MORE</p>
                    <ul class="nav">                        
                        <li>
                            <a href="{{ url('/auth/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti-control-record text-warning"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ url('/auth/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </nav>
            </aside>
            <section class="main-content">
                <div class="content-wrap">
                    <div class="wrapper">
                        <router-view></router-view>
                    </div>
                </div>
                <a class="exit-offscreen"></a>
            </section>
        </section>
    </div>
    <script src="/js/admin.js"></script>
    @yield('scripts')
</body>
</html>
