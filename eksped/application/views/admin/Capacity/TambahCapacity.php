<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Process</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Add Process Data</h6>
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

<div class="d-flex justify-content-center">
    <div class="col-lg-10 col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
            <div class="row">
                <div class="col-7 align-items-center pl-4">
                    <h4 class="mb-0">Create Schedule Process</h4>
                    <span class="text-sm mb-0 text-end">Form to create a new Process data</span>
                </div>
            </div>
            <div class="d-flex pt-4" method="post">
                <div class="col-8">
                    <div class="card border-0 d-flex p-4 pt-0 mb-2 bg-gray-100">
                    <form class="pt-4" action="<?= site_url('admin/tambahcapacity'); ?>" method="post">
                        <div class="row d-flex">
                            <div class="col-6">
                            <span>Schedule</span></br>
                            <div class="input-group input-group-dynamic mb-4">
                                <label class="form-label"></label>
                                <input type="date" name="schedule" class="form-control">
                            </div>
                            </div>

                            <div class="col-5 pl-5">
                                <div class="pb-2">Pengirim</div>
                                <span>
                                <select name="id_driver" data-style="btn btn-link" data-live-search="true" style="width: 100%;" required>
                                    <option disabled selected>Pilih Pengirim</option>
                                    <?php if (!empty($driver)) : $i = 1; foreach ($driver as $value) : ?>
                                        <option value="<?= $value->id_driver; ?>"><?= $value->driver; ?></option> 
                                    <?php endforeach; endif; ?>
                                </select>
                                </span>
                            </div>
                        </div>

                        <!-- <div class="row d-flex">
                            <div class="col-5">
                                <div class="pb-2">Truck</div>
                                <span>
                                <select name="id_truck" data-style="btn btn-link" data-live-search="true" style="width: 100%;" required>
                                    <option disabled selected>Pilih Truck</option>
                                    <?php if (!empty($truck)) : $i = 1; foreach ($truck as $value) : ?>
                                        <option value="<?= $value->id_truck; ?>"><?= $value->truck; ?></option> 
                                    <?php endforeach; endif; ?>
                                </select>
                                </span>
                            </div>
                            <div class="col-5 pl-5">
                                <div class="pb-2">Driver</div>
                                <span>
                                <select name="id_driver" data-style="btn btn-link" data-live-search="true" style="width: 100%;" required>
                                    <option disabled selected>Pilih Driver</option>
                                    <?php if (!empty($driver)) : $i = 1; foreach ($driver as $value) : ?>
                                        <option value="<?= $value->id_driver; ?>"><?= $value->driver; ?></option> 
                                    <?php endforeach; endif; ?>
                                </select>
                                </span>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-4">
                    <div class="p-2">
                        <span>Create and save this data?</span></br>
                    </div>
                    <div class="d-flex">
                        <div class="pt-2 pl-2">
                            <a class="btn btn-outline-dark btn-sm mb-0" href="<?= site_url('admin/capacity'); ?>">Back</a>
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
  $("select").select2();
});
</script>