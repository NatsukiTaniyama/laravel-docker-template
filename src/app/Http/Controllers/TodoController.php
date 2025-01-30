<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo; //AppにあるTodoクラスを使用できるようにする

class TodoController extends Controller //extendsは継承の関数。ここではControlllerのクラスを継承している。
{
    public function index()
    {
        $todo = new Todo(); //Todoインスタンス
        $todos = $todo->all(); //DBからtodoテーブルのレコードを全権取得する。SERECTのSQL文がModelによって実行される。＄todosはModel（ここ確認）
        
        return view('todo.index', ['todos' => $todos]);
    }

    public function create() //新規作成の画面
    {
        return view('todo.create'); //URL　todoのcreate
    }
}

//SERECT INSERT D UPDATE