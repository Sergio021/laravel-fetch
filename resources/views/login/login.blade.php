@extends('template.template')

@section('contenido')

<div class="bg-dark">
	<section>
		<div class="row g-0">
			<div class="col-lg-7 d-none d-lg-block">
				<div id="carouselExample" class="carousel slide">
					<div class="carousel-inner">
						<div class="carousel-item img-1 min-vh-100 active">
							<div class="carousel-caption d-none d-md-block">
								<h5 class="font-weight-bold">La más potente del mercado</h5>
								<a href="" class="text-decoration-none text-muted">Visita nuestra tienda</a>
							</div>
						</div>
						<div class="carousel-item img-2 min-vh-100">
							
							<div class="carousel-caption d-none d-md-block">
								<h5 class="font-weight-bold">La más potente del mercado</h5>
								<a href="" class="text-decoration-none text-muted">Visita nuestra tienda</a>
							</div>
						</div>
						<div class="carousel-item img-3 min-vh-100">
							
							<div class="carousel-caption d-none d-md-block">
								<h5 class="font-weight-bold">La más potente del mercado</h5>
								<a href="" class="text-decoration-none text-muted">Visita nuestra tienda</a>
							</div>
						</div>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>
			</div>
			<div class="col-lg-5 d-flex flex-column align-items-end min-vh-100">
				<div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 mb-auto">
					<img src="{{ asset('images/logo.png')}}" width="40">
				</div>
				<div class="px-lg-5 pt-lg-4 p-4 w-100 aling-self-center">
					<h1 class="font-weight-bold mb-4">Bienvenido de vuelta</h1>
					<form id="formulario" class="mb-5">
						{{csrf_field()}}
						<div class="mb-4">
							<label for="email" class="form-label font-weight-bold">Email</label>

							<input type="text" class="form-control bg-dark-x border-0" name="email" aria-describedby="emailHelp" placeholder="Ingresa tu correo">
							
						</div>
						<div class="mb-4">
							<label for="password" class="form-label font-weight-bold">Contraseña</label>

							<input type="password" class="form-control bg-dark-x border-0 mb-2" name="password" placeholder="Ingresa tu contraseña">

						</div>
						<button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
					</form>
					<div id="error" class="my-3"></div>

					@if(Session::has('mensaje'))
						<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
							<strong>Error! </strong>{{Session::get('mensaje')}}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif

					<p class="font-weight-bold text-center text-muted">O inicia sesión con</p>
					<div class="d-flex justify-content-around">
						<button class="btn btn-outline-light flex-grow-1 me-2"><i class="fa-brands fa-google lead me-2"></i> Google</button>
						<button class="btn btn-outline-light flex-grow-1 ms-2"><i class="fa-brands fa-facebook-f lead me-2"></i> Facebook</button>
					</div>
				</div>
				<div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 w-100 mt-auto">
					<p class="d-inline-block mb-0">¿Aún no tienes una cuenta?</p> <a href="#" class="text-light font-weight-bold text-decoration-none">Crea una ahora</a>
				</div>
			</div>
			
		</div>
	</section>
</div>
@endsection

@section('assets')

<style type="text/css">
	:root{
		--dark: #16191c;
		--dark-x: #1e2126;
		--white: #ffffff;
	}

	body{
		font-family: 'League Spartan', sans-serif;
		font-weight: 300;
		color: var(--white);
	}

	.bg-dark{
		background-color: var(--dark) !important;
	}

	.bg-dark-x{
		background-color: var(--dark-x);
	}
	.form-control, .btn{
		min-height: 3.25rem;
		line-height: initial;
	}

	.img-1{
		background-image: url('{{ asset("images/bg.jpg")}}');
		background-size: cover;
		background-position: center;
	}

	.img-2{
		background-image: url('{{ asset("images/bg2.jpg")}}');
		background-size: cover;
		background-position: center;
	}

	.img-3{
		background-image: url('{{ asset("images/bg3.jpg")}}');
		background-size: cover;
		background-position: center;
	}
	.alert-danger {
		--bs-alert-color: #ffadb4;
		--bs-alert-bg: #ff293c59;
		--bs-alert-border-color: #671e27;
	}
</style>

<script type="text/javascript">

	var formulario = document.getElementById('formulario');
	var respuesta = document.getElementById('error');

	formulario.addEventListener('submit', function (e) {
       	e.preventDefault();
        var datos = new FormData(formulario);
        //console.log(datos.get("password"));
        //console.log(datos.get("email"));
        

        fetch('{{ route("autenticar") }}',{
            method: 'POST',
            body: datos,
			dataType: 'json',
        })
        .then(res => res.json())
        .then(data => {
            //console.log(data);
            if (!data.error) {
            	window.location.href = "{{ route('usuarios') }}";
            }
            else{
            	respuesta.innerHTML = `
				<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
				  <strong>¡Ha ocurrido un error!</strong><br>
                  ${data.mensaje}
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
                `;
            }
            
        })
        .catch(console.log)
        
    })
    
</script>

@endsection