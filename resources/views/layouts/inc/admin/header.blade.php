            <div class="header">

                <!-- Logo -->
                <div class="header-left">
                    <h1 style="font-family:'CircularStd', sans-serif;color:#2C7BE5" class="mt-2">
                        OPTIRH
                    </h1>
                </div>
                <!-- /Logo -->

                <a id="toggle_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>

                <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

                <!-- Header Menu -->
                <ul class="nav user-menu">
                    <!-- Message Notifications -->
                    @livewire('admin.entete.entete')
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="fa fa-comment-o"></i> <span class="badge badge-danger">0</span>
                        </a>
                        <div class="dropdown-menu notifications">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">Contacts</span>
                                <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">
                                    {{-- @forelse ($contacts as $item)
                                        <li class="notification-message">
                                            <a href="#">
                                                <div class="list-item">
                                                    <div class="list-left">
                                                        <span class="avatar">
                                                            <img alt="" src="assets/img/téléchargement.png">
                                                        </span>
                                                    </div>
                                                    <div class="list-body">
                                                        <span class="message-author">{{ $item->nom_complet }} </span>
                                                        <span class="message-time">{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('LL') }}</span>
                                                        <div class="clearfix"></div>
                                                        <span class="message-content">{{ $item->message }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @empty

                                    @endforelse --}}
                                </ul>
                            </div>
                            <div class="topnav-dropdown-footer">
                                <a href="{{ url('admin/inbox') }}">Tous les Messages</a>
                            </div>
                        </div>
                    </li>
                    <!-- /Message Notifications -->
                    <li class="nav-item dropdown has-arrow main-drop">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <span class="user-img"><img
                                    src="{{ asset('uploads/admin/profile/' . Auth::user()->photo) }}" alt="">
                                <span class="status online"></span></span>
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Deconnexion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <!-- /Header Menu -->

                <!-- Mobile Menu -->
                <div class="dropdown mobile-user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="settings.html">Settings</a>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </div>
                <!-- /Mobile Menu -->

            </div>
