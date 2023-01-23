<!-- Start Pembayaran -->
<h3>Rekapitulasi Pentasarufan ZIS Baznas Kota Surakarta Tahun {{$year}}</h3>
<br>
<table>
    <thead>
        <tr>
            <td rowspan="2">#</td>
            <td rowspan="2">Bulan</td>
            <td colspan="6" style="text-align: center;">
                Pendistribusian / Tasaruf
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
            <td>{{$report['month']}}</td>
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
            <!--  Total Fidyah-->
            <td>=SUM(C4:C15)</td>
            <!-- Total Fitrah -->
            <td>=SUM(D4:D15)</td>
            <!-- Total Maal -->
            <td>=SUM(E4:E15)</td>
            <!-- Total Qurban -->
            <td>=SUM(F4:F15)</td>
            <!-- Total Infaq -->
            <td>=SUM(G4:G15)</td>
            <!-- Total -->
            <td>=SUM(H4:H15)</td>
        </tr>
    </tbody>
</table>
<!-- End Pembayaran -->