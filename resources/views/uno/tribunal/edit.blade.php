@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3><strong>Editar Tribunal:</strong></h3>
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
		{!!Form::model($tribunal, ['method'=>'PATCH','route'=>['uno.tribunal.update',$tribunal->idtribunal],'files'=>'true'])!!}
		{{Form::token()}}
	
	<div class="row">
		
	
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
		
				<label>Postulante</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="idpostulante" class="form-control" selectpicker" data-live-search="true">
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
				<select name="idtema_perfil" id="idtemq_perfil" class="form-control selectpicker" data-live-search="true">
				@foreach ($tema_perfils as $tema_perfil)
				<option value="{{$tema_perfil->idtema_perfil}}">{{$tema_perfil->titulo_tema}}</option>
				@endforeach 
				</select>
				</div>
			</div>
		</div>



		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Tribunal 1</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="iddocente" class="form-control" selectpicker" data-live-search="true">
				@foreach ($docentes as $doc)
				<option value="{{$doc->iddocente}}">{{$doc->nombre}}</option>
				@endforeach 
				</select>
				</div>
			</div>
		</div>


	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
		
				<label>Tribunal 2</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="nombre_tri1" class="form-control selectpicker" data-live-search="true">
				@foreach ($docentes as $doc)
				<option value="{{$doc->nombre}}">{{$doc->nombre}}</option>
				@endforeach 
				</select>
				</div>
			</div>
		</div>



	
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
		
				<label>Tribunal 3</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="nombre_tri2" class="form-control selectpicker" data-live-search="true">
				@foreach ($docentes as $doc)
				<option value="{{$doc->nombre}}">{{$doc->nombre}}</option>
				@endforeach 
				</select>
				</div>
			</div>
		</div>

		
		

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group" style="float: right;">
			
				<button class="btn btn-primary" type="submit">Actualizar</button>	
				<a href="{{url('uno/tribunal')}}" class="btn btn-danger">Cancelar</a>	
				
			</div>
		</div>

	</div>
			{!!Form::close()!!}


@endsection