@extends('layouts.admin')

@section('content')
<div class="card-k">
    <div class="card-header">
    <h4>Kategorija</h4> 
    <hr> 
    </div>
    <div class="card-body">
    <table class ="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Naziv</th>
                <th>Opis</th>
                <th>Slika</th>
                <th>Action</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($category as $item)
            <tr>
                    <td>{{ $item->id}}</td>
                    <td>{{ $item->naziv}}</td>
                    <td>{{ $item->opis}}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/category/'.$item->slika) }}" class="cate-image" alt=""> 
                    </td>
                    <td>
                        <a href="{{ url('edit-category/'.$item->id) }}" class="btn btn-primary"> Uredi </button>
                        
                        
                        <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-primary"> Obrisi </button>

                    </td>
            </tr>
            @endforeach
            
       </tbody>
    </table>
    </div>
</div>
@endsection