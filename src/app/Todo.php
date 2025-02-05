<?php

namespace App; //Appにはいっている〜

use Illuminate\Database\Eloquent\Model;

class Todo extends Model //ここでTodoクラスでModelを使用できるようにしている
{
    protected $table = 'todos';

    protected $fillable = [
        'content',
    ];
}
