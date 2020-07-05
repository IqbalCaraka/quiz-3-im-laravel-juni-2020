@extends('layouts.master')
@section('content')


<div class="container-fluid">
<a href="/items/create" class=" content-center btn btn-primary btn-lg my-3">Buat Artikel</a>
    
    <div class="card card-default mb-2">
        <div class="card-header">
            <h3>{{$artikel->judul}}</h3>
            <p style="font-style: italic;">{{$artikel->slug}}</p> 
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <p>{!!$artikel->isi!!}  </p>
                    <div class="d-flex mt-5">
                        @foreach(explode(" ", $artikel->tag) as $tag)
                            <span class="badge badge-pill ml-1 mb-2 badge-info">{{$tag}}</span>
                        @endforeach
                
                    </div>  
                </div>
                
            </div>
                    
        </div>

        <div class="card-footer justofy-content-end">
            <a href="/items" class=" content-center btn btn-danger my-3">Kembali</a>    
        </div>
    </div>
    
</div>





@endsection