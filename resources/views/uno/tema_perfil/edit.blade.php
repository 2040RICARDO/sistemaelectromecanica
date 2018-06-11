@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3><strong>Editar Tema Perfil:</strong></h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
				
			</div>
			@endif
		</div>
	</div>
	<hr>
			{!!Form::model($tema_perfil,['method'=>'PATCH','route'=>['uno.tema_perfil.update',$tema_perfil->idtema_perfil],'files'=>'true'])!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="titulo_tema">Titulo Tema</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="titulo_tema" id="eperfiltitulotema" required value="{{$tema_perfil->titulo_tema}}" class="form-control">	
				</div>
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Modalidad</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="modalidad" class="form-control" onchange="mostrar1(this.value);">
				 @if ($tema_perfil->modalidad=='TRABAJO DIRIGIDO')
							<option value="TRABAJO DIRIGIDO" selected>TRABAJO DIRIGIDO</option>
							<option value="PROYECTO DE GRADO">PROYECTO DE GRADO</option>
							<option value="TESIS DE GRADO">TESIS DE GRADO</option>
					 @elseif ($tema_perfil->modalidad=='PROYECTO DE GRADO')
							<option value="TRABAJO DIRIGIDO1">TRABAJO DIRIGIDO</option>
							<option value="PROYECTO DE GRADO1" selected>PROYECTO DE GRADO</option>
							<option value="TESIS DE GRADO1">TESIS DE GRADO</option>
					   @else
					   		<option value="TRABAJO DIRIGIDO1">TRABAJO DIRIGIDO</option>
							<option value="PROYECTO DE GRADO1">PROYECTO DE GRADO</option>
							<option value="TESIS DE GRADO1" selected>TESIS DE GRADO</option>
					   @endif
				</select>
				</div>
			</div>
		</div>

@if($tema_perfil->institucion != "NULL")
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="institucion1">
			<div class="form-group">
				<label for="institucion">Institucion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="institucionn" id="eperfilinstitucion" required value="{{$tema_perfil->institucion}}" class="form-control">	
				</div>
			</div>
		</div>
@endif

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="institucion" style="display:none">
			<div class="form-group">
				<label for="institucion">Institucion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="institucion" id="eperfilinstitucion"  class="form-control">
				</div>	
			</div>
		</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
		
				<label>Postulante</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="idpostulante" class="form-control">
				@foreach ($postulantes as $pos)
				<option value="{{$pos->idpostulante}}">{{$pos->nombresapellidos}}</option>
				@endforeach 
				</select>
				</div>
			</div>
		</div>


	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Tutor</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="iddocente" class="form-control">
				@foreach ($docentes as $doc)
				<option value="{{$doc->iddocente}}">{{$doc->nombre}}</option>
				@endforeach 
				</select>
				</div>
			</div>
		</div>




	
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="observacion">Observacion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="observacion" id="eperfilobservacion" required value="{{$tema_perfil->observacion}}" class="form-control">
				</div>	
			</div>
		</div>

		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="fecha_aprobacion">Fecha_Apro</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="fecha_aprobacion" required value="{{$tema_perfil->fecha_aprobacion}}" class="form-control datepicker">
				</div>	
			</div>
		</div>


		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group" style="float: right;">
			
				<button class="btn btn-primary" type="submit">Actualizar</button>	
				<a href="{{url('uno/tema_perfil')}}" class="btn btn-danger">Cancelar</a>		
				
			</div>
		</div>

	</div>

				
			{!!Form::close()!!}


@endsection