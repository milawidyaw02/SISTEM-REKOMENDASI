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

      {{-- BUTTON BUKA MODAL --}}
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tambah Data</button>
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
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $dt)
                      <tr>
                        <td>{{ $dt->id }}</td>
                        <td>{{ $dt->nama_tenda }}</td>
                        <td>{{ $dt->kapasitas }}</td>
                        <td>{{ $dt->ukuran }}</td>
                        <td>{{ $dt->harga }}</td>
                        <td>{{ $dt->kebutuhan}}</td>
                        <td><a class="btn btn-primary" href="edit/{{ $dt->id }}" data-bs-toggle="modal" data-bs-target="#editModal-{{ $dt->id }}"><i class="feather-24" data-feather="edit"></i></a></td>
                        {{-- MODAL EDIT --}}
                        <div class="modal fade" id="editModal-{{ $dt->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Tenda</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form action="/edit/{{ $dt->id }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                    <div class="mb-3">
                                      <label for="namaTenda" class="col-form-label">Nama Tenda</label>
                                      <input type="text" class="form-control" name="namaTenda" value={{ $dt->nama_tenda }}>
                                    </div>
                                    <div class="mb-3">
                                      <label for="kpst" class="col-form-label">Kapasitas</label>
                                      <input type="text" class="form-control" name="kpst" value={{ $dt->kapasitas }}>
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label">Ukuran Tenda</label>
                                      <p>{{ $dt->ukuran }}</p>
                                    <div>
                                    <div class="form-check form-check-inline">
                                      <input type="checkbox" name="ukuran[]" class="form-check-input" id="checkInline1" value="2x6">
                                      <label class="form-check-label" for="checkInline1">2x6</label>
                                    </div>
                                    <div class="form-check form-check-inline">         
                                      <input type="checkbox" name="ukuran[]" class="form-check-input" id="checkInline2" value="3x6">
                                      <label class="form-check-label" for="checkInline2">3x6</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input type="checkbox" name="ukuran[]" class="form-check-input" id="checkInline3" value="4x6">
                                      <label class="form-check-label" for="checkInline3">4x6</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input type="checkbox" name="ukuran[]" class="form-check-input" id="checkInline3" value="6x6">
                                      <label class="form-check-label" for="checkInline3">6x6</label>
                                    </div>
                                    <div class="mb-3">
                                      <label for="kebutuhan" class="col-form-label">Harga Tenda</label>
                                      <input type="text" class="form-control" name="harga" value={{ $dt->harga }}>
                                    </div>
                                    <div class="mb-3">
                                      <label for="kebutuhan" class="col-form-label">Kebutuhan</label>
                                      <input type="text" class="form-control" name="kebutuhan" value={{ $dt->kebutuhan }}>
                                    </div>
                                    <div class="mb-3">
                                      <label for="fotoTenda" class="col-form-label">Upload Foto Tenda</label>
                                      <input type="file" name="file" class="form-control" value={{ asset('images/'.$dt->path_gambar) }}>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Data</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <td><a class="btn btn-primary" href="delete/{{ $dt->id }}" role="button"><i class="feather-24" data-feather="trash"></i></a></td>
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



{{-- MODAL TAMBAH --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tenda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('aksiTambah') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="namaTenda" class="col-form-label">Nama Tenda</label>
            <input type="text" class="form-control" name="namaTenda">
          </div>
          <div class="mb-3">
            <label for="kpst" class="col-form-label">Kapasitas</label>
            <input type="text" class="form-control" name="kpst">
          </div>
          <div class="mb-3">
            <label class="form-label">Ukuran Tenda</label>
            <div>
              <div class="form-check form-check-inline">
                <input type="checkbox" name="ukuran[]" class="form-check-input" id="checkInline1"     value="2x6">
                <label class="form-check-label" for="checkInline1">
                  2x6
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input type="checkbox" name="ukuran[]" class="form-check-input" id="checkInline2" value="3x6">
                <label class="form-check-label" for="checkInline2">
                  3x6
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input type="checkbox" name="ukuran[]" class="form-check-input" id="checkInline3" value="4x6">
                <label class="form-check-label" for="checkInline3">
                  4x6
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input type="checkbox" name="ukuran[]" class="form-check-input" id="checkInline3" value="6x6">
                <label class="form-check-label" for="checkInline3">
                  6x6
                </label>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="kebutuhan" class="col-form-label">Harga Tenda</label>
            <input type="text" class="form-control" name="harga">
          </div>
          <div class="mb-3">
            <label for="kebutuhan" class="col-form-label">Kebutuhan</label>
            <input type="text" class="form-control" name="kebutuhan">
          </div>
          <div class="mb-3">
            <label for="fotoTenda" class="col-form-label">Upload Foto Tenda</label>
            <input type="file" name="file" class="form-control">
          </div>
          
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
