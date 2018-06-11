@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3><strong>Nuevo Acta de Calificación</strong></h3>
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
			{!!Form::open(array('url'=>'uno/acta_defensa','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}


<div class="row">

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Postulante</label>
						<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
						<select name="idpostulante" class="form-control selectpicker" data-live-search="true"">
						@foreach ($postulantes as $pos)
						<option value="{{$pos->idpostulante}}">{{$pos->nombresapellidos}}</option>
						@endforeach 
						</select>
						</div>
				</div>
			</div>
			


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
		
				<label for="tema_perfil">Titulo Tema</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="idtema_perfil" id="idtema_perfil" class="form-control selectpicker" data-live-search="true">
				@foreach ($tema_perfils as $tema_perfil)
				<option value="{{$tema_perfil->idtema_perfil}}">{{$tema_perfil->titulo_tema}}</option>
				@endforeach 
				</select>
				</div>
			</div>
		</div>


	
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="fecha_hora_defensa">Fecha calificación</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="fecha_defensa" required  class="form-control datepicker" placeholder="fecha calificacion...">
				</div>	
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="fecha_hora_defensa">Hora calificación</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="hora_defensa" id="reloj" required class="form-control" placeholder="hora calificacion..">
				</div>	
			</div>
		</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Modalidad</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="modalidad" class="form-control">
							<option value="TRABAJO DIRIGIDO">TRABAJO DIRIGIDO</option>
							<option value="PROYECTO DE GRADO">PROYECTO DE GRADO</option>
							<option value="TESIS DE GRADO">TESIS DE GRADO</option>
							
				</select>
				</div>
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="puntaje">Puntaje</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="int" name="puntaje" required value="{{old('puntaje')}}" class="form-control" placeholder="puntaje...">
				</div>	
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Valoracion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="valoracion" class="form-control">
							<option value="Hasta 50 pts Reprobado">Hasta 50 pts Reprobado</option>
							<option value="De 51 a 60 pts Regular Aprobado">De 51 a 60 pts Regular Aprobado</option>
							<option value="De 61 a 70 pts Bueno Aprobado">De 61 a 70 pts Bueno Aprobado</option>
							<option value="De 71 a 80 pts Muy Bueno Aprobado">De 71 a 80 pts Muy Bueno Aprobado</option>
							<option value="De 81 a 90 pts Distinguido Aprobado">De 81 a 90 pts Distinguido Aprobado</option>
							<option value="De 91 a 100 pts Sobresaliente Aprobado">De 91 a 100 pts Sobresaliente Aprobado</option>
							
				</select>
				</div>
			</div>
		</div>



	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="obs_recomendaciones">Obs/Recm.</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="obs_recomendaciones" id="ractadefenza_observacion" required value="{{old('obs_recomendaciones')}}" class="form-control" placeholder="obs_recomendaciones...">	
				</div>
			</div>
		</div>

		
		

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group" style="float: right;">
			
				<button class="btn btn-primary" type="submit">Guardar</button>	
				<a href="{{url('uno/acta_defensa')}}" class="btn btn-danger">Cancelar</a>	
				
			</div>
		</div>

</div>

			{!!Form::close()!!}

@endsection