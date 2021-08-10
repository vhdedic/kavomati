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
					<h3 class="panel-title">Uređivanje <b>{{ ucfirst(trans($kave->naziv)) }}</b> kave</h3>
				</div>
				<div class="panel-body">
					<form action="{{ route('kave.update', $kave->id)}}" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<div class="form-group">
							<label for="cijena">Nova cijena kave</label>
							<input type="text" class="form-control" id="cijena" name="cijena" placeholder="Upišite novu cijenu kave u kunama">
						</div>
						</div>
						{{ method_field('PUT') }} 
						<button type="submit" class="btn btn-default">Uredi</button>
						<a href="{{ route('kave.index' )}}" class="btn btn-danger" role="button">Odustani</a>
					</form>
				</div>
			</div>
		</div>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
