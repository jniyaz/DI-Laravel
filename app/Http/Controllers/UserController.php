<?php

namespace App\Http\Controllers;

use App\Interfaces\Users\UserInterface;
use Illuminate\Http\Request;


class UserController extends Controller
{

  private $user;

  public function __construct(UserInterface $user)
  {
    $this->user = $user;
    $this->middleware('auth');
  }

  public function index()
  {
    return \App\User::all();
  }

  public function show($id)
  {
    return $this->user->getById($id);
  }

}
