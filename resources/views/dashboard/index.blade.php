@extends('layouts.app')

@section('content')
    <main class="container">
        <h1 class="text-center mt-2 ">Lista Progetti</h1>

        <a href="{{route("projects.create")}}" class="btn btn-primary mb-3 ">Crea Nuovo</a>

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Titolo</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Linguaggi</th>
                        <th scope="col">Copertina</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $item)
                        <tr>
                            <th><a href="{{route("projects.show", $item)}}">{{$item->title}}</a></td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->languages}}</td>
                            <td>{{$item->cover}}</td>
                            <td>{{$item->type->name}}</td>
                            <td class="text-center">
                                <a href="{{route("projects.edit", $item)}}" class="btn btn-warning mb-1">Edit</a>
                                <form action="{{route("projects.destroy", $item)}}" method="post">
                                    @csrf
                                    @method("DELETE")

                                    <button type="submit" class="btn btn-danger">&cross;</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        
    </main>
@endsection