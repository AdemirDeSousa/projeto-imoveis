<?php

namespace App\Http\Controllers\Api;

use App\Interessados;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\InteressadosRepository;

class BuscarInteressadosController extends Controller
{

    private $interessado;

    public function __construct(Interessados $interessado){

        $this->interessado = $interessado;

    }

    public function index(Request $request)
    {
        $repository = new InteressadosRepository($this->interessado);

        if($request->has('conditions')) {
		    $repository->selectCoditions($request->get('conditions'));
	    }

	    if($request->has('fields')) {
		    $repository->selectFilter($request->get('fields'));
	    }

        return response()->json([
            'data' => $repository->getResult()->paginate(10)
        ], 200);
    }

}
