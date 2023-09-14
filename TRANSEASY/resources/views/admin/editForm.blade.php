@extends('layouts.app')

@section('content')
<header class="masthead" style="color:#ffc800;">
<div class=" container containerBlur">
    <h2 class="my-3"> create voyage</h2>
<form action="{{ route('voyage.update', $voyage->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-6">
<label for="" class="form-label" >bus depart:</label>
<select  id="select-city" class="form-control" placeholder="Pick a city..." name="depart">


    <option value="{{ $voyage->depart }}">{{ $voyage->depart }}</option>


</select>
        </div>
    <div class="col-6">
<label for=""  class="form-label"> bus detination  :</label>
<select  id="select-city" class="form-control" placeholder="Pick a city..." name="destination">
<option value="{{ $voyage->destination }}">{{ $voyage->destination }}</option>


</select>
    </div>
    </div>
    <div class="row">
        <div class="col-6">
<label for="" class="form-label">seats available :</label>
<input type="number" name="seatsavb" class="form-control" value="{{ $voyage->seatsavb }}" required>
        </div>
<div class="col-6">
<label for=""class="form-label">price :</label>
<input type="number" name="price" class="form-control" value="{{ $voyage->price }}" required>
</div>
</div>
<div class="row">
    <div class="col-6">
<label for="" class="form-label">heure de depart</label>
<input type="time" name="heure_depart" class="form-control" value="{{ $voyage->heure_depart }}" required>
    </div>
<div class="col-6">
<label for="" class="form-label">date de depart</label>
<input type="date" name="date_depart" class="form-control" value="{{ $voyage->date_depart }}" required>
</div>
</div>
<div class=" my-3">
<button class="btn btn-warning mb-3" type="submit">modifier voyage </button>
</div>
</form>
</div>
</header>
@endsection
