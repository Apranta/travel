<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <h3>Data Perjalanan</h3>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('admin/tambah_paket') ?>" id="sample_editable_1_2_new" class="btn sbold green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Nama</th>
                                                <th> Jenis Perjalanan </th>
                                                <th> Jumlah Paket </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; foreach ($data as $value): ?>
                                            <tr class="odd gradeX">
                                                <td><?= ++$i ?></td>
                                                <td> <?= $value->nama_produk ?> </td>
                                                <td><?= $value->jenis ?></td>
                                                <td>
                                                    <?= count($this->Paket_m->get(['id_produk' => $value->id_produk])) ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?= base_url('admin/detail_paket/' . $value->id_produk) ?>" class="btn btn-circle btn-primary"><i class="fa fa-eye"></i> Detail</a>
                                                        <button onclick="_delete(<?= $value->id_produk ?>)" class="btn btn-circle btn-danger">Hapus</button>
                                                    </div>
                                                </td>
                                            </tr>    
                                            <?php endforeach ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
    </div>
</div>

<script>
    function _delete(id_produk){
        $.ajax({
                    url: "<?= base_url('admin/data_paket') ?>",
                    type: 'POST',
                    data: {
                        id: id_produk,
                        delete: true
                    },
                    success: function() {
                        // swal("Dihapus!", "Data Telah Dihapus.", "success");
                        location.reload();
                    }
                });
    }
</script>