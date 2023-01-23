<!-- Start Pembayaran -->
<h3>Rekapitulasi Pendistribusian ZIS Baznas Kota Surakarta Bulan {{$month}} Tahun {{$year}}</h3>
<br>
<table>
    <thead>
        <tr>
            <td>#</td>
            <td>Nama</td>
            <td>No Telp</td>
            <td>Jenis Pembayaran</td>
            <td>Ashnaf</td>
            <td>Program</td>
            <td>Nominal</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        // $num = 1;
        $row1 = 5;
        $row2 = 5; ?>
        @foreach($reports as $report)
        <tr>
            <td>{{$i++}}</td>
            <td>{{ $report['name']}}</td>
            <td>{{$report['phone']}}</td>
            <td>{{$report['type']}}</td>
            <td>{{$report['ashnaf']}}</td>
            <td>{{$report['program']}}</td>
            <td>{{$report['amount']}}</td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td colspan="5">TOTAL</td>
            <td>{{'=SUM(G4:G'.$sum.')'}}</td>
        </tr>
    </tbody>
</table>
<!-- End Pembayaran -->