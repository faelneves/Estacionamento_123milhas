@extends('default')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm">
			<form action="{{ route('createProprietario') }}" method="post">
				@csrf
				
				<input type="text" class="form-control" placeholder="Nome" name="nome">
				<br>
				<input type="text" class="form-control" placeholder="Telefone" name="telefone">
				<br>
    			<input type="email" class="form-control" placeholder="nome@exemplo.com" name="email">
    			<br>
    			<label class="alert alert-dark" >CPF: </label>
				<input type="number" name="CPF">

				<br>
				<a type="button" class="btn btn-secondary  btn-lg" href="{{  route('listagem-marcacao')  }}" >Voltar</a>
				<input type="submit" class="btn btn-primary btn-lg" value="Cadastrar Proprietario">
			</form>
		</div>
		<div class="col-sm">
			<table class="table table-hover table-dark">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nome</th>
				      <th scope="col">Telefone</th>
				      <th scope="col">Email</th>
				      <th scope="col">CPF</th>
				      <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				    @foreach ($proprietarios as $proprietario)
				    	<tr>
					      <th scope="row">{{ $proprietario['id'] }}</th>
					      <th>{{ $proprietario['nome'] }}</th>
					      <th>{{ $proprietario['telefone'] }}</th>
					      <th>{{ $proprietario['email'] }}</th>
					      <th>{{ $proprietario['CPF'] }}</th>
					      <th><a type="button" class="btn btn-primary  btn-sm" name="id_marcacao" href="{{  route('deleteProprietario', ['id' => $proprietario['id']])  }}" >Excluir</a></th>
					    </tr>
					@endforeach
		</div>
	</div>
</div>
@stop