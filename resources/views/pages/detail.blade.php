@extends('layouts.app')

@section('title','Detail Travel')
     
@push('prepend-style')
     <link rel="stylesheet" type="text/css" href="{{url('frontend/libraries/xzoom/xzoom.css')}}">
@endpush

@section('content')
<main style="margin-top:60px">
     <section class="section-detail-header">
          
     </section>
     <section class="section-details-content">
          <div class="container">
               <div class="row">
                    <div class="col p-0">
                         <nav>
                              <ol class="breadcrumb">
                                   <li class="breadcrumb-item">
                                        Paket Travel
                                   </li>
                                   <li class="breadcrum-item active">
                                        Detailss
                                   </li>
                              </ol>
                         </nav>
                    </div>
               </div>
               <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                         <div class="card card-details">
                              <h1>{{$items->title}}</h1>
                              <p>
                                   {{$items->location}}
                              </p>
                              @if($items->galleries->count())
                              <div class="gallery">
                                   <div class="xzoom-container">
                                        <img src="{{Storage::url($items->galleries->first()->image)}}" alt="" class="xzoom" id="xzoom-default" xoriginal="{{Storage::url($items->galleries->first()->image)}}" width="100%">
                                   </div>
                                   <div class="xzoom-thumbs text-center">
                                        @foreach ($items->galleries as $gallery)
                                        <a href="{{Storage::url($gallery->image)}}">
                                             <img src="{{Storage::url($gallery->image)}}" alt="" class="xzoom-gallery" width="128" xpreview="{{Storage::url($gallery->image)}}">
                                        </a>
                                        @endforeach
                                   </div>
                              </div>
                              @endif
                              <h2>
                                   Tentang Wisata
                              </h2>
                              <p>
                                   {!!$items->about!!}
                              </p>
                              <div class="features row">
                                   <div class="col-md-4">
                                        <div class="description">
                                             <img src="{{url('frontend/images/ic_event.png')}}" alt="" class="features-image">
                                             <div class="description">
                                                  <h3>
                                                       Featured Event
                                                  </h3>
                                                  <p>{{$items->featured_event}}</p>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-md-4 border-left">
                                        <div class="description">
                                             <img src="{{url('frontend/images/ic_foods.png')}}" alt="" class="features-image">
                                             <div class="description">
                                                  <h3>
                                                       Food
                                                  </h3>
                                                  <p>{{$items->foods}}</p>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-md-4 border-left">
                                        <div class="description">
                                             <img src="{{url('frontend/images/ic_bahasa.png')}}" alt="" class="features-image">
                                             <div class="description">
                                                  <h3>
                                                       Language
                                                  </h3>
                                                  <p>{{$items->language}}k</p>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-4">
                         <div class="card card-details card-right">
                              <h2>
                                   Members are going
                              </h2>
                              <div class="members my-2">
                                   <img src="assets/frontend/images/avatar-1.png" class="members-image mr-1">
                                   <img src="assets/frontend/images/avatar-2.png" class="members-image mr-1">
                                   <img src="assets/frontend/images/avatar-3.png" class="members-image mr-1">
                                   <img src="assets/frontend/images/avatar-4.png" class="members-image mr-1">
                                   <img src="assets/frontend/images/avatar-1.png" class="members-image mr-1">
                                   
                              </div>
                              <hr>
                              <h2>
                                   Trip Informations
                              </h2>
                              <table class="trip-information">
                                   <tr>
                                        <th width="50%">
                                             Date of Departure
                                        </th>
                                        <td width="50%" class="text-right">
                                             {{\Carbon\Carbon::create($items->date_of_depature)->format('F n, Y')}}
                                        </td>
                                   </tr>
                                   <tr>
                                        <th width="50%">
                                             Duration
                                        </th>
                                        <td width="50%" class="text-right">
                                             {{$items->duration}}
                                        </td>
                                   </tr>
                                   <tr>
                                        <th width="50%">
                                             Type
                                        </th>
                                        <td width="50%" class="text-right">
                                             {{$items->type}}
                                        </td>
                                   </tr>
                                   <tr>
                                        <th width="50%">
                                             Price
                                        </th>
                                        <td width="50%" class="text-right">
                                             $ {{$items->price}},00 / person
                                        </td>
                                   </tr>
                              </table>
                         </div>
                         <div class="join-container">
                              @auth
                              <form action="{{route('checkout-process',$items->id)}}" method="POST">
                                   @csrf
                                   <button href="" class="btn btn-block btn-join-now mt-3 py-3" type="submit">
                                        Join Now
                                   </button>
                              </form> 
                              @endauth
                              @guest
                              <a href="" class="btn btn-block btn-join-now mt-3 py-3">
                                   Login / Register
                              </a>
                              @endguest
                         </div>
                    </div>
               </div>
          </div>
     </section>
</main>
@endsection

@push('addon-script')
<script src="{{url('frontend/libraries/xzoom/xzoom.min.js')}}"></script>
<script>
     $(document).ready(function(){
          $('.xzoom, .xzomm-gallery').xzoom({
               zoomWidth:500,
               title:false,
               tint:'#333',
               Xoffset:15
          });
     });
</script>
@endpush