<?php

namespace App\Http\Controllers;

use App\Interfaces\Todos\TodoInterface;
use Illuminate\Http\Request;


class ToDoController extends Controller
{

  private $todo;

  public function __construct(TodoInterface $todo)
  {
    $this->todo = $todo;
    $this->middleware('auth');
  }

  public function index()
  {
    return $this->todo->getAll();
  }

  public function show($id)
  {
    return $this->todo->getById($id);
  }

}
