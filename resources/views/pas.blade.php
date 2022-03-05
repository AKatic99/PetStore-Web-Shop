@extends('layouts.nav')

@section('content')
    <div class="container">
        <div class="row mt-4">
        @foreach($dogProducts as $dogProduct)
            @if($dogProduct->categories->naziv=='Pas')
                <div class="col-md-3 mb-3">
                    <div class="card"style="width: 18rem;">
                        <img src="{{asset('assets/uploads/products/'.$dogProduct->slika)}}" class="card-img mx-auto" alt="..." style="width: 12rem; height:12rem; ">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$dogProduct->naziv_proizvoda}}</h5>
                            <p class="card-text">{{$dogProduct->opis}}</p>
                            <p class="fw-bold">{{$dogProduct->cijena}} KM</p>
                            <a href="#" class="btn btn-primary">Dodaj u košaricu</a>
                        </div>
                    </div>
                </div>
        @endif
        @endforeach
        </div>
    </div>
@endsection
