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
                            <th>Indikasi Penyakit</th>
                            <th>Gejala 1</th>
                            <th>Gejala 2</th>
                            <th>Gejala 3</th>
                            <th>Gejala 4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i=0;
                            foreach ($gejala['gejala'] as $gj): 
                                $i++;
                        ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $gj['penyakit']; ?></td>
                            <td><?= $gj['gejala1']; ?></td>
                            <td><?= $gj['gejala2']; ?></td>
                            <td><?= $gj['gejala3']; ?></td>
                            <td><?= $gj['gejala4']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->