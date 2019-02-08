<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <h3>Data Pemesanan</h3>
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
                                                <th> Status </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; foreach ($data as $value): ?>
                                            <tr class="odd gradeX">
                                                <td><?= ++$i ?></td>
                                                <td> <?= $this->User_m->get_row(['id_user' => $value->customer_id])->nama ?> </td>
                                                <td> <?= $this->Produk_m->get_row(['id_produk' => $this->Paket_m->get_row(['id_paket' => $value->id_paket])->id_produk])->nama_produk ?></td>
                                                <td><?= $value->order_date ?></td>
                                                <td>
                                                    <?= $value->qty ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                    switch ($value->payment_status) {
                                                        case 'paid':
                                                            // code...
                                                            echo '<label class="label label-success"> Sudah Dibayar </label>';
                                                            break;
                                                        case 'cancel':
                                                            // code...
                                                            echo '<label class="label label-danger"> Dibatalkan </label>';
                                                            break;
                                                        default:
                                                            echo '<label class="label label-warning"> Menunggu Pembayaran </label>';
                                                            break;
                                                    } ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?= base_url('admin/pemesanan_detail/' . $value->order_id) ?>" class="btn btn-circle btn-primary"><i class="fa fa-eye"></i> Detail</a>
                                                       
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