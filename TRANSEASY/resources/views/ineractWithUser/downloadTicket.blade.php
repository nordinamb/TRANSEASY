
@extends('layouts.app')
@section('content')
<!-- your.view.blade.php -->

<!-- Display the data from $objData -->
<header class="masthead">
<div class=" text-center">
    <h1 class="text-warning">telecharger votre ticket</h1>
<div class="container" >
<a href="{{asset('storage\tickets\token.pdf')}} " download class="text-center"><div class="d-flex justify-content-center align-items-center"><img src="\images\download\downloadicon.png" alt="Icon" width="60px" height="60px" ></div></a>
</div>
</div>
</header>

@endsection

