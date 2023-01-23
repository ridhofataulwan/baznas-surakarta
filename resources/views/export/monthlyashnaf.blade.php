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
            <td>{{$report['type']}}</td>
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
            <td>{{'=SUM(C5:C'.$sum.')'}}</td>
            <td>{{'=SUM(D5:D'.$sum.')'}}</td>
            <td>{{'=SUM(E5:E'.$sum.')'}}</td>
            <td>{{'=SUM(F5:F'.$sum.')'}}</td>
            <td>{{'=SUM(G5:G'.$sum.')'}}</td>
            <td>{{'=SUM(H5:H'.$sum.')'}}</td>
            <td>{{'=SUM(I5:I'.$sum.')'}}</td>
            <td>{{'=SUM(J5:J'.$sum.')'}}</td>
            <td>{{'=SUM(K5:K'.$sum.')'}}</td>
        </tr>
    </tbody>
</table>
<!-- End Pembayaran -->