<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $primaryKey = 'idPessoa';

    protected $fillable = [
        'nomePessoa',
        'tipoPessoa',
        'cpfPessoa',
        'rgPessoa',
        'dataNascimentoPessoa',
        'generoPessoa',
        'nacionalidadePessoa',
        'nomePaiPessoa',
        'nomeMaePessoa',
        'cnpjPessoa',
        'emailPessoa',
        'telefonePessoa',
        'tipoUsuario',
        'usuarioPessoa',
        'foto',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'idPessoa');
    }

    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'notas', 'idPessoa', 'idTurma');
    }
    public function turmasVinculadas()
    {
        return Aluno_Turma::where('idPessoa', $this->idPessoa)->with('turma')->get();
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class, 'idDisciplina');
    }

    public function notas()
    {
        return $this->hasMany(Nota::class, 'idPessoa');
    }

    // Modelo Pessoa
    public function alunoTurma()
    {
        return $this->hasMany(Aluno_Turma::class, 'idPessoa', 'idPessoa');
    }

}
