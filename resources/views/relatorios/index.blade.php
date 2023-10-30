@extends('layouts.default')

@section('title', 'Relatórios')

@section('conteudo')
<div class="col-lg-12">
    <div class="row d-flex align-items-center">
        <div class="col-lg-8 p-0">
            <h5 class='mt-2'>Boletim do aluno</h5>
        </div>
        <div class="col-lg-4 p-0">
            <div class="row collapse-options-container">
                <a class="font-weight-bold" href="#"><span id="printBuleetin" class="printer-icon"><i class="fas fa-download mr-2"></i> Baixar boletim</span></a>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-12 table-responsive p-0" id="table-bulletin-print">
    <table id="table-bulletin" class="table table-bordered mt-3">
        <thead class="text-center">
            <tr>
                <th rowspan="3" scope="col" style="vertical-align : middle;text-align:center;">Disciplinas</th>
                <th colspan="3" scope="col">UNIDADE I</th>
                <th colspan="3" scope="col">UNIDADE II</th>
                <th colspan="3" scope="col">UNIDADE III</th>
                <th colspan="3" scope="col">UNIDADE IV</th>
                <th rowspan="3" scope="col" style="vertical-align : middle;text-align:center;">Média final</th>
                <th rowspan="3" scope="col" style="vertical-align : middle;text-align:center;">Resultado final</th>
            </tr>

            <tr>
                <th class="" scope="col">Nota</th>
                <th class="" scope="col">Faltas</th>
                <th class="" scope="col">R</th>
                <th class="" scope="col">Nota</th>
                <th class="" scope="col">Faltas</th>
                <th class="" scope="col">R</th>
                <th class="" scope="col">Nota</th>
                <th class="" scope="col">Faltas</th>
                <th class="" scope="col">R</th>
                <th class="" scope="col">Nota</th>
                <th class="" scope="col">Faltas</th>
                <th class="" scope="col">R</th>
            </tr>
        </thead>

        <tbody>
            <tr class="text-center">
                <td>PORTUGUES</td>
                <td>10,0</td>
                <td>1</td>
                <td>-</td>
                <td>8,0</td>
                <td>3</td>
                <td>-</td>
                <td>8,3</td>
                <td>2</td>
                <td>-</td>
                <td>5,0</td>
                <td>4</td>
                <td>5,0</td>
                <td>7,8</td>
                <td>APROVADO</td>
            </tr>
        </tbody>

        <tbody>
            <tr class="text-center">
                <td>MATEMÁTICA</td>
                <td>9,0</td>
                <td>1</td>
                <td>-</td>
                <td>7,5</td>
                <td>4</td>
                <td>-</td>
                <td>7,0</td>
                <td>1</td>
                <td>-</td>
                <td>6,5</td>
                <td>5</td>
                <td>-</td>
                <td>7,5</td>
                <td>APROVADO</td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td colspan="9" class="text-center">Situação do aluno(a): APROVADO</td>
                <td colspan="9" class="text-center"> </td>
            </tr>
        </tfoot>
    </table>

</div>
@endsection
