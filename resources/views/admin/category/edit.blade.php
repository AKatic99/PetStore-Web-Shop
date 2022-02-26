@extends('layouts.admin')

@section('content')

<div class="card2">
    <div class="card-header">
    <h4>Uredi kategoriju</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <label for="">Naziv</label>
                    <input type="text" value="{{ $category->naziv }}" class="form-control" name="naziv">
                </div>
              

                <div class="col-md-12 mb-3">
                    <label for="">Opis</label>
                    <div class="col-75">
                    <textarea name="opis" rows="3" class="form-control">{{ $category->opis }}</textarea>              
               </div>


               @if($category->slika)
                   <img src="{{ asset('assets/uploads/category/'.$category->slika) }}" alt="Category slika">
               @endif   
               <div class="col-md-12">
                   <input type="file" name="slika" class="form-control">
               </div>

        

               <div class="col-md-12">
                   <button type="submit" class="btn btn-primary"> Spremi</button>
               </div>   
           </div>
        </form>
    </div>
</div>

@endsection