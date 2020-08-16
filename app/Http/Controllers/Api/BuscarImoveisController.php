<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imoveis;
use App\Repository\ImoveisRepository;

class BuscarImoveisController extends Controller
{

    private $imovel;

    public function __construct(Imoveis $imovel){
        $this->imovel = $imovel;
    }

    public function index(Request $request)
    {
        $repository = new ImoveisRepository($this->imovel);

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

    public function show($id)
    {
        //
    }

}
