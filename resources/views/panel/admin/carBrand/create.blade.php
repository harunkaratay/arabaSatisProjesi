@extends('panel.layout.app')

@section('content')

    <div class="card-body">
        <div class="card-title">Marka Ekleme</div>
        <hr>
        @if($errors->any())
            @foreach($errors->all() as $e)
               {{$e}}
            @endforeach
        @endif
        <form action="{{route('carBrandAdd')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="input-1">Marka Adı</label>
                <input type="text" class="form-control" id="input-1" placeholder="Lütfen marka adı giriniz." name="brandName" >
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-light px-5">Ekle</button>
            </div>
        </form>
    </div>

@endsection
