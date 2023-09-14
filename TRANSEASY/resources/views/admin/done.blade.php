@extends('layouts.app')

@section('content')
<header class="masthead">
<div class="container-xl ">
    <div class="alert alert-success text-center">
    <h3 class="text-success text-center pb-5"> vous avez cree un voyage avec success </h3>
    <div class="text-center"><a href="{{ route('voyage.create') }}" class="btn btn-info " type="button"> Retour</a></div>
    </div>
</div>
</header>

@endsection
