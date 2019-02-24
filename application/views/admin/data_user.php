<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <h3>Data User</h3>
                                </div>
                                <div class="portlet-body">
                                    
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Username</th>
                                                <th> Nama</th>
                                                <th> Email</th>
                                                <th> Kontak </th>
                                                <th> Alamat </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; foreach ($data as $value): ?>
                                            <tr class="odd gradeX">
                                                <td><?= ++$i ?></td>
                                                <td> <?= $value->username ?> </td>
                                                <td> <?= $value->nama ?></td>
                                                <td><?= $value->email ?></td>
                                                <td> <?= $value->kontak ?> </td>
                                                <td> <?= $value->alamat ?> </td>
                                            </tr>    
                                            <?php endforeach ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
    </div>
</div>