@extends('layouts.app')
@section('content')
	<div class="row justify-content-center">
		<div class="col-md-8">
		    <div class="tile">
		        <div class="tile-body text-center"><h1 class="text-primary">Perfil</h1></div>
		    	<div id="getProfile" class="col-lg-12">
		    		<div class="row">
		    			<div class="col-lg-4 text-center">
					          <img src="{{Auth()->user()->picture}}" class="img-file">
					          Imagen de perfil
			        	</div>
			        	<div class="col-lg-8 mt-4">
			        		<p>Nombre de usuario: <b>{{ Auth()->user()->name }}</b></p>
			        		<p>Correo electronico: <b>{{ Auth()->user()->email }}</b></p>
			        		<p>Rol: <b>{{ rol(Auth()->user()->rol) }}</b></p>
			        	</div>
			        	<div class="col-lg-12 text-right mt-3">
			        		<a onclick="visibility('updatePassword', 'getProfile')" class="btn btn-danger btn-sm text-white">Modificar contraseña</a>
			        		<a onclick="visibility('updateProfile', 'getProfile')" class="btn btn-primary btn-sm text-white">Modificar datos</a>
			        	</div>
		    		</div>
		    	</div>

		    	<div id="updateProfile" class="hidden col-lg-12 ">
		    		<div class="row">
		    			{!!Form::open(['url'=>'modificar/datos/'.Auth()->user()->id,'enctype'=>'multipart/form-data','class'=>'col-lg-12'])!!}
		    			<div class="row">
		    				<div class="col-lg-4 text-center ">
				        		<label for="file-input" id="label-file">
						          <img src="{{Auth()->user()->picture}}" id="img-file" class="img-file">
						          Modificar imagen
						        </label>
						        <input id="file-input" name="picture" type="file" />
				        	</div>
				        	<div class="col-lg-8">
				        		{!!Field::text('name',Auth()->user()->name,['label'=>'Nombre de usuario'])!!}
				        		{!!Field::text('email',Auth()->user()->email,['label'=>'Correo electronico'])!!}
				        	</div>
				        	<div class="col-lg-12 text-right mt-3">
				        		<a onclick="visibility('getProfile', 'updateProfile')" class="btn btn-danger btn-sm text-white">Cancelar</a>
				        		<button type="submit" onclick="visibility('getProfile', 'updateProfile')" class="btn btn-primary btn-sm text-white">Guardar cambios</button>
				        	</div>
		    			</div>
		    			{!!Form::close()!!}
		    		</div>
		    	</div>

		    	<div id="updatePassword" class="hidden col-lg-12">
		    		<div class="row justify-content-center">
		    			{!!Form::open(['url'=>'modificar/contraseña/'.Auth()->user()->id,'class'=>'col-lg-6'])!!}
			    			{!!Field::password('password',['label'=>'Nueva contraseña'])!!}
			    			<a onclick="visibility('getProfile', 'updatePassword')" class="btn btn-danger btn-sm text-white col-lg-5 mr-4 ml-2">Cancelar</a>
				        	<button type="submit" onclick="visibility('getProfile', 'updatePassword')" class="btn btn-primary btn-sm text-white col-lg-5">Guardar cambios</button>
				        	
			    		{!!Form::close()!!}
		    		</div>
		    	</div>
		    </div>
	    </div>
	</div>
@endsection
