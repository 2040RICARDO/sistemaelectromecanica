@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3><strong>Nuevo Tema Perfil</strong></h3>
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
			{!!Form::open(array('url'=>'uno/tema_perfil','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="titulo_tema">Titulo Tema <label id="control"></label></label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="titulo_tema" id="rperfiltitulotema" required value="{{old('titulo_tema')}}" class="form-control text-uppercase" placeholder="Titulo tema...">	
				</div>
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Modalidad</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="modalidad" class="form-control" onchange="mostrar(this.value);">
							<option value="TRABAJO DIRIGIDO">TRABAJO DIRIGIDO</option>
							<option value="PROYECTO DE GRADO">PROYECTO DE GRADO</option>
							<option value="TESIS DE GRADO">TESIS DE GRADO</option>
							
				</select>
				</div>
			</div>
		</div>

				

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="institucion">
			<div class="form-group">
				<label for="institucion">Institucion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="institucion" id="rperfilinstitucion"  value="{{old('institucion')}}" class="form-control" placeholder="Institucion...">
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
				<input type="text" name="observacion" id="rperfilobservacion" required value="{{old('observacion')}}" class="form-control" placeholder="Obs...">	
				</div>
			</div>
		</div>

		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="fecha_aprobacion">Fecha Aprobación</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="fecha_aprobacion" required  class="form-control datepicker" placeholder="fecha_aprobacion...">	
				</div>
			</div>
		</div>


		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group" style="float: right;">
			
				<button class="btn btn-primary" type="submit" id="boton-consulta">Guardar</button>	
				<a href="{{url('uno/tema_perfil')}}" class="btn btn-danger">Cancelar</a>	
				
			</div>
		</div>

	</div>

			{!!Form::close()!!}

@endsection