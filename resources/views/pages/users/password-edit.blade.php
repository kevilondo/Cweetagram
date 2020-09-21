@extends('layouts.main')

@section('title')
    {{ config('app.name', 'Laravel') }} | Edit Password
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit password</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit password</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        @include('partials.messages')

        <div class="container-fluid">
            <div class="container card card-primary card-outline">

                <form action="{{ route('users.password.update', Auth::user()->id) }}" method="POST">
                    @csrf

                    <div class="form-group col-md-8">
                        <label for="old_password">Old Passsword</label>
                        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror">

                        @if ($errors->has('old_password'))
                            <span class="text-danger">{{$errors->first('old_password')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-8">
                        <label for="password">New Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">

                        @if ($errors->has('password'))
                            <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-8">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Save
                        </button>
                    </div>                    
                </form>
                  
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection