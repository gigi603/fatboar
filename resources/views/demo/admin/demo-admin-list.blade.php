@extends('layouts.demo')
@section('title', 'Admin Tickets')
@section('content')
    {{-- Admin tickets--}}
    <main class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-8">
                    <div class="my-5">
                        <h2 class="text-center">
                            <strong>Tickets</strong>
                        </h2>
                        <hr class="my-4" />

                        {{--
                        @if($user_tickets_recompenses->length == 0)
                            <p> Il n'y a pas des tickets. </p>
                         @else
                         --}}
                            {{-- Table --}}
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">R&eacute;compense</th>
                                        <th scope="col">Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach($users_tickets_recompenses as $user_tickets_recompenses) --}}
                                            <tr>
                                                <td>{{--$user_tickets_recompenses->numero_ticket--}} 10BEQ5k8A</td>
                                                <td>{{--$user_tickets_recompenses->nom_recompense--}} Un burger au choix</td>
                                                {{--
                                                @if($user_tickets_recompenses->status == 1)
                                                    <td>
                                                        <span class="badge badge-pill badge-success">
                                                        <i class="far fa-check-circle"></i>
                                                        Activ&eacute;
                                                        </span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="badge badge-pill badge-danger">
                                                        <i class="far fa-pause-circle"></i>
                                                        Reclam&eacute;
                                                        </span>
                                                    </td>
                                                @endif
                                                --}}
                                                <td>
                                                    <span class="badge badge-pill badge-danger">
                                                    <i class="far fa-pause-circle"></i>
                                                    Delete Me !
                                                    </span>
                                                </td>
                                            </tr>
                                        {{--@endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                            {{-- End Table --}}
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{-- End admin tickets --}}
@endsection
