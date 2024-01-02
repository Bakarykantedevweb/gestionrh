<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span
                            class="menu-arrow"></span></a>
                    {{-- <ul style="display: none;">
                        <li><a class="active" href="">Employee Dashboard</a></li>
                    </ul> --}}
                </li>

                <li class="menu-title">
                    <span>Candidat</span>
                </li>
                <li><a href="{{ url('offres') }}"><i class="las la-user"></i> <span>Ofres</span></a></li>
                <li><a href=""><i class="las la-user"></i> <span>Profil</span></a></li>
                <li><a href="{{ url('logout-candidat') }}"><i class="la la-money"></i> <span>Deconnexion</span></a></li>
            </ul>
        </div>
    </div>
</div>
