<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/produtos",
     *     summary="Listar todos os produtos",
     *     tags={"Produtos"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de produtos retornada com sucesso",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Produto"))
     *     )
     * )
     */
    public function index()
    {
        $produtos = Produto::all();
        return response()->json($produtos, 200);
    }

    /**
     * @OA\Get(
     *     path="/api/produtos/{id}",
     *     summary="Buscar um produto por ID",
     *     tags={"Produtos"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID do produto",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Produto encontrado com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Produto")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Produto não encontrado"
     *     )
     * )
     */
    public function show($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        return response()->json($produto, 200);
    }
}
