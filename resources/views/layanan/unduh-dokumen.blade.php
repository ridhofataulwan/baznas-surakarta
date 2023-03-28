@extends('layouts/master')
@section('content')
<style>
    @media (max-width: 1200px) {
        .btn-group-vertical {
            width: 100%;
        }
    }

    @media (min-width: 1210px) {
        .btn-group-vertical {
            width: 40vw;
        }
    }

    .header-layanan {
        text-align: center;
        font-weight: bolder;
        color: #01502D
    }

    .image-layanan {
        width: 100%;
        height: auto;
    }

    .image-layanan.bank {
        height: 50vh;
    }
</style>
<section class="page-section" style="background-color: #fff;">
    <div class="container">
        <h3 style="text-align: center; font-weight: bolder; color:#01502D" class="mb-3">Unduh Dokumen</h3>
        <p style="text-align: center">Baznas menyediakan dokumen yang dapat dibutuhkan oleh masyarakat. Unduh Dokumen dibawah ini:</p>
        <form action="{{ route('search.file') }}" method="POST">
            @csrf
            <div class="d-flex justify-content-center mb-3">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" placeholder="Cari Dokumen" value="{{ old('search') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary" style="height: 58px;">Cari</button>
                    </div>
                </div>
            </div>
        </form>
        @if($search)
        <div class="text-center">
            <span>Anda Mencari dengan kata kunci <span class="text-primary">{{$search}}</span></span>
        </div>
        @endif

        <span></span>
        <table class="table table" id="myTable">
            <thead>
                <th>Nama Dokumen</th>
                <th>Diunggah pada</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($file as $f)
                <td>
                    <a class="text-dark" target="_blank" href="{{url('uploads/unduhan/'.$f->filename)}}">{{$f->name}}</a>
                </td>
                <td>{{$f->created_at}}</td>
                <td>
                    <a class="btn btn-primary" target="_blank" href="{{url('uploads/unduhan/'.$f->filename)}}" download><i class="fa fa-download"></i></a>
                </td>
                @endforeach
            </tbody>
        </table>
        <div class="show-content-layanan mt-4"></div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@endsection