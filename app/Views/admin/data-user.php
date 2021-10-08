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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Waktu Pendaftaran</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                        <?php foreach ($AllUser as $all): ?>
                        <tr>
                            <?php if(!empty($all)): ?>
                                <td><?= $i++;; ?></td>
                                <td><?= $all['username']; ?></td>
                                <td><?= $all['email']; ?></td>
                                <?php if($all['active']==1): ?>
                                    <td>Aktif</td>
                                <?php endif; ?>
                                <?php if($all['active']==0): ?>
                                    <td>Nonaktif</td>
                                <?php endif; ?>
                                <td><?= $all['created_at']; ?></td>
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
<?php dd($all); ?>