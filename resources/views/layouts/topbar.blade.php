<header class="main-header">
    <a href="#" class="logo">
        <span class="logo-mini"><b>M</b>KH</span>
        <span class="logo-lg"><b>{{ env('APP_NAME') }}</b> KH</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-laptop"> </i>
                    </a>
                </li>
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa  fa-flag-o"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="{{ route('setting.updateLocale',['langCode'=> 'kh']) }}">
                                        <div class="pull-left">
                                            <img src="{{'assets/flags/kh.png'}}" alt="flag-1">
                                        </div>
                                        <h4 style="margin-top: 4%;">
                                            Khmer
                                            <small>
                                                <i class="fa fa-check-circle-o"></i>
                                            </small>
                                        </h4>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('setting.updateLocale',['langCode'=> 'en']) }}">
                                        <div class="pull-left">
                                            <img src="{{'assets/flags/en.png'}}" alt="flag-2">
                                        </div>
                                        <h4 style="margin-top: 4%;">
                                            English
                                            <small>
                                                <i class="fa fa-check-circle-o"></i>
                                            </small>
                                        </h4>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets/images/user.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ auth()->user()->name }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" data-toggle="control-sidebar"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>
