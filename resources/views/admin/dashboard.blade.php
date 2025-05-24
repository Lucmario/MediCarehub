@extends('layouts.admin')

@section('content')
<h2>Administrator Dashboard</h2>

<div class="row mt-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body text-center">
                <h5>Users</h5>
                <p>View Details</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body text-center">
                <h5>Validate Doctor</h5>
                <p>View Details</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body text-center">
                <h5>Consultations</h5>
                <p>View Details</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-secondary">
            <div class="card-body text-center">
                <h5>Payments</h5>
                <p>View Details</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-3">
        <div class="card bg-light text-center">
            <div class="card-body">
                <h2>1,250</h2>
                <p>Total Users</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-light text-center">
            <div class="card-body">
                <h2>200</h2>
                <p>Appointments</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-light text-center">
            <div class="card-body">
                <h2>50</h2>
                <p>Doctors</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-light text-center">
            <div class="card-body">
                <h2>350</h2>
                <p>Payments</p>
            </div>
        </div>
    </div>
</div>
@endsection
