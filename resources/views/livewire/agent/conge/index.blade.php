<div>
    <div class="w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Congés
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
                <li>Congés</li>
            </ul>
        </div>
        @if ($afficherListe)
            <a href="{{ route('congeAgent.create') }}">
                <button
                    class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                    Faire une demande
                </button>
            </a>
            <br>
            <br>
            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6 mt-2">
                <!-- Basic Table -->
                <div class="card px-4 pb-4 sm:px-5">
                    <div class="my-3 flex h-8 items-center justify-between">
                        <h2
                            class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                            Listes de mes congés
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
                                                Type Conge
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Date Debut
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Date Fin
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
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($conges as $conge)
                                            <tr
                                                class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $conge->typeConge->nom }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ \Carbon\Carbon::parse($conge->date_debut)->isoFormat('LL') }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ \Carbon\Carbon::parse($conge->date_fin)->isoFormat('LL') }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $conge->duree }} jours
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    @if ($conge->status == 0)
                                                        <button
                                                            class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                                                            En attente
                                                        </button>
                                                    @elseif ($conge->status == 2)
                                                        <button
                                                            class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90">
                                                            Rejeter
                                                        </button>
                                                    @elseif ($conge->status == 1)
                                                        <button
                                                            class="btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                                                            Approuver
                                                        </button>
                                                    @endif
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    @if ($conge->status == 0)
                                                        <button type="button"
                                                            wire:click="editConge({{ $conge->id }})"
                                                            class="btn bg-primary font-medium text-white hover:bg-primary-focus hover:shadow-lg hover:shadow-primary/50 focus:bg-primary-focus focus:shadow-lg focus:shadow-primary/50 active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:hover:shadow-accent/50 dark:focus:bg-accent-focus dark:focus:shadow-accent/50 dark:active:bg-accent/90">
                                                            Modifier
                                                        </button>
                                                    @else
                                                        <button
                                                            class="btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                                                            Terminer
                                                        </button>
                                                    @endif

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
        @if ($afficherEdit)
            <button type="button" wire:click="retour"
                class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                Retour
            </button>
            <br>
            <br>
            <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6 mt-2">
                <div class="col-span-12 lg:col-span-12">
                    <div class="card">
                        <div class="tabs flex flex-col">
                            <div class="is-scrollbar-hidden overflow-x-auto">
                                <div class="border-b-2 border-slate-150 dark:border-navy-500">
                                    <div class="tabs-list -mb-0.5 flex">
                                        <button
                                            class="btn h-14 shrink-0 space-x-2 rounded-none border-b-2 border-primary px-4 font-medium text-primary dark:border-accent dark:text-accent-light sm:px-5">
                                            <i class="fa-solid fa-layer-group text-base"></i>
                                            <span>
                                                Solde de conge
                                                {{ Auth::guard('webagent')->user()->contrat->nombre_jour_conge }}
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <form wire:submit.prevent="updateConge">
                                <div class="tab-content p-4 sm:p-5">
                                    <div class="space-y-5">
                                        <label class="block">
                                            <span class="font-medium text-slate-600 dark:text-navy-100">Type de
                                                conge</span>
                                            <select class="mt-1.5 w-full" wire:model="type_conge_id"
                                                x-init="$el._x_tom = new Tom($el, { create: false, sortField: { field: 'text', direction: 'asc' } })">
                                                <option>---</option>
                                                @forelse ($typeConges as $typeConge)
                                                    <option value="{{ $typeConge->id }}">{{ $typeConge->nom }}</option>
                                                @empty
                                                    <option selected>Pas de type de contrat</option>
                                                @endforelse
                                            </select>
                                        </label>
                                        @error('type_conge_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <label class="block">
                                            <span class="font-medium text-slate-600 dark:text-navy-100">Date
                                                Debut</span>
                                            <input wire:model="date_debut"
                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Enter post title" type="date">
                                        </label>
                                        @error('date_debut')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <label class="block">
                                            <span class="font-medium text-slate-600 dark:text-navy-100">Date Fin</span>
                                            <input wire:model="date_fin"
                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Enter post caption" type="date">
                                        </label>
                                        @error('date_fin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <label class="block">
                                            <input wire:model="duree" readonly
                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="La durée" type="number">
                                        </label>
                                        <label class="block">
                                            <span class="font-medium text-slate-600 dark:text-navy-100">Le Motif</span>
                                            <textarea rows="4" wire:model="motif" placeholder=" Enter Text"
                                                class="form-textarea w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"></textarea>
                                        </label>
                                        @error('motif')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <br>
                                    <button type="submit"
                                        class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        Mettre a jour
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
