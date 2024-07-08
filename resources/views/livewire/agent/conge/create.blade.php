<div>
    <div class="w-full px-[var(--margin-x)] pb-8">
        <div class="flex flex-col items-center justify-between space-y-4 py-5 sm:flex-row sm:space-y-0 lg:py-6">
            <div class="flex items-center space-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewbox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50">
                    Demande de Congé
                </h2>
            </div>
            <div class="flex justify-center space-x-2">
                <a href="{{ route('congeAgent.index') }}">
                    <button
                        class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                        Retour
                    </button>
                </a>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
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
                        <form wire:submit.prevent="saveConge">
                            <div class="tab-content p-4 sm:p-5">
                                <div class="space-y-5">
                                    <label class="block">
                                        <span class="font-medium text-slate-600 dark:text-navy-100">Type de conge</span>
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
                                        <span class="font-medium text-slate-600 dark:text-navy-100">Date Debut</span>
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
                                    Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
