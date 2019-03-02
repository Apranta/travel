<a href="javascript:;" class="page-quick-sidebar-toggler">
    <i class="icon-login"></i>
</a>
<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
    <div class="page-quick-sidebar">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Data Percakapan
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                <div class="page-quick-sidebar-list" style="position: relative; overflow: hidden; width: auto; height: 551px;">
                    <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list" data-height="551" data-initialized="1" style="overflow: hidden; width: auto; height: 551px;">
                        <ul class="media-list list-items">
                            <?php foreach($user as $data ) : ?>
                            <li class="media" onclick="chat(<?= $data->id_user ?>);">
                                <img class="media-object" src="<?= base_url('assets/default-user.png') ?>" alt="a">
                                <div class="media-body">
                                    <h4 class="media-heading"><?= $data->nama ?></h4>
                                    <!-- <div class="media-heading-sub"> Project Manager </div> -->
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 347.767px;">
                    </div>
                    <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(221, 221, 221); opacity: 0.2; z-index: 90; right: 1px;">
                    </div>
                </div>
                <div class="page-quick-sidebar-item">
                    <div class="page-quick-sidebar-chat-user">
                        <div class="page-quick-sidebar-nav">
                            <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                            <i class="icon-arrow-left"></i>Back</a>
                        </div>
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 446px;">
                            <div class="page-quick-sidebar-chat-user-messages" data-height="446" data-initialized="1" style="overflow: hidden; width: auto; height: 446px;" id="isi_chat">
                                
                            </div>
                            <div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 294.254px;">
                            </div>
                            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;">
                            </div>
                        </div>
                        <div class="page-quick-sidebar-chat-user-form">
                                <form id="form_chat">
                            <div class="input-group">
                                    <input type="text" name="pesan" id="pesan" class="form-control" placeholder="Type a message here...">
                                    <input type="hidden" name="id_penerima" id="id_penerima">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn green" id="btn_submit">
                                        <i class="fa fa-send"></i>
                                        </button>
                                    </div>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
            $(document).ready(function()
            {
                setInterval(function(){
                    id = $('#id_penerima').val();
                    console.log(id);
                    chat(id);
                }, 5000);
                $("#btn_submit").click(function(){
                    console.log($("form").serialize());
                    var id_penerima= $('#id_penerima').val();
                    var pesan= $('#pesan').val();

                    console.log(pesan + id_penerima);
                    $.ajax({
                        url: "<?= base_url('user/chat') ?>",
                        type: 'POST',
                        data: {
                            id_penerima: $('#id_penerima').val(),
                            pesan: $('#pesan').val(),
                            kirim: true
                        },
                        success: function(data) {
                            // console.log(data);
                            $('#isi_chat').append(data);
                        }
                  });
                });
            })
            function chat(id){
                    $('#id_penerima').val(id);
                            $('#isi_chat').html('');
                    // console.log($('id_penerima').val(id));
                    $.ajax({
                        url: "<?= base_url('user/chat') ?>",
                        type: 'POST',
                        data: {
                            id: id,
                            get: true
                        },
                        success: function(data) {
                            // console.log(data);
                            $('#isi_chat').html(data);
                        }
                  });
                }
        </script>