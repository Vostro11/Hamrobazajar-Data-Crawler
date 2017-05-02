<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form method="post" action="{{url('/god')}}">

			    <div class="input-group">
			      <input type="text" name="url" class="form-control" placeholder="Enter URI">
			      <span class="input-group-btn">
			      {!! csrf_field() !!}
			        <button class="btn btn-secondary" type="submit">Go!</button>
			      </span>
			    </div>
			</form>
		</div>
	</div>
	<div class="row" style="margin-top: 20px;">
		<div class="col-md-7">
			<table class="table">
			    <tbody>
			      <tr>
			        <td><b>Product Title</b></td>
			        <td>{{$product['title']}}</td>
			      </tr>
			      <tr>
			        <td><b>Prize</b></td>
			        <td>{{$product['prize']}}</td>
			      </tr>
			      <tr>
			        <td><b>Negotiable</b></td>
			        <td>{{$product['negotiable']}}</td>
			      </tr>
			      <tr>
			        <td><b>Condition</b></td>
			        <td>{{$product['condition']}}</td>
			      </tr>
			      <tr>
			        <td><b>Seller Name</b></td>
			        <td>{{$seller['name']}}</td>
			      </tr>
			      <tr>
			        <td><b>Loction</b></td>
			        <td>{{$seller['location']}}</td>
			      </tr>
			      <tr>
			        <td><b>Phone</b></td>
			        <td>{{$seller['phone']}}</td>
			      </tr>
			      <tr>
			        <td><b>Mobile</b></td>
			        <td>{{$seller['mobile']}}</td>
			      </tr>

			    </tbody>
			  </table>
		</div>
		<div class="col-md-5">
			<img src="{{$product['image']}}">
		</div>
	</div>
</di>
</body>
</html>