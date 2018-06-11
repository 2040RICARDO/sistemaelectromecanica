@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3> <strong>Editar Postulante:</strong> {{ $postulante->nombresapellidos}}</h3>
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
			{!!Form::model($postulante,['method'=>'PATCH','route'=>['uno.postulante.update',$postulante->idpostulante],'files'=>'true'])!!}
			{{Form::token()}}
				<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

			<div class="form-group">
				<label for="ci">Ci</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="int" name="ci" required value="{{$postulante->ci}}" class="form-control">
				</div>	
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombresapellidos">Nombres/Apellidos</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="nombresapellidos" id="epostulantenombre" required value="{{$postulante->nombresapellidos}}" class="form-control">
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
				@if($doc->iddocente==$postulante->iddocente)
				<option value="{{$doc->iddocente}}" selected>{{$doc->nombre}}</option>
				@else
				<option value="{{$doc->iddocente}}">{{$doc->nombre}}</option>
				@endif
				@endforeach 
				</select>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="direccion">Direccion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="direccion" id="epostulantedireccion" required value="{{$postulante->direccion}}" class="form-control">
				</div>
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="email">Email</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="email" required value="{{$postulante->email}}" class="form-control">	
				</div>
			</div>

		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group" style="float: right;">
				<button class="btn btn-primary" type="submit">Actualizar</button>	
				<a href="{{url('uno/postulante')}}" class="btn btn-danger">Cancelar</a>	
				
			</div>
		</div>
	</div>
				
			{!!Form::close()!!}


@endsection