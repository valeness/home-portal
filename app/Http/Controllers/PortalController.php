<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use View;

class PortalController extends Controller
{
    public function __construct() {

    }

    public function index() {
        return View::make('portal');
    }
}
