<!-- Start Pembayaran -->
<h3>Rekapitulasi Pendistribusian ZIS Baznas Kota Surakarta Tahun {{$year}}</h3>
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
            <td>Fakir</td>
            <td>Miskin</td>
            <td>Fisabilillah</td>
            <td>Amil</td>
            <td>Mualaf</td>
            <td>Hamba Sahaya</td>
            <td>Gharimin</td>
            <td>Ibnus Sabil</td>
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
            <td>{{ $report['amount']['Fakir'] }}</td>
            <td>{{ $report['amount']['Miskin'] }}</td>
            <td>{{ $report['amount']['Fisabilillah'] }}</td>
            <td>{{ $report['amount']['Amil'] }}</td>
            <td>{{ $report['amount']['Mualaf'] }}</td>
            <td>{{ $report['amount']['Hamba Sahaya'] }}</td>
            <td>{{ $report['amount']['Gharimin'] }}</td>
            <td>{{ $report['amount']['Ibnus Sabil'] }}</td>
            <td>=SUM(C<?= $row1++ ?>:J<?= $row2++ ?>)</td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td>TOTAL</td>
            <td>=SUM(C4:C15)</td>
            <td>=SUM(D4:D15)</td>
            <td>=SUM(E4:E15)</td>
            <td>=SUM(F4:F15)</td>
            <td>=SUM(G4:G15)</td>
            <td>=SUM(H4:H15)</td>
            <td>=SUM(I4:I15)</td>
            <td>=SUM(J4:J15)</td>
            <td>=SUM(K4:K15)</td>
        </tr>
    </tbody>
</table>
<!-- End Pembayaran -->
<!-- End Pembayaran -->