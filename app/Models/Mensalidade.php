<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
define('PRAZO_MENSALIDADE', 30);
class Mensalidade extends Model
{
    use HasFactory;
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function getMensalAttribute() {
        // Usando assessador
        //$datamensalidade = $this->datamensalidade;
        $prazomensalidade = \Carbon\Carbon::create($this->fimmensalidade)->addDays(PRAZO_MENSALIDADE);
        //$prazo = $hoje->addDays(PRAZO_EMPRESTIMO);
        $atrasado = $prazomensalidade < \Carbon\Carbon::now()?"<mark class='bg-danger'> ATRASADO! </mark>":"";
        $mensalidadedata = $this->prazomensalidade == null?"Prazo de encerramento de mensalidade: ".$prazomensalidade->format('d/m/Y').$atrasado:\Carbon\Carbon::create($this->datahora)->format('d/m/Y H:i:s');
        return $mensalidadedata;

    }
}
