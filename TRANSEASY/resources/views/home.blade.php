@extends('layouts.app')

@section('content')







<div class="container p-t-100 ">
    <div class="row justify-content-center">

        <div class="col-md-8">
            {{-- <div class="card"> --}}
                <div class="card-header p-t-30 text-center "><h2>{{ __('Dashboard') }}</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif



                    {{-- {{ __('You are logged in!') }} --}}
                    <br><br>
                    

                    <div class="row">
                        <div class="col-sm">
                        <div class="card " style="width: 15rem;">
                            <img src="\images\dash_images\qr_dash.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">scanner ticket</h5>
                              <a href="{{ url('toscan')}}" class="btn btn-primary">aller pour scanner</a>
                            </div>
                          </div>
                        </div>
                          <div class="col-sm pb-4"> <div class="card " style="width: 15rem;">
                            <img src="\images\dash_images\bus_dash.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">afficher les voyages</h5>
                              <a href="{{ route('voyage.index') }}" class="btn btn-primary">Voir les voyages</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm"> <div class="card " style="width: 15rem;">
                            <img src="\images\dash_images\add_dash.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">ajouter un voyage</h5>
                              <a href="{{ route('voyage.create') }}" class="btn btn-primary">Voir les voyages</a>
                            </div>
                          </div>
                        </div>
                    </div>
                    {{-- <span class="plane"><img width="40" height="40" src="\images\ticket_icons\bus.png" alt="bus"/></span> --}}
                    {{-- <div class="row">
                        <div class="col-sm pb-3"><a href="{{ route('voyage.index') }}" class="btn btn-primary ">Voir les voyages</a></div>
                        <div class="col-sm text-end pb-3 "><a href="{{ url('toscan')}}" class="btn btn-primary">scan qr code </a></div>
                    </div> --}}


                </div>
            {{-- </div> --}}
        </div>
    </div>



    </div>
</div>












@endsection
