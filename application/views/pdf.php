<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf; ?></title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: 11px;
            border-collapse: collapse;
            width: 100%;
        }

        p {
            font-size: 13px;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4298f5;
            color: white;
        }
    </style>
</head>

<body>
    <div style="text-align:center">
        <table>
            <tr>
                <td style="width: 450px;">
                    <h4 style="margin-bottom: -20px;"> Kios Kayu </h4>
                    <h3 style="margin-bottom: -5px;"> Putra Mariyo</h3>
                    <p>Utara Pasar Tirtomoyo, Wonogiri</p>
                    <p>HP. 081329640988</p>
                </td>
                <td>
                    <p>Tanggal : <?= format_indo2($transaksi['waktu_transaksi']); ?> </p>
                    <?php if ($transaksi['type'] == "masuk") : ?>
                        <p>Transaksi barang masuk dari <?= $transaksi['nama_pengguna']; ?> </p>
                    <?php else : ?>
                        <p>Transaksi barang keluar kepada <?= $transaksi['nama_pengguna']; ?> </p>
                    <?php endif ?>
                    <?php if ($transaksi['keterangan'] == 'lunas') : ?>
                        <p>Keterangan : <b style="color: green;">LUNAS</b> </p>
                        <p>Kembalian : <?= rupiah($transaksi['kembalian']) ?></p>
                    <?php else : ?>
                        <p>Keterangan : <b style="color: red;">BELUM LUNAS</b> </p>
                        <p>Hutang: <?= rupiah($transaksi['kembalian']) ?></p>
                    <?php endif ?>
                </td>
            </tr>
        </table>
    </div>

    <table id="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <!-- <th>Konsumen </th> -->
                <th>Jumlah</th>
                <th>Harga</th>
                <!-- <th>Tanggal</th> -->
            </tr>
        </thead>
        <tbody>
            <?php $a = 1;
            foreach ($detals as $tr) : ?>

                <tr>
                    <td scope="row"><?= $a++; ?></td>
                    <td><?= $tr['nama_jenis'] . " " . $tr['nama_kayu']; ?></td>
                    <!-- <td><?= $tr['nama_pengguna']; ?></td> -->
                    <td><?= $tr['jumlah']; ?></td>
                    <td><?= $tr['total']; ?></td>
                    <!-- <td><?= format_indo2($tr['waktu_transaksi']); ?></td> -->
                </tr>
            <?php endforeach ?>
            <tr>
                <td><b> Total</b></td>
                <!-- <td></td> -->
                <td></td>
                <td></td>
                <td><b> <?= rupiah($total['total']); ?></b></td>
                <!-- <td></td> -->
            </tr>
        </tbody>
    </table>
</body>

</html>