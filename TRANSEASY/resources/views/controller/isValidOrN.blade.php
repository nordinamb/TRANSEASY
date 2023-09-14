@extends('layouts.app')
@section('content')
@if ($checkout->isempty())
<header class="masthead ">
<div class=" container alert alert-danger text-center p-4">
    <h1 class="text-danger "> <i class="bi bi-exclamation-lg"></i> ce billet n'est pas validée </h1>
</div>
</header>
@else
<header class="masthead ">
    <div class=" container alert alert-success text-center pt-4">


 <h1  class="text-success "> <i class="bi bi-check2-all"></i> le billet est validée </h1><br><br> </div>

<div class="pt-5">
        @foreach ($checkout as $checkout )
        {{-- <div class="fw-bold">name : {{ $checkout->first_name .' '.$checkout->last_name }}</div> <br>
                email : {{ $checkout->email }} <br>
                telephone : {{$checkout->phone_number }} --}}


                <ol class="list-group container pb-4">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">   Nom de passager</div>
                        {{ $checkout->first_name .' '.$checkout->last_name }}
                      </div>
                      {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">E-mail :</div>
                        {{ $checkout->email }}
                      </div>
                      {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">Numéro de téléphone:</div>
                        {{$checkout->phone_number }}
                      </div>
                      {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold">Date de résérvation:</div>
                          {{$checkout->created_at }}
                        </div>
                        {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                      </li>
                  </ol>
        @endforeach
    </div>


</header>
@endif

@endsection





