<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Add-Vet</title>
</head>
<body>
@if(\Illuminate\Support\Facades\Session::has("vet_created"))
    <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get("vet_created")}}</div>
@endif
<form action="{{route('vet.create')}}" method="post">
    @csrf
    <label for="name">Vet name</label>
    <input type="text" name="name" id="name"><br>
    <label for="surname">Vet surname</label>
    <input type="text" name="surname" id="surname"><br>
    <label for="organization">Vet organization</label>
    <input type="text" name="organization" id="organization"><br>
    <label for="address">Address</label>
    <input type="text" name="address" id="address"><br>
    <label for="phone">Phone number</label>
    <input type="text" name="phone" id="phone"><br>
    <label for="other_contact">Other Contact</label>
    <input type="text" name="other_contact" id="other_contact"><br>
    <label for="relative_distance">Time it takes to get to the address:</label>
    <input type="time" name="relative_distance" id="relative_distance">
    <button type="submit">Add Vet</button>
</form>

<a href="{{route('vets')}}">go back</a>
</body>
</html>
