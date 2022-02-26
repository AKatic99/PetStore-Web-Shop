@extends('layouts.admin')

@section('content')

<div class="card2">
    <div class="card-header">
    <h4>Dodaj proizvod</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">
               <div class="col-md-12 mb-6">
                <select class="form-select" name="category_id">
                    <option value="">Odaberi kategoriju</option>
                    @foreach($category as $item)
                         <option value="{{ $item->id }}"> {{ $item->naziv }}</option> 
                       
                    @endforeach

                </select>
               </div>
                <div class="col-md-6 mb-6">
                    <label for="">Naziv_proizvoda</label>
                    <input type="text" class="form-control" name="naziv_proizvoda">
                </div>

               <div class="col-md-6 mb-6">
                    <label for="">Cijena</label>
                    <input type="number" class="form-control" name="cijena">
                </div>

                <div class="col-md-6 mb-12">
                    <label for="">Kolicina</label>
                    <input type="number" class="form-control" name="kolicina">
                </div> 

                <div class="col-md-6 mb-3">
                    <label for="">Opis</label>
                    <div class="col-75">
                    <textarea name="opis" rows="3" class="form-control"></textarea>              
               </div>


               <div class="col-md-12 mb-3">
                   <input type="file" name="slika" class="form-control">
               </div>

      
               <div class="col-md-12 mb-3">
                   <button type="submit" class="btn btn-primary"> Spremi</button>
               </div>   
           </div>
        </form>
    </div>
</div>

@endsection