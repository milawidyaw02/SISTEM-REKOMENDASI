// npm package: sweetalert2
// github link: https://github.com/sweetalert2/sweetalert2

$(function () {
    showSwal = function (type) {
        "use strict";
        if (type === "basic") {
            swal.fire({
                titleText: "Keterangan Pengaduan",
                html: "<p class='text-start'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Rhoncus nisl velit, amet consectetur. Viverra vestibulum orci sem non lacus molestie ac. Facilisis tellus faucibus sed nibh arcu. Lorem vestibulum lorem tellus quis scelerisque facilisis urna sed lectus. Mauris donec sodales sapien pulvinar egestas diam. Malesuada feugiat amet volutpat rhoncus risus tortor purus a dolor. Amet nunc ultricies maecenas vestibulum sit nisi. Non augue tortor nunc enim neque, molestie quis quam. Vulputate consequat ac turpis quis ipsum faucibus dui. Commodo leo libero posuere tellus elementum neque aliquet nunc faucibus. Sollicitudin cursus morbi enim placerat. Amet posuere imperdiet mi neque rhoncus, morbi etiam consectetur id. Dignissim urna, pellentesque dui tellus dolor pharetra risus. Lectus malesuada ut condimentum viverra mi tristique faucibus. Tincidunt pharetra augue urna, convallis etiam sed aliquet euismod. Pretium quis scelerisque arcu cras convallis fermentum lobortis nunc, id. Pulvinar amet, ullamcorper eu odio eget sit arcu feugiat. Auctor massa vestibulum pretium, ullamcorper in. Id arcu in amet congue sit. Platea maecenas diam tristique ornare suspendisse placerat in. Vitae viverra eu lacus, elit ultrices.</p>",
                confirmButtonText: "Close",
                confirmButtonClass: "btn btn-danger",
            });
        } else if (type === "detail") {
            swal.fire({
                titleText: "Detail Perintah",
                html: `<div class="text-dark text-start d-flex justify-content-between p-3">
                          <div class="text start col-5">
                              <div class="fw-bold mb-3">Tanggal Perintah : 30 Agt 2022</div>
                              <div class="mb-4">
                                  <div class="fw-bold mb-2">Surat Perintah Audit</div>
                                  <div
                                      class="border border-1 rounded-1 border-primary text-primary d-flex justify-content-between align-items-center px-3 py-2"
                                  >
                                      <div>
                                          <span class="me-2">
                                              <i
                                                  class="icon-md"
                                                  data-feather="file"
                                              ></i> </span
                                          >Lorem Ipsum
                                      </div>
                                      <div>
                                          <button class="btn text-primary">
                                              <i class="icon-md" data-feather="download"></i>
                                          </button>
                                      </div>
                                  </div>
                              </div>
                              <div class="mb-3">
                                  <div class="fw-bold mb-2">Daftar Pengaduan</div>
                                  <div
                                      class="my-2 border rounded-1 bg-primary text-white d-flex justify-content-between align-items-center px-3 py-2"
                                  >
                                      <div>
                                          <div class="fw-bold fs-5">Pengaduan 1</div>
                                          <div>
                                              Lorem ipsum dolor sit amet, consectetur
                                              adipiscing elit. Malesuada duis lihat semua
                                          </div>
                                      </div>
                                  </div>
                                  <div
                                      class="my-2 border rounded-1 bg-primary text-white d-flex justify-content-between align-items-center px-3 py-2"
                                  >
                                      <div>
                                          <div class="fw-bold fs-5">Pengaduan 2</div>
                                          <div>
                                              Lorem ipsum dolor sit amet, consectetur
                                              adipiscing elit. Malesuada duis lihat semua
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="fw-bold mb-3">Keterangan Pengaduan</div>
                              <div class="border border-2 p-2">
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                  Egestas urna, congue et aenean. Porttitor aliquam a enim id
                                  nibh. Integer tempor id aliquam porttitor vitae elit aliquam
                                  est at. Venenatis quis semper adipiscing risus neque leo ac
                                  viverra dui. Venenatis metus, dui sodales eu in ut. At in id
                                  dolor felis, ac hendrerit velit gravida ipsum. Elit feugiat
                                  commodo morbi tincidunt eget lobortis. Id eget potenti duis
                                  faucibus. Amet nec dui vel id enim. Porta tellus, lectus
                                  praesent mi habitasse pellentesque suspendisse. Dui enim
                                  facilisi condimentum eros, eu odio sed. Massa sed morbi diam
                                  venenatis volutpat diam vel. Nunc adipiscing amet adipiscing
                                  id aliquam. Nunc cras ornare suspendisse sit sodales
                                  venenatis scelerisque. Ac fusce pharetra aenean egestas
                                  purus sit mauris lacinia. Sed nulla mollis fermentum,
                                  phasellus sit dictumst. Leo et quam in proin. Aliquam eget a
                                  ut aliquam bibendum quisque at praesent lorem. Ultricies
                                  dapibus tempus sed sed sapien, adipiscing sagittis,
                                  accumsan. Volutpat sit duis diam auctor elementum. In
                                  feugiat et rhoncus, imperdiet orci leo, gravida nisi. Quis
                                  in suspendisse diam sed pretium elit semper. Sit viverra
                                  enim id gravida. Magna ullamcorper vitae egestas mattis duis
                                  ut. Pharetra cursus tincidunt pretium nisl non pretium,
                                  eget. Tempus pharetra pulvinar eleifend arcu vestibulum.
                                  Tempor egestas ultricies enim pharetra adipiscing. Aenean
                                  luctus pretium cursus tellus turpis.
                              </div>
                          </div>
                      </div>`,
                confirmButtonText: "Close",
                confirmButtonClass: "btn btn-danger",
                width: "50%",
                didOpen: function () {
                    feather.replace(); // Replace Feather icons with SVG markup
                },
            });
        } else if (type === "tambah-auditee") {
            swal.fire({
                titleText: "Informasi Auditee",
                html: `<div class="col-12 text-start text-black">
                          <div class="mb-3">
                              <div class="mb-2">Nama Auditee</div>
                              <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Masukkan nama auditee"
                              />
                          </div>
                          <div class="mb-3">
                              <div class="mb-2">Telepon</div>
                              <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Masukkan telepon auditee"
                              />
                          </div>
                          <div class="mb-3">
                              <div class="mb-2">Email</div>
                              <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Masukkan email auditee"
                              />
                          </div>
                      </div>`,
                showCloseButton: true,
                confirmButtonText: "Tambah",
                confirmButtonClass: "btn btn-success",
            });
        } else if (type === "tambah-auditor") {
            swal.fire({
                titleText: "Informasi Auditor",
                text: "Test",
                html: `<div class="col-12 text-start text-black">
                          <div class="mb-3">
                              <div class="mb-2">Nama Auditor</div>
                              <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Masukkan nama auditor"
                              />
                          </div>
                          <div class="mb-3">
                              <div class="mb-2">Telepon</div>
                              <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Masukkan telepon auditor"
                              />
                          </div>
                          <div class="mb-3">
                              <div class="mb-2">Email</div>
                              <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Masukkan email auditor"
                              />
                          </div>
                          <div class="mb-3">
                              <div class="mb-2">Peran</div>
                              <select
                                  class="form-select"
                                  aria-label="Default select example"
                              >
                                  <option selected>Pilih Peran</option>
                                  <option value="1">Ketua</option>
                                  <option value="2">Wakil</option>
                                  <option value="3">
                                      Koordinator
                                  </option>
                                  <option value="4">Anggota</option>
                              </select>
                          </div>
                          <div class="mb-3">
                              <div class="mb-2">Batas Penunjukkan</div>
                              <input
                                  type="date"
                                  class="form-control"
                              />
                          </div>
                      </div>`,
                showCloseButton: true,
                confirmButtonText: "Tambah",
                confirmButtonClass: "btn btn-success",
            });
        } else if (type === "history-auditor") {
            swal.fire({
                titleText: "History Persetujuan",
                text: "Test",
                html: `<div class="col-12 text-start text-black">
                          <div class="border border-2 border-primary p-3 mb-3">
                              <div class="d-flex justify-content-between align-items-center">
                                  <div
                                      class="d-flex justify-content-between align-items-center"
                                  >
                                      <div class="me-3">
                                          <i class="icon-xl" data-feather="file"></i>
                                      </div>
                                      <div>
                                          <div class="fw-bold fs-4 mb-2">Adelia</div>
                                          <div class="mb-2">Peran : Ketua</div>
                                          <div class="mb-2">
                                              Status :
                                              <span
                                                  class="bg-success px-2 py-1 rounded rounded-5 text-white"
                                                  >Setuju</span
                                              >
                                          </div>
                                          <div>Tanggal Persetujuan : 7 September 2022</div>
                                      </div>
                                  </div>
                                  <div>
                                      <i data-feather="download"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="border border-2 border-primary p-3 mb-3">
                              <div class="d-flex justify-content-between align-items-center">
                                  <div
                                      class="d-flex justify-content-between align-items-center"
                                  >
                                      <div class="me-3">
                                          <i class="icon-xl" data-feather="file"></i>
                                      </div>
                                      <div>
                                          <div class="fw-bold fs-4 mb-2">Adelia</div>
                                          <div class="mb-2">Peran : Ketua</div>
                                          <div class="mb-2">
                                              Status :
                                              <span
                                                  class="bg-success px-2 py-1 rounded rounded-5 text-white"
                                                  >Setuju</span
                                              >
                                          </div>
                                          <div>Tanggal Persetujuan : 7 September 2022</div>
                                      </div>
                                  </div>
                                  <div>
                                      <i data-feather="download"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="border border-2 border-primary p-3 mb-3">
                              <div class="d-flex justify-content-between align-items-center">
                                  <div
                                      class="d-flex justify-content-between align-items-center"
                                  >
                                      <div class="me-3">
                                          <i class="icon-xl" data-feather="file"></i>
                                      </div>
                                      <div>
                                          <div class="fw-bold fs-4 mb-2">Adelia</div>
                                          <div class="mb-2">Peran : Ketua</div>
                                          <div class="mb-2">
                                              Status :
                                              <span
                                                  class="bg-danger px-2 py-1 rounded rounded-5 text-white"
                                                  >Tidak Setuju</span
                                              >
                                          </div>
                                          <div>Tanggal Persetujuan : 7 September 2022</div>
                                      </div>
                                  </div>
                                  <div>
                                      <i data-feather="download"></i>
                                  </div>
                              </div>
                          </div>
                      </div>`,
                didOpen: function () {
                    feather.replace(); // Replace Feather icons with SVG markup
                },
                showCloseButton: true,
            });
        } else if (type === "tambah-framework") {
            swal.fire({
                titleText: "Tambah Framework",
                html: `<div class="col-12 text-start text-black">
                          <div class="mb-3">
                              <div class="mb-2">Nama Framework</div>
                              <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Masukkan nama framework"
                              />
                          </div>
                      </div>`,
                showCloseButton: true,
                confirmButtonText: "Tambah",
                confirmButtonClass: "btn btn-success",
            });
        } else if (type === "tambah-domain") {
            swal.fire({
                titleText: "Tambah Domain",
                html: `<div class="col-12 text-start text-black">
                          <div class="mb-3">
                              <div class="mb-2">Nama Domain</div>
                              <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Masukkan nama domain"
                              />
                          </div>
                      </div>`,
                showCloseButton: true,
                confirmButtonText: "Tambah",
                confirmButtonClass: "btn btn-success",
            });
        } else if (type === "tambah-subdomain") {
            swal.fire({
                titleText: "Tambah Subdomain",
                html: `<div class="col-12 text-start text-black">
                        <div class="mb-3">
                            <div class="mb-2">Nama Subdomain</div>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Masukkan nama subdomain"
                            />
                        </div>
                        <div class="mb-3">
                            <div class="mb-2">Proses</div>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Masukkan nama proses"
                            />
                        </div>
                        <div class="mb-3">
                            <div class="mb-2">Deskripsi Proses</div>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Masukkan deskripsi proses"
                            />
                        </div>
                    </div>`,
                showCloseButton: true,
                confirmButtonText: "Tambah",
                confirmButtonClass: "btn btn-success",
            });
        } else if (type === "tambah-pertanyaan") {
            swal.fire({
                titleText: "Tambah Pertanyaan",
                html: `<div class="col-12 text-start text-black">
                      <div class="mb-3">
                          <div class="d-flex">
                              <div class="col-7">
                                  <div class="mb-2">Deskripsi Pertanyaan</div>
                                  <input
                                      type="text"
                                      class="form-control"
                                      placeholder="Masukkan deskripsi pertanyaan"
                                  />
                              </div>
                              <div class="col-5">
                                  <div class="mb-2">Jenis Jawaban</div>
                                  <select
                                      class="form-select"
                                      aria-label="Default select example"
                                  >
                                      <option selected>Pilih Jenis Jawaban</option>
                                      <option value="1">Jawaban Singkat</option>
                                      <option value="2">Jawaban Panjang</option>
                                      <option value="3">
                                          Pilihan Ganda
                                      </option>
                                      <option value="4">Dropdown</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="mb-3">
                          <div class="mb-2">Jawaban</div>
                          <input
                              type="text"
                              class="form-control"
                              placeholder="Masukkan deskripsi pertanyaan"
                          />
                      </div>
                  </div>`,
                showCloseButton: true,
                confirmButtonText: "Tambah",
                confirmButtonClass: "btn btn-success",
            });
        } else if (type === "validasi") {
            swal.fire({
                titleText: "Validasi",
                html: `<div class="col-12 text-start text-black">
                            <div class="p-3 h-100">
                                <div class="d-flex justify-content-between">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <div class="mb-2">Nama Pendanda Tangan</div>
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Masukkan nama..."
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <div class="mb-2">Nomor Dokumen</div>
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Masukkan nomor dokumen..."
                                            />
                                        </div>
                                        <div>
                                            <div class="mb-2">Tanda Tangan</div>
                                            <textarea
                                                class="form-control"
                                                placeholder="Bubuhkan tanda tangan anda disini.."
                                            ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="mb-2">Hasil QR Code</div>
                                        <div class="border rounded-2 border-1 border-primary h-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`,
                showCloseButton: true,
                confirmButtonText: "Tambah",
                confirmButtonClass: "btn btn-success",
                width: "50%",
            });
        } else if (type === "temuan") {
            swal.fire({
                titleText: "Detail Temuan Audit",
                html: `<div class="col-12 text-start text-black">
                          <div class="mb-3">
                              <div class="mb-2">Judul Temuan</div>
                              <input
                                  type="text"
                                  class="form-control"
                                  value="SDM Pengelola Keuangan"
                                  readonly
                              />
                          </div>
                          <div class="mb-3">
                              <div class="mb-2">Fakta Temuan</div>
                              <textarea
                                  type="text"
                                  class="form-control"
                                  readonly
                              >Kepala bagian keuangan memberikan uang muka berdasarkan formulir permintaan uang muka yang sudah diotorisasi oleh marketing sales supervisor. Otorisasi dari supervisor biasanya diberikan dengan mudah tanpa memperhatikan batas maksimum yang bisa diberikan.</textarea>
                          </div>
                          <div class="mb-3">
                              <div class="mb-2">Rincian Waktu Penyelesaian</div>
                              <input
                                  type="text"
                                  class="form-control"
                                  value="Akan diselesaikan dalam 2 minggu kerja"
                                  readonly
                              />
                          </div>
                          <div class="mb-3">
                              <div class="mb-2">Waktu Penyelesaian Temuan Audit</div>
                              <input
                                  type="date"
                                  class="form-control"
                                  value="2022-09-22"
                                  readonly
                              />
                          </div>
                          <div>
                              <div class="mb-2">Lampiran</div>
                              <div class="d-flex">
                                  <div class="border border-2 rounded border-primary p-2 me-3">
                                      <div class="d-flex justify-content-between align-items-center">
                                          <div
                                              class="d-flex justify-content-between align-items-center"
                                          >
                                              <div class="me-3">
                                                  <i class="icon-md" data-feather="file"></i>
                                              </div>
                                              <div>
                                                  <div class="fw-bold">LAMPIRAN TEMUAN VERSI FINAL</div>
                                                  
                                              </div>
                                          </div>
                                          
                                      </div>
                                  </div>
                                  <div class="border border-2 rounded border-primary p-2">
                                      <div class="d-flex justify-content-between align-items-center">
                                          <div
                                              class="d-flex justify-content-between align-items-center"
                                          >
                                              <div class="me-3">
                                                  <i class="icon-md" data-feather="file"></i>
                                              </div>
                                              <div>
                                                  <div class="fw-bold">LAMPIRAN TEMUAN VERSI FINAL</div>
                                                  
                                              </div>
                                          </div>
                                          
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>`,
                confirmButtonText: "Close",
                confirmButtonClass: "btn btn-danger",
                didOpen: function () {
                    feather.replace(); // Replace Feather icons with SVG markup
                },
                width: "50%",
            });

            Swal.fire({
                text: "Any fool can use a computer",
                confirmButtonText: "Close",
                confirmButtonClass: "btn btn-danger",
            });
        } else if (type === "title-and-text") {
            Swal.fire(
                "The Internet?",
                "That thing is still around?",
                "question"
            );
        } else if (type === "title-icon-text-footer") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!",
                footer: "<a href>Why do I have this issue?</a>",
            });
        } else if (type === "custom-html") {
            Swal.fire({
                title: "<strong>HTML <u>example</u></strong>",
                icon: "info",
                html:
                    "You can use <b>bold text</b>, " +
                    '<a href="//github.com">links</a> ' +
                    "and other HTML tags",
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                confirmButtonAriaLabel: "Thumbs up, great!",
                cancelButtonText: '<i data-feather="thumbs-up"></i>',
                cancelButtonAriaLabel: "Thumbs down",
            });
            feather.replace();
        } else if (type === "custom-position") {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Your work has been saved",
                showConfirmButton: false,
                timer: 1500,
            });
        } else if (type === "passing-parameter-execute-cancel") {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger me-2",
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons
                .fire({
                    title: "Apakah anda ingin menyimpan?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "me-2",
                    confirmButtonText: "Simpan",
                    cancelButtonText: "Batal",

                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "me-2",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",

                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.value) {
                        swalWithBootstrapButtons.fire(
                            "Disimpan!",
                            "Progress anda sudah disimpan",

                            "Deleted!",
                            "Your file has been deleted.",

                            "success"
                        );
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            "Batal",
                            "Silahkan isi kembali data dengan benar",

                            "Cancelled",
                            "Your imaginary file is safe :)",

                            "error"
                        );
                    }
                });
        } else if (type === "passing-parameter-delete-cancel") {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger me-2",
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons
                .fire({
                    title: "Apakah anda ingin menghapus?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "me-2",
                    confirmButtonText: "Simpan",
                    cancelButtonText: "Batal",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.value) {
                        swalWithBootstrapButtons.fire(
                            "Sukses!",
                            "Berhasil dihapus",
                            "success"
                        );
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            "Batal",
                            "Batal dihapus",
                            "error"
                        );
                    }
                });
        } else if (type === "passing-parameter-nonaktif-cancel") {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger me-2",
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons
                .fire({
                    title: "Apakah anda ingin menonaktifkan?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "me-2",
                    confirmButtonText: "Simpan",
                    cancelButtonText: "Batal",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.value) {
                        swalWithBootstrapButtons.fire(
                            "Sukses!",
                            "Berhasil dinonaktifkan",
                            "success"
                        );
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            "Batal",
                            "Batal dinonaktifkan",
                            "error"
                        );
                    }
                });
        } else if (type === "passing-parameter-verifikasi-cancel") {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger me-2",
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons
                .fire({
                    title: "Apakah anda ingin verifikasi?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "me-2",
                    confirmButtonText: "Simpan",
                    cancelButtonText: "Batal",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.value) {
                        swalWithBootstrapButtons.fire(
                            "Sukses!",
                            "Berhasil Verifikasi",
                            "success"
                        );
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            "Batal",
                            "Batal Verifikasi",
                            "error"
                        );
                    }
                });
        } else if (type === "message-with-auto-close") {
            let timerInterval;
            Swal.fire({
                title: "Auto close alert!",
                html: "I will close in <b></b> milliseconds.",
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    timerInterval = setInterval(() => {
                        const content = Swal.getHtmlContainer();
                        if (content) {
                            const b = content.querySelector("b");
                            if (b) {
                                b.textContent = Swal.getTimerLeft();
                            }
                        }
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                },
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log("I was closed by the timer");
                }
            });
        } else if (type === "message-with-custom-image") {
            Swal.fire({
                title: "Sweet!",
                text: "Modal with a custom image.",
                // imageUrl: 'https://unsplash.it/400/200',
                imageUrl: "../../../assets/images/others/placeholder.jpg",
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: "Custom image",
            });
        } else if (type === "mixin") {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        } else if (type === "message-with-auto-close") {
            let timerInterval;
            Swal.fire({
                title: "Auto close alert!",
                html: "I will close in <b></b> milliseconds.",
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    timerInterval = setInterval(() => {
                        const content = Swal.getHtmlContainer();
                        if (content) {
                            const b = content.querySelector("b");
                            if (b) {
                                b.textContent = Swal.getTimerLeft();
                            }
                        }
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                },
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log("I was closed by the timer");
                }
            });
        } else if (type === "message-with-custom-image") {
            Swal.fire({
                title: "Sweet!",
                text: "Modal with a custom image.",
                // imageUrl: 'https://unsplash.it/400/200',
                imageUrl: "../../../assets/images/others/placeholder.jpg",
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: "Custom image",
            });
        } else if (type === "mixin") {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: "success",
                title: "Signed in successfully",
            });
        } else if (type === "simpan-perubahan") {
            Swal.fire({
                title: "Ingin simpan perubahan?",

                icon: "warning",
                showCancelButton: true,
                cancelButtonText: "Tidak",
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Simpan",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire("Berhasil", "Data Berhasil Disimpan", "success");
                }
            });
        } else if (type === "hapus") {
            Swal.fire({
                title: "Anda yakin ingin menghapus temuan tersebut?",

                icon: "warning",
                showCancelButton: true,
                cancelButtonText: "Tidak",
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Iya",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire("Berhasil", "Data Berhasil Dihapus", "success");
                }
            });
        } else if (type === "validasi") {
            Swal.fire({
                title: "Validasi?",

                icon: "warning",
                showCancelButton: true,
                cancelButtonText: "Tidak",
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Iya",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire("Berhasil", "Validasi Berhasil", "success");
                }
            });
        }
    };
});
