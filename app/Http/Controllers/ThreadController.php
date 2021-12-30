<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class ThreadController extends Controller
{
    // private $thread;

    // public function __construct(Thread $thread)
    // {
    //     $this->thread = $thread;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::paginate(10);

        return view('threads.list', [
            'threads' => $threads,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = [
            'user_id' => $request->user_id,
            'title' => $request->title,
            'body' => $request->body,
        ];

        Thread::create($dados);

        return redirect('/threads')->with('mensagem', 'Registro criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('threads.form', [
            'thread' => $thread
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        $dados = [
            'user_id' => $request->user_id,
            'title' => $request->title,
            'body' => $request->body,
        ];

        $thread->update($dados);

        return redirect('/threads')->with('mensagem', 'Registro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        $thread->delete();
        return redirect('/threads')->with('mensagem', 'Registro excluído com sucesso!');
    }
}
