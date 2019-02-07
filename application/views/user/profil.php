 <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light bordered">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <!-- <form role="form" action="#"> -->
                                                            <?= form_open('user/profil',['role' => 'form'] ); ?>
                                                            <div class="form-group">
                                                                <label class="control-label">Nama</label>
                                                                <input type="text" class="form-control" name="nama" value="<?=$data->nama ?>" /> </div>
                                                                <label class="control-label">Nomor Telepon</label>
                                                                <input type="text" name="kontak" class="form-control" value="<?=$data->kontak ?>" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Alamat</label>
                                                                <textarea class="form-control" rows="3" name="alamat"><?=$data->alamat ?></textarea>
                                                            </div>
                                                            <div class="margiv-top-10">
                                                                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END PRIVACY SETTINGS TAB -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>