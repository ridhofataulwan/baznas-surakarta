@extends('layouts.master')
@section('content')
<!--Form-->
<section class="page-section pb-0 p-0">
    <div class="container-fluid" style="background-image:url('assets/img/kraton-2.png');background-size:cover; padding-top:5%;">
        <div class="row">
            <div class="col-md-12">
                <div class="form-zakat shadow border border-white bg-white p-5">
                    <div class="row justify-content-between">
                        <div class="heading-form">
                            <p class="text-form">
                                PERMOHONAN BANTUAN <button data-bs-toggle="modal" data-bs-target="#help" class="btn btn-secondary btn-circle rounded-circle"><i class="bi bi-question-lg"></i></button>
                                <hr id="hr-form">
                            </p>
                        </div>
                        <div class="col-auto alert alert-secondary">
                            <i>Cek status permohonan anda <a href="/cek-permohonan-bantuan" class="hov-success">
                                    <span class="badge active bg-success">Di
                                        sini</span></a></i>
                            <style>
                                a.hov-success {
                                    color: black;
                                }

                                a.hov-success:hover {
                                    color: blue;
                                }
                            </style>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <form action="{{ route('store.permohonan') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mt-4">
                                        <label for="select-program" class="form-label">Jenis Bantuan<i style="color:red;">*</i></label>
                                        <select class="form-control form-select bg-white" name="program_id" id="select-program">
                                            <option value="">Pilih Jenis Bantuan</option>
                                            @foreach($program as $key => $value )
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="nik" class="form-label" id="nik">NIK <i style="color:red;">*</i></label>
                                        <input type="text" placeholder="Masukkan NIK lengkap" class="form-control bg-white @error('nik') is-invalid @enderror" id="nik" name="nik" autocomplete="no" onkeyup="countChars(this)" maxlength="16" minlength="16" value="{{ old('nik') }}">
                                        @error('nik')
                                        <span class="badge rounded bg-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="nama" class="form-label">Nama Lengkap <i style="color:red;">*</i></label>
                                        <input type="text" placeholder="Masukkan nama lengkap" class="form-control bg-white @error('name') is-invalid @enderror" id="name" name="name" autocomplete="no" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="badge rounded bg-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-4 row">
                                        <label for="jenis-kelamin" class="form-label">Jenis Kelamin <i style="color:red;">*</i></label>
                                        <div class="form-check col ms-3 col-auto">
                                            <input type="radio" class="form-check-input bg-white" id="male" value="LAKI_LAKI" name="gender" autocomplete="no" {{ old('gender') == "LAKI_LAKI" ? 'checked' : '' }}>
                                            <label for="male" class="text-black">Laki-laki</label>
                                        </div>
                                        <div class="form-check col ms-3 col-auto">
                                            <input type="radio" class="form-check-input bg-white" id="female" value="PEREMPUAN" name="gender" autocomplete="no" {{ old('gender') == "PEREMPUAN" ? 'checked' : '' }}>
                                            <label for="female" class="text-black">Perempuan</label>
                                        </div>
                                    </div>
                                    @error('gender')
                                    <span class="badge rounded bg-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group mt-4">
                                        <label class="form-label">Tempat, Tanggal Lahir<i style="color:red;">*</i></label>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control bg-white" name="birthplace" placeholder="Masukkan Kota Kelahiran" value="{{ old('birthplace') }}">
                                                @error('birthplace')
                                                <span class="badge rounded bg-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <input type="date" class="form-control bg-white" name="birthdate" value="{{ old('birthdate') }}">
                                                @error('birthdate')
                                                <span class="badge rounded bg-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="alamat">Alamat<i style="color:red;">*</i></label>
                                        <div class="row">
                                            <div class="col">
                                                <select class="form-control form-select bg-white @error('regency') is-invalid @enderror" name="regency" id="select-regency">
                                                    <option class="form-option" value disabled selected>Pilih Kecamatan</option>
                                                    @foreach ($regencies as $regency)
                                                    <option class="form-option" value="{{ $regency->id }}" {{ old('regency') == $regency->id ? 'selected' : '' }}>{{ $regency->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('regency')
                                                <span class="badge rounded bg-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <select class="form-control form-select bg-white @error('village') is-invalid @enderror" name="village" id="select-village">
                                                    <option class="form-option" value disabled selected>Pilih Kelurahan</option>
                                                    @error('any')
                                                    @foreach ($villages as $village)
                                                    <option class="form-option" value="{{ $village->id }}" {{ old('village') == $village->id ? 'selected' : '' }}>{{ $village->name }}</option>
                                                    @endforeach
                                                    @enderror
                                                </select>
                                                @error('village')
                                                <span class="badge rounded bg-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mt-4">
                                    <label for="select-zakat" class="form-label">Agama<i style="color:red;">*</i></label>
                                    <select class="form-control form-select bg-white" name="religion" id="select-zakat">
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katholik">Katholik</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="" class="form-label">Pekerjaan<i style="color:red;">*</i></label>
                                    <input type="text" placeholder="Masukkan pekerjaan" class="form-control bg-white @error('job') is-invalid @enderror" id="" name="job" autocomplete="no" value="{{ old('job') }}">
                                    @error('job')
                                    <span class="badge rounded bg-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <label for="" class="form-label">No Telp<i style="color:red;">*</i></label>
                                    <input type="number" placeholder="Masukkan Nomor Telepon" class="form-control bg-white @error('phone') is-invalid @enderror" id="" name="phone" autocomplete="no" value="{{ old('phone') }}">
                                    @error('phone')
                                    <span class="badge rounded bg-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <label for="" class="form-label">Keterangan<i style="color:red;">*</i></label>
                                    <textarea placeholder='Contoh : "Saya mengajukan permohonan bantuan untuk beasiswa anak saya melanjutkan ke SMP Negeri 0 Surakarta"' name="description" id="" cols="30" rows="5" class="form-control bg-white @error('description') is-invalid @enderror" autocomplete="no" style="height: auto;" value="{{ old('description') }}"></textarea>
                                    @error('description')
                                    <span class="badge rounded bg-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="heading-form">
                                    <p class="text-form">
                                        Lengkapi Persyaratan Pengajuan
                                    </p>
                                </div>
                                <div id="persyaratan">
                                    Pilih Jenis Bantuan terlebih dahulu!
                                    <div id="element_sp" style="display: none;">
                                        <div class="form-group mt-4" id="sp"><label for="surat-permohonan" class="form-label">Surat Permohonan<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="sp" id="surat-permohonan" autocomplete="no" style="height: auto;"></div>
                                        <div class="mt-2">Template surat permohonan bisa download <a href="/assets/file/Format%20Surat%20Permohonan%20Bantuan%20Perorangan.docx" class="font-weight-bold text-success">Di sini</a></div>
                                    </div>
                                    <div id="element_ktpkk" style="display: none;">
                                        <div class="form-group mt-4">
                                            <div class="row">
                                                <div class="col"><label for="" class="form-label">Scan KTP<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="ktp" autocomplete="no" style="height: auto;"></div>
                                                <div class="col"><label for="" class="form-label">Scan KK<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="kk" autocomplete="no" style="height: auto;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="element_sktm" style="display: none;">
                                        <div class="form-group mt-4"><label for="sktm" class="form-label">SKTM atau Gakin (Tidak Wajib)</label><input type="file" class="form-control bg-white" name="sktm" id="sktm" autocomplete="no" style="height: auto;"></div>
                                    </div>
                                    <div id="element_sp_kelurahan" style="display: none;">
                                        <div class="form-group mt-4"><label for="sp_kelurahan" class="form-label">Surat Keterangan Permohonan Bantuan ke Baznas dari Kelurahan<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="sp_kelurahan" id="sp_kelurahan" autocomplete="no" style="height: auto;"></div>
                                    </div>
                                    <div id="element_tagihan_sklh" style="display: none;">
                                        <div class="form-group mt-4"><label for="tagihan_sklh" class="form-label">Tagihan dari Sekolah<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="tagihan_sklh" id="tagihan_sklh" autocomplete="no" style="height: auto;"></div>
                                    </div>
                                    <div id="element_foto_usaha" style="display: none;">
                                        <div class="form-group mt-4"><label for="foto_usaha" class="form-label">Foto Usaha<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="foto_usaha" id="foto_usaha" autocomplete="no" style="height: auto;"></div>
                                    </div>
                                    <div id="element_tagihan_rs" style="display: none;">
                                        <div class="form-group mt-4"><label for="tagihan_rs" class="form-label">Tagihan dari Rumah Sakit<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="tagihan_rs" id="tagihan_rs" autocomplete="no" style="height: auto;"></div>
                                    </div>
                                    <div id="element_proposal" style="display: none;">
                                        <div class="form-group mt-4" id="proposal"><label for="proposal" class="form-label">Proposal<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="proposal" id="proposal" autocomplete="no" style="height: auto;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-2">Keterangan:</h5>
                        <p class="py-0 my-0">( <i style="color:red;">*</i> ) : Wajib diisi</p>
                        <div class="footer-form">
                            <div class="text-center">
                                <button type="submit" class="btn btn-success" style="font-size: 20px;">Kirim Permohonan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="continer-fluid mt-5 pt-5">
        <img src="assets/img/backgroundbawah.png" style="width: 100%; height: auto;" alt="">
    </div>
</section>
<div class="modal fade" id="help" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alur Proses Permohonan Bantuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ol>
                    <li>Mengisi Form Permohonan</li>
                    <li>Petugas memvalidasi Form</li>
                    <li>Pemohon mendapat notifikasi Status Permohonan di Nomor WhatsApp yang telah dimasukkan dalam Form Permohonan</li>
                    <li>Apabila permohonan diterima, prosedur dilanjutkan ke Screening/Wawancara</li>
                    <li>Petugas akan menghubungi pemohon untuk informasi lebih lanjut</li>
                    <li>Pemohon harap menyiapkan dokumen asli Persyaratan dalam bentuk fisik (hardfile), untuk dilakukan pengecekan saat Screening/Wawancara berlangsung</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Script Address -->
<script>
    // Select Kecamatan
    $(document).on('change', '#select-regency', function() {
        let regency_id = $(this).val();
        console.log(regency_id);
        // ! Remove Html Below
        $('#select-village').html('<option value="" disabled selected>Pilih Kelurahan</option>')
        $(document).ready(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/get-village",
                method: 'POST',
                data: {
                    id: regency_id,
                },
                success: function(response) {
                    let districs = response;
                    let option = ['<option value="" disabled selected>Pilih Kelurahan</option>']
                    districs.forEach(element => {
                        option.push('<option value=' + element['id'] + '>' + element['name'] + '</option>')
                    });
                    $('#select-village').html(option)
                    console.log(response);
                }
            })
        });
    })

    // Get Village While Page On Load 
    $(function() {
        let regency_id = $('#select-regency').val();

        $(document).ready(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/get-village",
                method: 'POST',
                data: {
                    id: regency_id,
                },
                success: function(response) {
                    let districs = response;
                    let option = ['<option value="" disabled selected>Pilih Kelurahan</option>']
                    districs.forEach(element => {
                        option.push('<option value=' + element['id'] + '>' + element['name'] + '</option>')
                    });
                    $('#select-village').html(option)

                }
            })
        });
    });
</script>

<script>
    $("#select-program").change(function() {
        let showElements = [
            "#element_sp",
            "#element_ktpkk",
            "#element_sktm",
            "#element_sp_kelurahan",
            "#element_tagihan_sklh",
            "#element_foto_usaha",
            "#element_tagihan_rs",
            "#element_proposal"
        ];

        let program = $(this).val();
        $(showElements.join(",")).hide();
        $(showElements.join(",") + " input").removeAttr('required');

        switch (program) {
            case "1":
                $("#element_sp, #element_ktpkk, #element_sktm, #element_sp_kelurahan").show();
                $("#element_sp input, #element_ktpkk input, #element_sktm input, #element_sp_kelurahan input").attr("required", "required");
                break;
            case "2":
                $("#element_sp, #element_ktpkk, #element_sktm, #element_sp_kelurahan, #element_tagihan_sklh").show();
                $("#element_sp input, #element_ktpkk input, #element_sktm input, #element_sp_kelurahan input, #element_tagihan_sklh input").attr("required", "required");
                break;
            case "3":
                $("#element_sp, #element_ktpkk, #element_sktm, #element_sp_kelurahan, #element_tagihan_rs").show();
                $("#element_sp input, #element_ktpkk input, #element_sktm input, #element_sp_kelurahan input, #element_tagihan_rs input").attr("required", "required");
                break;
            case "4":
                $("#element_sp, #element_proposal").show();
                $("#element_sp input, #element_proposal input").attr("required", "required");
                break;
            case "5":
                $("#element_sp, #element_ktpkk, #element_sktm, #element_sp_kelurahan, #element_foto_usaha").show();
                $("#element_sp input, #element_ktpkk input, #element_sktm input, #element_sp_kelurahan input, #element_foto_usaha input").attr("required", "required");
                break;
            default:
                requirements += "Pilih Jenis Bantuan terlebih dahulu!";
                break;
        }
        $(showElements.join(",") + " input").each(function() {
            if (!$(this).closest(showElements.join(",")).is(":visible")) {
                $(this).removeAttr("required");
            }
        });
    });
</script>
@endsection