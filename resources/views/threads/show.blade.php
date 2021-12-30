@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <small> Criado por: {{ $thread->user->name }}  a {{ $thread->created_at->diffForHumans() }} </small>
                </div>
                <div class="card-body">
                    {{ $thread->body }}
                </div>
                <div class="card-footer">
                    <a href="{{ route('threads.edit', $thread->id) }}" class="btn btn-sm btn-primary">Editar</a>
                    <form action="{{ route('threads.destroy', $thread->id) }}" class="d-inline-block" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"> Deletar </button>
                    </form>
                </div>
            </div>
            <hr>
        </div>
    </div>

@endsection
