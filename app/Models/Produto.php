<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function fornecedor()
    {
        return $this->belongsTo('App\Models\Fornecedor')->withDefault([
            'nome' => 'Fornecedor padrão'
        ]);
    }

    public function produtoDetalhe()
    {
        return $this->hasOne('App\Models\ProdutoDetalhe');
    }

    public function pedidos()
    {
        return $this->belongsToMany('App\Models\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id');
    }

    public function unidade() {
        return $this->belongsTo('App\Models\Unidade', 'unidade_id');
    }
}
