@extends("layouts.app")

@section("content")

<div class="container">

    
    <h1 class="text-center mt-3 mb-3">
        {{$project->title}}
    </h1>
    
    <h5>
        Categoria:
    </h5>
    <p>
        {{$project->type->name}}
    </p>

    
    <h5>
        Descrizione:
    </h5>
    <p>
        {{$project->description}}
    </p>

    <h5>
        Linguaggi:
    </h5>
    @forelse ($project->technologies as $techs)
        <small class="d-block">{{$techs->name}}</small>
    @empty
        
    @endforelse

    <figure class="figure mt-3">
        <img src="{{asset("/storage/" . $project->cover)}}" class="figure-img img-fluid rounded" alt="{{$project->title}}" />
        <figcaption
            class="figure-caption text-start"
        >
            Copertina del progetto
        </figcaption>
    </figure>
    
    
</div>


@endsection