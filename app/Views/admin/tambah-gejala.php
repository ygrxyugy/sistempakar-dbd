<!-- Begin Page Content -->
<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="card">
                <h2 class="card-header"><?= $title; ?></h2>
                <div class="card-body">
                    <form action="/admin/tambah-data-gejala/save" method="POST">
                        <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="penyakit">Nama Penyakit</label>
                                <input type="text" class="form-control" id="penyakit" name="penyakit"  placeholder="Masukkan Nama Penyakit">
                            </div>
                            <div class="form-group">
                                <label for="gejala1">Gejala 1</label>
                                <input type="text" class="form-control" id="gejala1" name="gejala1"  placeholder="Masukkan Gejala 1">
                            </div>
                            <div class="form-group">
                                <label for="gejala2">Gejala 2</label>
                                <input type="text" class="form-control" id="gejala2" name="gejala2"  placeholder="Masukkan Gejala 2">
                            </div>
                            <div class="form-group">
                                <label for="gejala3">Gejala 3</label>
                                <input type="text" class="form-control" id="gejala3" name="gejala3"  placeholder="Masukkan Gejala 3">
                            </div>
                            <div class="form-group">
                                <label for="gejala4">Gejala 4</label>
                                <input type="text" class="form-control" id="gejala4" name="gejala4"  placeholder="Masukkan Gejala 4">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->