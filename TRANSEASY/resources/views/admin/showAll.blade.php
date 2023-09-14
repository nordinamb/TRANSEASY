@extends('layouts.app')
@section('content')
    @php

        use Carbon\Carbon;
    @endphp

    @if ($data->isempty())
        <div class="p-t-100">
            <p> pas de voyage</p>
        </div>
    @else
        <header class="masthead">

            <div class=" container">
                @if (session('update'))
                    <div class="alert alert-success text-center">
                        {{ session('update') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bd-example card">



                    <table class="table">
                        <div class="card-body">
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>
                                        <h6 class="fw-bold">{{ $item->heure_depart }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="fw-bold">{{ $item->depart }}</h6> <br>
                                        <h6 class="fw-bold">{{ $item->destination }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="fw-bold">{{ $item->price }}</h6>
                                    </td>
                                    <td>
                                        <a href="{{ route('place.show', $item->id) }}" type="button" class="btn btn-info">{{ $item->seatsavb }} place</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('voyage.edit', $item) }}" type="button" class="btn btn-success">modifier</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('voyage.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">supprimer</button>
                                        </form>
                                    </td>
                                    <td>
                                        <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight{{ $item->id }}" aria-controls="offcanvasRight{{ $item->id }}">plus ...</button>

                                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight{{ $item->id }}" aria-labelledby="offcanvasRightLabel">
                                            <div class="offcanvas-header">
                                                <h5 class="offcanvas-title" id="offcanvasRightLabel">Information financiers</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                            </div>


                                            <div class="offcanvas-body">
                                                <div class="d-flex justify-content-start pb-4 container"><h6 class="fw-bold text-danger">{{ $item->depart }}</h6>
                                                    </div>
                                                    <div class="d-flex justify-content-start pb-4 container">
                                                        <h6 class="fw-bold text-success">{{ $item->destination }}</h6></div>
                                                <div class="container">
                                                    <div class=" mb-4 ">
                                                        <div class="card border-left-info shadow h-100 py-2">
                                                            <div class="card-body">
                                                                <div class="row no-gutters align-items-center">
                                                                    <div class="col mr-2">
                                                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Place reserver</div>
                                                                        <div class="row no-gutters align-items-center">
                                                                            <div class="col-auto">
                                                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ ($item->seatsavb / 40) * 100 }}%</div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="progress progress-sm mr-2">
                                                                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{ ($item->seatsavb / 40) * 100 }}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-4">
                                                        <div class="card border-left-success shadow h-100 py-2">
                                                            <div class="card-body">
                                                                <div class="row no-gutters align-items-center">
                                                                    <div class="col mr-2">
                                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total des revenus</div>
                                                                        <div class="h5 mb-0 font-weight-bold text-gray-800 px-4">{{ $item->price * (40 - $item->seatsavb) }} MAD</div>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </table>
                                </div>
            </div>
        </header>
    @endif

@endsection
