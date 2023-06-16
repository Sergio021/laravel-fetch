@extends('template.template')

@section('contenido')

<div class="container">
	<h1>Bienvenido {{session('sesionUsuario')}} </h1>

	<div class="d-flex justify-content-between">
		<h2>Usuarios en lista</h2>
		<button class="btn btn-outline-info" type="button" data-bs-toggle="modal" data-bs-target="#agregarnuevo">Agregar nuevo</button>
	</div>
	<hr>
	<div class="table-responsive table-responsive-md">
    	<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Apellido Paterno</th>
					<th scope="col">Apellido Materno</th>
					<th scope="col">Nombre</th>
					<th scope="col">Teléfono</th>
					<th scope="col">Fecha de nacimiento</th>
					<th scope="col">Sexo</th>
					<th scope="col">Perfil</th>
					<th scope="col">Correo</th>
					<th scope="col">Modificar</th>
					<th scope="col">Eliminar</th>
				</tr>
			</thead>
			<tbody id="contenido">
				<tr>
					<td>#</td>
					<td>Otto</td>
					<td>@mdo</td>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
					<td>Mark</td>
					<td>Otto</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>



<!-- Modal agregar-->
<div class="modal fade" id="agregarnuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="agregar">
				{{csrf_field()}}
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Registrar nuevo</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label>Nombre</label>
						<input type="text" name="nombre" id="nombre" placeholder="Ingrese su respuesta" class="form-control input-sm">
					</div>
					<div class="mb-3">
						<label>Apellido paterno </label>
						<input type="text" name="app" id="app" placeholder="Ingrese su respuesta" class="form-control input-sm">
					</div>
					<div class="mb-3">
						<label>Apellido materno</label>
						<input type="text" name="apm" id="apm" placeholder="Ingrese su respuesta" class="form-control input-sm">
					</div>
					<div class="mb-3">
						<label>Telefono</label>
						<input type="text" name="telefono" id="tel" placeholder="Ingrese su respuesta" class="form-control input-sm" maxlength="13" minlength="10">
					</div>
					<div class="mb-3">
						<label>Fecha de nacimiento</label>
						<input type="date" name="fecha_nac" id="fecnac" class="form-control input-sm" max="2010-12-31" min="1950-01-01">
					</div>
					<div class="mb-3">
						<label>Genero</label>
						<br>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="genero" id="inlineRadio1" value="Masculino">
							<label class="form-check-label" for="inlineRadio1">Masculino</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="genero" id="inlineRadio2" value="Femenino">
							<label class="form-check-label" for="inlineRadio2">Femenino</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="genero" id="inlineRadio3" value="Otro">
							<label class="form-check-label" for="inlineRadio3">Otro</label>
						</div>
					</div>
					<div class="my-3">
						<label>Perfil</label>
						<select class="form-control input-sm" id="perfil" name="perfil">
							<option value="Usuario" selected>Usuario</option>
							<option value="Gerente">Gerente</option>
							<option value="Admin">Administrador</option>
						</select>
					</div>
					<div class="mb-3">
						<label>Correo electrónico</label>
						<input type="email" name="mail" id="mail" placeholder="Ingrese su respuesta" class="form-control input-sm" required>
					</div>
					<div class="mb-3">
						<label>Crea tu contraseña</label>
						<input type="password" name="pass" id="pass" placeholder="Asigna tu contraseña" class="form-control input-sm" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar cambios</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal Modificar-->
<div class="modal fade" id="modalModificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="modificar">
				{{csrf_field()}}
				<div class="modal-header">
					<h1 class="modal-title fs-5">Modificar registro</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="mod_idUsuario" id="mod_idUsuario">
					<div class="mb-3">
						<label>Nombre</label>
						<input type="text" name="mod_nombre" id="mod_nombre" placeholder="Ingrese su respuesta" class="form-control input-sm">
					</div>
					<div class="mb-3">
						<label>Apellido paterno </label>
						<input type="text" name="mod_app" id="mod_app" placeholder="Ingrese su respuesta" class="form-control input-sm">
					</div>
					<div class="mb-3">
						<label>Apellido materno</label>
						<input type="text" name="mod_apm" id="mod_apm" placeholder="Ingrese su respuesta" class="form-control input-sm">
					</div>
					<div class="mb-3">
						<label>Telefono</label>
						<input type="text" name="mod_telefono" id="mod_tel" placeholder="Ingrese su respuesta" class="form-control input-sm" maxlength="13" minlength="10">
					</div>
					<div class="mb-3">
						<label>Fecha de nacimiento</label>
						<input type="date" name="mod_fecha_nac" id="mod_fecnac" class="form-control input-sm" max="2010-12-31" min="1950-01-01">
					</div>
					<div class="mb-3">
						<label>Genero</label>
						<br>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="mod_genero" id="mod_inlineRadio1" value="M">
							<label class="form-check-label" for="mod_inlineRadio1">Masculino</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="mod_genero" id="mod_inlineRadio2" value="F">
							<label class="form-check-label" for="mod_inlineRadio2">Femenino</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="mod_genero" id="mod_inlineRadio3" value="Otro">
							<label class="form-check-label" for="mod_inlineRadio3">Otro</label>
						</div>
					</div>
					<div class="my-3">
						<label>Perfil</label>
						<select class="form-control input-sm" id="mod_perfil" name="mod_perfil">
							<option value="Usuario" selected>Usuario</option>
							<option value="Gerente">Gerente</option>
							<option value="Admin">Administrador</option>
						</select>
					</div>
					<div class="mb-3">
						<label>Correo electrónico</label>
						<input type="email" name="mod_mail" id="mod_mail" placeholder="Ingrese su respuesta" class="form-control input-sm" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar cambios</button>
				</div>
			</form>
		</div>
	</div>
</div>

@stop

@section('assets')

<script type="text/javascript">
	listar();
	const modalAgregar = new bootstrap.Modal('#agregarnuevo', {
	    keyboard: false
	});
	const modalModificar = new bootstrap.Modal('#modalModificar', {
	    keyboard: false
	});

	
	function listar(){
		fetch('{{ route("listar") }}',{
            contentType: false,
			processData: false,
			dataType: 'json',

        })
        .then(res => res.json())
        .then(data => {
        	//console.log(data);
        	if (!data.error) {
        		llenar(data.users);
        	} 
        	
        })
        .catch(console.log)
	}

	var contenido = document.querySelector('#contenido');

	function llenar(datos = null){
		if (datos != null) {
			contenido.innerHTML='';
			for (let dato of datos){
				contenido.innerHTML += `
				<tr>
					<td>${dato.id_Usuario}</td>
					<td>${dato.app}</td>
					<td>${dato.apm}</td>
					<td>${dato.nombre}</td>
					<td>${dato.telefono}</td>
					<td>${dato.fecha_nac}</td>
					<td>${dato.sexo}</td>
					<td>${dato.type}</td>
					<td>${dato.correo}</td>
					<td><button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalModificar" onclick="agregarform('${dato.id_Usuario}||${dato.app}||${dato.apm}||${dato.nombre}||${dato.telefono}||${dato.fecha_nac}||${dato.sexo}||${dato.correo}||${dato.password}||${dato.type}')">Editar</button></td>
					<td><button type="button" class="btn btn-outline-danger" onclick="eliminar('${dato.id_Usuario}')">Eliminar</button></td>
					</tr>
				`;
			}
		}
	}


	var agregar = document.getElementById('agregar');
	agregar.addEventListener('submit', function(e){
		e.preventDefault();
        var datos = new FormData(agregar);
        //console.log(datos.get("genero"));

        fetch("{{ route('agregar') }}",{
            method: 'POST',
            body: datos,
            contentType: false,
			processData: false,
			dataType: 'json',
        })
        .then(res => res.json())
        .then(data => {
            //console.log(data);
            if (!data.error) {
            	Swal.fire(
				  '¡Hecho!',
				  data.mensaje,
				  'success'
				);
				modalAgregar.hide();
				listar();
            }
            else{
            	Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: data.mensaje,
				})
            }
            
        })
        .catch(console.log)
        
	})


	function agregarform(datos){
		//console.log(datos);
		d=datos.split('||');
		document.getElementById('mod_idUsuario').value=d[0];
		document.getElementById('mod_app').value=d[1];
		document.getElementById('mod_apm').value=d[2];
		document.getElementById('mod_nombre').value=d[3];
		document.getElementById('mod_tel').value=d[4];
		document.getElementById('mod_fecnac').value=d[5];
		document.getElementById('mod_mail').value=d[7];
		document.getElementById('mod_perfil').value=d[9];
		//setRadio('mod_genero',d[6]);
	
	    document.querySelectorAll(`input[name="mod_genero"]`).forEach(element => {
	        if(element.value === d[6]) {
	            element.checked = true;
	        }
	    });
	}


	var modificar = document.getElementById('modificar');
	modificar.addEventListener('submit', function(e){
		e.preventDefault();
        var datos = new FormData(modificar);
        console.log(datos.get("mod_genero"));

        fetch("{{route('modificar')}}",{
            method: 'POST',
            body: datos,
            contentType: false,
			processData: false,
			dataType: 'json',
        })
        .then(res => res.json())
        .then(data => {
            //console.log(data);
            if (!data.error) {
            	Swal.fire(
				  '¡Hecho!',
				  data.mensaje,
				  'success'
				);
				modificar.reset();
				modalModificar.hide();
				listar();
            }
            else{
            	Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: data.mensaje,
				})
            }            
        })
        .catch(console.log)
	})


	function eliminar(id){
		let csrf = '{{ csrf_token() }}';
		let datos={
			'identificador':id,
		}
		//console.log(datos);

		Swal.fire({
			title: '¿Estás seguro?',
			text: "No podrás revertir este cambio",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si! Eliminarlo',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.isConfirmed) {
				fetch("{{ route('eliminar') }}",{
					headers:{
				        'Content-Type': 'application/json',
				        'X-CSRF-TOKEN': csrf,
				    },
		            method: 'DELETE',
		            body: JSON.stringify(datos),
		            contentType: false,
					processData: false,
					dataType: 'json',
		        })
		        .then(res => res.json())
		        .then(data => {
		        	//console.log(data);
		        	Swal.fire(
						'Eliminado',
						data.mensaje,
						'success'
					)
					listar();
		        })
		        .catch(console.log)
			}
		})
	}

</script>

@stop