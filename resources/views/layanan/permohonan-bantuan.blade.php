@extends('layouts.master')
@section('content')
<!--Form-->
<section class="page-section pb-0 p-0">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-warning alert-dismissible show fade">
        <div class="alert-body">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ $error }}
        </div>
    </div>
    @endforeach
    @endif
    @if (session('status'))
    <div class="alert alert-info alert-dismissible show fade">
        <div class="alert-body">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session('status') }}
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="form-zakat shadow border border-white bg-white">
                <div class="row justify-content-between">
                    <div class="heading-form">
                        <p class="text-form">
                            Permohonan Bantuan <button data-bs-toggle="modal" data-bs-target="#help" class="btn btn-secondary btn-circle rounded-circle"><i class="bi bi-question-lg"></i></button>
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
                            <form action="{{ url('bayar-zakat') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-4">
                                    <label for="select-program" class="form-label">Jenis Bantuan<i style="color:red;">*</i></label>
                                    <select class="form-control form-select bg-white" name="jenis" id="select-program" required>
                                        <option value>Pilih Jenis Bantuan</option>
                                        <option value="Pendidikan">Pendidikan</option>
                                        <option value="Ekonomi Produktif">Ekonomi Produktif</option>
                                        <option value="Dakwah & Advokasi">Dakwah & Advokasi</option>
                                        <option value="Kemanusiaan">Kemanusiaan</option>
                                        <option value="Kesehatan">Kesehatan</option>
                                    </select>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="" class="form-label">NIK<i style="color:red;">*</i></label>
                                    <input type="number" placeholder="Masukkan NIK" class="form-control bg-white" id="" name="nik" autocomplete="no" required>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="nominal-zakat" class="form-label">Nama Lengkap<i style="color:red;">*</i></label>
                                    <input type="text" placeholder="Masukkan nama" class="form-control bg-white" id="nominalzakat" name="nama" autocomplete="no" required>
                                </div>
                                <div class="form-group mt-4">
                                    <label class="form-label">Tempat, Tanggal Lahir<i style="color:red;">*</i></label>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control bg-white" placeholder="Masukkan Kota Kelahiran" required>
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control bg-white" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="alamat">Alamat<i style="color:red;">*</i></label>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-control form-select bg-white" name="alamat" id="kecamatan" onchange="pilihKec(this.value)" required>
                                                <option class="form-option" value="" disabled selected>Pilih Kecamatan</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control form-select bg-white" name="alamat" id="kelurahan" required>
                                                <option class="form-option" value="" disabled selected>Pilih Kelurahan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mt-4">
                                <label for="select-zakat" class="form-label">Agama<i style="color:red;">*</i></label>
                                <select class="form-control form-select bg-white" name="jenis" id="select-zakat" required>
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
                                <input type="text" placeholder="Masukkan pekerjaan" class="form-control bg-white" id="" name="pekerjaan" autocomplete="no" required>
                            </div>
                            <div class="form-group mt-4">
                                <label for="" class="form-label">No Telp<i style="color:red;">*</i></label>
                                <input type="number" placeholder="Masukkan Nomor Telepon" class="form-control bg-white" id="" name="no_telp" autocomplete="no" required>
                            </div>
                            <div class="form-group mt-4">
                                <label for="" class="form-label">Keterangan<i style="color:red;">*</i></label>
                                <textarea placeholder='Contoh : "Saya mengajukan permohonan bantuan untuk beasiswa anak saya melanjutkan ke SMP Negeri 0 Surakarta"' name="keterangan" id="" cols="30" rows="5" class="form-control bg-white" autocomplete="no" style="height: auto;" required></textarea>
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

<script>
    let kec = [
        "Pasar Kliwon",
        "Jebres",
        "Banjarsari",
        "Laweyan",
        "Serengan",
    ]
    let kelurahan = [
        ['Banyuanyar', 'Banjarsari', 'Gilingan', 'Joglo', 'Kadipiro', 'Keprabon', 'Kestalan', 'Ketelan', 'Manahan',
            'Mangkubumen', 'Nusukan', 'Punggawan', 'Setabelan', 'Sumber', 'Timuran'
        ],
        ['Gandekan', 'Jagalan', 'Jebres', 'Kepatihan Kulon', 'Kepatihan Wetan', 'Mojosongo', 'Pucang Sawit',
            'Purwodiningratan', 'Sewu', 'Sudiroprajan', 'Tegalharjo'
        ],
        ['Bumi', 'Jajar', 'Karangasem', 'Kerten', 'Laweyan', 'Pajang', 'Panularan', 'Penumping', 'Purwosari',
            'Sondakan', 'Sriwedari'
        ],
        ['Baluwarti', 'Gajahan', 'Joyosuran', 'Kampung Baru', 'Kauman', 'Kedung Lumbu', 'Mojo', 'Pasar Kliwon',
            'Sangkrah', 'Semanggi'
        ],
        ['Danukusuman', 'Jayengan', 'Joyotakan', 'Kemlayan', 'Kratonan', 'Serengan', 'Tipes']
    ]
</script>

<script>
    for (i = 0; i < kec.length; i++) {
        $('#kecamatan').append('<option value="' + kec[i] + '">' + kec[i] + '</option>');
    }

    function pilihKec(value) {
        index = kec.indexOf(value)
        $("#kelurahan option").remove();
        for (i = 0; i < kelurahan[index].length; i++) {
            $('#kelurahan').append('<option value="' + kelurahan[index][i] + '">' + kelurahan[index][i] + '</option>');
            console.log(kelurahan[index][i])
        }
    }
</script>

<script type="text/javascript">
    let persyaratan = {
        "sp": '<div class="form-group mt-4" id="sp"><label for="surat-permohonan" class="form-label">Surat Permohonan<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="permohonan" id="surat-permohonan" autocomplete="no" style="height: auto;" required></div><div class="mt-2">Template surat permohonan bisa download <a href="/assets/file/Format%20Surat%20Permohonan%20Bantuan%20Perorangan.docx" class="font-weight-bold text-success">Di sini</a></div>',
        "ktpkk": '<div class="form-group mt-4"><div class="row"><div class="col"><label for="" class="form-label">Scan KTP<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="ktp" autocomplete="no" style="height: auto;" required></div><div class="col"><label for="" class="form-label">Scan KK<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="kk" autocomplete="no" style="height: auto;" required></div></div></div>',
        "sktm": '<div class="form-group mt-4"><label for="sktm" class="form-label">SKTM atau Gakin (Tidak Wajib)</label><input type="file" class="form-control bg-white" name="tagihan" id="sktm" autocomplete="no" style="height: auto;"></div>',
        "sp_kelurahan": '<div class="form-group mt-4"><label for="suket" class="form-label">Surat Keterangan Permohonan Bantuan ke Baznas dari Kelurahan<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="suket" id="suket" autocomplete="no" style="height: auto;" required></div>',
        "tagihan_sklh": '<div class="form-group mt-4"><label for="tagihan_sklh" class="form-label">Tagihan dari Sekolah<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="tagihan_sklh" id="tagihan_sklh" autocomplete="no" style="height: auto;" required></div>',
        "foto_usaha": '<div class="form-group mt-4"><label for="foto-usaha" class="form-label">Foto Usaha<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="foto-usaha" id="foto-usaha" autocomplete="no" style="height: auto;" required></div>',
        "tagihan_rs": '<div class="form-group mt-4"><label for="tagihan_rs" class="form-label">Tagihan dari Rumah Sakit<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="tagihan_rs" id="tagihan_rs" autocomplete="no" style="height: auto;" required></div>',
        "proposal": '<div class="form-group mt-4" id="proposal"><label for="proposal" class="form-label">Proposal<i style="color:red;">*</i></label><input type="file" class="form-control bg-white" name="proposal" id="proposal" autocomplete="no" style="height: auto;" required></div>',
    }

    $("#select-program").change(function() {
        let program = $(this).val()
        let requirements = []
        console.log(program);
        switch (program) {
            case "Pendidikan":
                requirements += persyaratan['sp']
                requirements += persyaratan['ktpkk']
                requirements += persyaratan['sktm']
                requirements += persyaratan['sp_kelurahan']
                requirements += persyaratan['tagihan_sklh']
                break;
            case "Ekonomi Produktif":
                requirements += persyaratan['sp']
                requirements += persyaratan['ktpkk']
                requirements += persyaratan['sktm']
                requirements += persyaratan['sp_kelurahan']
                requirements += persyaratan['foto_usaha']
                break;
            case "Dakwah & Advokasi":
                requirements += persyaratan['sp']
                requirements += persyaratan['proposal']
                break;
            case "Kemanusiaan":
                requirements += persyaratan['sp']
                requirements += persyaratan['ktpkk']
                requirements += persyaratan['sktm']
                requirements += persyaratan['sp_kelurahan']
                break;
            case "Kesehatan":
                requirements += persyaratan['sp']
                requirements += persyaratan['ktpkk']
                requirements += persyaratan['sktm']
                requirements += persyaratan['sp_kelurahan']
                requirements += persyaratan['tagihan_rs']
                break;
            default:
                requirements += "Pilih Jenis Bantuan terlebih dahulu!"
                break;
        }
        $("#persyaratan").html(requirements)

    })
</script>
@endsection