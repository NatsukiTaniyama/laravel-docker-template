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

    public function store(Request $request) //$requestにRequestクラスのインスタンスを代入.メソッドインジェクション（自動でインスタンス化）
    {
        $inputs = $request->all(); //一括で取得　token,contentで返す

        // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
        $todo = new Todo();
        // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
        $todo->fill($inputs);
        // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
        $todo->save();

        return redirect()->route('todo.index');
    }
}



//SERECT INSERT D UPDATE