@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
     </div>
     @if ($errors->any())
         <div class="alert alert-danger">
              <ul>
                   @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                   @endforeach
              </ul>
         </div>
     @endif
     <div class="card shadow">
          <div class="card-body">
               <form action="{{route('gallery.update',$item->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                         <label for="travel_packages_id">Paket Travel</label>
                         <select name="travel_packages_id" id="" required class="form-control">
                              <option value="{{$item->travel_packaged_id}}">JANGAN DI UBAH</option>
                              @foreach($travel_packages as $travel_package)
                                   <option value="{{$travel_package->id}}">
                                        {{$travel_package->title}}
                                   </option>
                              @endforeach
                         </select>
                    </div>

                    <div class="form-group">
                         <label for="image">Image</label>
                         <input type="file" class="form-control" name="image" placeholder="image">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                         Simpan
                    </button>
               </form>
          </div>
     </div>

   </div>
   <!-- /.container-fluid -->
@endsection

@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Edit Paket Travel {{$item->title}}</h1>
     </div>
     @if ($errors->any())
         <div class="alert alert-danger">
              <ul>
                   @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                   @endforeach
              </ul>
         </div>
     @endif
     <div class="card shadow">
          <div class="card-body">
               <form action="{{route('travel-package.update',$item->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                         <label for="title">Title</label>
                         <input type="text" class="form-control" name="title" placeholder="Title" value="{{$item->title}}">
                    </div>
                    <div class="form-group">
                         <label for="location">Location</label>
                         <input type="text" class="form-control" name="location" placeholder="Title" value="{{$item->location}}">
                    </div>
                    <div class="form-group">
                         <label for="about">About</label>
                         <textarea name="about" id="about" class="d-block w-100 form-control" rows="10">{{$item->about}}</textarea>
                    </div>
                    <div class="form-group">
                         <label for="featured_event">Featured Event</label>
                         <input type="text" class="form-control" name="featured_event" placeholder="Featured Event" value="{{$item->featured_event}}">
                    </div>
                    <div class="form-group">
                         <label for="language">Language</label>
                         <input type="text" class="form-control" name="language" placeholder="Language" value="{{$item->language}}">
                    </div>
                    <div class="form-group">
                         <label for="food">Food</label>
                         <input type="text" class="form-control" name="foods" placeholder="Food" value="{{$item->foods}}">
                    </div>
                    <div class="form-group">
                         <label for="departure_date">Departure Date</label>
                         <input type="date" class="form-control" name="departure_date" placeholder="Departure Date" value="{{$item->departure_date}}">
                    </div>
                    <div class="form-group">
                         <label for="duration">Duration</label>
                         <input type="text" class="form-control" name="duration" placeholder="Duration" value="{{$item->duration}}">
                    </div>
                    <div class="form-group">
                         <label for="type">Type</label>
                         <input type="text" class="form-control" name="type" placeholder="Type" value="{{$item->type}}">
                    </div>
                    <div class="form-group">
                         <label for="price">Price</label>
                         <input type="number" class="form-control" name="price" placeholder="Price" value="{{$item->price}}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                         Simpan
                    </button>
               </form>
          </div>
     </div>

   </div>
   <!-- /.container-fluid -->
@endsection

