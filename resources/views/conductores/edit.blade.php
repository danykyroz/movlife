@extends('layouts.master')

@section('main-content')
<div class="breadcrumb">
  <ul>
    <li><a href="/">Inicio</a></li>
    <li><a href="{{route('conductores')}}">conductores</a></li>
    <li>Nuevo Pasajero</li>
  </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<div class="row">

  @if ($errors->any())
  <div class="alert alert-danger">
    <strong>Error!</strong>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}} </li>
      @endforeach
    </ul>
  </div>
  @endif
</div>
<div class="row">

  <div class="col-md-8 mb-4">
    <div class="card text-left">
      <div class="card-body">
        <h3 class="card-title mb3">Editar Conductor</h3>

        <ul class="nav nav-tabs" id="myIconTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active show" id="general-icon-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true"><i class="nav-icon i-Home1 mr-1"></i>General</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="general-icon-tab" data-toggle="tab" href="#hojavida" role="tab" aria-controls="hojavida" aria-selected="true"><i class="nav-icon i-Home1 mr-1"></i>Hoja de Vida</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="documentos-icon-tab" data-toggle="tab" href="#documentos" role="tab" aria-controls="documentos" aria-selected="false"><i class="nav-icon i-Home1 mr-1"></i> Documentos</a>
          </li>
          <li class="nav-item"><a class="nav-link" id="historial-documentos-icon-tab" data-toggle="tab" href="#historial-documentos" role="tab" aria-controls="historial" aria-selected="false"><i class="nav-icon i-Home1 mr-1"></i> Historial Documentos</a>
          </li>
          <li class="nav-item"><a class="nav-link" id="historial-documentos-icon-tab" data-toggle="tab" href="#cuentas_bancarias" role="tab" aria-controls="cuentas_bancarias" aria-selected="false"><i class="nav-icon i-Home1 mr-1"></i> Cuentas Bancarias</a>
          </li>
        </ul>

        <div class="tab-content">

          <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-icon-tab">
            <div class="box box-info">
              <form action="{{route('conductores.save')}}" method="POST" id="user-new-form" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$conductor->id}}">
                <input type="hidden" name="is_new" value="false">

                <div class="row">
                  <div class="col-md-6 form-group mb-3">
                    <label><strong>Documento:</strong></label>
                    <input type="text" name="documento"  class="form-control" placeholder="000000" maxlength="20" required value="{{$conductor->documento}}">
                  </div>

                  <div class="col-md-6 form-group mb-3">
                    <label><strong>Lugar Expedici??n Documento:</strong></label>
                    <input type="text" name="ciudad_documento"  class="form-control" placeholder="" maxlength="20" required value="{{$conductor->ciudad_documento}}">
                  </div>
                  <div class="col-md-6 form-group mb-3">
                    <label><strong>Nombres</strong></label>
                    <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Nombres" required value="{{$conductor->nombres}}">
                  </div>
                  <div class="col-md-6 form-group mb-3">
                    <label><strong>Apellidos</strong></label>
                    <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Apellidos" required value="{{$conductor->apellidos}}">
                  </div>

                  <div class="col-md-6 form-group mb-3">
                    <label><strong>Lugar de Nacimiento:</strong></label>
                    <input type="text" name="ciudad_nacimiento"  class="form-control" placeholder="" maxlength="20" required value="{{$conductor->ciudad_nacimiento}}">
                  </div>


                  <div class="col-md-6 form-group mb-3">
                    <label><strong>Estado Civil:</strong></label>
                    <input type="text" name="estado_civil"  class="form-control" placeholder="" maxlength="20" required value="{{$conductor->estado_civil}}">
                  </div>

                  <div class="col-md-6 form-group mb-3">
                    <label><strong>Grupo Sanguineo:</strong></label>
                    <input type="text" name="grupo_sanguineo"  class="form-control" placeholder="" maxlength="20" required value="{{$conductor->grupo_sanguineo}}">
                  </div>

                  <div class="col-md-6 form-group mb-3">
                    <label><strong>Tel??fono:</strong></label>
                    <input type="number" name="telefono" class="form-control" placeholder="000000"
                    maxlength="10" required value="{{$conductor->telefono}}">
                  </div>
                  <div class="col-md-6 form-group mb-3">
                   <label> <strong>Celular:</strong></label>
                   <input type="number" name="celular" class="form-control" placeholder="0000000000"
                   maxlength="255" required value="{{$conductor->celular}}">
                 </div>
                 <div class="col-md-6 form-group mb-3">
                   <label> <strong>Whatsapp:</strong></label>
                   <input type="number" name="whatsapp" class="form-control" placeholder="0000000000"
                   maxlength="255" required value="{{$conductor->whatsapp}}">
                 </div>
                 <div class="col-md-6 form-group mb-3">
                  <label><strong>Departamento:</strong></label>
                  <select class="form-control" name="departamento">
                    <option value="{{$direccion->departamento_id}}">Antioquia</option>
                  </select>

                </div>

                <div class="col-md-6 form-group mb-3">
                  <label><strong>Ciudad:</strong></label>
                  <select class="form-control" name="ciudad">
                    <option value="{{$direccion->ciudad_id}}">Medell??n</option>
                  </select>
                </div>

                <div class="col-md-6 form-group mb-3">
                  <label><strong>Barrio:</strong></label>
                  <input type="text" name="barrio"  class="form-control" placeholder="" maxlength="20" required value="{{$direccion->barrio}}">
                </div>

                <div class="col-md-6 form-group mb-3">
                  <label><strong>Direcci??n:</strong></label>
                  <input type="text" name="direccion" class="form-control" placeholder="" maxlength="20" required value="{{$direccion->direccion1}}">
                </div>

                <div class="col-md-6 form-group mb-3">
                  <label><strong>Detalle Direcci??n:</strong></label>
                  <input type="text" name="direccion_detalle" class="form-control" placeholder="" maxlength="20"  value="{{$direccion->direccion2}}">
                </div>
                <div class="col-md-6 form-group mb-3">
                  <label><strong>Estrato:</strong></label>
                  <input type="number" name="estrato" class="form-control" placeholder="" min="0" max="20" maxlength="20"  value="{{$conductor->estrato}}">
                </div>

                <div class="col-md-6 form-group mb-3">
                  <label><strong>N??mero Hijos:</strong></label>
                  <input type="number" name="numero_hijos" class="form-control" placeholder="" min="0" max="20" maxlength="20"  value="{{$conductor->numero_hijos}}">
                </div>
                
                <div class="col-md-6 form-group mb-3">
                  <label><strong>Email:</strong></label>
                  <input type="email" name="email" class="form-control" placeholder="example@email.com"
                  maxlength="255" required value="{{$conductor->email_contacto}}">
                </div>
                <div class="col-md-6 form-group mb-3">
                 <label> <strong>Nuevo Password:</strong></label>
                 <input type="password" name="password" class="form-control" placeholder=""
                 value="" autocomplete="off" maxlength="20" >
               </div>
               <div class="col-md-6 form-group mb-3">
                 <label> <strong>Nombre Contacto:</strong></label>
                 <input type="text" name="nombre_contacto" class="form-control" placeholder=""
                 value="" maxlength="20" required>
               </div>

               <div class="col-md-6 form-group mb-3">
                 <label> <strong>Tel??fono Contacto:</strong></label>
                 <input type="number" name="telefono_contacto" class="form-control" placeholder=""
                 value="" maxlength="20" required>
               </div>

               <div class="col-xs-12 col-sm-12 col-md-12 ">
                <button id="submit" type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('conductores') }}" class="btn btn-danger">Cancelar</a>
              </div>
            </div>

          </form>

        </div>                      

      </div>
      <!-- /.tab-panel -->

      <div class="tab-pane" id="hojavida" role="tabpanel" aria-labelledby="historial-documentos-icon-tab">
        <div class="box box-info">
          <form action="{{route('conductores.save')}}" method="POST" id="user-new-form" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$conductor->id}}">

              <div class="row">
                <div class="col-md-12 form-group mb-12">
                 <div class="accordion" id="accordionExample">
                  <div class="card ul-card__border-radius">
                    <div class="card-header">
                      <h6 class="card-title mb-0">
                        <a class="text-default" data-toggle="collapse" href="#accordion-item-informacion_seguridad_social">
                          Informaci??n Seguridad Social
                        </a>
                      </h6>
                    </div>
                    <div class="collapse" id="accordion-item-informacion_seguridad_social" data-parent="#accordionExample">
                      <div class="card-body">
                       <div class="row"> 
                         <div class="col-md-6 form-group">
                          <label> <strong>Eps:</strong></label>
                          <input type="text" name="eps" class="form-control" placeholder=""
                          value="{{$conductor->hojavida->eps}}" maxlength="20" required>
                        </div>
                        <div class="col-md-6 form-group ">
                          <label> <strong>Fondo de Pensiones:</strong></label>
                          <input type="text" name="pensiones" class="form-control" placeholder=""
                          value="{{$conductor->hojavida->pensiones}}" maxlength="20" required>
                        </div>
                        <div class="col-md-6 form-group ">
                          <label> <strong>Arl:</strong></label>
                          <input type="text" name="pensiones" class="form-control" placeholder=""
                          value="{{$conductor->hojavida->arl}}" maxlength="20" required>
                        </div>
                        <div class="col-md-6 form-group ">
                          <label> <strong>Nivel de Riesgo Arl:</strong></label>
                          <input type="number" name="pensiones" min="0" max="10" class="form-control" placeholder=""
                          value="{{$conductor->hojavida->nivel_riesgo_arl}}" maxlength="20" required>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card ul-card__border-radius">
                  <div class="card-header">
                    <h6 class="card-title mb-0"><a class="collapsed text-default" data-toggle="collapse" href="#accordion-item-informacion_academica">Informaci??n Academica</a></h6>
                  </div>
                  <div class="collapse" id="accordion-item-informacion_academica" data-parent="#accordionExample">
                    <div class="card-body">
                    <div class="row"> 
                      <div class="col-md-6 form-group">
                        <label> <strong>Instituto:</strong></label>
                        <input type="text" name="eps" class="form-control" placeholder=""
                        value="" maxlength="20" required>
                      </div>
                      <div class="col-md-6 form-group ">
                        <label> <strong>Titulo Obtenido:</strong></label>
                        <input type="text" name="pensiones" class="form-control" placeholder=""
                        value="" maxlength="20" required>
                      </div>
                      <div class="col-md-6 form-group ">
                        <label> <strong>Tipo Educaci??n:</strong></label>
                        <input type="text" name="pensiones" class="form-control" placeholder=""
                        value="" maxlength="20" required>
                      </div>
                      <div class="col-md-6 form-group ">
                        <label> <strong>A??o Finalizaci??n:</strong></label>
                        <input type="number" name="pensiones" min="1900" max="<?php date('Y') ?>" class="form-control" placeholder=""
                        value="" maxlength="20" required>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card ul-card__border-radius">
                <div class="card-header">
                  <h6 class="card-title mb-0"><a class="collapsed text-default" data-toggle="collapse" href="#accordion-item-experiencia_laboral">Experiencia Laboral</a></h6>
                </div>
                <div class="collapse" id="accordion-item-experiencia_laboral" data-parent="#accordionExample">
                  <div class="card-body">
                  <div class="row"> 
                      <div class="col-md-6 form-group">
                        <label> <strong>Empresa:</strong></label>
                        <input type="text" name="eps" class="form-control" placeholder=""
                        value="" maxlength="20" required>
                      </div>
                      <div class="col-md-6 form-group ">
                        <label> <strong>Cargo:</strong></label>
                        <input type="text" name="pensiones" class="form-control" placeholder=""
                        value="" maxlength="20" required>
                      </div>
                      <div class="col-md-6 form-group ">
                        <label> <strong>Jefe Inmediato:</strong></label>
                        <input type="text" name="pensiones" class="form-control" placeholder=""
                        value="" maxlength="20" required>
                      </div>
                      <div class="col-md-3 form-group ">
                        <label> <strong>Tel??fono:</strong></label>
                        <input type="text" name="pensiones" maxlength="10" class="form-control" placeholder=""
                        value="" maxlength="20" required>
                      </div>
                      <div class="col-md-3 form-group ">
                        <label> <strong>A??o:</strong></label>
                        <input type="number" name="pensiones" min="1900" max="<?php date('Y') ?>" class="form-control" placeholder=""
                        value="" maxlength="20" required>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <div class="card ul-card__border-radius">
                  <div class="card-header">
                    <h6 class="card-title mb-0"><a class="collapsed text-default" data-toggle="collapse" href="#accordion-item-referencias_personales">Referencias Personales</a></h6>
                  </div>
                  <div class="collapse" id="accordion-item-referencias_personales" data-parent="#accordionExample">
                    <div class="card-body">
                    <div class="row"> 
                      <div class="col-md-6 form-group">
                        <label> <strong>Nombres:</strong></label>
                        <input type="text" name="referencia_personal_nombres" class="form-control" placeholder=""
                        value="" maxlength="20" required>
                      </div>
                      <div class="col-md-6 form-group ">
                        <label> <strong>Profesi??n u Oficio:</strong></label>
                        <input type="text" name="referencia_personal_profesion" class="form-control" placeholder=""
                        value="" maxlength="20" required>
                      </div>
                      <div class="col-md-6 form-group ">
                        <label> <strong>Tel??fono:</strong></label>
                        <input type="text" name="referencia_personal_telefono" class="form-control" placeholder=""
                        value="" maxlength="20" required>
                      </div>
                      <div class="col-md-6 form-group ">
                        <label> <strong>Celular:</strong></label>
                        <input type="text" name="referencia_personal_celular" min="10" max="10" class="form-control" placeholder=""
                        value="" maxlength="20" required>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!--Fin Accordion!-->
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 ">
            <button id="submit" type="submit" class="btn btn-primary">Enviar</button>
            <a href="{{ route('conductores') }}" class="btn btn-danger">Cancelar</a>
          </div>
        </div>
      </form>

    </form>

  </div>                      

</div>


<div class="tab-pane" id="documentos" role="tabpanel" aria-labelledby="documentos-icon-tab">
  <div class="box box-info">
    <form action="{{route('conductores.save')}}" method="POST" id="user-new-form" enctype="multipart/form-data" >
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{$conductor->id}}">

      <div class="row">
        <div class="col-md-12 form-group mb-12">
         <div class="accordion" id="accordionExample">
          <div class="card ul-card__border-radius">
            <div class="card-header">
              <h6 class="card-title mb-0">
                <a class="text-default" data-toggle="collapse" href="#accordion-item-cedula">
                  Fotos C??dula
                </a>
              </h6>
            </div>
            <div class="collapse" id="accordion-item-cedula" data-parent="#accordionExample">
              <div class="card-body">
                <div class="row"> 
                  <div class="col-md-6 form-group ">
                    <label> <strong>Foto C??dula Frontal:</strong></label>
                    <input type="file" class="form-control" name="cedula_frontal">

                  </div>
                  <div class="col-md-6 form-group ">
                    <label> <strong>Foto C??dula Reverso:</strong></label>
                    <input type="file" class="form-control" name="cedula_frontal">

                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="card ul-card__border-radius">
            <div class="card-header">
              <h6 class="card-title mb-0"><a class="collapsed text-default" data-toggle="collapse" href="#accordion-item-licencia">Fotos Licencia</a></h6>
            </div>
            <div class="collapse" id="accordion-item-licencia" data-parent="#accordionExample">
              <div class="card-body">
                <div class="row"> 
                <form type="multipart/form-data" name="documentos-licencia" id="documentos-licencia"  >
                  <input type="hidden" name="documento[tipo][1]">
                  <input type="hidden" name="documento[tipo][1]">
                  
                  <div class="col-md-3 form-group ">
                        <label> <strong>Fecha Inicial:</strong></label>
                        <input type="date" name="licencia_fecha_inicial" class="form-control" placeholder="dd/mm/yyyy"
                        name="documentos[fecha_inicial]" id="documentos_fecha_inicial" 
                        >
                  </div>

                   <div class="col-md-3 form-group ">
                        <label> <strong>Fecha Final:</strong></label>
                        <input type="date" name="documentos[fecha_final]" class="form-control" placeholder="dd/mm/yyyy">
                  </div>

                  <div class="col-md-6 form-group ">
                        <label> <strong>Categoria:</strong></label>
                        <input type="text" name="documentos[extra1]" class="form-control" >
                  </div>

                  <div class="col-md-6 form-group ">
                        <label> <strong>N??mero Documento:</strong></label>
                        <input type="number" name="documentos[numero]" class="form-control" min="0" max="10">
                  </div>

                  <div class="col-md-6 form-group ">
                    <label> <strong>Foto Licencia Frontal:</strong></label>
                    <input type="file" class="form-control" name="documentos[cara][1]">

                  </div>
                  <div class="col-md-6 form-group ">
                    <label> <strong>Foto Licencia Reverso:</strong></label>
                    <input type="file" class="form-control" name="cedula_frontal" name="documentos[cara][2]">

                  </div>
                </div>
              </div>
            </div>
        </div>
          <div class="card ul-card__border-radius">
              <div class="card-header">
                <h6 class="card-title mb-0"><a class="collapsed text-default" data-toggle="collapse" href="#accordion-item-seguridad_social">Seguridad Social</a></h6>
              </div>
              <div class="collapse" id="accordion-item-seguridad_social" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="col-md-6 form-group ">
                      <label> <strong>Archivo Planilla Seguridad Social:</strong></label>
                      <input type="file" class="form-control" name="seguridad_social">
                    </div>
                </div>
              </div>
          </div>

          <div class="card ul-card__border-radius">
              <div class="card-header">
                <h6 class="card-title mb-0"><a class="collapsed text-default" data-toggle="collapse" href="#accordion-item-rut">Rut</a></h6>
              </div>
              <div class="collapse" id="accordion-item-rut" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="row"> 

                  <div class="col-md-3 form-group ">
                        <label> <strong>Fecha Inicial:</strong></label>
                        <input type="date" name="licencia_fecha_inicial" class="form-control" placeholder="dd/mm/yyyy">
                  </div>

                   <div class="col-md-3 form-group ">
                        <label> <strong>Fecha Final:</strong></label>
                        <input type="date" name="licencia_fecha_final" class="form-control" placeholder="dd/mm/yyyy">
                  </div>

                  <div class="col-md-6 form-group ">
                      <label> <strong>Archivo Rut:</strong></label>
                      <input type="file" class="form-control" name="rut">
                  </div>
                </div>
              </div>
            </div>
          </div>

           <div class="card ul-card__border-radius">
              <div class="card-header">
                <h6 class="card-title mb-0"><a class="collapsed text-default" data-toggle="collapse" href="#accordion-item-simit">SIMIT</a></h6>
              </div>
              <div class="collapse" id="accordion-item-simit" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="row"> 

                  <div class="col-md-3 form-group ">
                        <label> <strong>Fecha Inicial:</strong></label>
                        <input type="date" name="licencia_fecha_inicial" class="form-control" placeholder="dd/mm/yyyy">
                  </div>

                   <div class="col-md-3 form-group ">
                        <label> <strong>Fecha Final:</strong></label>
                        <input type="date" name="licencia_fecha_final" class="form-control" placeholder="dd/mm/yyyy">
                  </div>

                  <div class="col-md-6 form-group ">
                      <label> <strong>Archivo SIMIT:</strong></label>
                      <input type="file" class="form-control" name="rut">
                  </div>
                </div>
                </div>
              </div>
          </div>

  
           <div class="card ul-card__border-radius">
              <div class="card-header">
                <h6 class="card-title mb-0"><a class="collapsed text-default" data-toggle="collapse" href="#accordion-item-runt">RUNT</a></h6>
              </div>
              <div class="collapse" id="accordion-item-runt" data-parent="#accordionExample">
                <div class="card-body">
                   <div class="row"> 

                  <div class="col-md-3 form-group ">
                        <label> <strong>Fecha Inicial:</strong></label>
                        <input type="date" name="licencia_fecha_inicial" class="form-control" placeholder="dd/mm/yyyy">
                  </div>

                   <div class="col-md-3 form-group ">
                        <label> <strong>Fecha Final:</strong></label>
                        <input type="date" name="licencia_fecha_final" class="form-control" placeholder="dd/mm/yyyy">
                  </div>

                  <div class="col-md-6 form-group ">
                      <label> <strong>Archivo RUNT:</strong></label>
                      <input type="file" class="form-control" name="rut">
                  </div>
                </div>
                </div>
              </div>
          </div>

          <div class="card ul-card__border-radius">
              <div class="card-header">
                <h6 class="card-title mb-0"><a class="collapsed text-default" data-toggle="collapse" href="#accordion-item-antecedentes_penales">Antecedentes Penales</a></h6>
              </div>
              <div class="collapse" id="accordion-item-antecedentes_penales" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="col-md-6 form-group ">
                      <label> <strong>Archivo Antecedentes Penales:</strong></label>
                      <input type="file" class="form-control" name="seguridad_social">
                    </div>
                </div>
              </div>
          </div>

          <div class="card ul-card__border-radius">
              <div class="card-header">
                <h6 class="card-title mb-0"><a class="collapsed text-default" data-toggle="collapse" href="#accordion-item-cursos_adicionales">Cursos Adicionales</a></h6>
              </div>
              <div class="collapse" id="accordion-item-cursos_adicionales" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="col-md-6 form-group ">
                      <label> <strong>Archivo Cursos Adicionales:</strong></label>
                      <input type="file" class="form-control" name="seguridad_social">
                    </div>
                </div>
              </div>
          </div>

        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 ">
        <button id="submit" type="submit" class="btn btn-primary">Enviar</button>
        <a href="{{ route('conductores') }}" class="btn btn-danger">Cancelar</a>
      </div>
    </div>
  </form>
</div>   
</div>

<div class="tab-pane" id="historial-documentos" role="tabpanel" aria-labelledby="historial-documentos-icon-tab">
  <div class="box box-info">
    <form action="{{route('conductores.save')}}" method="POST" id="user-new-form" enctype="multipart/form-data" >
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{$conductor->id}}">

      <div class="row">
        <div class="col-md-6 form-group mb-3">
          <label><strong>Historial Documentos:</strong></label>

        </div>
      
      </div>

    </form>

  </div>                      

</div>

<div class="tab-pane" id="cuentas_bancarias" role="tabpanel" aria-labelledby="historial-documentos-icon-tab">
  <div class="box box-info">
    <form action="{{route('conductores.save')}}" method="POST" id="user-new-form" enctype="multipart/form-data" >
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{$conductor->id}}">

        <div class="card-body">
                   <div class="row"> 

                  <div class="col-md-3 form-group ">
                        <label> <strong>Numero Cuenta:</strong></label>
                        <input type="number" name="cuenta_bancaria_numero" class="form-control" placeholder="">
                  </div>
                   <div class="col-md-3 form-group ">
                        <label> <strong>Banco:</strong></label>
                        <input type="text" name="cuentas_bancaria_banco" class="form-control" placeholder="">
                  </div>
                  <div class="col-md-6 form-group ">
                      <label> <strong>Archivo:</strong></label>
                      <input type="file" class="form-control" name="rut">
                  </div>
                </div>
        </div>
     
    </form>

  </div>                      

</div>

</div>

</div>
<!-- /.card-body -->
</div>
<!-- /.card -->


<!-- /.card -->
</div>


</div>
@endsection
@section('bottom-js')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>


<script>



// just for the demos, avoids form submit
var form = $( "#user-new-form" );
$.validator.messages.required = 'Este campo es requerido';
$.validator.messages.email = 'Email invalido';

$('#user-new-form').validate({
  rules: {
    nombres: { required:true },
    apellidos: { required:true },
    email:{ required:true },
    documento:{ required:true },
    departamento_id:{ required:true },
    ciudad_id: { required:true },
    password:{ required:false },

  },messages: {

  },

})

$("#submit").validate({ 
 onsubmit: false,

 submitHandler: function(form) {  
   if ($(form).valid())
   {
     form.submit(); 
   }
   return false; // prevent normal form posting
 }
});



/*
$( "#submit" ).click(function(e) {
  e.preventDefault();
  if($( "#user-new-form" ).valid()){
    alert('valido');
    $( "#user-new-form" ).submit();
  }else{
    alert('ERRORES')
  }
});
*/
</script>
@endsection