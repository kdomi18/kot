<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    resources/views/users.blade.php<br>

                    <a href="{{route("manager.users.create")}}" class="btn btn-dark">Add new User</a>
                    <div class="card-body">
                        @if(Session::has("user_deleted"))
                            <div class="alert alert-success">{{Session::get("user_deleted")}}</div>
                        @endif
                        @if(Session::has("user_updated"))
                            <div class="alert alert-success">{{Session::get("user_updated")}}</div>
                        @endif
                        <table class="table table-auto">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @foreach(['manager', 'owner', 'economist', 'employee'] as $r)
                                            @if($user->hasAnyRole($r))
                                                {{$r}}
                                            @endif
                                        @endforeach
                                    </td>
                                    @can("is-manager-or-owner")
                                        <td>
                                            <a href="{{ route("manager.users.edit", $user->id) }}"
                                               class="btn btn-primary">Edit</a>
                                            @if($user->id != auth()->user()->id)
                                                <button class="btn btn-danger"
                                                        onclick="event.preventDefault();
                                                            document.getElementById('delete-user-form-{{ $user->id }}').submit()"
                                                >
                                                    Delete
                                                </button>

                                                <form id="delete-user-form-{{ $user->id }}"
                                                      action="{{ route("manager.users.destroy", $user->id) }}"
                                                      method="post"
                                                      style="display: none">
                                                    @csrf
                                                    @method("DELETE")

                                                </form>
                                            @endif
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
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
