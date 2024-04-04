@extends('layouts.master') @section('body')

<div class="main-wrapper">
    <!-- Sidebar -->
    @include('partials.sidebar-user')
    <!-- End of Sidebar -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">Selamat Datang {{ Auth::user()->username }}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12 grid-margin stretch-card">
                    <div class="card overflow-hidden">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h3 class="card-title mb-3 text-dark fs-5 p-2">Edit Profil</h3>
                                </div>   
                                <form action="/user/actionEditProfil" method="get">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama_user" class="col-form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama_user" value={{ Auth::user()->nama }}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="col-form-label">Username</label>
                                        <input type="text" class="form-control" name="username" value={{ Auth::user()->username }}>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Profil</button>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
