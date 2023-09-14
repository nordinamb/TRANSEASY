<?php

namespace App\Http\Controllers;
use App\Models\Place ;
use App\Models\Voyage;

use Illuminate\Http\Request;
use App\Models\Checkout;
class CheckoutController extends Controller
{
   public function create($id){

      return view('ineractWithUser.checkout',compact('id')) ;

   }

   public function store(Request $request,$id){
    $var_token = uniqid() ;
    Checkout::create([
        'place_id'=>$id ,
        'first_name'=>$request->first_name,
        'phone_number'=>$request->phone_number,
        'last_name'=>$request->last_name,
        'email'=>$request->email,
        'addresse'=>$request->addresse,
        'ville'=>$request->ville,
        'code_postal'=>$request->code_postal,
        'token'=>$var_token,
    ]) ;

    $place = Place::findOrFail($id);

    $place->update([
        'status'=>true ,
    ]);

    $voyage = Voyage::findOrfail($place->voyage_id);
    $voyage->update([
        'seatsavb'=>($voyage->seatsavb)-1 ,
    ]);

    $name = $request->first_name.' '.$request->last_name ;

    return redirect()->route('ticket.create',['token'=>$var_token,'place_number'=>$place->number,'name'=>$name,'from'=>$request->ville,'to'=>$voyage->destination,'date'=>$voyage->date_depart]) ;





   }
   public function show (Request $request){
      $checkout = Checkout::where('token',$request->qrcode)
                ->get() ;
                return view('controller.isValidOrN',compact('checkout')) ;
   }

}

