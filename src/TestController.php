<?php

namespace Webdeveloperpcpl\Test;

use App\Http\Controllers\Controller;
use Request;
use Webdeveloperpcpl\Test\Task;

class TodolistController extends Controller
{
    public function index()
    {

        return view('webdeveloperpcpl.test.list');
    }
}
