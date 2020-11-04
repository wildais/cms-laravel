@extends('layout.master')

@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header text-center">
            <h3>Daftar Artikel</h3>
        </div>
        </br>
        </br>
        <form action="/article/update/{{$article->id}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$article->id}}"></br>
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" class="form-control" required="required" name="title" value="{{$article->title}}"></br>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input type="text" class="form-control" required="required" name="content" value="{{$article->content}}"></br>
            </div>
            <div class="form-group">
                <label for="image">Feature Image</label>
                <input type="text" class="form-control" required="required" name="image" value="{{$article->featured_image}}"></br>
            </div>
            <button type="submit" name="edit" class="btn btn-primary float-right">Ubah Data</button>
        </form>
    </div>
</div>
@endsection