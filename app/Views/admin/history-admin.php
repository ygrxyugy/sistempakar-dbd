<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Gejala</th>
                            <th>Indikasi Penyakit</th>
                            <th>Waktu Pemeriksaan</th>
                            <th>Data Pengguna</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        <?php foreach ($history['history'] as $hs): ?>
                        <tr>
                            <?php if(!empty($hs)): ?>
                                <td><?= $i++;; ?></td>
                                <td><?= $hs['nama']; ?></td>
                                <td><?= $hs['gejala']; ?></td>
                                <td><?= $hs['penyakit']; ?></td>
                                <td><?= $hs['created_at']; ?></td>
                                <td class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary tampilModalLihatProfil" data-toggle="modal" data-target="#lihatProfilModal" data-id="<?= $hs['id']; ?>">
                                    Lihat
                                    </button>
                                </td>
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