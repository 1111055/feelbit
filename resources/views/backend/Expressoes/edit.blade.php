@extends('backend.app')

@section('content')

              @include('backend.alert')
              <!-- Content Wrapper. Contains page content -->
              <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                  <h1>
                  Editar Expressão
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="{{route('dash')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li ><a href="{{route('expressoes')}}"><i class="fa fa-y-combinator"></i> Expressões</a></li>
                     <li class="active"><a href="{{route('expressoes.edit',  $exp->id)}}"><i class="fa fa-y-combinator"></i> Editar Expressão</a></li>
                  </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">             
            <!-- /.row -->
                  <div class="row">
                      <div class="col-xs-12">
                        <div class="box">
                          <div class="box-header">

                          </div>
                         <div class="panel panel-default">
                            <div class="panel-body">
                            <div class="box box-info">
                                     {!! Form::model($exp, [
                                          'method' => 'PUT',
                                          'route' => ['expressoes.update', $exp->id],
                                          'class' => 'form-horizontal'
                                     ]) !!}
                                    <div class="box-body">
                                      <div class="form-group">
                                        {!! Form::label('* Expressão:',null, ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-4">
                                           {!! Form::text('expression',$exp->expression,['class' => 'form-control']) !!}
                                        </div>
                                        
                                      </div>
                                      <div class="form-group">
                                           {!! Form::label('Descrição:',null, ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-4">
                                           {!! Form::text('desc',$exp->descricao,['class' => 'form-control']) !!}
                                        </div>
                                      </div>
                                    </div>
                                    <div class="box-footer">
                                        {!! Form::submit('Guardar',['class' => 'btn btn-info pull-right']) !!}
                                    </div>
                                  {!! Form::close() !!}
                              </div>
                            </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                     </div>
                  </div>

                </section>
                <!-- /.content -->
              </div>
              <!-- /.content-wrapper -->

@stop