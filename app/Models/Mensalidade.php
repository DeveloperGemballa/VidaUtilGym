<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensalidade extends Model
{
    use HasFactory;
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function getDevolvidoAttribute() {
        // Usando assessador
        //$datamensalidade = $this->datamensalidade;
        $prazomensalidade = \Carbon\Carbon::create($this->datahora)->addDays(PRAZO_MENSALIDADE);
        //$prazo = $hoje->addDays(PRAZO_EMPRESTIMO);
        $atrasado = $prazomensalidade < \Carbon\Carbon::now()?"<mark class='bg-danger'> ATRASADO! </mark>":"";
        $fimmensalidade = $this->datamensalidade == null?"Prazo de devolução: ".$prazomensalidade->format('d/m/Y').$atrasado:\Carbon\Carbon::create($this->datamensalidade)->format('d/m/Y H:i:s');
        return $fimmensalidade;

    }
}
