@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            @if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Erro ao realizar esta operação</strong></p>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-12">
            @if (isset($thread))
                <form action="/threads/{{ $thread->id }}" method="POST">
                @method('PUT')
            @else
                <form action="/threads" method="POST" enctype="multipart/form-data">
            @endif

            @csrf

            <div class="form-group">
                <label for="title">Titulo do Topico</label>
                <input type="text" name="title" class="form-control" value="{{ isset($thread) ? $thread->title : null }}">
            </div>

            <div class="form-group">
                <label for="body">Conteudo do Topico</label>
                <textarea cols="30" rows="18" name="body" class="form-control">{{ isset($thread) ? $thread->body : null }}</textarea>
            </div>

            <hr>
            <button type="submit" class="btn btn-success">Salvar Tópico</button>

        </form>
        </div>
    </div>
@endsection
