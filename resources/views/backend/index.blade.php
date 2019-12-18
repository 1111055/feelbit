@extends('backend.app')

@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
               
            <div class="info-box-content">
              <span class="info-box-text">Pagina mais visitada</span>
              <span class="info-box-number">{{$mostview[0]['url']}}</span>
              <span><small>Total paginas visitadas: {{$mostview[0]['pageViews']}}</small></span>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
            @if(count($mostviewtoday) > 0)
              <div class="info-box-content">
                <span class="info-box-text">Numero total de visitas de hoje.</span>
                <span class="info-box-number">Total Visitas {{$mostviewtoday[0]['visitors']}}</span>
                <span><small>Total paginas visitadas: {{$mostviewtoday[0]['pageViews']}}</small></span>
              </div>
            @else
             <div class="info-box-content">
              <span class="info-box-text">Numero total de visitas de hoje.</span>
              <span class="info-box-number">Total Visitas 0</span>
              <span><small>Total paginas visitadas: 0</small></span>
             </div>
            @endif
          </div>
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total subscritores NewsLetter</span>
              <span class="info-box-number">{{$news}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Pedidos de Contacto</span>
              <span class="info-box-number">{{$contacto}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Evolução do número de sessões mensais. </h3>
              <input type="hidden" value="{{ route('dash.userschar')}}" id="userschar">

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Sessões</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Paginas Mais Visitadas</strong>
                  </p>
                  @foreach($mostviewmany as $item)
                  <div class="progress-group">
                    <span class="progress-text">{{$item['url']}}</span>
                    <span class="progress-number"><b>{{$item['pageViews']}}</b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Sessões por paises</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-9 col-sm-8">
                  <div class="pad">
                    <!-- Map will be created here -->
                    <div id="world-map-markers" style="height: 325px;"></div>
                     <input type="hidden" value="{{ route('dash.mapschar')}}" id="mapschar">
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-4">
                  <div class="pad box-pane-right bg-green" style="min-height: 280px">
                    @foreach($countrys as $item)
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">{{$item['type']}}</div>
                      <h5 class="description-header">{{$item['sessions']}}</h5>
                      <span class="description-text">Sessões</span>
                    </div>
                    @endforeach
                    
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <!-- /.col -->

           <div class="col-md-4">
             <div class="box box-default">
                  <div class="box-header with-border">
                    <h3 class="box-title">Sessões por dispositivo</h3>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="chart-responsive">
                          <canvas id="pieChart" height="150"></canvas>
                          <input type="hidden" value="{{ route('dash.piechart')}}" id="piechar">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <ul class="chart-legend clearfix">
                          @foreach($teste as $key => $item)
                            <li><i class="fa fa-{{$teste[$key]['typedevice']}} text-red"></i> {{ strtoupper($teste[$key]['typedevice'])}}</li>
                          @endforeach
                        </ul> 
                      </div>
                    </div>
                  </div>
              </div>
            </div>
         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@stop