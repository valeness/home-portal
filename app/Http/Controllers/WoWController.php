<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Request;
use Validator;
use View;

class WoWController extends Controller
{
    public function __construct() {

    }

    public function index() {
        return View::make('wow');
    }

    public function register() {
        $req = Request::all();
        $retval = ['status' => 1, 'errors' => []];
        $validator = Validator::make($req, [
            'username' => 'required|min:3|max:50',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $retval['status'] = 0;
            $retval['errors'] = $validator->errors();
        } else {
//            try {
                $conn = DB::connection('mysql');
                $exist_check = $conn->select('SELECT * FROM account WHERE lower(trim(username)) like ?', [strtolower(trim($req['username']))]);
                if(!empty($exist_check)) {
                    $retval['status'] = 0;
                    $retval['errors'][] = 'An account with that username already exists!';
                } else {
                    $conn->insert('INSERT INTO account (username, sha_pass_hash) VALUES (:username, :password)', ['username' => strtoupper($req['username']), 'password' => sha1(strtoupper($req['username'] . ':' . strtoupper($req['password'])))]);
                }
//            } catch(\Exception $e) {
//                $retval['errors'][] = 'A Database Error Occurred';
//                $retval['status'] = 0;
//            }
        }

        return $retval;

    }

}
