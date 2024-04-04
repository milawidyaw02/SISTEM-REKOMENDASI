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
                        <td><a class="btn btn-primary" href="edit/{{ $dt->id }}" data-bs-toggle="modal" data-bs-target="#ratingModal-{{ $dt->id }}">Rating Tenda</a></td>
                                                  {{-- MODAL Rating --}}
                        <div class="modal fade" id="ratingModal-{{ $dt->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Tenda</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form action="/user/ratingTenda" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <input type="text" class="form-control" name="tendaId" value={{ $dt->id }} hidden="true">
                                  <div class="mb-3">
                                    <label for="namaTenda" class="col-form-label">Nama Tenda</label>
                                    <input type="text" class="form-control" name="namaTenda" value={{ $dt->nama_tenda }} @disabled(true)>
                                  </div>
                                  <div class="mb-3">
                                    <label for="deskripsi" class="col-form-label">Deskripsi</label>
                                    <p>{{ $dt->deskripsi }}</p>
                                  </div>
                                  <div class="mb-3">
                                    <label for="rating">Rating Tenda</label>
                                    <div class="rating">
                                      <select id="starRating" name="starRating">
                                        <option value="5">★★★★★</option>
                                        <option value="4">★★★★☆</option>
                                        <option value="3">★★★☆☆</option>
                                        <option value="2">★★☆☆☆</option>
                                        <option value="1">★☆☆☆☆</option>
                                      </select>
                                    </div>
                                  </div>                     
                                  <button type="submit" class="btn btn-primary">Beri Rating</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
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