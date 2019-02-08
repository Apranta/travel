<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <h3>Data Pembayaran</h3>
                                </div>
                                <div class="portlet-body">
                                    
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
                                        <thead>
                                            <tr>
                                                <th> Id Order </th>
                                                <th> Nama Pemesan</th>
                                                <th> Deposit</th>
                                                <th> Tanggal Pembayaran</th>
                                                <th> Bukti Pembayaran </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; foreach ($data as $value): ?>
                                            <tr class="odd gradeX">
                                                <td><?= $value->id_order?></td>
                                                <td> <?= $this->User_m->get_row(['id_user' => $this->Order_m->get_row(['order_id' => $value->id_order])->customer_id])->nama ?> </td>
                                                <td> <?= $value->deposit ?></td>
                                                <td><?= $value->pembayaran_date ?></td>
                                                <td>
                                                    <button class="btn btn-circle btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="gambar(<?= $value->id_order ?>)"><i class="fa fa-eye"></i></button>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <?php if ($value->status == 'menunggu'): ?>
                                                            <button class="btn btn-success" onclick="konfirm(<?= $value->id_order ?>)">Konfirmasi Pembayaran</button>
                                                        <?php else : ?>
                                                            <button class="btn btn-primary">Pembayaran Dikonfirmasi</button>
                                                        <?php endif ?>
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
            <img class="img img-responsive" id="imagee" width="100%">
        </center>
      </div>
    </div>
  </div>
</div>

<script >
    function gambar(id){
        console.log('<?= base_url("assets/bukti/") ?>' + '/' + id + '.jpg');
        $("#imagee").attr('src' , '<?= base_url("assets/bukti/") ?>' + '/' + id + '.jpg');
    }
    function konfirm(id){
        $.ajax({
            url: "<?= base_url('admin/pemesanan_detail') ?>",
            type: 'POST',
            data: {
                id: id,
                konfirm: true
            },
            success: function() {
                // swal("Dihapus!", "Data Telah Dihapus.", "success");
                location.reload();
            }
        });
    }
</script>