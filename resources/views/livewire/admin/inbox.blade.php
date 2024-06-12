<div>
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Message</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Message</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    @if ($afficherInbox)
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="email-header">
                            <div class="row">
                                <div class="col top-action-left">
                                    <div class="float-left">
                                        <div class="btn-group dropdown-action">
                                            <button type="button" class="btn btn-white dropdown-toggle"
                                                data-toggle="dropdown">Selectionner <i
                                                    class="fa fa-angle-down "></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">All</a>
                                                <a class="dropdown-item" href="#">None</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Read</a>
                                                <a class="dropdown-item" href="#">Unread</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="float-left d-none d-sm-block">
                                        <input type="text" placeholder="Search Messages"
                                            class="form-control search-message">
                                    </div>
                                </div>
                                <div class="col-auto top-action-right">
                                    <div class="text-right">
                                        <button type="button" title="Refresh" data-toggle="tooltip"
                                            class="btn btn-white d-none d-md-inline-block"><i
                                                class="fa fa-refresh"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="email-content">
                            <div class="table-responsive">
                                <table class="table table-inbox table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="6">
                                                <input type="checkbox" class="checkbox-all">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($contactListes as $contact)
                                            <tr class="">
                                                <td>
                                                    <input type="checkbox" class="checkmail">
                                                </td>
                                                <td><span class="mail-important"><i
                                                            class="fa fa-star starred"></i></span>
                                                </td>
                                                <td class="name" wire:click="afficheDetail({{ $contact->id }})">
                                                    {{ $contact->nom_complet }}</td>
                                                @php
                                                    if (!function_exists('tronquerTexte')) {
                                                        function tronquerTexte($texte, $longueurMax, $suffixe = '...')
                                                        {
                                                            if (strlen($texte) > $longueurMax) {
                                                                return substr(
                                                                    $texte,
                                                                    0,
                                                                    $longueurMax - strlen($suffixe),
                                                                ) . $suffixe;
                                                            }
                                                            return $texte;
                                                        }
                                                    }
                                                @endphp
                                                <td class="subject">
                                                    {{ tronquerTexte($contact->message, 50) }}
                                                </td>
                                                <td><i class="fa fa-paperclip"></i></td>
                                                <td class="mail-date">
                                                    {{ \Carbon\Carbon::parse($contact->created_at)->isoFormat('LL') }}
                                                </td>
                                            </tr>
                                        @empty
                                            <h3>Pas de message pour le moment</h3>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($afficherDetail)
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="mailview-content">
                            <div class="mailview-header">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="text-ellipsis m-b-10">
                                            <span class="mail-view-title">OptiRH la solution RH</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="mail-view-action">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-white btn-sm"
                                                    data-bs-toggle="tooltip" title="Delete">
                                                    <i class="fa-regular fa-trash-can"></i></button>
                                                <button type="button" class="btn btn-white btn-sm"
                                                    data-bs-toggle="tooltip" title="Reply">
                                                    <i class="fa-solid fa-reply"></i></button>
                                                <button type="button" class="btn btn-white btn-sm"
                                                    data-bs-toggle="tooltip" title="Forward">
                                                    <i class="fa fa-share"></i></button>
                                            </div>
                                            <button type="button" class="btn btn-white btn-sm" data-bs-toggle="tooltip"
                                                title="Print"> <i class="fa-solid fa-print"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="sender-info">
                                    <div class="sender-img">
                                        <img width="40" src="{{ asset('admin/assets/img/téléchargement.png') }}" alt="User Image"
                                            class="rounded-circle">
                                    </div>
                                    <div class="receiver-details float-start">
                                        <span class="sender-name">{{ $detailInbox->nom_complet }}
                                            (<a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="aec4c1c6c0c4c1cbeecbd6cfc3dec2cb80cdc1c3">[{{ $detailInbox->email }}]</a>)
                                        </span>
                                        <span class="receiver-name">
                                            pour
                                            <span>moi</span>,
                                            <span>Bakary</span>,
                                            <span>KANTE</span>
                                        </span>
                                    </div>
                                    <div class="mail-sent-time">
                                        <span class="mail-time">{{ \Carbon\Carbon::parse($detailInbox->created_at)->isoFormat('LL') }}</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="mailview-inner">
                                <p>Bonjour Bakary,</p>
                                <p>{{ $detailInbox->message }}.</p>
                                <p>Cordialement,<br>
                                    {{ $detailInbox->nom_complet }}</p>
                            </div>
                        </div>
                        {{-- <div class="mail-attachments">
                            <p><i class="fa-solid fa-paperclip"></i>
                                2 Attachments - <a href="#">View
                                    all</a> | <a href="#">Download
                                    all</a></p>
                            <ul class="attachments clearfix">
                                <li>
                                    <div class="attach-file"><i class="fa-regular fa-file-pdf"></i></div>
                                    <div class="attach-info"> <a href="#"
                                            class="attach-filename">daily_meeting.pdf</a>
                                        <div class="attach-fileize">
                                            842 KB</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="attach-file"><i class="fa-regular fa-file-word"></i></div>
                                    <div class="attach-info"> <a href="#"
                                            class="attach-filename">documentation.docx</a>
                                        <div class="attach-fileize">
                                            2,305 KB</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="attach-file"><img src="assets/img/placeholder.jpg" alt="Attachment">
                                    </div>
                                    <div class="attach-info"> <a href="#"
                                            class="attach-filename">webdesign.png</a>
                                        <div class="attach-fileize">
                                            1.42 MB</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="attach-file"><img src="assets/img/placeholder.jpg" alt="Attachment">
                                    </div>
                                    <div class="attach-info"> <a href="#"
                                            class="attach-filename">webdevelopment.png</a>
                                        <div class="attach-fileize">
                                            1.1 MB</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="mailview-footer">
                            <div class="row">
                                <div class="col-sm-6 left-action">
                                    <button type="button" class="btn btn-white"><i class="fa-solid fa-reply"></i>
                                        Reply</button>
                                    <button type="button" class="btn btn-white"><i class="fa fa-share"></i>
                                        Forward</button>
                                </div>
                                <div class="col-sm-6 right-action">
                                    <button type="button" class="btn btn-white"><i class="fa-solid fa-print"></i>
                                        Print</button>
                                    <button type="button" class="btn btn-white"><i
                                            class="fa-regular fa-trash-can"></i>
                                        Delete</button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
