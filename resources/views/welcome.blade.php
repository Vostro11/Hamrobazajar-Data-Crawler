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
     <center><a href="{{url('/god2')}}" type="button" class="btn btn-block btn-outline-primary">Add Latest Featured Product Into DB</a></center>
</div>
</body>
</html>
