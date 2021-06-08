<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crops') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    resources/views/crop.blade.php<br>

                    <a href="{{route("add.crop")}}" class="btn btn-dark">Add new crop</a>
                    <div class="card-body">
                        @if(Session::has("crop_deleted"))
                            <div class="alert alert-success">{{Session::get("crop_deleted")}}</div>
                        @endif
                        <table class="table table-fixed">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Plant Time</th>
                                <th>Selling PPU</th>
                                <th>Buying PPU</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($crops as $crop)
                                <tr>
                                    <td>{{$crop->id}}</td>
                                    <td>{{$crop->name}}</td>
                                    <td>{{$crop->quantity}}</td>
                                    <td>{{$crop->plant_time}}</td>
                                    <td>{{$crop->selling_price_pu}}</td>
                                    <td>{{$crop->buying_price_pu}}</td>
                                    <td>
                                        <a href="/crop/crop/{{$crop->id}}" class="btn btn-info">Details</a>
                                        <a href="/crop/edit-crop/{{$crop->id}}" class="btn btn-primary">Edit</a>
                                        <a href="/crop/delete-crop/{{$crop->id}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</x-app-layout>
