<?php

namespace App\Http\Controllers;
use App\Models\Admin;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $items = Admin::all();
        return view('index', compact('items'));
    }
}
