@extends('layouts.master')
@section('content')

@if($list_artikel -> count() > 0)

<div class="container-fluid">
<a href="/items/create" class=" content-center btn btn-primary btn-lg my-3">Buat Artikel</a>
@foreach($list_artikel as $artikel)
    
    <div class="card">
        <div class="card-header" style="background-color: #3498db; color: white;">
            <h3>{{$artikel->judul}}</h3>
            <p style="font-style: italic;">{{$artikel->slug}}</p>
        </div>

        <div class="card-body">  
            <p>{!! substr($artikel->isi,0,250) !!}.......</p>
            <p>
                <a href="/items/{{$artikel->artikelId}}" class="button btn btn-success btn-sm mr-2" >Tampilkan Lebih</a>
            </p>
                
            <div class="d-flex mt-5">
                @foreach(explode(" ", $artikel->tag) as $tag)
                    <span class="badge badge-pill ml-1 mb-2 badge-info">{{$tag}}</span>
                @endforeach
                
            </div>        
        </div>

        <div class="card-footer">
            <div class="d-flex">
                <a href="/items/{{$artikel->artikelId}}/edit" class="button btn btn-warning btn-sm mr-2 fa-edit">Edit</a>
                <form action="/items/{{$artikel->artikelId}} " method="POST">
                    {{@csrf_field()}}
                    @method('DELETE')
                    <button type="submit" class="button btn btn-danger btn-sm ">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>


@else
<div class="card-default">
    <h3 class="text-center">Tidak ada artikel yang ditulis</h3>
    <a href="/items/create" class="content-center btn btn-primary btn-lg  my-3 btn-block">Buat Artikel</a>
</div>
@endif

@endsection

@push('scripts')
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
</script>
@endpush