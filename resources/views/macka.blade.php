@extends('layouts.nav')

@section('content')
    <div class="container">
        <div class="row mt-4">
            @foreach($catProducts as $catProduct)
                @if($catProduct->categories->naziv=='Mačka')
                    <div class="col-md-3 mb-3">
                        <div class="card"style="width: 18rem;">
                            <img src="{{asset('assets/uploads/products/'.$catProduct->slika)}}" class="card-img " alt="..." style="width: 12rem; height:12rem; margin-left: auto; margin-right: auto">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{$catProduct->naziv_proizvoda}}</h5>
                                <p class="card-text">{{$catProduct->opis}}</p>
                                <p class="fw-bold">{{$catProduct->cijena}} KM</p>
                                <a href="#" class="btn btn-primary">Dodaj u košaricu</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
