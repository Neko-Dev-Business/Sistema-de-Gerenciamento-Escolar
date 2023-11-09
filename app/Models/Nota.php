<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $primaryKey = 'idNota';

    protected $fillable = [
        'primeiraNota',
        'segundaNota',
        'terceiraNota',
        'quartaNota',
        'primeiraRecuperacao',
        'segundaRecuperacao',
        'terceiraRecuperacao',
        'quartaRecuperacao',
        'unidade',
        'idPessoa',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa');
    }


    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class, 'idDisciplina', 'idDisciplina');
    }

}
