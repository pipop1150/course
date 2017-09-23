<?php
session_start();
include "../application/config/config.php";
if (!isset($_SESSION['isAdminUser'])) {
    header('Location: '. $config['base_url']."login.php");
    exit;
}

// Query
require "../config/database.php";
$sql = "SELECT id, name, link, path FROM image_slide";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo "ERROR: Please contact admin";
    exit;
}

include "../application/config/config.php";
include "../module/header.php";


?>

<style>
    .vm {
        vertical-align: middle !important;
    }
</style>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?=$config['base_url'].'/admin.php'?>"></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="<?=$config['base_url'].'admin.php'?>">Admin Page</a></li>
      <li><a href="<?=$config['base_url'].'admin/question.php'?>">Quest Page</a></li>
      <li><a href="<?=$config['base_url'].'admin/answer.php'?>">Answer Page</a></li>
      <li><a href="<?=$config['base_url'].'admin/slide.php'?>">Slide Page</a></li>
    </ul>
  </div>
</nav>




<div class="container" id="questionPanel">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2>จัดการรูปภาพ Slide</h2>
            <hr />
            <div class="card">
                <div class="card-content">
                    <h3>
                        ข้อมูลรูปภาพ &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" id="addImage">เพิ่มรูปภาพ</button>
                    </h3>
                    <hr />
                    <div class="table-responsive" id="questionPanel">
                        <table class="table table-hover" id="questionTable">
                            <thead>
                                <tr>
                                    <th style="width: 50%;">ชื่อรูปภาพ</th>
                                    <th class="text-center">Link</th>
                                    <th class="text-center">ตัวอย่าง</th>
                                    <th class="text-center">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 0;
                                    while ($row = mysql_fetch_assoc($query)) {
                                        $count++;
                                        echo "<form method=\"get\" onsubmit=\"return isConfirm('".$row['id']."', '".$row['path']."')\">";
                                            echo "<tr>";
                                                echo "<td class=\"vm\">".$row['name']."</td>";
                                                echo "<td class=\"text-center vm\">".$row['link']."</td>";
                                                echo "<td class=\"text-center\"><img width=\"100\" height=\"100\" src=\"".$config["base_url"].$row['path']."\" /></td>";
                                                echo "<td class=\"text-center vm\"><input class=\"btn btn-danger\" type=\"submit\" value=\"ลบรูปภาพ\"></td>";
                                            echo "</tr>";
                                        echo "</form>";
                                    }

                                    if ($count == 0) {
                                        echo "<tr>";
                                            echo "<td class=\"text-center vm\" colspan=\"4\">ไม่มีข้อมูลรูปภาพ</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="addImageModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">เพิ่มรูปภาพ</h4>
      </div>
      <div class="modal-body">
        <form action="<?=$config['base_url']?>admin/api/uploadImg.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon" id="titleTH">ชื่อรูปภาพ</div>
                    <input type="text" class="form-control" tabindex="1" placeholder="ชื่อรูปภาพ" name="name">
                    <div class="input-group-addon" id="titleTH">English/Numeric Only</div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon" id="titleTH">Link</div>
                    <input type="text" class="form-control" tabindex="1" placeholder="Link" name="link">
                </div>
            </div>
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                    <img src="<?=$config['base_url']?>assets/images/no_image.png" data-src="holder.js/100%x100%">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                <div>
                    <span class="btn btn-default btn-file"><span class="fileinput-new">เลือกรูปภาพ</span><span class="fileinput-exists">เปลี่ยน</span><input type="file" name="slideImg"></span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">ลบ</a>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" tabindex="-1">ปิด</button>
        <button type="submit" class="btn btn-primary" id="questionSubmit" tabindex="3">Upload</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $("#addImage").click(function() {
        $("#addImageModal").modal('show');
    });


    function isConfirm(imgId, name) {
        swal({
            title: "คุณต้องการลบข้อมูลใช่หรือไม่?",
            type: "error",
            showCancelButton: true,
            confirmButtonColor: "#d9534f",
            confirmButtonText: "ลบ",
            cancelButtonText: 'ยกเลิก',
            closeOnConfirm: true
        }, function() {
            $.ajax({
                url: '<?=$config['base_url']?>admin/api/deleteSlide.php?id=' + imgId + '&name=' + name,
                success: function(result) {
                    console.log(result);
                    if (result.success) {
                        location.reload();
                    }
                },
                error: systemError
            });
            
        });

        return false;
    }

    function systemError() {
        swal("ไม่สามารถติดต่อระบบ Admin ได้ กรุณาติดต่อผู้ดูแลระบบทางเทคนิค");
    }
</script>




<?php

include "../module/footer.php";

?>