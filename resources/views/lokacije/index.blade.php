<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
		<div class="container">
			@if(session()->has('flash_message'))
				<div class="alert alert-success alert-dismissible">
					{{ session()->get('flash_message') }}
				</div>
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{ route('lokacije.create') }}" class="btn btn-primary btn-lg" role="button">Dodaj novu lokaciju</a>
				</div>
				<div class="panel-body">
					@if ($lokacije->count() < 1)
					<div class="well">
						<h3>U bazi trenutno nema lokacije!</h3>
					</div>
					@else
					<table class="table table-hover">
						<tr>
							<th>ID</th>
							<th>Grad, adresa</th>
							<th>Akcija</th>
						</tr>
						@foreach($lokacije as $lokacija)
						<tr>
							<td>
								{{ $lokacija->id }}
								</a>
							</td>
							<td>
								<a href="{{ route('lokacije.show', $lokacija->id) }}">
									{{ $lokacija->grad.', '.$lokacija->adresa }}
								</a>
								</td>
							<td>
								<form action="{{ route('lokacije.destroy', $lokacija->id) }}" method="POST">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button class="btn btn-danger btn-sm">Izbriši</button>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
				@endif
				</div>
			</div>
		</div>
				

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>