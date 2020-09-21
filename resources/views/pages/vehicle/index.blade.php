@extends('layouts.main')

@section('title')
    {{ config('app.name', 'Laravel') }} | Manage Vehicles
@endsection

@section('content')
    
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Vehicles</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Manage vehicles</a></li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            @include('partials.messages')

            <div class="container-fluid">
               
                <div class="row">
                
                    <section class="col-lg-12 connectedSortable">
                        <div class="card card-default container">
                            <div class="card-header">
                                <a href="{{route('vehicle.form')}}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    Add new vehicle
                                </a>
                            </div>

                            <div class="card-body">
                                <table id="datatable" class="table table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>Number plate</th>
                                            <th>Make</th>
                                            <th>Model</th>
                                            <th>Color</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($vehicles as $vehicle)
                                            <tr>
                                                <td>{{$vehicle->number_plate}}</td>
                                                <td>{{$vehicle->make}}</td>
                                                <td>{{$vehicle->model}}</td>
                                                <td>{{$vehicle->color}}</td>
                                                <td>
                                                    
                                                    <form action="{{route('vehicle.delete', $vehicle->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a href="{{route('vehicle.edit', $vehicle->id)}}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button type="submit" onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash" style="color: red"></i>
                                                        </button>
                                                    </form>
                                                    
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            

                    </section>
                
                </div>
                
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection