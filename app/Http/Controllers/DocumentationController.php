<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Response;


class DocumentationController extends Controller
{
    public function index() {
    	return abort(404);
    }


    public function js() {
    	return Response::download('downloads/puce.js');
    }

    public function php() {
    	return Response::download('downloads/puce.php');
    }

    public function python() {
    	return Response::download('downloads/puce.py');
    }


}
