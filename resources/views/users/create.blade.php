@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/plugins/bootstrap-select.css') }}" rel="stylesheet"/>
<style type="text/css">
	form > .row { margin-bottom: 15px; }
</style>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-info">
					<h4 class="card-title ">Agregar usuario</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="{{ route('usuarios.store') }}" id="user_form">
						@csrf
						<h5 class="mb-4 mt-1 text-info font500"><b>Información general</b></h5>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" required>
									<label for="last_name">Apellido paterno</label>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<input id="last_name2" type="text" class="form-control" name="last_name2" value="{{ old('last_name2') }}" autocomplete="last_name2">
									<label for="last_name2">Apellido materno</label>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="name" required>
									<label for="name">Nombre(s)</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}" autocomplete="phone">
									<label for="phone">Teléfono</label>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email" required>
									<label for="email">Correo</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input id="curp" type="text" class="form-control" name="curp" value="{{ old('curp') }}" autocomplete="curp">
									<label for="curp">CURP</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input id="password" type="password" class="form-control" name="password" autocomplete="off" required>
									<label for="password">Contraseña</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input id="password_confirm" type="password" class="form-control" name="password_confirm" autocomplete="off" required>
									<label for="password_confirm">Confirma la contraseña</label>
								</div>
							</div>
						</div>
						<h5 class="mb-4 mt-1 text-info font500"><b>Contacto</b></h5>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" autocomplete="address">
									<label for="address">Dirección</label>
								</div>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" autocomplete="city">
									<label for="city">Ciudad</label>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}" autocomplete="state">
									<label for="state">Estado</label>
								</div>
							</div>
						</div>

						<h5 class="mb-2 mt-1 text-info font500"><b>Detalles de cuenta</b></h5>
						<div class="row mb-3">
							<div class="col-md-6">
								<div class="form-group">
									<select class="form-control selectpicker" name="level" required>
										<option selected disabled>NIVEL</option>
										<option data-divider="true"></option>
										@foreach( $usuarios->first()->levels() as $number => $name)
										<option value="{{ $number }}">{{ $name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<select class="form-control selectpicker" name="team_leader" data-live-search="true">
										<option selected disabled>LIDER DE EQUIPO</option>
										<option data-divider="true"></option>
										@foreach( $usuarios as $usuario )
										<option value="{{ $usuario->id }}">{{ $usuario->full_name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-2">
								<a type="button" class="btn btn-info" href="{{ route('usuarios.index') }}"><i class="material-icons">arrow_back</i> Atrás</a>
							</div>
							<div class="col-md-2">
								<button id="btn_submit" type="submit" class="btn btn-info"><i class="material-icons">save</i> Guardar</button>
							</div>
						</div>
					</form>

				</div>

			</div>
		</div>
	</div>

</div>
@endsection

@section('scripts')
<script src="{{ asset('js/plugins/bootstrap-notify.js')}}"></script>
<script src="{{ asset('js/plugins/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('js/plugins/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$.extend(jQuery.validator.messages, {
		    required: "Este campo es requerido.",
		    email: "Ingrese una direccion de email valida"
		});
		$('#user_form').validate({
			rules: {
				name: {
					required: true,
				},
				last_name: {
					required: true,
				},
				password: {
					required: true,
				},
				password_confirm: {
					equalTo: "#password"
				},
				email: {
					remote: {
						url: "{{ url('verify-email') }}",
						type: "get",
						data: {
							email: function(){
								return $("#email").val();
							}
						}
					}
				},
			},
			messages: {
				password_confirm: {
					equalTo: "La contraseña no coincide."
				},
				email:{
					remote: 'Este email ya existe'
				}
			},
			errorElement: "small",
			errorClass: "text-danger",
			submitHandler: function(form) {
				$("button[type=submit]").attr('disabled', true);
				$("button[type=submit]").html('Validando...');
				
				$.ajax({
					url:  $(form).attr('action'),
					type:  'post',
					data: $(form).serialize(),
					dataType: "json",
					success: function(res){
						$.notify({
							message: res.message
						},{
							type: 'success',
							delay: 3000
						});

						$("#btn_submit").attr('disabled', false);
						$("#btn_submit").html('Guardar');
						$(form)[0].reset();
						
					},
					error:  function(xhr,err){ 
						$.notify({
							title: 'Error: ',
							message: err
						},{
							type: 'error',
							delay: 0
						});
					}
				});
			}
		});
	});
</script>
@endsection