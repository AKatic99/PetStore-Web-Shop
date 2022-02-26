@extends('layouts.admin')

@section('content')

<div class="card2">
    <div class="card-header">
    <h4>Dodaj kategoriju</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
     
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label for="">Naziv</label>
                    <input type="text" class="form-control" name="naziv">
                </div>
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;

                <div class="col-md-12 mb-3">
                    <label for="">Opis</label>
                    <div class="col-75">
                    <textarea name="opis" rows="3" class="form-control"></textarea>              
               </div>

                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;

               <div class="col-md-12">
                   <input type="file" name="slika" class="form-control">
               </div>

                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;

               <div class="col-md-12">
                   <button type="submit" class="btn btn-primary"> Spremi</button>
               </div>   
           </div>
        </form>
    </div>
</div>

@endsection