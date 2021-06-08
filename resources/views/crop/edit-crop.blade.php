<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Edit-Crop</title>
</head>
<body>
@if(\Illuminate\Support\Facades\Session::has("crop_updated"))
    <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get("crop_updated")}}</div>
@endif
<form action="{{route('crop.update')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$crop->id}}"><br>
    <label for="name">Crop name</label>
    <input type="text" name="name" id="name" value="{{$crop->name}}"><br>
    <label for="quantity">quantity</label>
    <input type="number" name="quantity" id="quantity" value="{{$crop->quantity}}"> kg<br>
    <label for="plant_time">Plant time</label>
    <input type="date" name="plant_time" id="plant_time" value="{{$crop->plant_time}}"><br>
    <label for="selling_price_pu">Selling Price per Unit</label>
    <input type="number" name="selling_price_pu" id="selling_price_pu" value="{{$crop->selling_price_pu}}"><br>
    <label for="buying_price_pu">Buying Price per Unit</label>
    <input type="number" name="buying_price_pu" id="buying_price_pu" value="{{$crop->buying_price_pu}}"><br>
    <label for="info">Info</label>
    <input type="text" name="info" id="info" value="{{$crop->info}}"><br>
    <button type="submit">Update Crop</button>
</form>

<a href="{{route('crop')}}">go back</a>
</body>
</html>
