<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Package</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Add Package Data</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <h6 class="text-sm font-weight-bolder mb-0"></h6>
            </div>
        </div>
</nav>
</br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>


<div class="d-flex justify-content-center">
    <div class="col-lg-10 col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-7 align-items-center pl-4">
                        <h4 class="mb-0">Create Package Data</h4>
                        <span class="text-sm mb-0 text-end">Form to create a new package data</span>
                    </div>
                </div>
                <div class="d-flex pt-4" method="post">
                    <div class="col-8">
                        <div class="card border-0 d-flex p-4 pt-0 mb-2 bg-gray-100">
                            <form class="pt-4" action="<?= site_url('admin/addPackage'); ?>" method="post">
                                <div class="row d-flex">
                                    <div class="col-6">
                                        <span>Nama Penerima</span></br>
                                        <div class="input-group input-group-dynamic mb-4">
                                            <label class="form-label"></label>
                                            <input type="text" name="customer_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-5 pl-3">
                                        <span>No Tlp Penerima</span></br>
                                        <div class="input-group input-group-dynamic mb-4">
                                            <label class="form-label"></label>
                                            <input type="number" name="phone" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-flex">
                                    <div class="col-6">
                                        <span>Tanggal Input</span></br>
                                        <div class="input-group input-group-dynamic mb-4">
                                            <label class="form-label"></label>
                                            <input type="date" name="date" class="form-control">
                                        </div>
                                    </div>



                                </div>

                                <div class="row d-flex">
                                    <div class="col-5 pl-3">
                                        <span>Provinsi</span></br>
                                        <span>
                                            <select id="province-dropdown" name="id_provinsi" style="width: 100%;" required>
                                                <option selected>Pilih Provinsi</option>
                                                <?php if (!empty($provinsi)) : ?>
                                                    <?php foreach ($provinsi as $value) : ?>
                                                        <option value="<?= $value->id_provinsi; ?>"><?= htmlspecialchars($value->provinsi, ENT_QUOTES, 'UTF-8'); ?></option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option disabled>No provinces available</option>
                                                <?php endif; ?>
                                            </select>
                                        </span>
                                    </div>

                                    <div class="col-5 pl-3">
                                        <span>Kota</span></br>
                                        <span>
                                            <select id="city-dropdown" name="id_kota" style="width: 100%;" required>
                                                <option selected>Pilih Kota</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>

                                </br><span>Alamat Lengkap</span></br>
                                <div class="input-group input-group-dynamic mb-4">
                                    <label class="form-label"></label>
                                    <input type="hidden" name="pstatus" value="1">
                                    <textarea type="textarea" name="address" class="form-control"></textarea>
                                </div>

                                <label>Metode Pembayaran:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="tunai" value="tunai" checked>
                                    <label class="form-check-label" for="tunai">
                                        Tunai
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="transfer" value="transfer">
                                    <label class="form-check-label" for="transfer">
                                        Transfer
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="hutang" value="hutang">
                                    <label class="form-check-label" for="hutang">
                                        Hutang
                                    </label>
                                </div>

                                <!-- Conditional Section for Hutang -->
                                <div id="hutangFields" style="display:none;">
                                    <!-- Jangka Waktu Pembayaran -->
                                    <label for="jangka_waktu">Jangka Waktu Pembayaran:</label>
                                    <select class="form-select" name="jangka_waktu" id="jangka_waktu">
                                        <option value="1">1 Bulan</option>
                                        <option value="2">2 Bulan</option>
                                        <option value="3">3 Bulan</option>
                                        <option value="manual">Manual</option>
                                    </select>

                                    <!-- Conditional Field for Manual Option -->
                                    <div id="manualHutangFields" style="display:none;">
                                        <label for="jumlah_hutang">Jumlah Hutang:</label>
                                        <input type="text" name="jumlah_hutang" id="jumlah_hutang" class="form-control" placeholder="Masukkan jumlah hutang">
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-2">
                            <span>Create and save this data?</span></br>
                        </div>
                        <div class="d-flex">
                            <div class="pt-2 pl-2">
                                <a class="btn btn-outline-dark btn-sm mb-0" href="">Back</a>
                            </div>
                            <div class="pt-2 pl-2">
                                <button class="btn btn-dark btn-sm mb-0" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#province-dropdown').select2({
                    placeholder: 'Select a province',
                    allowClear: true
                });

                $('#city-dropdown').select2({
                    placeholder: 'Select a city',
                    allowClear: true
                });

                // Handle the province dropdown change event
                $('#province-dropdown').change(function() {
                    var provinceId = $(this).val();
                    console.log('Selected Province ID:', provinceId);

                    $('#city-dropdown').empty().append('<option disabled>Loading...</option>');

                    if (provinceId) {
                        $.ajax({
                            url: '/eksped/admin/get_cities_by_province',
                            type: 'POST',
                            data: {
                                id_provinsi: provinceId
                            },
                            dataType: 'json', // Specify data type as JSON
                            success: function(response) {
                                console.log('Response:', response);
                                $('#city-dropdown').empty().append('<option disabled selected>Pilih Kota</option>');

                                if (Array.isArray(response) && response.length > 0) {
                                    $.each(response, function(index, city) {
                                        $('#city-dropdown').append(
                                            $('<option>', {
                                                value: city.id_kota,
                                                text: city.kota
                                            })
                                        );
                                    });
                                } else {
                                    $('#city-dropdown').append('<option disabled>No cities available</option>');
                                }

                                // Reinitialize Select2 for city-dropdown after updating options
                                $('#city-dropdown').select2({
                                    placeholder: 'Select a city',
                                    allowClear: true
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error:', error);
                                $('#city-dropdown').empty().append('<option disabled>Error loading cities</option>');

                                // Reinitialize Select2 for city-dropdown after updating options
                                $('#city-dropdown').select2({
                                    placeholder: 'Select a city',
                                    allowClear: true
                                });
                            }
                        });
                    } else {
                        $('#city-dropdown').empty().append('<option disabled selected>Pilih Kota</option>');
                    }
                });
            });

            // Toggle hutang fields
            document.querySelectorAll('input[name="payment_method"]').forEach((radio) => {
                radio.addEventListener('change', function() {
                    if (this.value === 'hutang') {
                        document.getElementById('hutangFields').style.display = 'block';
                    } else {
                        document.getElementById('hutangFields').style.display = 'none';
                    }
                });
            });

            // Toggle manual hutang fields
            document.getElementById('jangka_waktu').addEventListener('change', function() {
                if (this.value === 'manual') {
                    document.getElementById('manualHutangFields').style.display = 'block';
                } else {
                    document.getElementById('manualHutangFields').style.display = 'none';
                }
            });

            // Format input as Rupiah
            function formatRupiah(amount) {
                return amount.replace(/[^,\d]/g, '').toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }

            // Apply Rupiah formatting on typing in "Jumlah Hutang"
            document.getElementById('jumlah_hutang').addEventListener('keyup', function(e) {
                this.value = formatRupiah(this.value);
            });
        </script>