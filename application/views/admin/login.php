
<div class="container" id="loginPanel">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2>เข้าสู่ระบบผู้ดูแล</h2>
            <hr />
            <div class="card">
                <div class="card-content">
                    <br/>
                    <form class="form-horizontal" id="loginForm" action="<?=base_url()?>admin/login" method="post">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">ชื่อผู้ใช้</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" id="username" placeholder="ชื่อผู้ใช้">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">รหัสผ่าน</label>
                            <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password" placeholder="รหัสผ่าน">
                            </div>
                        </div>
                        <br/>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if (isset($errorMessage)) {
?>

    <script>
        swal('<?=$errorMessage?>');
    </script>


<?php
    }
?>