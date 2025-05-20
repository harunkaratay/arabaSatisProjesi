@extends('panel.layout.app')

@section('content')

    <div class="card-body">
        <div class="card-title">Marka Güncelleme</div>
        <hr>
        @if($errors->any())
            @foreach($errors->all() as $e)
                {{$e}}
            @endforeach
        @endif
        <form action="{{route('carBrandUpdate')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="input-1">Marka Adı</label>
                <input type="text" class="form-control" id="input-1" placeholder="Lütfen marka adı giriniz." name="brandName" value="{{$brand->name}}" >
            </div>
            <input type="hidden" value="{{$brand->id}}" name="brandID">
            <div class="form-group">
                <button type="submit" class="btn btn-light px-5">Güncelle</button>
            </div>
        </form>
    </div>

@endsection
