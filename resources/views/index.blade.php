@extends('layouts.main')

@section('title')
    {{ config('app.name', 'Laravel') }} | Dashboard
@endsection

@section('content')
    
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                <!-- ./col -->
        
                <!-- ./col -->

                <!-- ./col -->
    
                <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-default container">
                        <div class="card-body">
                            <table id="datatable" class="table table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>Client name</th>
                                        <th>Vehicle</th>
                                        <th>Device</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($vehicles as $vehicle)
                                        <tr>
                                            <td>{{$vehicle->client->full_name}}</td>
                                            <td>{{$vehicle->name}}</td>
                                            @if ($vehicle->device)
                                                <td>{{$vehicle->device->serial_number}}</td>
                                            @else
                                                <td>No device attached to this vehicle</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                        

                </section>

                <section class="col-lg-5 connectedSortable">

                </section>
                
                </div>
                
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection