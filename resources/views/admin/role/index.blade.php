@extends('layouts.admin')
@section('content')
    @include('admin.role.modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Role</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Role</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_custom_policy"><i
                        class="fa fa-plus"></i>
                    Nouveau role</a>
            </div>
        </div>
    </div>
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th class="l-name" style="width: 30px;">#</th>
                        <th class="l-name">Nom</th>
                        <th class="l-days">Etat</th>
                        <th class="l-assignee">Utilisateurs</th>
                        <th class="l-assignee">Droits</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td class="role_id">{{ $role->id }} </td>
                            <td class="role_nom">{{ $role->nom }}</td>
                            <td class="d-none type_id">{{ $role->type }}</td>
                            <td class="type_nom">
                                {{-- {{ $role->type == 1 ? 'Active' : 'Non active' }} --}}
                                @if ($role->type == 1)
                                    <span class="btn btn-success sm">Active</span>
                                @else
                                    <span class="btn btn-danger sm">Non active</span>
                                @endif
                            </td>
                            <td>{{ count($role->users) }} </td>
                            <td>{{ count($role->droits) }}</td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle"
                                        href="#"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item update_modal" data-toggle="modal"
                                            data-target="#edit_custom_policy"><i class="fa fa-pencil m-r-5"></i>
                                            Editer</a>
                                        <a href="#" class="dropdown-item delete_modal" data-toggle="modal"
                                            data-target="#delete_custom_policy"><i class="fa fa-trash-o m-r-5"></i>
                                            Supprimer</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click', '.update_modal', function() {
            var _this = $(this).parents('tr');
            $('#e_role_id').val(_this.find('.role_id').text());
            var role_id = $('#e_role_id').val();
            $('#e_role_nom').val(_this.find('.role_nom').text());
            var type_nom = (_this.find(".type_nom").text());
            var _option = '<option selected value="' + _this.find('.type_id').text() + '">' + type_nom + '</option>'
            $(_option).appendTo("#e_role_type");

            $.ajax({
                url: '/admin/exceptDroit',
                type: 'POST',
                data: '&id=' + role_id + '&_token={{ csrf_token() }}',
                success: function(resultat) {
                    $('#edit_customleave_select').html(resultat);
                }
            });

            $.ajax({
                url: '/admin/getDroit',
                type: 'POST',
                data: '&id=' + role_id + '&_token={{ csrf_token() }}',
                success: function(resultat) {
                    $('#edit_customleave_select_to').html(resultat);
                }
            });

        })
        $(document).on('click', '.delete_modal', function() {
            var _this = $(this).parents('tr');
            $('.e_role_id').val(_this.find('.role_id').text());
        })
    </script>
@endsection
