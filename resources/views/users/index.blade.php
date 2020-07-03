@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header"> All Users</div>
        @if($users->count() > 0)

            <table class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th> Image </th>
                        <th> username</th>
                        <th> permissions </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{--<img src="{{ asset('storage/'.$users->image)}}" alt="" width="100px" height="50px" >--}}
                                <img src="{{$user->haspicture() ? asset('storage/'.$user->getPicture()): $user->getGravatar()}}"" style="border-radius:50% " width="60px" height="60px">
                            </td>
                            <td>
                                {{ $user->name}}
                            </td>
                            <td>
                                @if(!$user->isAdmin())
                                    <form action="{{$user->haspicture() ? asset('storage/'.$user->getPicture()): $user->getGravatar()}}" method="post">
                                        @csrf
                                    <button class="btn btn-success" type="submit">make admin</button>
                                    </form>
                                @else
                                {{ $user->role}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </table>
        @else
            <div class="card-body">
                <h1 class="text-center">
                    No Users Yet.
                </h1>
            </div>
        @endif

    </div>
@endsection

