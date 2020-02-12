<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
  public function create(Request $request) {
    return $request->image->getClientOriginalName();
  }
}
