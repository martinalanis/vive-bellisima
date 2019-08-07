@extends('layouts.app')
@section('styles')
<style type="text/css">
	.page-item.active .page-link {
		background-color: #00bcd4;
		border-color: #00bcd4;
		border-radius: 0.2rem;
	}
	.pagination { margin: 0 auto 15px;  }
</style>
@endsection
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
									Folio
								</th>
								<th>
									Nombre
								</th>
								<th>
									Nivel
								</th>
								<th>
									Alta
								</th>
								<th>
									Ciudad
								</th>
								<th>
									Estado
								</th>
								<th>
									Acciones
								</th>
							</thead>
							<tbody>
								@foreach( $usuarios as $usuario )
								<tr>
									<td>
										{{ $usuario->id }}
									</td>
									<td>
										{{ $usuario->full_name }}
									</td>
									<td>
										{{ $usuario->level }}
									</td>
									<td>
										{{ $usuario->created_at->format('d/m/Y') }}
									</td>
									<td>
										{{ $usuario->city }}
									</td>
									<td>
										{{ $usuario->state }}
									</td>
									<td>
										<a class="btn btn-info btn-sm" href="{{ route('usuarios.show', $usuario) }}"><i class="material-icons">remove_red_eye</i>
										</a>
										<a class="btn btn-info btn-sm" href="{{ route('usuarios.edit', $usuario) }}"><i class="material-icons">edit</i>
										</a>
										<a class="btn btn-danger btn-sm" href="{{ route('usuarios.destroy', $usuario) }}"><i class="material-icons">clear</i>
										</a>
									</td>
								</tr>

								@endforeach
							</tbody>
						</table>

					</div>

					<div class="row">
						{{ $usuarios->links() }}
					</div>
					<div class="row">
						<div class="col-md-2">
							<button class="btn btn-info" onclick="javascript:history.back();"><i class="material-icons">arrow_back</i> Atrás
							</button>
						</div>
						<div class="col-md-2">
							<a href="{{ route('usuarios.create') }}"><button class="btn btn-info"><i class="material-icons">add</i> Agregar usuario
							</button></a>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection