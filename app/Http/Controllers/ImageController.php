<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
  /**
   * Random Seed so we don't have to depend on sanitized data
   *
   * @param integer $length
   * @return string
   */
  private function randomSeed($length = 10) {
    $characters = '0123456789abcdefghklmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  /**
   * Create a new account picture
   *
   * @param Request $request
   * @return string
   */
  public function create(Request $request) {
    $destinationPath = 'uploads';
    $file = $request->image;
    $newName = $this->randomSeed();

    Storage::putFileAs('public/', $request->image, $newName);

    $newImage = new \App\Image;
    $newImage->title = $file->getClientOriginalName();
    $newImage->image = $newName;

    $newImage->save();

    return $newName;
  }

  /**
   * Bind the account picture to the user
   *
   * @param Request $request
   * @return void
   */
  public function userImage(Request $request) {
    $newAcc = new \App\UserImage;
    $newAcc->title = str_replace(",","/",$_GET['title']);

    $newAcc->save();

    return $request->name;
  }

  public function getUserImage() {
    if (\App\UserImage::all()->reverse()->first()) {
      return \App\UserImage::all()->reverse()->first();
    } else {
      return 'no image';
    }
  }

  /**
   * Get an instance of stored images
   *
   * @return void
   */
  public function get() {
    return \App\Image::all()->reverse()->values();
  }
}
