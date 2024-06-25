 <div class="sidebar" id="sidebar">
     <div class="sidebar-inner slimscroll">
         <div class="sidebar-contents">
             <div id="sidebar-menu" class="sidebar-menu">
                 <div class="mobile-show">
                     <div class="offcanvas-menu">
                         <div class="user-info align-center bg-theme text-center">
                             <span class="lnr lnr-cross  text-white" id="mobile_btn_close">X</span>
                             <a href="javascript:void(0)" class="d-block menu-style text-white">
                                 <div class="user-avatar d-inline-block mr-3">
                                     <img src="{{ asset('agent/assets/img/profiles/avatar-18.jpg') }}" alt="user avatar"
                                         class="rounded-circle" width="50">
                                 </div>
                             </a>
                         </div>
                     </div>
                     <div class="sidebar-input">
                         <div class="top-nav-search">
                             <form>
                                 <input type="text" class="form-control" placeholder="Search here">
                                 <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                             </form>
                         </div>
                     </div>
                 </div>
                 <ul>
                     <li class="{{ request()->routeIs('agent-dashboard') ? 'active' : '' }}">
                         <a href="{{ route('agent-dashboard') }}"><img src="{{ asset('agent/assets/img/home.svg') }}"
                                 alt="sidebar_img">
                             <span>Tableau de Bord</span></a>
                     </li>
                     <li class="{{ request()->routeIs('agent.bulletin') ? 'active' : '' }}">
                         <a href="{{ url('agent/bulletins') }}"><img src="{{ asset('agent/assets/img/calendar.svg') }}"
                                 alt="sidebar_img">
                             <span>Bulletins</span></a>
                     </li>
                     <li class="{{ request()->routeIs('congeAgent.index') ? 'active' : '' }}">
                         <a href="{{ route('congeAgent.index') }}"><img
                                 src="{{ asset('agent/assets/img/employee.svg') }}" alt="sidebar_img"><span>
                                 Demande de congé</span></a>
                     </li>
                     <li class="{{ request()->routeIs('formationAgent.index') ? 'active' : '' }}">
                         <a href="{{ route('formationAgent.index') }}"><img src="{{ asset('agent/assets/img/employee.svg') }}" alt="sidebar_img">
                             <span>Formations</span></a>
                     </li>
                     <li class="{{ request()->routeIs('performanceAgent.index') ? 'active' : '' }}">
                         <a href="{{ route('performanceAgent.index') }}"><img src="{{ asset('agent/assets/img/leave.svg') }}" alt="sidebar_img">
                             <span>Performance</span></a>
                     </li>
                     <li>
                         <a href=""><img src="{{ asset('agent/assets/img/company.svg') }}" alt="sidebar_img">
                             <span>
                                 Demande de prêt</span></a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
