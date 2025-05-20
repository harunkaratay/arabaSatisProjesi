@extends('panel.layout.app')

@section('content')

    <div class="card-body">
        <h5 class="card-title">Araç Listesi</h5>
        <a href="{{route('carBrandCreatePage')}}" class="btn btn-light btn-round px-5 mb-4 margin-left: 20px"> Araç Oluştur</a>
        <div class="table-responsive table-striped table-hover">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Araba makrası</th>
                    <th scope="col">Durumu</th>
                    <th scope="col">İşlemler</th>
                </tr>
                </thead>
                <tbody>

                @foreach($brand as $b)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$b->name}}</td>
                        <td>
                            @if($b->deleted_at == null)
                                Aktif
                                @else
                                Silindi
                            @endif
                        </td>
                        <td>
                            <a href="{{route('carBrandUpdatePage', $b->id)}}" class="btn btn-light">Güncelle</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
