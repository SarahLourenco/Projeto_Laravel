<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;


class HistVenda extends Model
{
     protected $table = 'hist_vendas';
     protected $hidden = ['id']; // para ocultar bom para senhas
     protected $fillable = ['data_venda', 'qtd_vendido', 'produto_id'];
    
    
    //    public function produto(){
    //        return $this->hasOne(Produto::class);        
    //    }

//        public function hist(){
//            return $this->hasMany(HistVenda::class);        
//        }
        
}
