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
                <th rowspan="2" scope="col" style="vertical-align : middle;text-align:center;">Disciplinas</th>
                <th colspan="2" scope="col">UNIDADE I</th>
                <th colspan="2" scope="col">UNIDADE II</th>
                <th colspan="2" scope="col">UNIDADE III</th>
                <th colspan="2" scope="col">UNIDADE IV</th>
                <th rowspan="2" scope="col" style="vertical-align : middle;text-align:center;">Média final</th>
                <th rowspan="2" scope="col" style="vertical-align : middle;text-align:center;">Resultado final</th>
            </tr>

            <tr>
                <th class="" scope="col">Nota</th>
                <th class="" scope="col">Faltas</th>
                <th class="" scope="col">Nota</th>
                <th class="" scope="col">Faltas</th>
                <th class="" scope="col">Nota</th>
                <th class="" scope="col">Faltas</th>
            </tr>

        </thead>

        <tbody>
  <tr class="text-center">
                    <td>PORTUGUES</td>
                    <td>1</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>3</td>
                    <td>3</td>
                    <td>3</td>
                    <td>3</td>
                </tr>
 <tbody>
  <tr class="text-center">
                    <td>PORTUGUES</td>
                    <td>1</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>3</td>
                    <td>3</td>
                    <td>3</td>
                    <td>3</td>
                </tr>


        </tbody>

        <tfoot>

            <tr>
                <td colspan="9" class="text-center">Situação do aluno(a): APROVADO</td>

            </tr>

        </tfoot>

        </tbody>

    </table>

</div>

troque esses campos por
@endsection
