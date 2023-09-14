@extends('layouts.app')
@section('content')
<header class="masthead">


@if ($data->isempty())
{{-- <div class="p-t-150"></div> --}}
<table class="table rounded-3 ">

        <div class="container ">
        <thead>


            <tr class="bg-secondary "> <td>heur de depart</td>
                <td>depart <br> destination</td>
                <td>prix</td>
                <td>Reserver</td>
            </tr>

        </thead>
        </div>

    <tbody>


</tbody>


</table  >
<div class=" text-center pt-4">
 <h3 class="text-bold"> pas de voyage pour cette destination pour le momoment </h3>
</div>
@else
<div class=" container">
    <div class="">

<table class="table mt-5 bg-light rounded-3">

        <div class="container">
        <thead >

            <tr class="bg-secondary rounded-3 fw-bolder"> <td>heur de depart</td>
                <td>depart <br> destination</td>
                <td>prix</td>
                <td>Reserver</td>
            </tr>

        </thead>
        </div>

    <tbody class="fw-semibold">


        @foreach ($data as $data )



      <tr>
        <td >{{ $data->heure_depart }} PM</td>
        <td>{{$data->depart}} <br>
            {{$data->destination}}
        </td>

        <td class="text-info-emphasis">{{$data->price}} MAD</td>

        <td><a  href="{{ route('place.show',$data->id) }}" type="button" class="btn btn-warning">reserver maintenet</a></td>






      </tr>
      @endforeach
    </div>
</tbody>

</div>
</table>
</div>
</div>

@endif
</header>

@endsection
