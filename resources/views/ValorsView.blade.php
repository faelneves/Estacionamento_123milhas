@extends('default')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm">
			<form action="{{ route('createValor') }}" method="post">
				@csrf
				
				<label class="alert alert-dark" >Modelo: </label>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="modelo" value="carro">
				  <label class="form-check-label">Carro</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="modelo" value="carro">
				  <label class="form-check-label">Moto</label>
				</div>
				
				<br>
				<label class="alert alert-dark">Valor fração(15 minutos) R$</label>
				<input type="number" name="vrFracao">
				<br>

				<label class="alert alert-dark">Valor diário R$</label>
				<input type="number" name="vrDia">
				<br>
				<a type="button" class="btn btn-secondary  btn-lg" href="{{  route('listagem-marcacao')  }}" >Voltar</a>
				<input type="submit" class="btn btn-primary btn-lg" value="Cadastrar Valor">
			</form>
		</div>
		<div class="col-sm">
			<table class="table table-hover table-dark">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Modelo</th>
				      <th scope="col">Vr Fração(15 minutos)</th>
				      <th scope="col">Vr Diaria</th>
				      <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				    @foreach ($valores as $valor)
				    	<tr>
					      <th scope="row">{{ $valor['id'] }}</th>
					      <th>{{ $valor['modelo'] }}</th>
					      <th>{{ $valor['vrFracao'] }}</th>
					      <th>{{ $valor['vrDia'] }}</th>
					      <th><a type="button" class="btn btn-primary  btn-sm" name="id_marcacao" href="{{  route('deleteValor', ['id' => $valor['id']])  }}" >Excluir</a></th>
					    </tr>
					@endforeach
		</div>
	</div>
</div>
@stop