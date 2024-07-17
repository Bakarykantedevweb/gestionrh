<div>
    <div class="w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Formations
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="{{ route('agent-dashboard') }}">Tableau de Bord
                    </a>
                    <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                        viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </li>
                <li>Formations</li>
            </ul>
        </div>
        <div x-data="{ activeTab: 'tabHome' }" class="tabs flex flex-col">
            <div
                class="is-scrollbar-hidden overflow-x-auto rounded-lg bg-slate-200 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                <div class="tabs-list flex px-1.5 py-1">
                    <button  wire:click="activeContent('{{ encrypt('FormationEnCour') }}')"
                        :class="activeTab === 'tabHome' ? 'bg-white shadow dark:bg-navy-500 dark:text-navy-100' :
                            'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                        class="btn shrink-0 px-3 py-1.5 font-medium">
                        Formation en cours
                    </button>
                    &nbsp;&nbsp;
                    <button  wire:click="activeContent('{{ encrypt('FormationTerminee') }}')"
                        :class="activeTab === 'tabHome' ? 'bg-white shadow dark:bg-navy-500 dark:text-navy-100' :
                            'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                        class="btn shrink-0 px-3 py-1.5 font-medium">
                        Formation Terminée
                    </button>
                </div>
            </div>
        </div>
        @if ($FormationEnCour)
            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6 mt-2">
                <!-- Basic Table -->
                <div class="card px-4 pb-4 sm:px-5">
                    <div class="my-3 flex h-8 items-center justify-between">
                        <h2
                            class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                            Listes des Formations
                        </h2>
                    </div>
                    <div>
                        <div class="mt-5">
                            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                                <table class="w-full text-left">
                                    <thead>
                                        <tr
                                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Formateur
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Type Formation
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Titre
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Duree
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Status
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Fichier
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($formations as $formation)
                                            <tr
                                                class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $formation->formateur->prenom . ' ' . $formation->formateur->nom }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $formation->type_formation->titre }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $formation->titre }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ \Carbon\Carbon::parse($formation->date_debut)->isoFormat('LL') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($formation->date_fin)->isoFormat('LL') }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    @if ($formation->status == 1)
                                                        <button
                                                            class="btn bg-success font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                                                            Actif
                                                        </button>
                                                    @else
                                                        <button
                                                            class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90">
                                                            Inactif
                                                        </button>
                                                    @endif
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    <a
                                                        href="{{ asset('uploads/admin/formation/fichier/' . $formation->fichier) }}">
                                                        <button
                                                            class="btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                                                            Fichier
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Pas de Bulletins pour le moment
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($FormationTerminee)
            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6 mt-2">
                <!-- Basic Table -->
                <div class="card px-4 pb-4 sm:px-5">
                    <div class="my-3 flex h-8 items-center justify-between">
                        <h2
                            class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                            Historiques des Formationsns
                        </h2>
                    </div>
                    <div>
                        <div class="mt-5">
                            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                                <table class="w-full text-left">
                                    <thead>
                                        <tr
                                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Formateur
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Type Formation
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Titre
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Duree
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Status
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Fichier
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($formationsTerminees as $formation)
                                            <tr
                                                class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $formation->formateur->prenom . ' ' . $formation->formateur->nom }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $formation->type_formation->titre }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $formation->titre }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ \Carbon\Carbon::parse($formation->date_debut)->isoFormat('LL') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($formation->date_fin)->isoFormat('LL') }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    @if ($formation->status == 1)
                                                        <button
                                                            class="btn bg-success font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                                                            Actif
                                                        </button>
                                                    @else
                                                        <button
                                                            class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90">
                                                            Inactif
                                                        </button>
                                                    @endif
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    <a
                                                        href="{{ asset('uploads/admin/formation/fichier/' . $formation->fichier) }}">
                                                        <button
                                                            class="btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                                                            Fichier
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Pas de Bulletins pour le moment
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
