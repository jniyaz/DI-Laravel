<?php

namespace App\Repositories\Todos;

use App\Interfaces\Todos\TodoInterface;
use App\Repositories\BaseRepository;
use App\ToDo;


class TodoRepository extends BaseRepository implements TodoInterface {

    private $model;

    public function __construct(ToDo $model)
    {
      $this->model = $model;
    }

    public function getAll()
    {
      return $this->model->all();
    }

    public function getById($id)
    {
      $todo = $this->model->find($id);
      $user = $this->model->find($id)->user->where('id', $todo->created_by)->first(['id', 'name', 'email']);
      $todo['created_by'] = ($user == null) ? null : $user;
      return $todo;
    }

    public function create(array $attributes)
    {
      $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
      $todo = $this->model->find($id);
      $todo->update($attributes);
      return $todo;
    }

    public function delete($id)
    {
        $this->getById($id)->delete();
        return true;
    }

}