@extends('layouts.nav3')

@section('title')
    My Cart
@endsection

@section('content')
<div class="container my-5">
    <div class="card shadow product_data">
        <div class="card-body">
            @foreach($cartitems as $item)
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ asset('assets/uploads/products/'.$item->products->slika) }}" height="70px" width="70px" alt="Image here">
                </div>
                <div class="col-md-5">
                    <h6>{{ $item->products->naziv_proizvoda }}</h6>
                </div>
                <div class ="col-md-3">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    <label for="kolicina">Kolicina</label>
                    <div class="input-group text-center mb-3" style="width: 130px;">
                        <button class ="input-group-text decrement-btn">-</button>
                        <input type="text" name="kolicina" class="form-control kolicina-input text-center" value="{{ $item->prod_qty }}">
                        <button class ="input-group-text increment-btn">+</button>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger delete-cart-item"> <i class="fa fa-trash"></i> Remove </button>
                </div>
            </div>
            @endforeach
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
            $('.delete-cart-item').click(function (e){
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var prod_id = $(this).closest('.product_data').find('.prod_id').val();
                $.ajax({
                    method: "POST",
                    url: "delete-cart-item",
                    data: {
                        'prod_id':prod_id,
                    },
                    success: function (response){
                        window.location.reload();
                        swal("", response.status, "success");
                    }
                });
            });
        });




    </script>
@endsection
