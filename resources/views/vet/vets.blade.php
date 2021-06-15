<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    resources/views/vet/vets.blade.php<br>

                    {{--vet table--}}
                    <a href="{{route("add.vet")}}" class="btn btn-dark">Add new vet</a>
                    <div class="card-body">
                        @if(Session::has("vet_deleted"))
                            <div class="alert alert-success">{{Session::get("vet_deleted")}}</div>
                        @endif
                        <table class="table table-auto">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Organization</th>
                                <th>Other Contact</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vets as $vet)
                                <tr>
                                    <td>{{$vet->id}}</td>
                                    <td>{{$vet->name}}</td>
                                    <td>{{$vet->surname}}</td>
                                    <td>{{$vet->address}}</td>
                                    <td>{{$vet->phone}}</td>
                                    <td>{{$vet->organization}}</td>
                                    <td>{{$vet->other_contact}}</td>
                                    <td>
                                        <a href="/vet/vet/{{$vet->id}}" class="btn btn-info">Details</a>
                                        <a href="/vet/edit-vet/{{$vet->id}}" class="btn btn-primary">Edit</a>
                                        <a href="/vet/delete-vet/{{$vet->id}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $vets->links() }}
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
