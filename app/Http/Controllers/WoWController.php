<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Request;
use View;

class WoWController extends Controller
{
    public function __construct() {

    }

    public function index() {
        $conn = DB::connection('mysql');
        return View::make('wow');
    }

    public function register() {
        $req = Request::all();
        return $req;
    }

}
