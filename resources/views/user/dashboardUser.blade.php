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
                <h4 class="mb-3">
                  Rekomendasi Untuk Anda
                </h4>
                <div class="card-group">
                  @foreach($prediksi as $tendaId => $prediction)
                    <div class="card">
                      <img src={{ url('assets/images/'.$datas->find($tendaId)->path_gambar) }} alt="gambar-tenda" height="300">
                      <div class="card-body text-dark">
                        <h5 class="card-title">{{ $datas->find($tendaId)->nama_tenda }}</h5>
                        <a class="btn btn-primary" href="edit/{{ $tendaId }}" data-bs-toggle="modal" data-bs-target="#editModal-{{ $tendaId }}"> Detail</a>
                      </div>

                      <div class="modal fade" id="editModal-{{ $tendaId }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Data Tenda</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="namaTenda" class="col-form-label">Nama Tenda</label>
                                <p>{{ $datas->find($tendaId)->nama_tenda }}</p>
                              </div>
                              <div class="mb-3">
                                <label for="kapasitasTenda" class="col-form-label">Kapasitas Tenda</label>
                                <p>{{ $datas->find($tendaId)->kapasitas }}</p>
                              </div>
                              <div class="mb-3">
                                <label for="ukuranTenda" class="col-form-label">Ukuran Tenda</label>
                                <p>{{ $datas->find($tendaId)->ukuran }}</p>
                              </div>
                              <div class="mb-3">
                                <label for="hargaTenda" class="col-form-label">Harga Tenda</label>
                                <p>{{ $datas->find($tendaId)->harga }}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> 
                    </div>                  
                  @endforeach
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
