<div class="row">
   <div class="col-md-12">
      <div class="portlet light bordered">
         <div class="portlet-title">
            <h3>Detail <?= $data->nama_produk ?></h3>
         </div>
         <div class="portlet-body">
            <div class="row">
               <div class="col-md-6">
                  <h4>Deskripsi</h4>
                  <p><?= $data->deskripsi ?></p>
               </div>
               <div class="col-md-6">
                  <h4>Jadwal</h4>
                  <p><?= $data->jadwal ?></p>
               </div>
            </div>
         </div>
         <div class="portlet-footer">
            <button onclick="selesai(<?= $data->id_produk ?>)" class="btn btn-primary">Konfirmasi Perjalanan Selesai</button>
         </div>
         
      </div>
      <div class="portlet light bordered">
         
         <div class="portlet-body">
            <div class="table-toolbar">
               <div class="row">
                  <div class="col-md-6">
                     <div class="btn-group">
                        <a href="<?= base_url('admin/tambah_jenis_paket/' . $data->id_produk) ?>" id="sample_editable_1_2_new" class="btn sbold green"> Add New <i class="fa fa-plus"></i>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
               <thead>
                  <tr>
                     <th> # </th>
                     <th> Nama Paket </th>
                     <th> Deskripsi </th>
                     <th> Harga </th>
                     <th> Actions </th>
                  </tr>
               </thead>
               <tbody> <?php $i=0; foreach ($paket as $value): ?> <tr class="odd gradeX">
                  <td><?= ++$i ?></td>
                  <td> <?= $value->nama_paket ?> </td>
                  <td><?= $value->deskripsi ?></td>
                  <td> <?= $value->harga ?> </td>
                  <td>
                     <div class="btn-group">
                        <a href="<?= base_url('admin/edit_jenis_paket/' . $value->id_paket) ?>" class="btn btn-circle btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-circle btn-danger">Hapus</button>
                     </div>
                  </td>
               </tr> <?php endforeach ?> </tbody>
            </table>
         </div>
      </div>


      <div class="portlet light bordered">
         <div class="portlet-title">
            Data Pemesanan Perjalanan
         </div>
         <div class="portlet-body">
            
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Nama Pemesan</th>
                                                <th> Paket Perjalanan</th>
                                                <th> Tanggal Keberangkatan </th>
                                                <th> Jumlah </th>
                                                <th> Status Perjalanan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; 
                                            foreach ($paket as $p) :
                                             foreach ($this->Order_m->get(['id_paket' => $p->id_paket]) as $value): ?>
                                            <tr class="odd gradeX">
                                                <td><?= ++$i ?></td>
                                                <td> <?= $this->User_m->get_row(['id_user' => $value->customer_id])->nama ?> </td>
                                                <td> <?= $this->Produk_m->get_row(['id_produk' => $this->Paket_m->get_row(['id_paket' => $value->id_paket])->id_produk])->nama_produk ?></td>
                                                <td><?= $this->tanggal->convert_date($value->order_date) ?></td>
                                                <td>
                                                    <?= $value->qty ?>
                                                </td>
                                                <td>
                                                    <?=
                                                      $value->status_perjalanan
                                                    ?>
                                                </td>
                                            </tr>    
                                            <?php endforeach;endforeach; ?>
                                            
                                        </tbody>
                                    </table>
         </div>
      </div>
   </div>
</div>

<script >
   function selesai(id){
      $.ajax({
            url: "<?= base_url('admin/data_paket') ?>",
            type: 'POST',
            data: {
                id: id,
                konfirm: true
            },
            success: function() {
                location.reload();
            }
      });
   }
</script>