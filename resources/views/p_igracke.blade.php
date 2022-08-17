@extends('layouts.nav3')

@section('content')
    <div class="container">
        <div class="row mt-4">
            @foreach($dogProducts as $dogProduct)
                @if($dogProduct->categories->naziv=='Pas')
                    @if($dogProduct->subcategories->naziv=='Igracke')
                        <div class="col-md-3 mb-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{asset('assets/uploads/products/'.$dogProduct->slika)}}" class="card-img mx-auto" alt="..." style="width: 12rem; height:12rem; ">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{$dogProduct->naziv_proizvoda}}</h5>
                                    <p class="card-text">{{$dogProduct->opis}}</p>
                                    <p class="fw-bold">{{$dogProduct->cijena}} KM</p>
                                    <a href="#" class="btn btn-primary">Dodaj u košaricu</a>
                                </div>
                                @if($dogProduct->kolicina > 0)
                                    <label class ="badge bg-success">Na stanju</label>
                                @else
                                    <label class ="badge bg-danger">Nema zaliha</label>
                                @endif
                                <div class = "row mt-2">
                                    <div class ="col-md-3">
                                        <label for="kolicina">Kolicina</label>
                                        <div class="input-group text-center mb-3" style="width: 130px;">
                                            <button class ="input-group-text decrement-btn">-</button>
                                            <input type="text" name="kolicina" class="form-control kolicina-input text-center" value="1">
                                            <button class ="input-group-text increment-btn">+</button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endif
                                @endforeach
                            </div>
                        </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function (){
            $('.increment-btn').click(function (e) {
                e.preventDefault();

                var inc_value = $('.kolicina-input').val();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value < 10)
                {
                    value++;
                    $('.kolicina-input').val(value);
                }
            });
            $('.decrement-btn').click(function (e) {
                e.preventDefault();

                var dec_value = $('.kolicina-input').val();
                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value > 1)
                {
                    value--;
                    $('.kolicina-input').val(value);
                }
            });
        });
    </script>
@endsection
