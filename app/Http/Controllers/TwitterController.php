<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Twitter;
use Response;


class TwitterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function postProfile($image)
    {

        return  Twitter::postProfileImage([ 'image' => $image , 'format' => 'json']);

    }
    

    public function search($q)
    {
        return Twitter::getSearch(['q' => $q, 'format' => 'json']);
    }

    public function create()
    {
        return Twitter::getSearch(['q' => $q, 'format' => 'json']);
    }

    public function post($message)
    {
        $status = 'My status';
        $status = substr($message, 0, 119);
        return  Twitter::postTweet(['status' => $status, 'format' => 'json']);

    }

  

    public function rand_word()
    {
        $items = Array("when","make","about","their","would","will","say","from","with","and");

        $rand_text = $items[array_rand($items)];
        return Response::json($rand_text);
    }


}
