<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\FooRepository;
use Illuminate\Http\Request;

class FooController extends Controller
{

  // private $repository;
  //
  // public function __construct(FooRepository $repository)
  // {
  //   $this->repository = $repository;
  // }

  public function foo(FooRepository $repository)
  {
    // return $this->$repository->get();
    return $repository->get();

  }
}