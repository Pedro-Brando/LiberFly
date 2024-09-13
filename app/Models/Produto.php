<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Produto",
 *     type="object",
 *     title="Produto",
 *     properties={
 *         @OA\Property(property="id", type="integer", description="ID do produto"),
 *         @OA\Property(property="nome", type="string", description="Nome do produto"),
 *         @OA\Property(property="preco", type="number", format="float", description="Preço do produto"),
 *         @OA\Property(property="estoque", type="integer", description="Quantidade em estoque")
 *     }
 * )
 */

 class Produto extends Model
 {
     use HasFactory;

     protected $fillable = ['nome', 'preco', 'estoque'];
 }
