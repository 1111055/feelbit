@extends('backend.app')

@section('content')


              @include('backend.alert')
              <!-- Content Wrapper. Contains page content -->
              <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                  <h1>
                   Editar Familia
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="{{route('dash')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="{{route('familia')}}"><i class="fa fa-circle-o"></i> Familias</a></li>
                    <li><a href="{{route('familia.edit', $familia->id)}}"><i class="fa fa-circle-o"></i> Editar Familia</a></li>
                  </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">             
            <!-- /.row -->
                  <div class="row">
                      <div class="col-xs-12">
                        <div class="box">
                        
                             <div class="col-lg-12 col-sm-12">

                                   <div class="well">
                                      <div class="tab-content">
                                            <div class="box box-info">
                                                   {!! Form::model($familia, [
                                                        'method' => 'PUT',
                                                        'route' => ['familia.update', $familia->id],
                                                        'class' => 'form-horizontal',
                                                        'files' => true
                                                   ]) !!}
                                                  <div class="box-body">
                                                    <div class="form-group">
                                                      {!! Form::label('* Titulo:',null, ['class' => 'col-sm-2 control-label']) !!}
                                                      <div class="col-sm-8">
                                                         {!! Form::text('titulo',$familia->titulo,['class' => 'form-control']) !!}
                                                      </div>
                                                      
                                                    </div>
                                                    <div class="form-group">
                                                      {!! Form::label('* SubTitulo:',null, ['class' => 'col-sm-2 control-label']) !!}
                                                      <div class="col-sm-8">
                                                         {!! Form::text('subtitulo',$familia->subtitulo,['class' => 'form-control']) !!}
                                                      </div>
                                                      
                                                    </div>
                                                     <div class="form-group">
                                                        {!! Form::label('Ordem:',null, ['class' => 'col-sm-2 control-label']) !!}
                                                      <div class="col-sm-8">
                                                         {!! Form::text('ordem',$familia->ordem,['class' => 'form-control']) !!}
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('Activo:',null, ['class' => 'col-sm-2 control-label']) !!}
                                                      <div class="col-sm-4">
                                                         {!! Form::checkbox('activo',1,$familia->activo) !!}
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="box-footer">
                                                      {!! Form::submit('Guardar',['class' => 'btn btn-info pull-right']) !!}
                                                  </div>
                                                {!! Form::close() !!}
                                            </div>
                                            <div class="box box-info table-responsive no-padding">
                                              <h3>Sub Familias</h3> 
                                              <table class="table table-hover">
                                                <tr>
                                                  <th>#</th>
                                                  <th>Titulo</th>
                                                  <th class="text-center">Active</th>
                                                </tr>
                                                
                                                  @foreach($familia->subfamilia as $item)
                                                  <tr>
                                                    <td>#</td>
                                                    <td>{{ $item->titulo }}</td>
                                                    @if ($item->activo === 1)
                                                     <td class="text-center"><i class="fa fa-check-circle"></i></td>
                                                    @else                       
                                                     <td class="text-center"><i class="fa fa-times-circle"></i></td>
                                                    @endif   
                                                  </tr>
                                                  @endforeach
                                                
                                              </table>
                                            </div>
                                      </div>
                                    </div>
                             </div>
                        </div>
                        <!-- /.box -->
                      </div>
                     </div>

                </section>
                <!-- /.content -->
              </div>
              <!-- /.content-wrapper -->

@stop
