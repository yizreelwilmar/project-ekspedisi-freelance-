<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 70%;
            margin: 0 auto;
            border: 2px solid green;
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: red;
        }

        .address-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .address {
            width: 45%;
            font-size: 14px;
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid green;
            text-align: left;
        }

        .header {
            font-size: 20px;
            color: green;
            font-weight: bold;
        }

        .notes {
            font-size: 12px;
            color: red;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            color: gray;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Logo Image and Receipt Number -->
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <!-- Logo Image -->
            <div class="logo">
                <img src="<?= site_url('asset/backend/assets/img/logo-bsm.jpg'); ?>" alt="BSM Trans Logo" style="width: 150px; height: auto;">
            </div>

            <!-- Receipt Number -->
            <div class="receipt-number" style="text-align: right;">
                <strong>Receipt No:</strong> <span><?= $package['no_package'] ?></span>
            </div>
        </div>


        <!-- Title -->
        <h1>BSM Trans - EXPEDISI & COURIER</h1>

        <!-- Address Headers -->
        <div class="address-container">
            <div class="address">
                <strong>Pekalongan</strong><br>
                Jl. Raya Pegumenanmas, Ruko Pegumenanmas No. 15-16<br>
                Kec. Karangdadap, Pekalongan HP. 0856 0043 9100 - 0851 0959 1111
            </div>
            <div class="address">
                <strong>Bandung</strong><br>
                Jl. Terusan Pasir Koja Ruko No. 341/21 RT. 07 RW. 07<br>
                Kec. Babakan, Kec. Babakan Ciparay Kota Bandung Telp. (022) 6034810
            </div>
        </div>

        <table>
            <tr>
                <td colspan="2" class="header">Data Penerima</td>
                <td colspan="2" class="header">Data Pengirim</td>
            </tr>
            <tr>
                <td>Nama Penerima:</td>
                <td><?= $package['customer_name'] ?></td>
                <td>Nama Pengirim:</td>
                <td><?php if (!empty($v_capacity)): ?>
                        <span class="text-sm"> <?= htmlspecialchars($v_capacity[0]->driver, ENT_QUOTES, 'UTF-8') ?> </span>
                    <?php else: ?>
                        <span class="text-sm"><b>( No data )</b></span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>No. HP/Telp:</td>
                <td><?= $package['phone'] ?></td>
                <td>No. HP/Telp:</td>
                <td><?php if (!empty($v_capacity)): ?>
                        <span class="text-sm"> <?= htmlspecialchars($v_capacity[0]->phone, ENT_QUOTES, 'UTF-8') ?> </span>
                    <?php else: ?>
                        <span class="text-sm"><b>( No data )</b></span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>Kota:</td>
                <td><?= $package['kota'] . ',' . $package['address'] ?></td>
                <td>Email:</td>
                <td><?php if (!empty($v_capacity)): ?>
                        <span class="text-sm"> <?= htmlspecialchars($v_capacity[0]->email, ENT_QUOTES, 'UTF-8') ?> </span>
                    <?php else: ?>
                        <span class="text-sm"><b>( No data )</b></span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>Total Berat:</td>
                <td><?= $package['t_kg'] ?> kg</td>
            </tr>
            <tr>
                <td>Receipt No:</td>
                <td><?= $package['no_package'] ?></td>
            </tr>
            <tr>
                <td>Metode Bayar:</td>
                <td>
                    <?php if (!empty($package['metode_pembayaran'])) : ?>
                        <?= $package['metode_pembayaran'] ?>
                    <?php else : ?>
                        N/A
                    <?php endif; ?>
                </td>
            </tr>
        </table>


        <table id="table-data" class="table align-items-center justify-content-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Jenis Barang</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Qty</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Berat</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tanggal</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Metode Bayar</th>
                </tr>
            </thead>
            <tbody class="pl-3">
                <?php if (!empty($v_package)) : $i = 1;
                    foreach ($v_package as $value) : ?>
                        <tr>
                            <td>
                                <div class="d-flex pl-3">
                                    <div class="my-auto">
                                        <h6 class="mb-0 text-sm"><?= $i++; ?></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="pl-4">
                                <span class="text-sm font-weight-bold"><?= $value->product_name; ?></span>
                            </td>
                            <td class="pl-4">
                                <span class="text-sm font-weight-bold"><?= $value->qty; ?> Pcs</span>
                            </td>
                            <td class="pl-4">
                                <span class="text-sm font-weight-bold"><?= $value->t_berat; ?> Kg</span>
                            </td>
                            <td class="pl-4">
                                <span class="text-sm font-weight-bold"><?= date('d.m.y', strtotime($value->date)); ?></span>
                            </td>
                            <td class="pl-4">
                                <span class="text-sm font-weight-bold"><?= $value->metode_pembayaran; ?></span>
                            </td>
                        </tr>
                <?php endforeach;
                endif; ?>
            </tbody>
        </table>

        <!-- Signature Section -->
        <div class="signature-section mt-5">
            <table class="table table-borderless">
                <tr>
                    <td style="text-align: center;">
                        <span class="text-sm">Pengirim</span><br><br><br>
                        <?php if (!empty($v_capacity)): ?>
                            <span class="text-sm"><b>( <?= htmlspecialchars($v_capacity[0]->driver, ENT_QUOTES, 'UTF-8') ?> )</b></span>
                        <?php else: ?>
                            <span class="text-sm"><b>( No data )</b></span>
                        <?php endif; ?>
                    </td>

                    <td style="text-align: center;">
                        <span class="text-sm">Penerima</span><br><br><br>
                        <span class="text-sm"><b>( <?= $package['customer_name'] ?> )</b></span>
                    </td>
                </tr>
            </table>
        </div>


        <div class="notes">
            <p><strong>PERHATIAN:</strong> </p>
        </div>

        <div class="footer">
            Terima Kasih Sudah Menggunakan Paket BSM
        </div>
    </div>

</body>

</html>