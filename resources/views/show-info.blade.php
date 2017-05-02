<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 20px;">
@foreach($infos_from_db as $product)
	<div class="row" style="margin-top: 20px;">
		<div class="col-md-7">
			<table class="table">
			    <tbody>
			      <tr>
			        <td><b>Product Title</b></td>
			        <td>{{$product['product_name']}}</td>
			      </tr>
			      <tr>
			        <td><b>Prize</b></td>
			        <td>{{$product['product_prize']}}</td>
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
			        <td>{{$product['seller_name']}}</td>
			      </tr>
			      <tr>
			        <td><b>Loction</b></td>
			        <td>{{$product['location']}}</td>
			      </tr>
			      <tr>
			        <td><b>Phone</b></td>
			        <td>{{$product['seller_phone']}}</td>
			      </tr>
			      <tr>
			        <td><b>Mobile</b></td>
			        <td>{{$product['seller_mobile']}}</td>
			      </tr>

			    </tbody>
			  </table>
		</div>
		<div class="col-md-5">
			<img src="{{$product['product_image']}}">
		</div>
	</div>
@endforeach
</div>
</body>
</html>