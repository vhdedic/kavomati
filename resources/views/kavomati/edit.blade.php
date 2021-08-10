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
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Uređivanje <b>{{ $kavomat->naziv }}</b> kavomata</h3>
				</div>
				<div class="panel-body">
					<form action="{{ route('kavomati.update', $kavomat->id)}}" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="naziv">Naziv kavomata</label>
							<input type="text" class="form-control" id="naziv" name="naziv" placeholder="Upišite naziv kavomata">
						</div>
						<div class="form-group">
							<select name="adresa" class="form-control">
								<option value="null">Odaberite adresu</option>
								@foreach($lokacije as $lokacija)
								<option value="{{$lokacija->id}}" 
								<?php echo ($lokacija->id == $kavomat->lokacija_id) ? 'selected' : '' ?>>
									{{ $lokacija->grad . ', ' . $lokacija->adresa }}
								</option>
								@endforeach
							</select>
						</div>
						{{ method_field('PUT') }} 
						<button type="submit" class="btn btn-default">Uredi</button>
						<a href="{{ route('kavomati.index' )}}" class="btn btn-danger" role="button">Odustani</a>
					</form>
				</div>
			</div>
		</div>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
