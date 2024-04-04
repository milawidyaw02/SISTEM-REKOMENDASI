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
                  <h3 class="card-title mb-3 text-dark fs-5 p-2">Spesifikasi Tenda Pesta</h3>
                </div>   
                <form action="/user/content-based" method="get">
                  @csrf
                  <div class="mb-3">
                    <label for="namaTenda" class="col-form-label">Kebutuhan Tenda</label>
                    <input type="text" class="form-control" name="key_kebutuhan">
                  </div>
                  <div class="mb-3">
                    <label for="kebutuhan" class="col-form-label">Harga Tenda</label>
                    <input type="text" class="form-control" name="key_harga">
                  </div>
                  <label for="Kebutuhan Tambahan" class="col-form-label">Spesifikasi Tambahan</label>
                  <div name="kebutuhan_tambahan" id="kebutuhan_tambahan">
                    <div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" name="spesifikasi_radio" id="radio1" value="ukuran">
                      <label class="form-check-label" for="radio1">Ukuran</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" name="spesifikasi_radio" id="radio2" value="kapasitas">
                      <label class="form-check-label" for="radio2">Kapasitas</label>
                    </div>
                    <div id="ukuran" style="display:none">
                      <input type="text" class="form-control" name="key_ukuran" placeholder="Ukuran (2x6,3x6)">
                    </div>
                    <div id="kapasitas" style="display:none">
                      <input type="text" class="form-control" name="key_kapasitas" placeholder="Kapasitas">
                    </div>        
                    <button type="submit" class="btn btn-success">Cari Rekomendasi</button>
                  </div>
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
