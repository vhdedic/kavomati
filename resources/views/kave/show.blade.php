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
					
				</div>
				<div class="panel-body">
					<div class="well">
						<h3>{{ ucfirst(trans($kave->naziv)) }}</h3>
					</div>
					
					<table class="table table-hover">
						<tr>
							<th>ID</th>
							<th>Cijena</th>
							<th>Kavomati</th>
						</tr>
						<tr>
							<td>{{ $kave->id }}</td>
							<td>{{ number_format($kave->cijena, 2) }}</td>
							<td>
						
								@foreach($kavomati as $kavomat)
									{{ $kavomat->naziv }}
								@endforeach
							
								
							
							
							
							</td>
						</tr>
					</table>
					
				</div>
			</div>
		</div>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
