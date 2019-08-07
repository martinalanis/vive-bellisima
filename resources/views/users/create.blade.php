@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/plugins/bootstrap-select.css') }}" rel="stylesheet"/>
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
						{{-- <div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="number" class="form-control @error('folio') is-invalid @enderror" placeholder="Folio de sistema" disabled>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<input type="date" class="form-control" placeholder="Fecha de sistema" >
								</div>
							</div>
						</div> --}}
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Apellido paterno" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" required>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Apellido materno" name="last_name2" value="{{ old('last_name2') }}" autocomplete="last_name2">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Nombres(s)" name="name" value="{{ old('name') }}" autocomplete="name" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="CURP" name="curp" value="{{ old('curp') }}" autocomplete="curp">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Ciudad" name="city" value="{{ old('city') }}" autocomplete="city">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Estado" name="state" value="{{ old('state') }}" autocomplete="state">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Dirección" name="address" value="{{ old('address') }}" autocomplete="address">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="phone" class="form-control" placeholder="Teléfono" name="phone" value="{{ old('phone') }}" autocomplete="phone">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<input id="email" type="email" class="form-control" placeholder="Correo" name="email" value="{{ old('email') }}" autocomplete="email" required>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<select class="form-control selectpicker" name="level" required>
										<option selected disabled>NIVEL</option>
										<option data-divider="true"></option>
										<option value="1">Director</option>
										<option value="2">Promotor</option>
										<option value="3">Vendedor</option>
										<option value="4">Cliente</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Contraseña" name="password" autocomplete="off" required>
								</div>
							</div>

							<div class="col-md-4">
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
								<button type="submit" class="btn btn-info"><i class="material-icons">save</i> Guardar</button>
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

						$("button[type=submit]").attr('disabled', false);
						$("button[type=submit]").html('Guardar');
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