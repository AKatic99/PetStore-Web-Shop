@extends('layouts.admin')

@section('content')
<div class="card-k">
    <div class="card-header">
    <h4>Proizvod</h4>
    <hr>
    </div>
    <div class="card-body">
    <table class ="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Kategorija</th>
                <th>Podkategorija</th>
                <th>Naziv</th>
                <th>Opis</th>
                <th>Cijena</th>
                <th>Kolicina</th>
                <th>Slika</th>
                <th>Action</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($product as $item)
            <tr>
                    <td>{{ $item->categories->naziv}}</td>
                    <td>{{ $item->subcategories->naziv}}</td>
                    <td>{{ $item->naziv_proizvoda}}</td>
                    <td>{{ $item->opis}}</td>
                    <td>{{ $item->cijena}}</td>
                    <td>{{ $item->kolicina}}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/products/'.$item->slika) }}" class="cate-image" alt="">
                    </td>
                    <td>
                        <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-info">Uredi</a>

                        <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-primary">Obrisi</a>

                    </td>
            </tr>
            @endforeach

       </tbody>
    </table>
    </div>
</div>
@endsection
