<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
    /* Ensure the backdrop is semi-transparent */
    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0.3);
        /* Gray background with 30% opacity */
        transition: opacity 0.3s ease;
        /* Smooth transition for opacity */
    }

    /* Ensure the backdrop does not have a background when shown */
    .modal-backdrop.show {
        background-color: rgba(0, 0, 0, 0.3);
        /* Ensure it remains semi-transparent */
    }

    /* Make modal transitions smooth */
    .modal.fade .modal-dialog {
        transition: transform 0.3s ease;
    }

    .modal.show .modal-dialog {
        transform: translate(0, 0);
    }

    .modal.fade .modal-dialog {
        transform: translate(0, -50px);
    }

    /* Center the modal in the viewport */
    .modal-dialog {
        position: relative;
        top: 10%;
        transform: translate(-50%, 0);
        /* Center horizontally */
        width: 80%;
        /* Adjust width as needed */
        max-width: 800px;
        /* Maximum width to ensure it's not too wide */
    }

    /* Make the modal content adapt to landscape layout */
    .modal-content {
        height: 80vh;
        /* Set height to make it landscape */
        width: 100%;
        /* Ensure the content fills the modal dialog */
    }

    /* Optional: Adjust modal header and footer alignment */
    .modal-header,
    .modal-footer {
        text-align: center;
    }

    /* Ensure modal body is scrollable if content overflows */
    .modal-body {
        overflow-y: auto;
        /* Enable vertical scrolling */
    }
</style>



<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Package</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Set Package Volume</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <h6 class="text-sm font-weight-bolder mb-0">BSM Trans Expedisi & Courier</h6>
            </div>
        </div>
    </div>
</nav>
</br>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>


<div class="container-fluid py-4 pt-0">
    <div class="card-header p-0 mt-n4 mx-2 z-index-2 w-98">
        <div class="shadow-dark border-radius-lg d-flex px-5 pt-4 pb-3">
            <div class="col-8 d-flex align-items-center">
                <i class="material-icons pr-3">fit_screen</i>
                <h6 class="mb-0">Package Volume</h6>
            </div>
            <div class="col-4 text-end">
                <a href="<?= site_url('admin/package/addpackage'); ?>" class="btn btn-info btn-sm mb-0" title="Add Customers">Add Package</a>
            </div>
        </div>
    </div>
</div>
<div class="container py-4 pl-5 pr-5">
    <div class="row">
        <div class="card">
            <div class="card-body pt-4 p-3">
                <div class="table-responsive p-0">
                    <table id="table-data" class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Receipt</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Customer</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No Telp</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Route Point</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Weight</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Date</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $lastValue = NULL; ?>
                            <?php if (!empty($package)) : $i = 1;
                                foreach (array_reverse($package) as $value) : ?>
                                    <?php $lastValue = $value; ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex pl-3">
                                                <h6 class="mb-0 text-sm font-weight-bold"><?= $i++; ?></h6>
                                            </div>
                                        </td>
                                        <td><span class="text-sm font-weight-bold"><?= $value->no_package; ?></span></td>
                                        <td><span class="text-sm font-weight-bold"><?= $value->customer_name; ?></span></td>
                                        <td><span class="text-sm font-weight-bold"><?= $value->phone; ?></span></td>
                                        <td><span class="text-sm font-weight-bold"><?= $value->kota; ?></span></td>
                                        <td><span class="text-sm font-weight-bold"><?= $value->t_kg; ?> kg</span></td>
                                        <td><span class="text-sm font-weight-bold"><?= date("d-m-Y", strtotime($value->date)); ?></span></td>
                                        <td class="pl-4">
                                            <?php if ($value->pstatus == 1) : ?>
                                                <a href="<?= site_url('admin/package/' . $value->id_package . '/view'); ?>" rel="tooltip" title="detail" class="badge btn-info btn-sm mb-0">
                                                    Add Item</a>
                                            <?php elseif ($value->pstatus == 3) : ?>
                                                <a href="<?= site_url('admin/package/' . $value->id_package . '/view'); ?>" rel="tooltip" title="detail" class="badge btn-warning btn-sm mb-0">
                                                    Returned</a>
                                            <?php elseif ($value->pstatus == 4) : ?>
                                                <button type="button"
                                                    class="btn btn-success btn-sm open-modal"
                                                    id="btnTerkirim<?= $value->id_package; ?>"
                                                    data-id="<?= $value->id_package; ?>"
                                                    data-status="terkirim"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalTerkirim<?= $value->id_package; ?>"
                                                    onclick="sendPackageId(<?= $value->id_package; ?>)">
                                                    Terkirim
                                                </button>
                                            <?php else : ?>
                                                <button type="button"
                                                    class="btn btn-info btn-sm open-modal"
                                                    id="btnProcess<?= $value->id_package; ?>"
                                                    data-id="<?= $value->id_package; ?>"
                                                    data-status="process"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalProcess<?= $value->id_package; ?>"
                                                    onclick="sendPackageId(<?= $value->id_package; ?>)">
                                                    Process
                                                </button>
                                            <?php endif; ?>



                                        </td>
                                    </tr>
                            <?php endforeach;
                            endif; ?>
                        </tbody>
                    </table>

                    <?php foreach ($package as $value) : ?>
                        <!-- Modal Terkirim -->
                        <div class="modal fade" id="modalTerkirim<?= $value->id_package; ?>" tabindex="-1" aria-labelledby="modalTerkirimLabel<?= $value->id_package; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTerkirimLabel<?= $value->id_package; ?>">Terkirim Package Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Package Header Section -->
                                        <p class="mb-4">Details for package: <strong><?= $value->no_package; ?></strong>
                                        <div class="col-3 text-end d-flex">
                                            <div class="pl-2 pr-3">
                                                <a href="<?= site_url('admin/printSuratJalan/' . $value->id_package . ''); ?>" class="badge btn-dark mb-0">Surat Jalan <i class="material-icons text-sm">open_in_new</i></a>
                                            </div>
                                            <div class="pr-3">
                                                <a href="<?= site_url('admin/printTandaTerima/' . $value->id_package . ''); ?>" class="badge btn-dark mb-0">Tanda Terima <i class="material-icons text-sm">open_in_new</i></a>
                                            </div>
                                        </div>
                                        </p>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="list-group">
                                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                                        <div class="row w-100">
                                                            <div class="col-md-6">
                                                                <span class="mb-3 text-sm">Receipt No: <b><?= $value->no_package ?></b></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="mb-3 text-sm">Customers: <b><?= $value->customer_name ?></b></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="mb-3 text-sm">Phone: <b><?= $value->phone ?></b></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="mb-3 text-sm">Kota: <b><?= $value->kota ?></b></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="mb-3 text-sm">Total Berat: <b><?= $value->t_kg ?> kg</b></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="mb-3 text-sm">Address: <b><?= $value->address ?></b></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="mb-3 text-sm">Metode Bayar: <b><?= $value->metode_pembayaran ?></b></span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Item List Section -->
                                        <div class="card-body p-3 mt-4">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center justify-content-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Product Name</th>
                                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Qty</th>
                                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Berat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="modalTerkirimBody<?= $value->id_package; ?>">
                                                        <!-- Data will be inserted here via AJAX -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>



                    <?php foreach ($package as $value) : ?>
                        <!-- Modal Process -->
                        <div class="modal fade" id="modalProcess<?= $value->id_package; ?>" tabindex="-1" aria-labelledby="modalProcessLabel<?= $value->id_package; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalProcessLabel<?= $value->id_package; ?>">Process Package Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Package Header Section -->
                                        <p class="mb-4">Details for package: <strong><?= $value->no_package; ?></strong>
                                        <div class="col-3 text-end d-flex">
                                            <div class="pl-2 pr-3">
                                                <a href="<?= site_url('admin/printSuratJalan/' . $value->id_package . ''); ?>" class="badge btn-dark mb-0">Surat Jalan <i class="material-icons text-sm">open_in_new</i></a>
                                            </div>
                                            <div class="pr-3">
                                                <a href="<?= site_url('admin/printTandaTerima/' . $value->id_package . ''); ?>" class="badge btn-dark mb-0">Tanda Terima <i class="material-icons text-sm">open_in_new</i></a>
                                            </div>
                                        </div>
                                        </p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="list-group">
                                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                                        <div class="row w-100">
                                                            <div class="col-md-6">
                                                                <span class="mb-3 text-sm">Receipt No: <b><?= $value->no_package ?></b></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="mb-3 text-sm">Customers: <b><?= $value->customer_name ?></b></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="mb-3 text-sm">Phone: <b><?= $value->phone ?></b></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="mb-3 text-sm">Kota: <b><?= $value->kota ?></b></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="mb-3 text-sm">Total Berat: <b><?= $value->t_kg ?> kg</b></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="mb-3 text-sm">Address: <b><?= $value->address ?></b></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="mb-3 text-sm">Metode Bayar: <b><?= $value->metode_pembayaran ?></b></span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Item List Section -->
                                        <div class="card-body p-3 mt-4">
                                            <div class="table-responsive p-0">
                                                <table id="table-process-data<?= $value->id_package; ?>" class="table align-items-center justify-content-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Product Name</th>
                                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Qty</th>
                                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Berat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="modalProcessBody<?= $value->id_package; ?>">
                                                        <!-- Data will be inserted here via AJAX -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#table-data').DataTable();
    });

    document.addEventListener('hidden.bs.modal', function(event) {
        var backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) {
            backdrop.remove();
        }
    });

    // Function to handle opening the modal
    function sendPackageId(packageId) {
        console.log(packageId);

        // Find the button that was clicked and get its data-status attribute
        var button = $('button[data-id="' + packageId + '"]');
        var modalType = button.data('status'); // Get the data-status attribute value
        var tableBodySelector = modalType === 'terkirim' ? '#modalTerkirimBody' : '#modalProcessBody';
        var tableBody = $(tableBodySelector + packageId); // Adjust the selector to target tbody inside the modal

        // AJAX request
        $.ajax({
            url: '<?php echo site_url('admin/get_v_package_by_id'); ?>', // URL to your controller function
            type: 'POST',
            data: {
                id_package: packageId
            },
            success: function(response) {
                var data = JSON.parse(response); // Parse JSON response
                tableBody.empty(); // Clear existing content

                // Check if there is data
                if (data.v_package.length > 0) {
                    $.each(data.v_package, function(index, value) {
                        var row = '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + value.product_name + '</td>' +
                            '<td>' + value.qty + ' Pcs</td>' +
                            '<td>' + value.t_berat + ' Kg</td>' +
                            '</tr>';
                        tableBody.append(row);
                    });
                } else {
                    tableBody.append('<tr><td colspan="5" class="text-center">No data available</td></tr>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }
</script>



<!-- Bootstrap JS with Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.min.js"></script>