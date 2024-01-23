<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="submenu">
                    <a href="{{ url('admin/dashboard') }}"><i class="la la-dashboard"></i>
                        <span> Tableau de Bord</span></a>
                </li>
                @forelse ($droits as $droit)
                    <li class="border-top @if (Route::currentRouteName() == $droit->route) bg-primary @endif ">
                        <a href="{{ route($droit->route) }}"
                            class="@if (Route::currentRouteName() == $droit->route) text-light @endif">
                            @if ($droit->type_droit->id == 2)
                                <i class="la la-users"></i>
                            @elseif($droit->type_droit->id == 3)
                                <i class="la la-money"></i>
                            @elseif($droit->type_droit->id == 1)
                                <i class="la la-list"></i>
                            @elseif($droit->type_droit->id == 4)
                                <i class="la la-user-tie"></i>
                            @elseif($droit->type_droit->id == 5)
                                <i class="la la-edit"></i>
                            @else
                                <i class="la la-user-tie"></i>
                            @endif
                            <span>{{ $droit->nom }}</span>
                        </a>
                    </li>
                @empty
                    <li class="border-top">
                        <a href="#"> <i class="la la-ban"></i>
                            <span>Vous n'avez pas ce droit</span>
                        </a>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
