@extends('layouts.app')

@section("content")

<div class="container mt-3 ">
    <h1 class="mb-3">Crea nuovo Progetto</h1>

    @if ($errors->any())
        <div class="alert alert-danger ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route("projects.store")}}" method="POST" enctype="multipart/form-data">

        @csrf
    
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input
                type="text"
                class="form-control"
                name="title"
                id="title"/>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        

        <div class="mb-3">
            <label for="languages" class="form-label">Linguaggi</label>
            <input
                type="text"
                class="form-control"
                name="languages"
                id="languages"/>
        </div>

        <div class="mb-3">
            <div class="mb-3">
                <label for="" class="form-label">Seleziona un'immagine</label>
                <input
                    type="file"
                    class="form-control"
                    name="cover"
                    id="cover"  
                />
            </div>
            
        </div>
        
        <div class="mb-3">
            <label for="type_id" class="form-label">Tipologia</label>
            <select
                class="form-select form-select-lg"
                name="type_id"
                id="type_id"
            >
                <option selected disabled value="">Select one</option>
                @foreach ($types as $item )
                    <option
                        value="{{$item->id}}"
                        {{$item->id == old("type_id") ? "selected" : ""}}
                        >{{$item->name}}</option>
                @endforeach
                
            </select>
        </div>
        
    
        <button
            type="submit"
            class="btn btn-primary"
        >
            Crea
        </button>
        
    </form>

</div>

@endsection