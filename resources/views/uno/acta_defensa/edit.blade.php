@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3><strong>Editar Acta/Calificación:</strong></h3>
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
		{!!Form::model($acta_defensa, ['method'=>'PATCH','route'=>['uno.acta_defensa.update',$acta_defensa->idacta_defensa],'files'=>'true'])!!}
		{{Form::token()}}
	
	
		<div class="row">
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
			
				<label for="fecha_hora_defensa">Fecha</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="fecha_defensa" required value="{{$acta_defensa->fecha_defensa}}" class="form-control datepicker">	
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="fecha_hora_defensa">Hora</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="hora_defensa" required value="{{$acta_defensa->hora_defensa}}" class="form-control" id="reloj">
				</div>	
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Modalidad</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="modalidad" class="form-control">
				 @if ($tema_perfil->modalidad=='TRABAJO DIRIGIDO')
							<option value="TRABAJO DIRIGIDO" selected>TRABAJO DIRIGIDO</option>
							<option value="PROYECTO DE GRADO">PROYECTO DE GRADO</option>
							<option value="TESIS DE GRADO">TESIS DE GRADO</option>
					 @elseif ($tema_perfil->modalidad=='PROYECTO DE GRADO')
							<option value="TRABAJO DIRIGIDO">TRABAJO DIRIGIDO</option>
							<option value="PROYECTO DE GRADO" selected>PROYECTO DE GRADO</option>
							<option value="TESIS DE GRADO">TESIS DE GRADO</option>
					   @else
					   		<option value="TRABAJO DIRIGIDO">TRABAJO DIRIGIDO</option>
							<option value="PROYECTO DE GRADO">PROYECTO DE GRADO</option>
							<option value="TESIS DE GRADO" selected>TESIS DE GRADO</option>
					   @endif
				</select>
				</div>
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="puntaje">Puntaje</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="int" name="puntaje" required value="{{$acta_defensa->puntaje}}" class="form-control">
				</div>	
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Valoracion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="valoracion" class="form-control">
				 @if ($acta_defensa->valoracion=='Hasta 50 pts Reprobado')
							<option value="Hasta 50 pts Reprobado" selected>Hasta 50 pts Reprobado</option>
							<option value="De 51 a 60 pts Regular Aprobado">De 51 a 60 pts Regular Aprobado</option>
							<option value="De 61 a 70 pts Bueno Aprobado">De 61 a 70 pts Bueno Aprobado</option>
							<option value="De 71 a 80 pts Muy Bueno Aprobado">De 71 a 80 pts Muy Bueno Aprobado</option>
							<option value="De 81 a 90 pts Distinguido Aprobado">De 81 a 90 pts Distinguido Aprobado</option>
							<option value="De 91 a 100 pts Sobresaliente Aprobado">De 91 a 100 pts Sobresaliente Aprobado</option>
					 @elseif ($acta_defensa->valoracion=='De 51 a 60 pts Regular Aprobado')
							<option value="Hasta 50 pts Reprobado">Hasta 50 pts Reprobado</option>
							<option value="De 51 a 60 pts Regular Aprobado" selected>De 51 a 60 pts Regular Aprobado</option>
							<option value="De 61 a 70 pts Bueno Aprobado">De 61 a 70 pts Bueno Aprobado</option>
							<option value="De 71 a 80 pts Muy Bueno Aprobado">De 71 a 80 pts Muy Bueno Aprobado</option>
							<option value="De 81 a 90 pts Distinguido Aprobado">De 81 a 90 pts Distinguido Aprobado</option>
							<option value="De 91 a 100 pts Sobresaliente Aprobado">De 91 a 100 pts Sobresaliente Aprobado</option>

					@elseif ($acta_defensa->valoracion=='De 61 a 70 pts Bueno Aprobado')
							<option value="Hasta 50 pts Reprobado">Hasta 50 pts Reprobado</option>
							<option value="De 51 a 60 pts Regular Aprobado">De 51 a 60 pts Regular Aprobado</option>
							<option value="De 61 a 70 pts Bueno Aprobado" selected>De 61 a 70 pts Bueno Aprobado</option>
							<option value="De 71 a 80 pts Muy Bueno Aprobado">De 71 a 80 pts Muy Bueno Aprobado</option>
							<option value="De 81 a 90 pts Distinguido Aprobado">De 81 a 90 pts Distinguido Aprobado</option>
							<option value="De 91 a 100 pts Sobresaliente Aprobado">De 91 a 100 pts Sobresaliente Aprobado</option>

					@elseif ($acta_defensa->valoracion=='De 71 a 80 pts Muy Bueno Aprobado')
							<option value="Hasta 50 pts Reprobado">Hasta 50 pts Reprobado</option>
							<option value="De 51 a 60 pts Regular Aprobado">De 51 a 60 pts Regular Aprobado</option>
							<option value="De 61 a 70 pts Bueno Aprobado">De 61 a 70 pts Bueno Aprobado</option>
							<option value="De 71 a 80 pts Muy Bueno Aprobado" selected>De 71 a 80 pts Muy Bueno Aprobado</option>
							<option value="De 81 a 90 pts Distinguido Aprobado">De 81 a 90 pts Distinguido Aprobado</option>
							<option value="De 91 a 100 pts Sobresaliente Aprobado">De 91 a 100 pts Sobresaliente Aprobado</option>

					@elseif ($acta_defensa->valoracion=='De 81 a 90 pts Distinguido Aprobado')
							<option value="Hasta 50 pts Reprobado">Hasta 50 pts Reprobado</option>
							<option value="De 51 a 60 pts Regular Aprobado">De 51 a 60 pts Regular Aprobado</option>
							<option value="De 61 a 70 pts Bueno Aprobado">De 61 a 70 pts Bueno Aprobado</option>
							<option value="De 71 a 80 pts Muy Bueno Aprobado">De 71 a 80 pts Muy Bueno Aprobado</option>
							<option value="De 81 a 90 pts Distinguido Aprobado" selected>De 81 a 90 pts Distinguido Aprobado</option>
							<option value="De 91 a 100 pts Sobresaliente Aprobado">De 91 a 100 pts Sobresaliente Aprobado</option>

					   @else
					   		<option value="Hasta 50 pts Reprobado">Hasta 50 pts Reprobado</option>
							<option value="De 51 a 60 pts Regular Aprobado">De 51 a 60 pts Regular Aprobado</option>
							<option value="De 61 a 70 pts Bueno Aprobado">De 61 a 70 pts Bueno Aprobado</option>
							<option value="De 71 a 80 pts Muy Bueno Aprobado">De 71 a 80 pts Muy Bueno Aprobado</option>
							<option value="De 81 a 90 pts Distinguido Aprobado">De 81 a 90 pts Distinguido Aprobado</option>
							<option value="De 91 a 100 pts Sobresaliente Aprobado" selected>De 91 a 100 pts Sobresaliente Aprobado</option>


					   @endif
				</select>
				</div>
			</div>
		</div>



		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="obs_recomendaciones">Obs/Recm.</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="obs_recomendaciones" id="eactadefenza_observacion" required value="{{$acta_defensa->obs_recomendaciones}}" class="form-control">	
				</div>
			</div>
		</div>

		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group" style="float:right;">
			
				<button class="btn btn-primary" type="submit">Actualizar</button>	
				<a href="{{url('uno/acta_defensa')}}" class="btn btn-danger">Cancelar</a>
				
			</div>
		</div>

	</div>


				
				
			{!!Form::close()!!}


@endsection