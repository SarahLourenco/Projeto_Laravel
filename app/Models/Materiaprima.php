<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class materiaprima extends Model {

    protected $table = 'materia_prima';
    //protected $hidden = ['id']; // para ocultar bom para senhas
    protected $fillable = ['nome', 'tipo', 'descricao', 'qtd', 'custo'];
    

    public function produtos (){  // MOSTA A MATERIA PRIMA- E EM QUAIS PRODUTOS ELA SE RELACIONADA
        return $this->belongsToMany(Produto::class);
    }
    
}
    