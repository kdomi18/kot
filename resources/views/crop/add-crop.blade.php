<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Add-Crop</title>
</head>
<body>
@if(\Illuminate\Support\Facades\Session::has("crop_created"))
    <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get("crop_created")}}</div>
@endif
<form action="{{route('crop.create')}}" method="post">
    @csrf
    <label for="name">Crop name</label>
    <input type="text" name="name" id="name"><br>
    <label for="quantity">quantity</label>
    <input type="number" name="quantity" id="quantity"> kg<br>
    <label for="plant_time">Plant time</label>
    <input type="date" name="plant_time" id="plant_time"><br>
    <label for="selling_price_pu">Selling Price per Unit</label>
    <input type="number" name="selling_price_pu" id="selling_price_pu"><br>
    <label for="buying_price_pu">Buying Price per Unit</label>
    <input type="number" name="buying_price_pu" id="buying_price_pu"><br>
    <label for="info">Info</label>
    <input type="text" name="info" id="info"><br>
    <button type="submit">Add Crop</button>
</form>

<a href="{{route('crop')}}">go back</a>
</body>
</html>
