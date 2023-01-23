<!-- Start Pembayaran -->
<h3>Rekapitulasi Pendistribusian ZIS Baznas Kota Surakarta Bulan {{$month}} Tahun {{$year}}</h3>
<br>
<table>
    <thead>
        <tr>
            <td rowspan="2">#</td>
            <td rowspan="2">Jenis</td>
            <td colspan="6" style="text-align: center;">
                Penghimpunan / Fundrising
            </td>
        </tr>
        <tr>
            <td>Kemanusiaan</td>
            <td>Pendidikan</td>
            <td>Kesehatan</td>
            <td>Advokasi dan Dakwah</td>
            <td>Ekonomi Produktif</td>
            <td>Total</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        $row1 = 5;
        $row2 = 5;
        ?>
        @foreach($reports as $report)
        <tr>
            <td rowspan="1">{{$i++}}</td>
            <td>{{$report['type']}}</td>
            <td>{{ $report['amount'][1] }}</td>
            <td>{{ $report['amount'][2] }}</td>
            <td>{{ $report['amount'][3] }}</td>
            <td>{{ $report['amount'][4] }}</td>
            <td>{{ $report['amount'][5] }}</td>
            <td>=SUM(C<?= $row1++ ?>:G<?= $row2++ ?>)</td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td>TOTAL</td>
            <td>{{'=SUM(C5:C'.$sum.')'}}</td>
            <td>{{'=SUM(D5:D'.$sum.')'}}</td>
            <td>{{'=SUM(E5:E'.$sum.')'}}</td>
            <td>{{'=SUM(F5:F'.$sum.')'}}</td>
            <td>{{'=SUM(G5:G'.$sum.')'}}</td>
            <td>{{'=SUM(H5:H'.$sum.')'}}</td>
        </tr>
    </tbody>
</table>
<!-- End Pembayaran -->