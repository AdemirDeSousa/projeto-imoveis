<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ImoveisRequest;
use App\Http\Controllers\Controller;
use App\Imoveis;
use App\Api\ApiMessages;

class ImoveisController extends Controller
{

    private $imovel;

    public function __construct(Imoveis $imovel){

        $this->imovel = $imovel;
    }

    public function index()
    {
        $imoveis = $this->imovel->paginate('10');

        return response()->json($imoveis, 200);
    }

    public function store(ImoveisRequest $request)
    {
        $data = $request->all();

        try{

            $imovel = $this->imovel->create($data);

            return response()->json([
                'data' => [
                    'msg' => 'Interessado Cadastrado com Sucesso!'
                ]
            ], 200);

        } catch (\Exception $e){

            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);

        }
    }

    public function show($id)
    {
        try{

            $imovel = $this->imovel->findOrFail($id);

            return response()->json([
                'data' => $imovel
            ], 200);

        } catch (\Exception $e){
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);

        }
    }

    public function update(ImoveisRequest $request, $id)
    {
        $data = $request->all();

        try{

            $imovel = $this->imovel->findOrFail($id);

            $imovel->update($data);

            return response()->json([
                'data' => [
                    'msg' => 'Interessado Atualizado com Sucesso!'
                ]
            ], 200);

        } catch (\Exception $e){

            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);

        }
    }

    public function destroy($id)
    {
        try{

            $imovel = $this->imovel->findOrFail($id);

            $imovel->delete();

            return response()->json([
                'data' => [
                    'msg' => 'Interessado Removido com Sucesso!'
                ]
            ], 200);

        } catch (\Exception $e){

            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);

        }
    }

    public function interessados($id){

        try {

            $imovel = $this->imovel->findOrFail($id);

            return response()->json([
                'data' => $imovel->interessados
            ], 200);

        } catch (\Exception $e){

            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);

        }
    }
}
