<div>
    <div class="w-full px-[var(--margin-x)] pb-8">

        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Profile
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="{{ route('agent-dashboard') }}">Tableau de Bord</a>
                    <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                        viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </li>
                <li>Profile</li>
            </ul>
        </div>
        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
            <div class="col-span-12 lg:col-span-4">
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center space-x-4">
                        <div class="avatar size-14">
                            <img class="rounded-full"
                                src="{{ asset('uploads/admin/agent/' . Auth::guard('webagent')->user()->photo) }}"
                                alt="avatar">
                        </div>
                        <div>
                            <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                                {{ Auth::guard('webagent')->user()->prenom . ' ' . Auth::guard('webagent')->user()->nom }}
                            </h3>
                            <p class="text-xs+">{{ Auth::guard('webagent')->user()->poste->nom }}</p>
                        </div>
                    </div>
                    <ul class="mt-6 space-y-1.5 font-inter font-medium">
                        <li>
                            <a class="flex items-center space-x-2 rounded-lg {{ $detail ? 'bg-primary' : '' }} px-4 py-2.5 tracking-wide {{ $detail ? 'text-white' : 'text-black' }} outline-none transition-all dark:bg-accent"
                                href="#" wire:click="activeContent('{{ encrypt('detail') }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                    viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                <span>Detail du compte</span>
                            </a>
                        </li>
                        <li>
                            <a class="group flex space-x-2 rounded-lg {{ $affectation ? 'bg-primary' : '' }} px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                href="#" wire:click="activeContent('{{ encrypt('affectation') }}')">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="size-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                    fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>

                                <span>Mes affectations</span>
                            </a>
                        </li>
                        <li>
                            <a class="group flex space-x-2 rounded-lg {{ $parametre ? 'bg-primary' : '' }} px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                href="#" wire:click="activeContent('{{ encrypt('parametre') }}')">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="size-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                    fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                                <span>Changer de mot de passe</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-8">
                <div class="card">
                    @if ($detail)
                        <div
                            class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">
                            <h2 class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                Detail de mon profil
                            </h2>
                        </div>
                        <div class="p-4 sm:p-5">
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6">
                                <div class="space-y-4 sm:space-y-5 lg:space-y-6">
                                    <div class="card">
                                        <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                                            <h2
                                                class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                                                Information Personnelle
                                            </h2>
                                        </div>
                                        <div class="p-4 sm:px-5">
                                            <ul class="space-y-3.5 font-inter font-medium">
                                                <li>
                                                    <a class="inline-flex items-center font-medium tracking-wide text-primary outline-none dark:text-accent-light"
                                                        href="#">
                                                        <span>{{ $this->agent->matricule }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="inline-flex items-center tracking-wide outline-none transition-colors hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100"
                                                        href="#">
                                                        <span>{{ $this->agent->prenom }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="inline-flex items-center tracking-wide outline-none transition-colors hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100"
                                                        href="#">
                                                        <span>{{ $this->agent->nom }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="inline-flex items-center tracking-wide outline-none transition-colors hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100"
                                                        href="#">
                                                        <span>{{ $this->agent->jour . '-' . $this->agent->mois . '-' . $this->agent->annee }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="inline-flex items-center tracking-wide outline-none transition-colors hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100"
                                                        href="#">
                                                        <span><?= $this->agent->sexe == 'M' ? 'Homme' : 'Femme' ?></span>
                                                    </a>
                                                </li>
                                                {{-- <li>
                                                    <a class="inline-flex items-center tracking-wide outline-none transition-colors hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100"
                                                        href="#">
                                                        <span>{{ $this->agent->agence->nom }}</span>
                                                    </a>
                                                </li> --}}
                                                <li>
                                                    <a class="inline-flex items-center tracking-wide outline-none transition-colors hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100"
                                                        href="#">
                                                        <span>{{ $this->agent->departement->code }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="inline-flex items-center tracking-wide outline-none transition-colors hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100"
                                                        href="#">
                                                        <span>{{ $this->agent->poste->nom }}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-4 sm:space-y-5 lg:space-y-6">
                                    <div class="card">
                                        <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                                            <h2
                                                class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                                                Contrat Information
                                            </h2>
                                        </div>
                                        <div class="p-4 sm:px-5">
                                            <ul class="space-y-3.5 font-inter font-medium">
                                                <li>
                                                    <a class="inline-flex items-center font-medium tracking-wide text-primary outline-none dark:text-accent-light"
                                                        href="#">
                                                        <span>{{ $this->contrat->numero }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="inline-flex items-center tracking-wide outline-none transition-colors hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100"
                                                        href="#">
                                                        <span>{{ $this->contrat->typeContrat->nom }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="inline-flex items-center tracking-wide outline-none transition-colors hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100"
                                                        href="#">
                                                        <span>{{ \Carbon\Carbon::parse($this->contrat->date_creation)->isoFormat('LL') }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="inline-flex items-center tracking-wide outline-none transition-colors hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100"
                                                        href="#">
                                                        <span>
                                                            @if ($this->contrat->date_fin == '')
                                                                Indeterminée
                                                            @else
                                                                {{ \Carbon\Carbon::parse($this->contrat->date_fin)->isoFormat('LL') }}
                                                            @endif
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="inline-flex items-center tracking-wide outline-none transition-colors hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100"
                                                        href="#">
                                                        <span>{{ $this->contrat->situation_matrimoniale }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="inline-flex items-center tracking-wide outline-none transition-colors hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100"
                                                        href="#">
                                                        <span>{{ $this->contrat->nombre_enfant }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="inline-flex items-center tracking-wide outline-none transition-colors hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100"
                                                        href="#">
                                                        <span>{{ $this->contrat->feuilleCalcule->libelle }}</span>
                                                    </a>
                                                </li>
                                                {{-- <li>
                                                    <a class="inline-flex items-center tracking-wide outline-none transition-colors hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100"
                                                        href="#">
                                                        <span>Security</span>
                                                    </a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-4 sm:space-y-5 lg:space-y-6">
                                    <div class="card">
                                        <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                                            <h2
                                                class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                                                Salaire Information
                                            </h2>
                                        </div>
                                        <div class="p-4 sm:px-5">
                                            <ul class="space-y-3.5 font-inter font-medium">
                                                @php
                                                    $montant = 0;
                                                @endphp
                                                @foreach ($contratRubriques as $contratRubrique)
                                                    <li>
                                                        <a class="inline-flex items-center font-medium tracking-wide text-primary outline-none dark:text-accent-light"
                                                            href="#">
                                                            <span>{{ Str::limit($contratRubrique->rubrique->libelle, 5, '...') }}
                                                                : {{ number_format($contratRubrique->montant) }}</span>
                                                        </a>
                                                    </li>
                                                    @php
                                                        $montant += $contratRubrique->montant;
                                                    @endphp
                                                @endforeach
                                                <li>
                                                    <a class="inline-flex items-center font-medium tracking-wide text-primary outline-none dark:text-accent-light"
                                                        href="#">
                                                        <span>Salaire de base
                                                            : {{ number_format($this->contrat->salaire) }}</span>
                                                    </a>
                                                </li>
                                                <hr>
                                                <li>
                                                    <a class="inline-flex items-center font-medium tracking-wide text-primary outline-none dark:text-accent-light"
                                                        href="#">
                                                        <span>Salaire brut
                                                            :
                                                            {{ number_format($montant + $this->contrat->salaire) }}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($affectation)
                        <div
                            class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">
                            <h2 class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                Historiques de mes affectations
                            </h2>
                        </div>
                        <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                            <table class="w-full text-left">
                                <thead>
                                    <tr class="border border-transparent border-b-slate-200 dark:border-b-navy-500">
                                        <th
                                            class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                            Agence
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                            Departement
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                            Poste
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                            Date prise
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                            Date fin
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($affectations as $items)
                                        <tr
                                            class="border border-transparent border-b-slate-200 dark:border-b-navy-500">
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $items->agence->nom }}
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                {{ $items->departement->code }}</td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                {{ $items->poste->nom }}
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                {{ \Carbon\Carbon::parse($items->date_debut)->isoFormat('LL') }}</td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                @if ($items->date_fin == '')
                                                    <button
                                                        class="btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                                                        En cours
                                                    </button>
                                                @else
                                                    <button
                                                        class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90">
                                                        {{ \Carbon\Carbon::parse($items->date_fin)->isoFormat('LL') }}
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                    @if ($parametre)
                        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
                            <div class="col-span-12 lg:col-span-12">
                                <div class="card">
                                    <div
                                        class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">
                                        <h2
                                            class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                            Parametre du compte
                                        </h2>
                                    </div>
                                    <div class="p-4 sm:p-5">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-base font-medium text-slate-600 dark:text-navy-100">Avatar</span>
                                            <div class="avatar mt-1.5 size-20">
                                                <img class="mask is-squircle"
                                                    src="{{ asset('uploads/admin/agent/' . Auth::guard('webagent')->user()->photo) }}"
                                                    alt="avatar">
                                                <div
                                                    class="absolute bottom-0 right-0 flex items-center justify-center rounded-full bg-white dark:bg-navy-700">
                                                    <button
                                                        class="btn size-6 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5"
                                                            viewbox="0 0 20 20" fill="currentColor">
                                                            <path
                                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-6">
                                            <form wire:submit.prevent="UpdatePassword">
                                                <label class="block">
                                                    <span>Mot de passe actuel </span>
                                                    <span class="relative mt-1.5 flex">
                                                        <input wire:model="old_password"
                                                            class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                            placeholder="Enter name" type="password">
                                                        <span
                                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                            <i class="fas fa-lock text-base"></i>
                                                        </span>
                                                    </span>
                                                </label>
                                                @error('old_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <label class="block">
                                                    <span>Nouveau mot de passe </span>
                                                    <span class="relative mt-1.5 flex">
                                                        <input wire:model="new_password"
                                                            class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                            placeholder="Enter name" type="password">
                                                        <span
                                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                            <i class="fas fa-lock text-base"></i>
                                                        </span>
                                                    </span>
                                                </label>
                                                @error('new_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <label class="block">
                                                    <span>Confirmez votre mot de passe </span>
                                                    <span class="relative mt-1.5 flex">
                                                        <input
                                                            class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                            placeholder="Enter name" type="password">
                                                        <span
                                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                            <i class="fas fa-lock text-base"></i>
                                                        </span>
                                                    </span>
                                                </label>
                                                <br>
                                                <button type="submit"
                                                    class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                                    Mettre a jour
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
