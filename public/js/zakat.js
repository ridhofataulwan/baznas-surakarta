$(document).on('change', '#countzakat', function() {
    var select = $(this).val();
    var form = '';
    if (select == 'fitrah') {
        form = '<div class="card-body" style="background-color: #01502D; border-radius:20px;">' +
            '<h5 class="text-bold mb-3" style="color:white; text-align: left;">Komponen Zakat</h5>' +
            '<p class="card-text" style="color: white; text-align: left;">Silahkan diisi sesuai dengan harga beras 1 Kg di kota anda</p>' +
            '<p class="card-text mb-1 pt-3" style="color: white; text-align: left;">Harga Beras (1 Kg)</p>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Rp</div>' +
            '<input type="text" style="font-size: 15px" class="form-control" id="priceFitrah" data-price = 0>' +
            '</div>' +
            '</div>' +
            '<p class="card-text mb-1 pt-3" style="color: white; text-align: left;">Besaran Zakat Fitrah</p>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Kg</div>' +
            '<input type="text" style="font-size: 15px" class="form-control" value="2,5" readonly>' +
            '</div>' +
            '</div>' +
            '<div>&nbsp;</div>' +
            '<button type="button" class="btn btn-primary2" id="hitungFitrah" style="background-color: #FF9900; border-color: #FF9900;">Hitung</button>' +
            '</div>';
    } else if (select == 'maal') {
        form = '<div class="card-body" style="background-color: #01502D; border-radius:20px;">' +
            '<h5 class="text-bold mb-3" style="color:white; text-align: left;">Komponen Zakat</h5>' +
            '<p class="card-text" style="color: white; text-align: left;">Silahkan diisi sesuai dengan gaji anda perbulan</p>' +
            '<p class="card-text mb-1 pt-3" style="color: white; text-align: left;">Gaji Pokok Perbulan</p>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Rp</div>' +
            '<input type="text" style="font-size: 15px" class="form-control" id="gajiPokok" name="gaji" required>' +
            '</div>' +
            '</div>' +
            '<p class="card-text mb-1 pt-3" style="color: white; text-align: left;">Tunjangan Tambahan</p>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Rp</div>' +
            '<input type="text" style="font-size: 15px" class="form-control" name="tunjangan" id="tunjangan" required>' +
            '</div>' +
            '</div>' +
            '<p class="card-text mb-1 pt-3" style="color: white; text-align: left;">Hutang/Cicilan</p>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Rp</div>' +
            '<input type="text" style="font-size: 15px" class="form-control" id="hutang" name="hutang" required>' +
            '</div>' +
            '</div>' +
            '<p class="card-text mb-1 pt-3" style="color: white; text-align: left;">Besaran Zakat Maal</p>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">%</div>' +
            '<input type="number"style="font-size: 15px" class="form-control" id="autoSizingInputGroup" value="2.5" readonly>' +
            '</div>' +
            '</div>' +
            '<div>&nbsp;</div>' +
            '<button type="submit" class="btn btn-primary2" id="hitungMaal" style="background-color: #FF9900; border-color: #FF9900;">Hitung</button>' +
            '</div>';
    } else if (select == 'fidyah') {
        form = '<div class="card-body" style="background-color: #01502D; border-radius:20px;">' +
            '<h5 class="text-bold mb-3" style="color:white; text-align: left;">Komponen Zakat</h5>' +
            '<p class="card-text" style="color: white; text-align: left;">Silahkan diisi sesuai dengan hutang puasa anda</p>' +
            '<p class="card-text mb-1 pt-3" style="color: white; text-align: left;">Total hari tidak berpuasa</p>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Hari</div>' +
            '<input type="number" style="font-size: 15px" min="1" class="form-control" id="day" name="hari">' +
            '</div>' +
            '</div>' +
            ' <p class="card-text mb-1 pt-3" style="color: white; text-align: left;">Total jiwa</p>' +
            ' <div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Jiwa</div>' +
            '<input type="number" style="font-size: 15px" min="1" class="form-control" id="soul" name="jiwa">' +
            '</div>' +
            '</div>' +
            ' <p class="card-text mb-1 pt-3" style="color: white; text-align: left;">Harga Zakat Fidyah(Per hari dan Per jiwa)</p>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Rp</div>' +
            '<input type="text" style="font-size: 15px" class="form-control" value="50.000" readonly>' +
            '</div>' +
            '</div>' +
            '<div>&nbsp;</div>' +
            '<button type="submit" class="btn btn-primary2" id="hitungFidyah" style="background-color: #FF9900; border-color: #FF9900;">Hitung</button>' +
            '</div>';
    } else if (select == 'qurban') {
        form = '<div class="card-body" style="background-color: #01502D; border-radius:20px;">' +
            '<h5 class="text-bold mb-3" style="color:white; text-align: left;">Komponen Qurban</h5>' +
            '<p class="card-text" style="color: white; text-align: left;">Pilih Jenis Qurban</p>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<select class="form-select" id="qurban" name="qurban">' +
            '<option value="A">Domba/Kambing Al-Kautsar</option>' +
            '<option value="B">Domba/Kambing Firdaus</option>' +
            '<option value="C">Sapi Al-Kautsar</option>' +
            '</select>' +
            '</div>' +
            '</div>' +
            '<div>&nbsp;</div>' +
            '<button type="submit" class="btn btn-primary2" style="background-color: #FF9900; border-color: #FF9900;" id="hitungQurban">Hitung</button>' +
            '</div>';
    } else if (select == 'infaq') {
        form = '<div class="card-body" style="background-color: #01502D; border-radius:20px;">' +
            '<h5 class="text-bold mb-3" style="color:white; text-align: left;">Komponen Infaq</h5>' +
            '<p class="card-text" style="color: white; text-align: left;">Silahkan diisi sesuai dengan gaji anda perbulan</p>' +
            '<p class="card-text" style="color: white; text-align: left;">Gaji Pokok Perbulan</p>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Rp</div>' +
            '<input type="text" style="font-size: 15px" min="0" class="form-control" id="gaji" name="gaji">' +
            '</div>' +
            '</div>' +
            '<p class="card-text" style="color: white; text-align: left;">Tunjangan Tambahan</p>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Rp</div>' +
            '<input type="text" style="font-size: 15px" min="0" class="form-control" id="tunjangan" name="tunjangan">' +
            '</div>' +
            '</div>' +
            '<p class="card-text" style="color: white; text-align: left;">Besaran Infaq Perbulan</p>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">%</div>' +
            '<input type="text" style="font-size: 15px" class="form-control" id="autoSizingInputGroup" value="2,5" readonly>' +
            '</div>' +
            '</div>' +
            '<div>&nbsp;</div>' +
            '<button type="submit" class="btn btn-primary2" id="hitungInfaq" style="background-color: #FF9900; border-color: #FF9900;">Hitung</button>' +
            '</div>';
    } else if (select == 'penghasilan') {
        form = '<div class="card-body" style="background-color: #01502D; border-radius:20px;">' +
            '<h5 class="text-bold mb-3" style="color:white; text-align: left;">Komponen Zakat</h5>' +
            '<p class="card-text" style="color: white; text-align: left;">Silahkan diisi sesuai dengan gaji anda perbulan</p>' +
            '<p class="card-text mb-1 pt-3" style="color: white; text-align: left;">Gaji Pokok Perbulan</p>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Rp</div>' +
            '<input type="text" style="font-size: 15px" min="0" class="form-control" id="gaji" name="gaji">' +
            '</div>' +
            '</div>' +
            '<p class="card-text mb-1 pt-3" style="color: white; text-align: left;">Tunjangan Tambahan</p>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Rp</div>' +
            '<input type="text" style="font-size: 15px" min="0" class="form-control" id="tunjangan" name="tunjangan">' +
            '</div>' +
            '</div>' +
            '<p class="card-text mb-1 pt-3" style="color: white; text-align: left;">Kadar Zakat Penghasilan</p>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">%</div>' +
            '<input type="text" style="font-size: 15px" class="form-control" id="autoSizingInputGroup" value="2,5" readonly>' +
            '</div>' +
            '</div>' +
            '<div>&nbsp;</div>' +
            '<button type="submit" class="btn btn-primary2" id="hitungPenghasilan" style="background-color: #FF9900; border-color: #FF9900;">Hitung</button>' +
            '</div>';
    } else {
        form = '<div class="alert alert-danger" role="alert">' +
            '<b>Ooops!</b>pilih jenis zakat' +
            '</div>';
    }
    $('#showform').html(form);
});
$(document).on('change', '#countzakat', function() {
    var select = $(this).val();
    var desc = '';
    if (select == 'fitrah') {
        desc =
            '<h6 style="color: black; text-align: left;"><b>ZAKAT FITRAH</b></h6>' +
            '<p style="color: black; text-align: justify; font-size: clamp(13px, 1vw, 17px);">' +
            'Zakat fitrah adalah zakat yang harus ditunaikan bagi seorang muzakki yang telah memiliki' +
            'kemampuan untuk menunaikannya. Zakat fitrah adalah zakat wajib yang harus dikeluarkan sekali' +
            'setahun yaitu saat bulan ramadhan menjelang idul fitri. Pada prinsipnya, zakat fitrah haruslah' +
            'dikeluarkan sebelum sholat idul fitri dilangsungkan. Hal tersebut yang menjadi pembeda zakat fitrah' +
            'dengan zakat lainnya.</p>' +
            '<h6 style="color: black; text-align: left;"><b>Nilai Zakat</b></h6>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Rp</div>' +
            '           <input type="text" style="font-size: 15px; border: 1px solid #ced4da" class="form-control" id="resultFitrah" readonly>' +
            '</div>' +
            '</div>' +
            '</div>';
    } else if (select == 'maal') {
        desc =
            '<h6 style="color: black; text-align: left;"><b>ZAKAT MAAL</b></h6>' +
            '<p style="color: black; text-align: justify; font-size: clamp(13px, 1vw, 17px);">' +
            'Zakat yang dikenakan atas harta yang secara substansi perolehannya tidak bertentangan dengan ketentuan agama. Zakat mal terdiri atas simpanan kekayaan seperti uang, emas, surat berharga, penghasilan profesi, aset perdagangan, hasil barang tambang atau laut, hasil sewa aset, dan lain sebagainya.' +
            '</p>' +
            '<h6 style="color: black; text-align: left;"><b>Nilai Zakat</b></h6>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Rp</div>' +
            '           <input type="text" style="font-size: 15px; border: 1px solid #ced4da" class="form-control" id="resultFitrah" readonly>' +
            '</div>' +
            '</div>' +
            '</div>';
    } else if (select == 'fidyah') {
        desc =
            '<h6 style="color: black; text-align: left;"><b>ZAKAT FIDYAH</b></h6>' +
            '<p style="color: black; text-align: justify; font-size: clamp(13px, 1vw, 17px);">' +
            'Fidyah diambil dari kata “fadaa” artinya mengganti atau menebus. Bagi beberapa orang yang tidak mampu menjalankan ibadah puasa dengan kriteria tertentu, diperbolehkan tidak berpuasa serta tidak harus menggantinya di lain waktu. Namun, sebagai gantinya diwajibkan untuk membayar fidyah.</p>' +
            '<h6 style="color: black; text-align: left;"><b>Nilai Zakat</b></h6>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Rp</div>' +
            '           <input type="text" style="font-size: 15px; border: 1px solid #ced4da" class="form-control" id="resultFitrah" readonly>' +
            '</div>' +
            '</div>' +
            '</div>';
    } else if (select == 'qurban') {
        desc =
            '<h6 style="color: black; text-align: left;"><b>QURBAN</b></h6>' +
            '<p style="color: black; text-align: justify; font-size: clamp(13px, 1vw, 17px);">' +
            'Zakat fitrah adalah zakat yang harus ditunaikan bagi seorang muzakki yang telah memiliki' +
            'kemampuan untuk menunaikannya. Zakat fitrah adalah zakat wajib yang harus dikeluarkan sekali' +
            'setahun yaitu saat bulan ramadhan menjelang idul fitri. Pada prinsipnya, zakat fitrah haruslah' +
            'dikeluarkan sebelum sholat idul fitri dilangsungkan. Hal tersebut yang menjadi pembeda zakat fitrah' +
            'dengan zakat lainnya.</p>' +
            '<h6 style="color: black; text-align: left;"><b>Nilai Zakat</b></h6>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Rp</div>' +
            '           <input type="text" style="font-size: 15px; border: 1px solid #ced4da" class="form-control" id="resultFitrah" readonly>' +
            '</div>' +
            '</div>' +
            '</div>';
    } else if (select == 'infaq') {
        desc =
            '<h6 style="color: black; text-align: left;"><b>INFAQ</b></h6>' +
            '<p style="color: black; text-align: justify; font-size: clamp(13px, 1vw, 17px);">' +
            'Infaq adalah harta yang dikeluarkan oleh seseorang atau badan usaha di luar zakat untuk kemaslahatan umum (Menurut Undang-Undang Nomor 23 Tahun 2011 tentang Pengelolaan Zakat pada BAB I Pasal 1). infak merupakan amalan yang tak bisa lepas dari kehidupan sehari-hari seorang Muslim. infak berasal dari Bahasa Arab, "anfaqa" yang berarti membelanjakan harta atau memberikan harta. Sedangkan infak berarti keluarkanlah harta.</p>' +
            '<h6 style="color: black; text-align: left;"><b>Nilai Infaq</b></h6>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Rp</div>' +
            '           <input type="text" style="font-size: 15px; border: 1px solid #ced4da" class="form-control" id="resultFitrah" readonly>' +
            '</div>' +
            '</div>' +
            '</div>';
    } else if (select == 'penghasilan') {
        desc =
            '<h6 style="color: black; text-align: left;"><b>ZAKAT PENGHASILAN</b></h6>' +
            '<p style="color: black; text-align: justify; font-size: clamp(13px, 1vw, 17px);">' +
            "Zakat penghasilan atau yang dikenal juga sebagai zakat profesi adalah bagian dari zakat maal yang wajib dikeluarkan atas harta yang berasal dari pendapatan / penghasilan rutin dari pekerjaan yang tidak melanggar syariah. Nishab zakat penghasilan sebesar 85 gram emas per tahun. Kadar zakat penghasilan senilai 2,5%. Dalam praktiknya, zakat penghasilan dapat ditunaikan setiap bulan dengan nilai nishab per bulannya adalah setara dengan nilai seperduabelas dari 85 gram emas, dengan kadar 2,5%. Jadi apabila penghasilan setiap bulan telah melebihi nilai nishab bulanan, maka wajib dikeluarkan zakatnya sebesar 2,5% dari penghasilannya tersebut. (Sumber: Al Qur'an Surah Al Baqarah ayat 267, Peraturan Menteri Agama Nomer 31 Tahun 2019, Fatwa MUI Nomer 3 Tahun 2003, dan pendapat Shaikh Yusuf Qardawi).</p>" +
            '<h6 style="color: black; text-align: left;"><b>Nilai Zakat</b></h6>' +
            '<div class="col-auto">' +
            '<div class="input-group">' +
            '<div class="input-group-text">Rp</div>' +
            '           <input type="text" style="font-size: 15px; border: 1px solid #ced4da" class="form-control" id="resultFitrah" readonly>' +
            '</div>' +
            '</div>' +
            '<div id="resultPesan" class="alert alert-danger" style="display: none">' +
            '</div>' +
            '</div>';
    } else {
        desc = '<div class="alert alert-danger" role="alert">' +
            '<b>Ooops!</b>pilih jenis zakat' +
            '</div>';
    }
    $('#showdesc').html(desc);
});

// Zakat Fitrah
$(document).on('click', '#rek', function() {
    var jenis = $(this).data('jenis');
    var namaTabel = jenis.charAt(0).toUpperCase() + jenis.slice(1);
    $(document).ready(function() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/datajax",
            method: 'POST',
            data: {
                jenis: jenis
            },
            success: function(response) {
                $('#title').html("Daftar Rekening " + namaTabel)
                $('#listrek').html(response)
            }
        })
    });
})

function handleClick(number) {
    navigator.clipboard.writeText(number);

    document.getElementById('alert').setAttribute("style", "display: true");
    document.getElementById('alert').innerHTML = "Nomor Rekening <b>" + number + "</b> telah tersalin!";
}

// Layanan Zakat
$(document).on('click', '.btn-check', function() {
    var jenis = $(this).data('id')
    var layanan1 = ''
    var layanan2 = ''
    var image1 = ''
    var image2 = ''
    if (jenis == 'perbankan') {
        layanan1 = 'Layanan Perbankan';
        layanan2 = 'Bank Mitra Baznas';
        image1 = 'assets/img/korosel4.png';
        image2 = 'assets/img/list-bank/bsi.png';
        image3 = 'assets/img/list-bank/bj.png';
        style = ''
    } else if (jenis == 'langsung') {
        layanan1 = 'Layanan Langsung';
        layanan2 = 'Bank Mitra Baznas';
        image1 = 'assets/img/korosel2.png';
        image2 = 'assets/img/list-bank/bsi.png';
        image3 = 'assets/img/list-bank/bj.png';
        style = ''
    } else {
        layanan1 = 'Layanan Digital';
        layanan2 = 'Pembayaran Melalui QRIS';
        image1 = 'assets/img/korosel3.png';
        image2 = 'assets/img/QRIS Infaq Baznas.png';
        image3 = 'assets/img/QRIS Zakat Baznas.png';
        style = 'height: 400px; width: auto;'
    }
    var output = '<h4 class="mb-3 header-layanan">' + layanan1 + '</h4>' +
        '<p style="text-align: center; font-weight: bolder;" class="mb-4">BAZNAS bekerjasama dengan mitra perbankan dalam menyediakan berbagai fasilitas pembayaran zakat, infak, dan sedekah.</p>' +
        '<img src="' + image1 + '" alt="pembayaran perbankan" class="image-layanan">' +
        '<h4 class="mb-4 mt-5 header-layanan">' + layanan2 + '</h4>' +
        '<div class="d-flex justify-content-center">' +
        '<div class="col-md-auto">' +
        '<img src="' + image2 + '" style="' + style + '" height="150px" alt="pembayaran perbankan" class="image-layanan mx-1">' +
        '</div>' +
        '<div class="col-md-auto">' +
        '<img src="' + image3 + '" style="' + style + '" height="150px" alt="pembayaran perbankan" class="image-layanan mx-1">' +
        '</div>' +
        '</div>';
    $(".show-content-layanan").fadeOut(0).html(output).fadeIn(1500)
})

function countChars(obj) {
    var maxLength = 16;
    var strLength = obj.value.length;

    if (obj.value == '') {} else if (!(/\D/.test(obj.value)) && strLength < maxLength) {
        document.getElementById("nik").innerHTML = 'NIK <span class="text-danger"> [' + strLength + '/' + maxLength + '] </span>';
    } else if (!(/\D/.test(obj.value)) && strLength == maxLength) {
        document.getElementById("nik").innerHTML = 'NIK';
    }
}

$(function() {
    $('input[name="nik"]').bind('keypress', function(e) {
        var keyCode = (e.which) ? e.which : event.keyCode
        return !(keyCode > 31 && (keyCode < 48 || keyCode > 57));
    });
});

window.onload = () => {
    myInput = document.getElementsByTagName('input');
    for (let index = 0; index < myInput.length; index++) {
        const element = myInput[index];
        element.onpaste = e => e.preventDefault();
    }
}