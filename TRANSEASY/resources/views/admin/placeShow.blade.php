@extends('layouts.app')
@section('content')
    @if ($places->isEmpty())
        <h4>pas de resultats </h4>
    @else
        @php
            $chunks = $places->chunk(4);
        @endphp
        <div class="p-t-150  pb-5 ">


                <div class=" container justify-content-center bg-secondary p-5 rounded-3 ">
                    <div class=" container justify-content-center  ">
                <div class="col-sm-1 justify-content-center  ">
                    <a  class="btn btn-mine non-clickable-link" >
                    <svg viewBox="0 0 24 24"  width="40" height="40">
                        <path d="M12,22A10,10,0,1,0,2,12,10,10,0,0,0,12,22ZM4.07,13H9.18A3,3,0,0,0,11,14.82v5.11A8,8,0,0,1,4.07,13ZM11,12a1,1,0,1,1,1,1A1,1,0,0,1,11,12Zm2,7.93V14.82A3,3,0,0,0,14.82,13h5.11A8,8,0,0,1,13,19.93ZM12,4a8,8,0,0,1,7.93,7H14.82a3,3,0,0,0-5.64,0H4.07A8,8,0,0,1,12,4Z"/>
                      </svg>
                    </a>
                                              </div>
                <div class="col-sm-1 justify-content-center ">
                    <a  class="btn btn-mine non-clickable-link" >
                    <img src="/images/armchair_noseat.svg" style="transform: rotate(180deg);" alt="">
                    </a>
                </div>
                @foreach ($chunks as $chunk)

                    <div class="row">

                        @foreach ($chunk as $item)

                                @if ($item->status == 1)
                                <div class="col-sm-1" class="btn btn-mine">
                                    <a  class="btn btn-mine non-clickable-link " >
                                        <img src="/images/armchair_noseat.svg" style="transform: rotate(180deg);">
                                    </a>
                                </div>
                                @else
                                <div class="col-sm-1 social">
                                    <a href="{{ route('checkout.create',$item->id) }}" type="button" class="btn btn-mine">
                                        <img src="/images/armchair.svg" style="transform: rotate(180deg);">
                                      </a>
                                </div>
                                    @if ($item->number % 2 == 0)
                                        {{-- <img src="/images/nothing.svg" alt=""> --}}
                                    @endif
                                @endif
                                @if ($loop->iteration == 2)
                                <div class="col-sm-1">
                                <img src="/images/nothing.svg" alt="">
                                </div>
                                @endif
                                {{-- @if ($item->number % 2 == 0)
                                    <img src="/images/nothing.svg" alt="">
                                @endif --}}

                        @endforeach
                    </div>
                @endforeach
            </div>

        </div>

        </div>

    @endif
    <div class="fs-5 fw-bold bg-light p-4 rounded-4"  id="rv2"> <h5 class="text-warning">comment reserver une place :</h5>  <br> <br>
        <img src="/images/armchair_noseat.svg" style="transform: rotate(180deg);" alt="" class="px-3"> Place indisponible <br> <br>
        <img src="/images/armchair.svg" style="transform: rotate(180deg);" class="px-3"> Place disponible


    </div>
@endsection
