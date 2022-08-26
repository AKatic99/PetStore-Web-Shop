@extends('layouts.nav3')

@section('content')
<div class="py-5">
<div class="container">
<div class ="card-deck product_data">
<div class="row g-9">

@foreach($dogProducts as $dogProduct)
    @if($dogProduct->categories->naziv=='Pas')
            @if($dogProduct->subcategories->naziv=='Hrana')
                        <div class="col-md-3 mb-3">
                        <div class="card p-3">
                        <img src="{{asset('assets/uploads/products/'.$dogProduct->slika)}}" class="card-img mx-auto" alt="..." style="width: 12rem; height:12rem; ">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$dogProduct->naziv_proizvoda}}</h5>
                            <p class="card-text">{{$dogProduct->opis}}</p>
                            <p class="fw-bold">{{$dogProduct->cijena}} KM</p>
                            <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Dodaj u košaricu <i class ="fa fa-shopping-cart"></i></button>
                        </div>
                        @if($dogProduct->kolicina > 0)
                            <label class ="badge bg-success">Na stanju</label>
                        @else
                            <label class ="badge bg-danger">Nema zaliha</label>
                        @endif
                        <div class = "row mt-2">
                            <div class ="col-md-9">
                                <input type="hidden" value="{{$dogProduct->id}}" class="prod_id">
                                <label for="kolicina">Kolicina</label>
                                <div class="input-group text-center mb-3" style="width: 130px;">
                                    <button class ="input-group-text decrement-btn">-</button>
                                    <input type="text" name="kolicina" class="form-control kolicina-input text-center" value="1">
                                    <button class ="input-group-text increment-btn">+</button>
                                </div>
                            </div>
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

            $('.addToCartBtn').click(function (e) {
                e.preventDefault();

                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.kolicina-input').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "/add-to-cart",
                    data: {
                        'product_id': product_id,
                        'product_qty': product_qty,
                    },
                    success: function (response) {
                        alert(response.status);

                    }
                });
            });

            $('.increment-btn').click(function (e) {
                e.preventDefault();

                var inc_value = $(this).closest('.product_data').find('.kolicina-input').val();
                /* var inc_value = $('.kolicina-input').val(); */
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value < 10)
                {
                    value++;
                    $(this).closest('.product_data').find('.kolicina-input').val(value);
                    /* $('.kolicina-input').val(value); */
                }
            });
            $('.decrement-btn').click(function (e) {
                e.preventDefault();

                var dec_value = $(this).closest('.product_data').find('.kolicina-input').val();
                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value > 1)
                {
                    value--;
                    $(this).closest('.product_data').find('.kolicina-input').val(value);
                }
            });
        });

    </script>
@endsection
