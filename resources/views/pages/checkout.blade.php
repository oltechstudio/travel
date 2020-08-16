@extends('layouts.checkout')
@section('title','Checkout')

@push('prepend-style')
	<link rel="stylesheet" type="text/css" href="{{url('/frontend/libraries/gijgo/css/gijgo.css')}}">
@endpush

@section('content')
<main>
     <section class="section-detail-header">
          
     </section>
     <section class="section-details-content">
          <div class="container">
               <div class="row">
                    <div class="col p-0">
                         <nav aria-label="breadcrumb">
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
                              <h1>Who Is Going</h1>
                              <p>
                                   Trip To {{$item->travel_package->title}}, {{$item->travel_package->location}}
                              </p>
                              <div class="attendee">
                                   @if ($errors->any())
                              <div class="alert alert-danger">
                                   <ul>
                                        @foreach($errors->all() as $error)
                                              <li>{{$error}}</li>
                                        @endforeach
                                   </ul>
                              </div>
                              @endif
                                   <table class="table table-responsive-sm text-center">
                                        <thead>
                                             <tr>
                                                  <td>
                                                       Picture
                                                  </td>
                                                  <td>
                                                       Name
                                                  </td>
                                                  <td>
                                                       Nationality
                                                  </td>
                                                  <td>
                                                       Visa
                                                  </td>
                                                  <td>
                                                       Password
                                                  </td>
                                                  <td>

                                                  </td>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             @forelse ($item->details as $detail)
                                             <tr>
                                                  <td>
                                                       <img src="https://ui-avatars.com/api/?name={{$detail->username}}" class="rounded-circle" alt="" height="60px">
                                                  </td>
                                                  <td class="align-middle">
                                                       {{$detail->username}}
                                                  </td>
                                                  <td class="align-middle">
                                                       {{$detail->nationality}}
                                                  </td>
                                                  <td class="align-middle">
                                                       {{$detail->is_visa?'30 Days':'N/A'}}
                                                  </td>
                                                  <td class="align-middle">
                                                       {{\Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now()?'Active':'Inactive'}}
                                                  </td>
                                                  <td class="align-middle">
                                                       <a href="{{route('checkout-remove',$detail->id)}}">
                                                            <img src="{{url('frontend/images/ic_remove.png')}}" alt="">
                                                       </a>
                                                  </td>
                                             </tr>
                                             @empty
                                                 <tr>
                                                      <td colspan="6">
                                                            No Visitor
                                                      </td>
                                                 </tr>
                                             @endforelse
                                        </tbody>
                                   </table>
                              </div>

                              <div class="member mt-3">
                                   <h2>Add Member</h2>
                                   <form action="{{route('checkout-create',$item->id)}}" class="form-inline" method="post">
                                        @csrf
                                        <label for="inputUsername" class="sr-only">
                                             Name
                                        </label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="username" id="inputUsername" placeholder="username">
                                        <label for="nationality" class="sr-only">
                                             Nationality
                                        </label>
                                        <input type="text" style="width:70px" class="form-control mb-2 mr-sm-2" name="nationality" id="nationality" placeholder="Nationality" required>
                                        <label for="is_visa" class="sr-only">
                                             Visa
                                        </label>
                                        <select class="custom-select form-control mb-2 mr-sm-2" required name="is_visa" id="is_visa" placeholder="Input Visa">
                                             <option value="">VISA</option>
                                             <option value="1">30 days</option>
                                             <option value="0">N/A</option>
                                        </select>

                                        <label for="doePassport" class="sr-only">DOE Password</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                             <input type="text" class="form-control datepicker" name="doe_passport" id="doePassport" placeholder="DOE Passport">
                                        </div>
                                        <button type="submit" class="btn btn-add-now mb-2 px-4 float-right">
                                             Add Now
                                        </button>
                                   </form>
                                   <h6 class="mt-3 mb-0">Note</h6>
                                   <p class="mb-0 disclaimer">
                                        You are only able
                                   </p>
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-4">
                         <div class="card card-details card-right">
                              <h2>
                                   Checkout Information
                              </h2>
                              <table class="trip-informations">
                                   <tr>
                                        <th width="50%">
                                             Members
                                        </th>
                                        <td width="50%" class="text-right">
                                             {{$item->details->count()}} Persons
                                        </td>
                                   </tr>
                                   <tr>
                                        <th width="50%">
                                             Additional VISA
                                        </th>
                                        <td width="50%" class="text-right">
                                             $ {{$item->additional_visa}},00
                                        </td>
                                   </tr>
                                   <tr>
                                        <th width="50%">
                                             Trip Price
                                        </th>
                                        <td width="50%" class="text-right">
                                             $ {{$item->travel_package->price}} / Perperson
                                        </td>
                                   </tr>
                                   <tr>
                                        <th width="50%">
                                             Sub Total
                                        </th>
                                        <td width="50%" class="text-right">
                                             $ {{$item->transaction_total}},00
                                        </td>
                                   </tr>
                                   <tr>
                                        <th width="50%">
                                             Total (+Unique)
                                        </th>
                                        <td width="50%" class="text-right text-total">
                                             <span class="text-blue">$ {{$item->transaction_total}}</span>
                                             <span class="text-orange">,{{mt_rand(0,99)}}</span>
                                        </td>
                                   </tr>
                              </table>
                              <hr>
                              <h2>Payment Instructions</h2>
                              <p class="payment-instruction">
                                   Please Complete your payment before to continue
                              </p>
                              <div class="bank">
                                   <div class="bank-item pb-3">
                                        <img src="{{url('frontend/images/ic_bank.png')}}" alt="" class="bank-image">
                                        <div class="description">
                                             <h3>PT Nomads Id</h3>
                                             <p>
                                                  0811 99090
                                                  <br>
                                                  Bank Rakyat Indonesia (BRI)
                                             </p>
                                        </div>
                                        <div class="clearfix"></div>
                                   </div>
                                   <div class="bank-item pb-3">
                                        <img src="{{url('frontend/images/ic_bank.png')}}" alt="" class="bank-image">
                                        <div class="description">
                                             <h3>PT Nomads Id</h3>
                                             <p>
                                                  0811 99090
                                                  <br>
                                                  Bank Central Asia (BCA)
                                             </p>
                                        </div>
                                        <div class="clearfix"></div>
                                   </div>
                              </div>
                         </div>
                         <div class="join-container">
                              <a href="{{route('checkout-success',$item->id)}}" class="btn btn-block btn-join-now mt-3 py-2">
                                   I Have Made Payment
                              </a>
                         </div>
                         <div class="text-center mt-3">
                               <a href="{{route('detail',$item->travel_package->slug)}}" class="text-muted">
                                    Cancel Booking
                               </a>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</main>
@endsection

@push('addon-script')
<script src="{{url('frontend/libraries/gijgo/js/gijgo.js')}}"></script>
	<script>
		$(document).ready(function(){
			$('.datepicker').datepicker({
                    format:'yyyy-mm-dd',
				uiLibrary:'bootstrap4',
				icons:{
					rightIcon:'<img src="{{url('frontend/images/ic_doe.png')}} ">'
				}
			});
		});
	</script>
@endpush