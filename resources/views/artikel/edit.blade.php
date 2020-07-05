@extends('layouts.master')
@section('content')
<div class="card card-default">
    <div class="card-header">
        <h1>Edit Artikel</h1>
    </div>

    <div class="card-body">
        <form action="/items/{{$artikel->artikelId}}" method="POST">
        {{@csrf_field()}}
        @method('PUT')
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" title="Masukan judul" value="{{$artikel->judul}}">                
            </div>

            <div class="form-group">
                <label for="isi">Isi</label>
                <input id="isi" type="hidden" name="isi" title='Write your content amazingly' value="{{$artikel->isi}}">                
                <trix-editor input="isi"></trix-editor>  
            </div>

            <div class="form-group">
                <label for="tag">Tag</label>
                <select name="tag[]" id="tag" class="form-control tag-selector" multiple>
                    <option value="info">Info</option>
                    <option value="web">Web</option>
                    <option value="design">Design</option>
                    <option value="android">Android</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit"class="btn btn-success my-4 justify-right">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>



@endsection

@push('scripts')
<!--Trix content-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script> 

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.tag-selector').select2();
});
</script>

<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
</script>
@endpush

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<!--Trix content-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endpush