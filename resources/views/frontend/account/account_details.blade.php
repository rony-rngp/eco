@extends('layouts.frontend.app')

@section('title')
    Dashboard
@endsection

@push('css')

@endpush

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Dashboard</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>


    @include('frontend.account.account_sidebar')

    <div class="col-md-9">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-body box-profile">
                        <div class="img-circle text-center">
                            <img style="width: 19%" class="profile-user-img img-fluid img-circle" src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg" alt="User profile picture">
                        </div><br>
                        <h3 class="text-center">{{ $user->name }}</h3>
                        <p class="text-center">{{ $user->address }}</p><br>
                        <table class="table table-bordered" style="text-align: center">
                            <tr>
                                <td>Mobile No</td>
                                <td> : </td>
                                <td>{{ $user->mobile }}</td>
                            </tr>
                            <tr>
                                <td>E-Mail</td>
                                <td> : </td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td> : </td>
                                <td>{{ $user->status == 1 ? 'Active' : 'Inactive'}}</td>
                            </tr>
                        </table>
                        <a class="btn btn-primary btn-block btn-sm" href="{{ route('user.edit.profile') }}">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')

@endpush
