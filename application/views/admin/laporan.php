<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <h3>Laporan Data Pemesanan</h3>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-inline" action="<?= base_urL('admin/laporan') ?>" method="get" accept-charset="utf-8">
                                <div class="form-group">
                                    <label>Pilih Bulan</label>
                                    <select name="bulan" class="form-control">
                                    <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <option value="<?= $i ?>"><?= date("F", mktime(0, 0, 0, $i, 10)) ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="aaa">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Nama Pemesan</th>
                            <th> Paket Perjalanan</th>
                            <th> Tanggal Keberangkatan </th>
                            <th> Jumlah </th>
                            <th> Status </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($data as $value): ?>
                        <tr class="odd gradeX">
                            <td><?= ++$i ?></td>
                            <td> <?= $this->User_m->get_row(['id_user' => $value->customer_id])->nama ?> </td>
                            <td> <?= $this->Produk_m->get_row(['id_produk' => $this->Paket_m->get_row(['id_paket' => $value->id_paket])->id_produk])->nama_produk ?></td>
                            <td><?= $this->tanggal->convert_date($value->order_date) ?></td>
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
                        </tr>
                        <?php endforeach ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $("#aaa").DataTable({
        dom: 'Bfrtip',
        buttons: [
            { 
                extend: 'excel', 
                className: 'btn green btn-circle btn-outline right' ,
                text: "<i class='fa fa-download'></i> Download Excel" 
            }
        ]
    });
</script>