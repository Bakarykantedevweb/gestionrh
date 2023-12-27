<div>
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Contrats</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Contrats</li>
                </ul>
            </div>
            {{-- <div class="col-auto float-right ml-auto">
                <a href="{{ url('admin/contrats/create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Nouveau
                    Contrat</a>
            </div> --}}
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    <div class="row">
        <div class="col-md-12">
            <div>
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                        <tr>
                            <th style="width: 30px;">#</th>
                            <th>Numero Contrat</th>
                            <th>Date creation</th>
                            <th>Agent</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $key = 1;
                        @endphp
                        @forelse ($contrats as $items)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td>{{ $items->numero }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($items->date_creation)->locale('fr_FR')->isoFormat('dddd D MMMM
                                YYYY') }}
                            </td>
                            <td>{{ $items->agent->prenom . '-' . $items->agent->nom }}</td>
                            <td class="text-right">
                                <a class="btn btn-primary" href="{{ route('contrat.edit',$items->numero) }}"><i
                                        class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-primary" href="#"><i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Pas de Contrats</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
