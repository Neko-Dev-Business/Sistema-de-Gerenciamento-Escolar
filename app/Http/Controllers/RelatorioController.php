<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class RelatorioController extends Controller
{
    public function gerarRelatorio(Request $request)
    {
        $chart_options = [
            'chart_title' => 'Contagem de Pessoas por Tipo',
            'chart_type' => 'bar',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Pessoa',
            'group_by_field' => 'tipoPessoa',
            'aggregate_function' => 'count',
            'aggregate_field' => 'idPessoa',
            'filter_field' => 'created_at',
            'filter_days' => 30, // mostra apenas pessoas criadas nos últimos 30 dias
            'continuous_time' => true, // mostra uma linha contínua, incluindo datas sem dados
        ];

        $chart1 = new LaravelChart($chart_options);

        return view('relatorio', compact('chart1'));
    }
}
