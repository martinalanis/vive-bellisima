@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-info">
					<h4 class="card-title ">Usuarios</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<thead class=" text-primary">
								<th>
									Nombre
								</th>
								<th>
									{{ $usuario->full_name }}
								</th>
							</thead>
							<tbody>
								<tr>
									<td>
										Folio
									</td>
									<td>
										{{ $usuario->id }}
									</td>
								</tr>
								<tr>
									<td>
										Ciudad
									</td>
									<td>
										{{ ucwords($usuario->city) }}
									</td>
								</tr>
								<tr>
									<td>
										Estado
									</td>
									<td>
										{{ ucwords($usuario->state) }}
									</td>
								</tr>
								<tr>
									<td>
										Domicilio
									</td>
									<td>
										{{ ucwords($usuario->address) }}
									</td>
								<tr>
									<td>
										CURP
									</td>
									<td>
										{{ $usuario->curp }}
									</td>

								</tr>
								<tr>
									<td>
										Nivel
									</td>
									<td>
										{{ $usuario->getLevelNameAttribute() }}
									</td>
								</tr>
								<tr>
									<td>
										Foto
									</td>
									<td>
										<img src="{{asset('img/user.jpg')}}" alt=""/>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col s12">
							<a href="javascript:history.back();"><button class="btn  btn-info"><i class="material-icons">arrow_back</i> Atrás
							</button></a>
							<a href="{{ route('usuarios.edit', $usuario) }}"><button class="btn  btn-warning"><i class="material-icons">create</i> Editar
							</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection