@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')


    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
            {{ Form::open(['route' => ['vehicles.destroy', $vehicle->id], 'method' => 'delete']) }}
            <button type="submit" class="btn btn-danger btn-xs" style="float: left; margin-bottom: 10px; margin-left: 55px;">Eliminar</button>
            {{ Form::close() }}
            
                <div class="widget-box">

                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Ficha do Veiculo</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {!! Form::open(['url' => 'vehicles','class' => 'form-horizontal']) !!}

                        <div class="control-group">
                            {!! Form::label('Marca:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('marca',$vehicle->marca,['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>

                        <div class="control-group">
                            {!! Form::label('Modelo:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('modelo',$vehicle->modelo,['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('Kms:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('kms',$vehicle->kms,['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{route('vehicles.edit',$vehicle->id)}}"> <i class="icon-edit icon-3x"></i></a>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Utilizador Activo</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {!! Form::open(['url' => 'users','class' => 'form-horizontal']) !!}

                        <div class="control-group">
                            {!! Form::label('N�mero Mecanogr�fico:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('number',$vehicle->user['number'],['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>


                        <div class="control-group">
                            {!! Form::label('Nome:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('name', $vehicle->user['name'],['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">

                    <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                        <h5>Consumos</h5>
                    </div>
                    <div class="widget-content">
                        <div id="curve_chart" style="width: 100%; height: 100%"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mes', 'Combustivel', 'Impostos', 'Pneus'],
          ['Janeiro',  1000,      400,   980],
          ['Fevereiro',  1170,      460,   750],
          ['Março',  660,       1120, 1289],
          ['Abril',  1030,      540,   690]
        ]);

        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('curve_chart'));
        chart.draw(data, options);

        chart.draw(data, options);
      }
    </script>

@stop