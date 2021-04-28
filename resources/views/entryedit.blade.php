@extends ('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />


	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>

</head>
<body>
  <form method="POST" action="{{route('item_update', $itemedit)}}" enctype="multipart/form-data" id="editform">
    @csrf
    @method('PUT')
    <div class="row page-content justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 ">
                <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Username</label>

            <div class="col-md-6">
                <input id="name" type="name" class="form-control" name="name" value="{{$itemedit->name}}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone number</label>

                <div class="col-md-6">
                    <input id="phone" type="tel" class="form-control" name="phone" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"  value="{{$itemedit->phone}}" required>
                    <span> Format: xxx-xx-xxx </span>
                </div>
        </div>
            <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
    </form>


</body>
</html>
@endsection
