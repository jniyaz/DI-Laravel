<?php

namespace App\Providers;

use App\Interfaces\Users\UserInterface;
use App\Interfaces\Todos\TodoInterface;
use App\Repositories\Users\UserRepository;
use App\Repositories\Todos\TodoRepository;


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

  /**
  * Bootstrap the application services.
  *
  * @return void
  */
  public function boot()
  {
      //
  }

  /**
  * Register the application services.
  *
  * @return void
  */
  public function register()
  {
    //Register Todo Repositories and bind it to interface
    $this->app->bind(TodoInterface::class, TodoRepository::class);
    $this->app->bind(UserInterface::class, UserRepository::class);


    //Register Module Repositories and bind it to interface---------------------------------------------------------
    // $this->app->bindIf(ModuleInterface::class, ModuleRepository::class);

  }

}
