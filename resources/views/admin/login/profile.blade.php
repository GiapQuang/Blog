@extends('admin.layout.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Edit</small>
                </h1>
            </div>
            @if(count($errors))
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{$err}} <br>
            @endforeach
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('admin.profile.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" value="{{auth()->user()->name}}" name="name" placeholder="Please Enter Name" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" value="{{auth()->user()->email}}" type="email" placeholder="Please Enter Email" readonly/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" type="password" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>Confirmm</label>
                        <input class="form-control" name="confirm" type="password" placeholder="Please Confirm Password" />
                    </div>
            
                    <button type="submit" class="btn btn-default">Update</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection