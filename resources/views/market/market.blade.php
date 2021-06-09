<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Market') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    resources/views/market.blade.php<br>

                    <a href="{{route("add.buyer")}}" class="btn btn-dark">Add new buyer</a>
                    <div class="card-body">
                        @if(Session::has("buyer_deleted"))
                            <div class="alert alert-success">{{Session::get("buyer_deleted")}}</div>
                        @endif
                        <table class="table table-fixed">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Buys</th>
                                <th>Profit Index</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($buyers as $buyer)
                                <tr>
                                    <td>{{$buyer->id}}</td>
                                    <td>{{$buyer->name}}</td>
                                    <td>{{$buyer->surname}}</td>
                                    <td>{{$buyer->address}}</td>
                                    <td>{{$buyer->phone}}</td>
                                    <td>{{$buyer->buys}}</td>
                                    <td>{{$buyer->profit_index}}</td>
                                    <td>
                                        <a href="/market/buyer/{{$buyer->id}}" class="btn btn-info">Details</a>
                                        <a href="/market/edit-buyer/{{$buyer->id}}" class="btn btn-primary">Edit</a>
                                        <a href="/market/delete-buyer/{{$buyer->id}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $buyers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"></script>

</x-app-layout>
