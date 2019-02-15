@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Create Product :  </h1>
                <form action="{{route('admin.update', $product->id)}}" method="post">
                    {{ csrf_field() }}
                    <div class="form">
                        <div class="form-group">
                            <label for="title">Titre :</label>
                            <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title"
                                   placeholder="Nom du vêtement">
                        @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="price">Description :</label>
                            <textarea type="text" name="description"class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-select">
                    <label for="category">Genre :</label>
                    <select id="category" name="category_id">
                        <option value="0" {{ is_null(old('category_id'))? 'selected' : '' }} >No category</option>
                        @foreach($categories as $id => $title)
                            <option value="{{$id}}">{{$title}}</option>
                        @endforeach
                    </select>
                    </div>
                    <h1>Choisissez un/des auteurs</h1>
                    <div class="form-inline">
                        <div class="form-group">

                    
                        </div>
                    </div>
            </div><!-- #end col md 6 -->
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Ajouter un livre</button>
                <div class="input-radio">
            <h2>Status</h2>
            <input type="radio" name="status" value="published" checked> publier<br>
            <input type="radio" name="status" value="unpublished" checked> dépublier<br>
            </div>
            <div class="input-file">
                <h2>File :</h2>
                <input class="file" type="file" name="picture" >
            </div>
            </div><!-- #end col md 6 -->
            </form>
        </div>
@endsection
