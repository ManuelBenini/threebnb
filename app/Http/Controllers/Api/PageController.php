<?php

namespace App\Http\Controllers\Api;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // public function index(){
    //     // $posts = Post::with('category')->with('tags')->get(); OPPURE
    //     $apartments = Apartment::with(['category', 'tags'])->paginate(5);
    //     return response()->json($apartments);
    // }

}
