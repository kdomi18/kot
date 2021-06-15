<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Add-Vet</title>
</head>
<body>
@if(\Illuminate\Support\Facades\Session::has("vet_updated"))
    <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get("vet_updated")}}</div>
@endif
<form action="{{route('vet.update')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$vet->id}}"><br>
    <label for="name">Vet name</label>
    <input type="text" name="name" id="name" value="{{$vet->name}}"><br>
    <label for="surname">Vet surname</label>
    <input type="text" name="surname" id="surname" value="{{$vet->surname}}"><br>
    <label for="organization">Vet organization</label>
    <input type="text" name="organization" id="organization" value="{{$vet->organization}}"><br>
    <label for="address">Address</label>
    <input type="text" name="address" id="address" value="{{$vet->address}}"><br>
    <label for="phone">Phone number</label>
    <input type="text" name="phone" id="phone" value="{{$vet->phone}}"><br>
    <label for="other_contact">Other Contact</label>
    <input type="text" name="other_contact" id="other_contact" value="{{$vet->other_contact}}"><br>
    <label for="relative_distance">Time it takes to get to the address:</label>
    <input type="time" name="relative_distance" id="relative_distance" value="{{$vet->relative_distance}}">
    <button type="submit">Update Vet</button>
</form>

<a href="{{route('vets')}}" class="btn btn-primary">Done</a>

</body>
</html>
