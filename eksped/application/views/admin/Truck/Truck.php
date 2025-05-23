<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Truck</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Truck</h6>
            </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <h6 class="text-sm font-weight-bolder mb-0">BSM Trans Expedisi & Courier</h6>

            </div>
        </div>
    </nav>
</br>
<div class="container-fluid py-4 pt-0">
    <div class="card-header p-0 w-75 position-fixed mt-n4 mx-2 z-index-2">
        <div class="shadow-dark border-radius-lg d-flex px-5 pt-4 pb-3">
            <div class="col-8 d-flex align-items-center"> 
                    <i class="material-icons pr-3">task</i>
                      <h6 class="mb-0">Truck Data</h6>
            </div>
            <div class="col-4 text-end">
                <a href="<?= site_url('admin/truck/addtruck'); ?>" class="btn btn-info btn-sm mb-0" title="Add Customers">Add Truck</a>
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
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tuck</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No Plate</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Max Capacity</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Max Volume</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                        </tr>
                    </thead>
                    <tbody class="pl-3">
                    <?php if (!empty($truck)) : $i = 1; foreach (array_reverse($truck) as $value) : ?>
                        <tr>
                        <td>
                        <div class="d-flex pl-3">
                            <div class="my-auto">
                                <h6 class="mb-0 text-sm"> <?= $i++; ?></h6>
                            </div>
                        </div>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= $value->truck; ?></span>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= $value->no_plate; ?></span>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= $value->bmax; ?> kg</span>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= $value->capacity; ?> m&sup3</span>
                        </td>
                        <td class="pl-4">
                        <a href="<?= site_url('admin/truck/'.$value->id_truck.'/update'); ?>" rel="tooltip" title="delete" class="text-sm font-weight-bold text-info">
                        <i class="material-icons text-sm">edit</i> Edit </a>
                        <a href="<?= site_url('admin/deletetruck/'.$value->id_truck.''); ?>" rel="tooltip" title="delete" class="text-sm font-weight-bold text-danger">
                        <i class="material-icons text-sm">delete</i> Delete </a>
                        </td>
                        </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>