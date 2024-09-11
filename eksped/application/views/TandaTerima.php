<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSM Trans Receipt</title>
    <style>
        .container {
            width: 700px;
            border: 2px solid green;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            width: 200px;
        }

        .addresses {
            margin-left: 110px;
            text-align: right;
            font-size: 12px;
        }

        .addresses strong {
            font-size: 14px;
        }

        .receipt-number {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        .content-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .content-table td {
            border: 1px solid #000;
            padding: 10px;
        }

        .sign {
            margin-top: 30px;
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <!-- Logo and Receipt Number Container -->
                <div>
                    <!-- Logo Image -->
                    <div class="logo">
                        <img src="<?= site_url('asset/backend/assets/img/logo-bsm.jpg'); ?>" alt="BSM Trans Logo" style="width: 150px; height: auto;">
                    </div>
                </div>

                <!-- Address Information -->
                <div class="addresses">
                    <strong>Pekalongan</strong><br>
                    Jl. Raya Pegumenanmas, Ruko Pegumenanmas No. 15-16<br>
                    Kec. Karangdadap, Pekalongan HP. 0856 0043 9100 - 0851 0959 1111<br>
                    <strong>Bandung</strong><br>
                    Jl. Terusan Pasir Koja Ruko No. 341/21 RT. 07 RW. 07<br>
                    Kec. Babakan, Kec. Babakan Ciparay Kota Bandung Telp. (022) 6034810
                </div>
            </div>
        </div>


        <!-- Receipt Number -->
        <div class="receipt-number" style="margin-top: 20px; margin-bottom: 20px;"> <!-- Added margin-bottom to create space -->
            <strong>Receipt No:</strong> <span><?= $package['no_package'] ?></span>
        </div>

        <!-- Content Table -->
        <table class="content-table" style="margin-top: 50px;"> <!-- Optional: Additional margin-top for the table -->
            <tr>
                <td><strong>Penerima:</strong></td>
                <td colspan="2"><?= $package['customer_name'] ?></td>
            </tr>
            <tr>
                <td><strong>Pengirim:</strong></td>
                <td colspan="2"><?php if (!empty($v_capacity)): ?>
                        <span class="text-sm"> <?= htmlspecialchars($v_capacity[0]->driver, ENT_QUOTES, 'UTF-8') ?> </span>
                    <?php else: ?>
                        <span class="text-sm"><b>( No data )</b></span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <?php
                $total_qty = 0; 

                if (!empty($v_package)) :
                    foreach ($v_package as $value) :
                        $total_qty += $value->qty; 
                    endforeach;
                endif;
                ?>

                <td><strong>Jumlah Koli:</strong> <?= $total_qty; ?> Pcs</td>
                <td><strong>Berat Kg:</strong> <?= $package['t_kg'] ?> kg</td>
                <td><strong>Rp:</strong>
                    <?php if (!empty($package['metode_pembayaran'])) : ?>
                        <?= $package['metode_pembayaran'] ?>
                    <?php else : ?>
                        N/A
                    <?php endif; ?>
                </td>
            </tr>

        </table>


        <!-- Signature -->
        <div class="sign">
            <p>Tanda Tangan Penerima</p><br><br><br>
            <span class="text-sm"><b>( <?= $package['customer_name'] ?> )</b></span>
        </div>

    </div>

</body>

</html>