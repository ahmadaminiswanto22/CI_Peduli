<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf; ?></title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
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
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h3> Laporan PDF Catatan Perjalanan</h3>
    </div>
    <table id="table" class="table table-striped table-bordered" style="width:100%;">
        <thead>
            <tr class=" text-center">
                <th width="2%">No</th>
                <th width="15%">Tanggal</th>
                <th width="15%">Waktu</th>
                <th width="30%">Lokasi</th>
                <th width="20%">Suhu Tubuh</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //cetak laporan pdf
            $no = 1;
            $data = file('data/dataPerjalanan.txt', FILE_IGNORE_NEW_LINES);
            $user = $_SESSION['nik'] . "|" . $_SESSION['nama'];
            foreach ($data as $value) {
                $pecah = explode("|", $value);
                @$key = $pecah['1'] . "|" . $pecah['2'];
                if ($key == $user) {
            ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $pecah['3']; ?></td>
                        <td><?= $pecah['4']; ?></td>
                        <td><?= $pecah['5']; ?></td>
                        <td><?= $pecah['6']; ?> &#176; C</td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>