<!-- Start Pembayaran -->
<h3>Rekapitulasi Penghimpunan ZIS Baznas Kota Surakarta Tahun {{$year}}</h3>
<br>
<table>
    <thead>
        <tr>
            <td rowspan="2">#</td>
            <td rowspan="2">Bulan</td>
            <td colspan="6" style="text-align: center;">
                Penghimpunan / Fundrising
            </td>
        </tr>
        <tr>
            <td>Fidyah</td>
            <td>Fitrah</td>
            <td>Maal</td>
            <td>Qurban</td>
            <td>Infaq</td>
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
            <!--  Total Fidyah-->
            <td>{{ $report['amount']['FIDYAH'] }}</td>
            <!-- Total Fitrah -->
            <td>{{ $report['amount']['FITRAH'] }}</td>
            <!-- Total Maal -->
            <td>{{ $report['amount']['MAAL'] }}</td>
            <!-- Total Qurban -->
            <td>{{ $report['amount']['QURBAN'] }}</td>
            <!-- Total Infaq -->
            <td>{{ $report['amount']['INFAQ'] }}</td>
            <!-- Total -->
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