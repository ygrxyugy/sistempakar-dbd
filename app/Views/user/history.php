<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <!-- DataTales Example -->
    <?php if(session()->getFlashdata('msg')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('msg'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gejala</th>
                            <th>Indikasi Penyakit</th>
                            <th>Waktu Pemeriksaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        <?php foreach ($history as $hs): ?>
                        <tr>
                            <?php if(!empty($hs)): ?>
                                <?php if($hs['nama'] == $user):?>
                                    <td><?= $i++;; ?></td>
                                    <td><?= $hs['gejala']; ?></td>
                                    <td><?= $hs['penyakit']; ?></td>
                                    <td><?= $hs['created_at']; ?></td>
                                <?php endif; ?>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>         
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->