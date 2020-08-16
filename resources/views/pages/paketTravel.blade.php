@extends('layouts.app')

@section('title','Paket Travel')
@push('addon-style')
    <style>
        #myProgress {
            width: 100%;
            background-color: grey;
        }

        #myBar {
            width: 1%;
            height: 5px !important;
            background-color: green;
        }

        .card-travel {
            min-height: 380px;
            background-color: #000000;
            color: #fff;
            padding: 30px;
            background-size: cover;
            margin-bottom: 30px;
        }

    </style>
@endpush
@section('content')
<main>
    <header class="text-center" style="padding: 240px 0px 20px 0px; background-image:url();background-color:#071C4D">
        <div class="container">
            <h1>
                Find Your Destination
            </h1>
            <p>
                You will see beutiful
                </br>
                Moment never see you before
            </p>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div id="form-search" class="input-group mb-3" style="margin-top:40px" method="POST">
                        <input type="hidden" id="url" value="{{ route('search-travel') }}">
                        <input type="text" id="search" class="form-control search-value" placeholder="Cari Travel"
                            value="" style="padding: 1.5rem 0.75rem;border-radius:8px 0 0 8px">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="search-button" type="submit" id="button-addon2"
                                style="padding: 0.5rem 1rem;">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="section-popular-content" id="popularContent">
        <div id="myProgress">
            <div id="myBar"></div>
        </div>
        <div class="container" style="margin-top:30px">
            <div class="section-popular-travel row justify-content-center container-search">
                @foreach($items as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-travel text-center d-flex flex-column"
                            style="background-image: url('{{ $item->galleries->count()?Storage::url($item->galleries->first()->image):'' }}');">
                            <div class="travel-country">{{ $item->location }}</div>
                            <div class="travel-location">
                                {{ $item->title }}
                            </div>
                            <div class="travel-button mt-auto">
                                <a href="{{ route('detail',$item->slug) }}"
                                    class="btn btn-travel-detail px-4">
                                    Views Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection

@push('addon-script')
    <script>
        $("#myBar").hide()
        url = $('#url').val();
        var i = 0;
        $("#search-button").click(function (e) {
            value = $("#search").val();
            e.preventDefault();
            $.ajax({
                type: "get",
                url: url,
                data: {
                    'search': value
                },
                beforeSend: function () {
                    $("#myBar").show()
                    if (i == 0) {
                        i = 1;
                        var elem = document.getElementById("myBar");
                        var width = 1;
                        var id = setInterval(frame, 10);

                        function frame() {
                            if (width >= 100) {
                                clearInterval(id);
                                i = 0;
                            } else {
                                width++;
                                elem.style.width = width + "%";
                            }
                        }
                    }
                },
                success: function (data) {
                    $("#myBar").hide()
                    $(".container-search").html(data);
                },
                error: function () {
                    $("#myBar").hide()
                    console.log("error");
                }
            });
        });

    </script>
@endpush
