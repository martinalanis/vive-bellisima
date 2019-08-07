@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header card-header-info">
                    <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">VENTAS DIARIAS</h4>
                    <p class="card-category">
                        <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> Incremento al día de hoy</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> Actualizado hace 5 minutos
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-chart">
                    <div class="card-header card-header-info">
                        <div class="ct-chart" id="websiteViewsChart"></div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">AFILIACIONES SEMANALES</h4>
                        <p class="card-category">
                            <span class="text-success"><i class="fa fa-long-arrow-up"></i> 21% </span> Incremento en relación a la semana pasada</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> Actualizado hace 3 minutos
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title ">Últimos usuarios registrados</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            Folio
                                        </th>
                                        <th>
                                            Nombre
                                        </th>
                                        <th>
                                            Nivel
                                        </th>
                                        <th>
                                            Alta
                                        </th>
                                        <th>
                                            Ciudad
                                        </th>
                                        <th>
                                            Estado
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                0001
                                            </td>
                                            <td>
                                                Fernando Pacheco
                                            </td>
                                            <td>
                                                Vendedor
                                            </td>
                                            <td>
                                                01/10/18
                                            </td>
                                            <td>
                                                Guadalajara
                                            </td>
                                            <td>
                                                Jalisco
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm"><i class="material-icons">remove_red_eye</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0002
                                            </td>
                                            <td>
                                                Carlos Mondragón
                                            </td>
                                            <td>
                                                Vendedor
                                            </td>
                                            <td>
                                                05/11/18
                                            </td>
                                            <td>
                                                Guadalajara
                                            </td>
                                            <td>
                                                Jalisco
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm"><i class="material-icons">remove_red_eye</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0003
                                            </td>
                                            <td>
                                                Mariana González
                                            </td>
                                            <td>
                                                Vendedor
                                            </td>
                                            <td>
                                                05/12/18
                                            </td>
                                            <td>
                                                Uruapan
                                            </td>
                                            <td>
                                                Michoacán
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm"><i class="material-icons">remove_red_eye</i>
                                                </button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
<script src="{{ asset('js/plugins/chartist.min.js')}}"></script>
<script>
$(document).ready(function() {
  // Javascript method's body can be found in assets/js/demos.js
  md.initDashboardPageCharts();

});
</script>
@endsection
