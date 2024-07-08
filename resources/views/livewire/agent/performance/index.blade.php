<div>
    <div class="w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Performances
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
                <li>Performances</li>
            </ul>
        </div>
        @if ($afficheListe)
            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6 mt-2">
                <!-- Basic Table -->
                <div class="card px-4 pb-4 sm:px-5">
                    <div class="my-3 flex h-8 items-center justify-between">
                        <h2
                            class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                            Listes de mes Performances
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
                                                #
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Agent
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Date creation
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Questions
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($performances as $performance)
                                            <tr
                                                class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $performance->id }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $performance->agent->prenom . ' ' . $performance->agent->nom }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ \Carbon\Carbon::parse($performance->date)->isoFormat('LL') }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    @if ($performance->status == 0)
                                                        <button wire:click="voirQuestion({{ $performance->id }})"
                                                            class="btn bg-primary font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                                                            Voir quesion
                                                        </button>
                                                    @else
                                                        <button wire:click="voirNote({{ $performance->id }})"
                                                            data-toggle="modal" data-target="#voir_stagiaire"
                                                            class="btn bg-primary font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                                                            Voir reponse
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($performance->status == 0)
                                                        <button
                                                            class="btn bg-error font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                                                            En attente
                                                        </button>
                                                    @else
                                                        <button
                                                            class="btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                                                            Valider
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
        @if ($createNote)
            <button type="button" wire:click="retour"
                class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                Retour
            </button>
            <br>
            <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-12 mt-3">
                <div class="col-span-12 lg:col-span-12">
                    <div class="card">
                        <form wire:submit.prevent="saveQuestionNote">
                            <div class="is-scrollbar-hidden min-w-full overflow-x-auto pb-2 ml-2">
                                <table class="w-full text-left mb-2">
                                    <thead>
                                        <tr class="border border-transparent border-b-slate-200 dark:border-b-navy-500">
                                            @foreach ($questionListes as $item)
                                                <th
                                                    class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                    {{ $item->question->libelle }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border border-transparent border-b-slate-200 dark:border-b-navy-500">
                                            @foreach ($questionListes as $item)
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    <label class="block">
                                                        <input wire:model="notes.{{ $item->id }}"
                                                            class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                            type="number" />
                                                    </label>
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                                &nbsp;
                                <button type="submit"
                                    class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    Envoyer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
