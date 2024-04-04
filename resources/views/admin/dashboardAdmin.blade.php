@extends('layouts.master') @section('body')

<div class="main-wrapper">
    <!-- Sidebar -->
    @include('partials.sidebar-admin')
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
                                    <h3 class="card-title mb-3 text-dark fs-5 p-2">Data Tenda</h3>
                                </div>   
                                
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                      <thead>
                                        <tr>
                                          <th class="pt-0">#</th>
                                          <th class="pt-0">Nama Tenda</th>
                                          <th class="pt-0">Kapasitas</th>
                                          <th class="pt-0">Ukuran Tenda</th>
                                          <th class="pt-0">Harga Tenda</th>
                                          <th class="pt-0">Kebutuhan</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($datas as $dt)
                                            <tr>
                                                <td>{{ $dt->id }}</td>
                                                <td>{{ $dt->nama_tenda }}</td>
                                                <td>{{ $dt->kapasitas }}</td>
                                                <td>{{ $dt->ukuran }}</td>
                                                <td>{{ $dt->harga }}</td>
                                                
                                                <td>{{ $dt->kebutuhan}}</td>
                                                
                                                
                                              </tr>
                                        @endforeach
                                        
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
