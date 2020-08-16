<?php

namespace App\Http\Controllers\Api;

use App\Interessados;
use App\Http\Controllers\Controller;
use App\Http\Requests\InteressadosRequest;
use App\Api\ApiMessages;

class InteressadosController extends Controller
{
    private $interessado;

    public function __construct(Interessados $interessado){

        $this->interessado = $interessado;

    }

    //Retornar todos os Interessados
    public function index(){

        $interessados = $this->interessado->paginate('10');

        return response()->json($interessados, 200);
    }

    //Buscar por id
    public function show($id){

        try{

            $interessado = $this->interessado->findOrFail($id);

            return response()->json([
                'data' => $interessado
            ], 200);

        } catch (\Exception $e){
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);

        }
    }

    //Criar Interessados
    public function store(InteressadosRequest $request){

        $data = $request->all();

        try{

            $interessado = $this->interessado->create($data);

            if(isset($data['imoveis']) && count($data['imoveis'])) {
                $interessado->imoveis()->sync($data['imoveis']);
            }

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

    //Atualizar Interessados
    public function update(InteressadosRequest $request, $id){

        $data = $request->all();

        try{

            $interessado = $this->interessado->findOrFail($id);

            $interessado->update($data);

            if(isset($data['imoveis']) && count($data['imoveis'])) {
                $interessado->imoveis()->sync($data['imoveis']);
            }

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

        //Deletar Interessados
    public function destroy($id){

        try{

            $interessado = $this->interessado->findOrFail($id);

            $interessado->delete();

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
}
