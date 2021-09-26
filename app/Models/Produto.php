<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome_produto', 
        'imagem', 
        'qtd_estoque', 
        'qtd_reposicao',
        'data_validade',
        'preco_unitario',
        'tipo_id',
        'fornecedor_id'
    ];

    // regras de validação dos campos
    public function rules(){
        return [
            'nome_produto' => 'required|unique:produtos,nome_produto',
            'imagem' => 'required|file|mimes:png,jpeg,jpg'
        ];
    }

    // feedback de validação 
    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nome_produto.unique' => 'O nome do produto já está cadastrado'
        ];
    }

    public function fornecedor(){

        // um produto pertence a uma fornecedor
        return $this->belongsTo('App\Models\Fornecedor');
    }

    public function tipo(){

        // um produto pertence a um tipo
        return $this->belongsTo('App\Models\Tipo');
    }
}
