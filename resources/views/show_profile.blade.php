@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Profile')}}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        @endif

                        <form action="{{route('edit_profile')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name" value="{{$user->name}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" value="{{$user->email}}" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <input type="role" value="{{$user->is_admin ? 'Admin' : 'Member'}}" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Password Confirmation</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Change Profile Details</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
