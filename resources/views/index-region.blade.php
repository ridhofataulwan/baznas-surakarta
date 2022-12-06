@extends('layouts/master')
@section('content')
<!--Hero Section-->
<header class="masthead">
    <div class="container-fluid hero-section" style="width: 100%;height: 350px;">
        <div class="heading">
            Ajax Region Test
            <hr id="hr-hero">
        </div>
    </div>
</header>
<!--Crew-->
<section class="page-section" id="about">
    <div class="container">
        <form action="" method="post">
            <div class="form-group my-4">
                <label for="select-province" class="form-label my-3">Provinsi</label>
                <select class="form-control form-select bg-white" name="province" id="select-province">
                    @foreach ($data as $provinsi)
                    <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                    @endforeach
                </select>
                <label for="select-district" class="form-label my-3">Kota/Kabupaten</label>
                <select class="form-control form-select bg-white" name="district" id="select-district">
                    <option value="">== Pilih Kota/Kabupaten ==</option>
                </select>
                <label for="select-district" class="form-label my-3">Kecamatan</label>
                <select class="form-control form-select bg-white" name="regency" id="select-regency">
                    <option value="">== Pilih Kecamatan ==</option>
                </select>
                <label for="select-village" class="form-label my-3">Kelurahan/Desa</label>
                <select class="form-control form-select bg-white" name="village" id="select-village">
                    <option value="">== Pilih Kelurahan/Desa ==</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>

<script>
    // Pilih Provinsi
    $(document).on('change', '#select-province', function() {
        let province_id = $(this).val();
        // ! Remove Html Below
        $('#select-district').html('<option value="">== Pilih Kota/Kabupaten ==</option>')
        $('#select-regency').html('<option value="">== Pilih Kecamatan ==</option>')
        $('#select-village').html('<option value="">== Pilih Kelurahan/Desa ==</option>')

        $(document).ready(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/get-district",
                method: 'POST',
                data: {
                    province_id: province_id
                },
                success: function(response) {
                    let districs = response;
                    let option = ['<option value="">== Pilih Kota/Kabupaten ==</option>']
                    districs.forEach(element => {
                        option.push('<option value=' + element['id'] + '>' + element['name'] + '</option>')
                    });
                    $('#select-district').html(option)
                }
            })
        });
    })

    // Pilih Kabupaten/Kota
    $(document).on('change', '#select-district', function() {
        let district_id = $(this).val();
        let province_id = $('#select-province').val();

        // ! Remove Html Below
        $('#select-regency').html('<option value="">== Pilih Kecamatan ==</option>')
        $('#select-village').html('<option value="">== Pilih Kelurahan/Desa ==</option>')
        $(document).ready(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/get-regency",
                method: 'POST',
                data: {
                    district_id: district_id,
                    province_id: province_id
                },
                success: function(response) {
                    let districs = response;
                    let option = ['<option value="">== Pilih Kecamatan ==</option>']
                    districs.forEach(element => {
                        option.push('<option value=' + element['id'] + '>' + element['name'] + '</option>')
                    });
                    $('#select-regency').html(option)


                }
            })
        });
    })

    // Pilih Kabupaten/Kota
    $(document).on('change', '#select-regency', function() {
        let regency_id = $(this).val();
        let district_id = $('#select-district').val();
        let province_id = $('#select-province').val();

        // ! Remove Html Below
        $('#select-village').html('<option value="">== Pilih Kelurahan/Desa ==</option>')
        $(document).ready(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/get-village",
                method: 'POST',
                data: {
                    regency_id: regency_id,
                    district_id: district_id,
                    province_id: province_id
                },
                success: function(response) {
                    let districs = response;
                    let option = ['<option value="">== Pilih Kelurahan/Desa ==</option>']
                    districs.forEach(element => {
                        option.push('<option value=' + element['id'] + '>' + element['name'] + '</option>')
                    });
                    $('#select-village').html(option)

                }
            })
        });
    })
</script>
@endsection