@extends('layouts.app')

@section("content")

<div class="container mt-3 ">
    <h1 class="mb-3">Modifica Progetto</h1>

    @if ($errors->any())
        <div class="alert alert-danger ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route("projects.update", $project)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method("PUT")
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input
                type="text"
                class="form-control"
                name="title"
                id="title"
                value="{{old('title') ?? $project->title}}"/>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" name="description" id="description" rows="3">{{old('description') ?? $project->description}}</textarea>
        </div>
        

        <div class="mb-3">
            <label for="languages" class="form-label">Linguaggi</label>
            <input
                type="text"
                class="form-control"
                name="languages"
                id="languages"
                value="{{old('languages') ?? $project->languages}}"/>
        </div>

        @if ($project->cover)
        <img
            src="{{ asset("/storage/" . $project->cover)}}"
            class="img-fluid rounded-top"
            alt="{{$project->title}}"
        />
        
            
        @endif

        <div class="mt-3 mb-3">
            <label for="" class="form-label">Seleziona un'immagine</label>
            <input
                type="file"
                class="form-control"
                name="cover"
                id="cover"  
            />
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
                        {{$item->id == old("type_id", $project->type ?$project->type->id : "") ? "selected" : ""}}
                        >{{$item->name}}</option>
                @endforeach
                
            </select>
        </div>
        
    
        <button
            type="submit"
            class="btn btn-primary mb-5"
        >
            Modifica
        </button>
        
    </form>

</div>

@endsection