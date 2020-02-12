<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
  private function randomSeed($length = 10) {
    $characters = '0123456789abcdefghklmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

  public function create(Request $request) {
    $destinationPath = 'uploads';
    $file = $request->image;
    $newName = $this->randomSeed().$file->getClientOriginalName();

    $file->move($destinationPath,$newName);

    $newImage = new \App\Image;
    $newImage->title = $file->getClientOriginalName();
    $newImage->image = $newName;

    $newImage->save();

    return $newName;
  }
}
