@extends('layouts.master') @section('body')

<div class="main-wrapper">
    <!-- Sidebar -->
    @include('partials.sidebar-user')
    <!-- End of Sidebar -->
    <div class="page-wrapper">

        <div class="page-content">
            <div
                class="d-flex justify-content-between align-items-center flex-wrap grid-margin"
            >
                <div>
                    <h4 class="mb-3 mb-md-0">Selamat Datang {{ Auth::user()->username }}</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-12 grid-margin stretch-card">
                    <div class="card overflow-hidden">

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th class="pt-0">#</th>
                                                <th class="pt-0">Nama Tenda</th>
                                                <th class="pt-0">Gambar</th>
                                                <th class="pt-0">Prediksi Rating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $tambah = 1;
                                            @endphp
                                            @foreach($datas as $tendaId => $predHybrid)
                                                <tr>
                                                    <td>{{ $tambah++ }}</td>
                                                    <td>{{ $tendas->find($tendaId)->nama_tenda }}</td>
                                                    <td><img src={{ url('assets/images/'.$tendas->find($tendaId)->path_gambar) }} alt="gambar-tenda"></td>
                                                    <td>{{ round($predHybrid) }}</td>
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
