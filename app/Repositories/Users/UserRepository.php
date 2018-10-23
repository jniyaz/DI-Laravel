<?php

namespace App\Repositories\Users;

use App\Interfaces\Users\UserInterface;
use App\Repositories\BaseRepository;
use App\User;


class UserRepository extends BaseRepository implements UserInterface {

    private $model;

    public function __construct(User $model)
    {
      $this->model = $model;
    }

    public function getAll()
    {
      return $this->model->all();
    }

    public function getById($id)
    {
      return $this->model->find($id);
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