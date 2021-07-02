<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        try {
            $todos = Todo::all();
            return response()->json([
                'type' => 'success',
                'todos'  => $todos
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'type' => 'error',
                'msg'  => 'Falha ao tentar buscar as tarefas.'
            ]);
        }
    }

    public function store(Request $request)
    {

        try {

            request()->validate([
                'descricao' => 'required',
                'status' => 'required'
            ]);

            if ($todo = Todo::create($request->all())) {
                return response()->json([
                    'type' => 'success',
                    'todo'  => $todo
                ]);
            } else {
                return response()->json([
                    'type' => 'error',
                    'msg'  => 'Falha ao tentar gravar a tarefa.'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'type' => 'error',
                'msg'  => 'Falha ao tentar gravar a tarefa.'
            ]);
        }
    }


    public function show($id)
    {
        try {

            $todo = Todo::findOrFail($id);


            return response()->json([
                'type' => 'success',
                'todo'  => $todo
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'type' => 'error',
                'msg'  => 'Tarefa não encontrada.'
            ]);
        }
    }


    public function update(Request $request, $id)
    {

        try {

            $todo = Todo::findOrFail($id);
            $todo->update($request->all());
            $todo = Todo::findOrFail($id);

            return response()->json([
                'type' => 'success',
                'todo'  => $todo
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'type' => 'error',
                'msg'  => 'Falha ao tentar atualizar a tarefa.'
            ]);
        }
    }

    public function destroy($id)
    {

        try {

            $todo = Todo::findOrFail($id);
            $todo->delete();

            return response()->json([
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'type' => 'error',
                'msg'  => 'Falha ao tentar deletar a tarefa.'
            ]);
        }
    }
}