@extends('default')

@section('content')



<div class="container">

	<form action="{{ route('checkIn') }}" method="post">
		@csrf
		<div class="row">
			<div class="col-sm">
				<input class="form-control" type="text" placeholder="placa" name="placa">
			</div>
			<div class="col-sm">
				<select class="custom-select" name="idProprietario">
				    <option selected disabled>Proprietário</option>
				  	@foreach ($data['proprietarios'] as $proprietario)
					    <option value="{{ $proprietario['id'] }}">{{ $proprietario['nome'] }}</option>
				    @endforeach
				</select>
			</div>
			<div class="col-sm">
				<select class="custom-select" name="idValor">
					<option selected disabled>Tipo</option>
				  	@foreach ($data['valores'] as $valor)
					    <option value="{{ $valor['id'] }}">{{ $valor['id']." - ".$valor['modelo'] }}</option>
				    @endforeach
				</select>
			</div>
			<div class="col-sm">
		    	<input type="submit" class="btn btn-secondary btn-lg" value="Registrar Entrada">
		    </div>
		</div>
	</form>
	<br>
	<div class="row">
		<div class="col-sm"></div>
		<div class="col-sm">
			<a type="button" class="btn btn-primary  btn-lg" href="{{  route('showProprietarios')  }}" >Cadastrar Proprietario</a>
		</div>
		<div class="col-sm">
			<a type="button" class="btn btn-primary  btn-lg" href="{{  route('showValors')  }}" >Cadastrar Tipo</a>
		</div>
		<div class="col-sm"></div>
	</div>
	<br>
	<div class="row">
		<div class="col-12">
			<table class="table table-hover table-dark">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Placa</th>
			      <th scope="col">Proprietário</th>
			      <th scope="col">Tipo</th>
			      <th scope="col">Hr. Entrada</th>
			      <th scope="col">Hr. Saida</th>
			      <th scope="col">Valor</th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			    @foreach ($data['marcacoes'] as $marcacao)
			    	<tr>
				      <th scope="row">{{ $marcacao['id'] }}</th>
				      <th>{{ $marcacao['placa'] }}</th>
				      <th>{{ $marcacao['nome'] }}</th>
				      <th>{{ $marcacao['modelo'] }}</th>
				      <th>{{ $marcacao['entrada'] }}</th>
				      <th>{{ $marcacao['saida'] }}</th>
				      <th>{{ $marcacao['vrTotal'] }}</th>
				      <th><a type="button" class="btn btn-primary  btn-sm" name="id_marcacao" href="{{  route('checkOut', ['id' => $marcacao['id']])  }}" >Registrar Saída</a></th>
				    </tr>
				@endforeach
			    
			    
			  </tbody>
			</table>
		</div>
	</div>
</div>


@stop