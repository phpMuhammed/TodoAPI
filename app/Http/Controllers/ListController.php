<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use App\Http\Resources\ListResource;

class ListController extends Controller
{
    public function index()
    {
        return ListResource::collection(\Auth::user()->lists);
    }
}
