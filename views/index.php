<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12 animated fadeIn">
                <div class="_buttons tw-mb-2 sm:tw-mb-4">

                    <a href="<?php echo admin_url('bookstack/connect_document'); ?>" class="btn btn-primary mright5 <?php if (!$check) echo 'disabled' ?>">
                        <i class="fa-solid fa-diamond-turn-right"></i>
                        <?php echo _l('Kết nối documents'); ?>
                    </a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-default mright5" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa-sharp fa-solid fa-gear"></i>
                        <?php echo _l('Cấu hình'); ?>
                    </button>

                    <?php
                    if ($check) {
                        echo '<i class="fa-sharp fa-solid fa-arrows-rotate"></i> Đã đồng bộ người dùng';
                    } else {
                        echo '<i class="fa-sharp fa-solid fa-arrows-rotate"></i> Chưa đồng bộ người dùng';
                    }

                    ?>

                </div>

                <div class="panel_s">
                    <div class="panel-heading">
                        <h4 class="panel-title tw-mt-0 tw-font-semibold tw-text-lg tw-text-neutral-700">
                            BookStack Integration
                        </h4>
                    </div>
                    <div class="panel-body">
                        <iframe class="col-md-12" style=" height: 2000px;" src=" <?= admin_url('bookstack/guide') ?>"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    Cấu hình
                </h4>
            </div>
            <?php echo form_open(admin_url('bookstack/save_user')); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mail đăng nhập</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?= $email ?>">
                            <small id="emailHelp" class="form-text text-muted">Điền email đã đăng kí ở document</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <small id="emailHelp" class="form-text text-muted">Điền mật khẩu đã đăng kí ở document</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php init_tail(); ?>
</body>

</html>