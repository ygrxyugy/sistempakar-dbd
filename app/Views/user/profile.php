<!-- Begin Page Content -->
<div class="container mb-4">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="card">
                <h2 class="card-header"><?= $title; ?></h2>
                <div class="card-body">
                    <?php if(session()->getFlashdata('msg')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('msg'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>
                    <!-- Page Heading -->
                    <div class="row justify-content-center mt-5">
                        <div class="col-sm-8 text-center">
                            <form class="text-left">
                                <?= csrf_field(); ?>
                                <!-- username -->
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="username" class="col-form-label">Username</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext" id="username" value=": <?= $user; ?>" style="width: 250px">
                                    </div>
                                </div>
                                <!-- nama lengkap -->
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="fullname" class="col-form-label">Nama Lengkap</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext" id="fullname" value=": <?= $nama; ?>" style="width: 250px">
                                    </div>
                                </div>
                                <!-- tempat tanggal lahir -->
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="ttl" class="col-form-label">Tempat, Tanggal Lahir</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext" id="ttl" value=": <?= $tempat_lahir; ?>, <?= $tanggal_lahir; ?>" style="width: 250px">
                                    </div>
                                </div>
                                <!-- jenis kelamin -->
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="gender" class="col-form-label">Jenis Kelamin</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext" id="gender" value=": <?= $gender; ?>" style="width: 250px">
                                    </div>
                                </div>
                                <!-- email -->
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="email" class="col-form-label">Email</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext" id="email" value=": <?= $email; ?>" style="width: 250px">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="alamat" class="col-form-label">Alamat</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext" id="alamat" value=": <?= $alamat; ?>" style="width: 250px">
                                    </div>
                                </div>

                                <div class="mt-4 d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary tampilModalEditProfil" data-toggle="modal" data-target="#editProfilModal" data-id="<?= $id; ?>">
                                    Update Profile
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->