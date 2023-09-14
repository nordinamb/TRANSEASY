@extends('layouts.app')
@section('content')
<header class="masthead">
<div class="container col-8 my-5 br-2 rounded  containerBlur " style="color:#ffc800;">
    <div class="row g-3 d-flex justify-content-center align-item-center">

        <div class="col-8">
            <h4>Ajouter les informations acheteur</h4>
            <form action="{{ route('checkout.store',$id) }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="firstname">First Name</label>
                        <input type="text" id="firstname" class="form-control" name="first_name">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="lastname">Last name</label>
                        <input type="text" id="lastname" class="form-control" name="last_name">
                    </div>
                    <div class="col-12">
                        <label class="from-label" for="email">Email</label>
                        <div class="input-group">
                            <span class="input-group-text">@</span>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="address">Address </label>
                        <input type="text" id="address" class="form-control" name="addresse">
                    </div>

                    <div class="col-12">
                        <label class="form-label" for="code">Numero de Telephone</label>
                        <input  id="code" class="form-control" name="phone_number">
                    </div>

                    <div class="col-12">
                        <label class="form-label" for="code">code postal</label>
                        <input type="number" id="code" class="form-control" name="code_postal">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="ville">ville </label>
                        <input type="text" id="ville" class="form-control" name="ville">
                    </div>
                    <hr class="my-3">
                    <h4>Détail du paiement</h4>
                    <div class="form-check">
                        <input type="radio" class="form-check-input">
                        <label class="form-check-label">Credit Card</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input">
                        <label class="form-check-label">Debit Card</label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="cardname">Name on Card </label>
                            <input type="text" id="cardname" class="form-control">
                            <small class="text-muted">Full name as displayed on card</small>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="creditcard"> Card Number </label>
                            {{-- <input type="text" id="creditcard" class="form-control"> --}}
                            <input type="text" class="ccFormatMonitor form-control" placeholder="Card Number">
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="expiration">Expiration </label>
                            {{-- <input type="text" id="expiration" class="form-control"> --}}
                            <input
                            type="text"
                            id="inputExpDate"
                            placeholder="MM / YY"
                            class="form-control"
                            maxlength='7'>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="cvv">CVV </label>
                            {{-- <input type="text" id="cvv" class="form-control"> --}}
                            <input type="password" class="cvv form-control" placeholder="CVV">
                        </div>
                    </div>
                    <hr class="my-3">

                <button type="submit" class="btn btn-primary btn-block mb-4">Payer</button>
            </form>
        </div>
    </div>
</div>
</header>


@endsection
