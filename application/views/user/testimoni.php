<div class="row">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title">
                Testimonial
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Perjalanan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($testimoni as $t): ?>
                        <tr>
                            <td><?= $t->order_id ?></td>
                            <td><?= $this->Produk_m->get_row(['id_produk' => $this->Paket_m->get_row(['id_paket' => $t->id_paket])->id_produk])->nama_produk ?></td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#tambah" onclick="_sendId(<?= $t->order_id ?>);"> Kasih Testimoni</button>
                            </td>
                        </tr>
                        <?php endforeach ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="portlet light">
            <div class="portlet-title">
                Histori Testimonial
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Id Order</th>
                            <th> Testimonial</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($data as $value): ?>
                        <tr class="odd gradeX">
                            <td><?= ++$i ?></td>
                            <td> <?php
                                $order = $this->Order_m->get_row(['order_id' => $value->id_order]);
                                $nama = $this->Produk_m->get_row(['id_produk' => $this->Paket_m->get_row(['id_paket' => $order->id_paket])->id_produk])->nama_produk;
                            echo $nama; ?> </td>
                            <td><?= $value->testimonial ?></td>
                        </tr>
                        <?php endforeach ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
CKEDITOR.replace( 'editor1' );
CKEDITOR.replace( 'editor2' );
    function _sendId(id){
        $("#id_order").val(id);
        console.log(id);
    }
</script>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?=form_open_multipart('user/testimoni');  ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Testimoni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_order" id="id_order">
                <div class="form-group">
                    <label>Testimoni</label>
                    <textarea name="testimoni" rows="5" class="form-control" id="editor1"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>