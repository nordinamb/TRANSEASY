@extends('layouts.app')

@section('content')
<header class="masthead" style="color:#ffc800;">
<div class=" container containerBlur">
    <h2 class="my-3"> créé voyage</h2>
<form action="{{ route('voyage.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-6">
<label for="" class="form-label" >bus depart:</label>
<select  id="select-city" class="form-control" placeholder="Pick a city..." name="depart">
    <option value="">Select a state...</option>
    @foreach ($cities as $city)
    <option value="{{ $city }}">{{ $city }}</option>

    @endforeach
</select>
        </div>
    <div class="col-6">
<label for=""  class="form-label"> bus detination  :</label>
<select  id="select-city" class="form-control" placeholder="Pick a city..." name="destination">
    <option value="">Select a state...</option>
    @foreach ($cities as $city)
    <option value="{{ $city }}">{{ $city }}</option>

    @endforeach
</select>
    </div>
    </div>
    <div class="row">
        <div class="col-6">
<label for="" class="form-label">seats available :</label>
<input type="number" name="seatsavb" class="form-control" required>
        </div>
<div class="col-6">
<label for=""class="form-label">price :</label>
<input type="number" name="price" class="form-control" required>
</div>
</div>
<div class="row">
    <div class="col-6">
<label for="" class="form-label">heure de depart</label>
<input type="time" name="heure_depart" class="form-control" required>
    </div>
<div class="col-6">
<label for="" class="form-label">date de depart</label>
<input type="date" name="date_depart" class="form-control" required>
</div>
</div>
<div class=" my-3">
    @php
            $today = date('Y-m-d'); // Get today's date
            @endphp
            <input type="hidden" name="today" value="{{ $today }}">
<button class="btn btn-warning mb-3" type="submit" onclick="return checkDate()" >ajouté voyage </button>
</div>
</form>
</div>
</header>
<script>
    function checkDate() {
        var selectedDate = new Date(document.getElementsByName('date_depart')[0].value);
        var today = new Date(document.getElementsByName('today')[0].value);

        if (selectedDate < today) {
            alert("La date sélectionnée est antérieure à la date d'aujourd'hui. Veuillez choisir une date valide.");
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
</script>
@endsection
