<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Package</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Add User</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <h6 class="text-sm font-weight-bolder mb-0"></h6>
            </div>
        </div>
</nav>
</br>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>

<div class="d-flex justify-content-center">
    <div class="col-lg-10 col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-7 align-items-center pl-4">
                        <h4 class="mb-0">Create User Data</h4>
                        <span class="text-sm mb-0 text-end">Form to create a new user data</span>
                    </div>
                </div>
                <div class="d-flex pt-4">
                    <div class="col-8">
                        <div class="card border-0 d-flex p-4 pt-0 mb-2 bg-gray-100">
                            <form id="addUserForm" class="pt-4" action="<?= site_url('admin/addUser'); ?>" method="post">
                                <div class="row d-flex">
                                    <div class="col-6">
                                        <span>User</span><br />
                                        <div class="input-group input-group-dynamic mb-4">
                                            <label class="form-label"></label>
                                            <input type="text" name="user" class="form-control" minlength="3" required>
                                        </div>
                                    </div>
                                    <div class="col-5 pl-3">
                                        <span>Email</span><br />
                                        <div class="input-group input-group-dynamic mb-4">
                                            <label class="form-label"></label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-flex">
                                    <div class="col-6">
                                        <span>Password</span><br />
                                        <div class="input-group input-group-dynamic mb-4">
                                            <label class="form-label"></label>
                                            <input type="password" name="password" class="form-control" minlength="8" required>
                                        </div>
                                    </div>

                                    <div class="col-5 pl-3">
                                        <span>Role</span><br />
                                        <div class="input-group input-group-dynamic mb-4">
                                            <label class="form-label"></label>
                                            <select name="role" class="form-control" required>
                                                <option value="admin">Admin</option>
                                                <option value="driver">User</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row d-flex">
                                    <div class="col-6">
                                        <span>Cabang</span><br />
                                        <div class="input-group input-group-dynamic mb-4">
                                            <label class="form-label"></label>
                                            <input type="cabid" name="cabid" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-2">
                            <span>Create and save this data?</span><br />
                        </div>
                        <div class="d-flex">
                            <div class="pt-2 pl-2">
                                <a class="btn btn-outline-dark btn-sm mb-0" href="">Back</a>
                            </div>
                            <div class="pt-2 pl-2">
                                <button id="saveBtn" class="btn btn-dark btn-sm mb-0" type="button">Save</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <!-- Include SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            document.getElementById('saveBtn').addEventListener('click', function(event) {
                // Get the form element
                var form = document.getElementById('addUserForm');

                // Check if the form is valid
                if (form.checkValidity()) {
                    // Show the SweetAlert confirmation dialog
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to save this data?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, save it!',
                        width: '350px', // Adjust the width to make the dialog smaller
                        customClass: {
                            popup: 'small-swal-popup' // Add custom styling
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if confirmed
                        }
                    });
                } else {
                    // If form is invalid, show the validation errors
                    form.reportValidity();
                }
            });
        </script>


        <style>
            /* Add custom styling for smaller font and reduced padding */
            .small-swal-popup {
                font-size: 0.9rem;
                /* Reduce font size */
                padding: 1rem;
                /* Adjust padding */
            }
        </style>


        <script type="text/javascript">
            $(document).ready(function() {
                $("select").select2();
            });
        </script>