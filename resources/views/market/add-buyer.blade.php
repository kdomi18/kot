<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Add-Buyer</title>
</head>
<body>
@if(\Illuminate\Support\Facades\Session::has("buyer_created"))
    <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get("buyer_created")}}</div>
@endif
<form action="{{route('buyer.create')}}" method="post">
    @csrf
    <label for="name">Buyer name</label>
    <input type="text" name="name" id="name"><br>
    <label for="surname">Buyer surname</label>
    <input type="text" name="surname" id="surname"><br>
    <label for="organization">Buyer organization</label>
    <input type="text" name="organization" id="organization"><br>
    <label for="address">Address</label>
    <input type="text" name="address" id="address"><br>
    <label for="phone">Phone number</label>
    <input type="text" name="phone" id="phone"><br>
    <label for="other_contact">Other Contact</label>
    <input type="text" name="other_contact" id="other_contact"><br>
    <label for="buys">Buys</label>
    <input type="text" name="buys" id="buys"><br>
    <div class="form-group">
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
    <input type="time" name="relative_distance" id="relative_distance">
    <button type="submit">Add Buyer</button>
</form>

<a href="{{route('market')}}">go back</a>
</body>
</html>
