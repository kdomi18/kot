<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Add-Supplier</title>
</head>
<body>
@if(\Illuminate\Support\Facades\Session::has("supplier_updated"))
    <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get("supplier_updated")}}</div>
@endif
<form action="{{route('supplier.update')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$supplier->id}}"><br>
    <label for="name">Supplier name</label>
    <input type="text" name="name" id="name" value="{{$supplier->name}}"><br>
    <label for="surname">Supplier surname</label>
    <input type="text" name="surname" id="surname" value="{{$supplier->surname}}"><br>
    <label for="organization">Supplier organization</label>
    <input type="text" name="organization" id="organization" value="{{$supplier->organization}}"><br>
    <label for="address">Address</label>
    <input type="text" name="address" id="address" value="{{$supplier->address}}"><br>
    <label for="phone">Phone number</label>
    <input type="text" name="phone" id="phone" value="{{$supplier->phone}}"><br>
    <label for="other_contact">Other Contact</label>
    <input type="text" name="other_contact" id="other_contact" value="{{$supplier->other_contact}}"><br>
    <label for="supplies">Buys</label>
    <input type="text" name="supplies" id="supplies" value="{{$supplier->supplies}}"><br>
    <div class="form-group" >
        <label for="profit_index">
            Profit Index
        </label>
        <div class="form-check">
            <input type="radio" name="profit_index"
                   id="ch1" class="form-check-input" value="1">
            <label for="profit_index" class="form-check-label">1</label>
        </div>
        <div class="form-check">
            <input type="radio" name="profit_index"
                   id="ch2" class="form-check-input" value="2">
            <label for="profit_index" class="form-check-label">2</label>
        </div>
        <div class="form-check">
            <input type="radio" name="profit_index"
                   id="ch3" class="form-check-input" value="3">
            <label for="profit_index" class="form-check-label">3</label>
        </div>
        <div class="form-check">
            <input type="radio" name="profit_index"
                   id="ch4" class="form-check-input" value="4">
            <label for="profit_index" class="form-check-label">4</label>
        </div>
        <div class="form-check">
            <input type="radio" name="profit_index"
                   id="ch5" class="form-check-input" value="5">
            <label for="profit_index" class="form-check-label">5</label>
        </div>
    </div>
    <input type="time" name="relative_distance" id="relative_distance" value="{{$supplier->relative_distance}}">
    <button type="submit">Add Supplier</button>
</form>

<a href="{{route('market')}}" class="btn btn-primary">Done</a>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>
