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
                                                    <button class="btn btn-circle btn-primary"><i class="fa fa-eye"></i></button>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <?php if ($value->status == 'menunggu'): ?>
                                                            <button class="btn btn-success">Konfirmasi Pembayaran</button>
                                                        <?php else : ?>
                                                            <button class="btn btn-danger">Batalkan Pembayaran</button>
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