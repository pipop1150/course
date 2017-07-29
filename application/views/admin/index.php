<style>
    tbody tr td {
        cursor: initial;
        vertical-align: middle !important;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2>รายงานการลงทะเบียน</h2>
            <hr />
            <div class="card">
                <div class="card-content">
                    <h3>
                        รายชื่อผู้ลงทะเบียน
                        <span style="float: right;">
                            <button class="btn btn-primary" onClick="comingSoonAlert()">Refresh</button>
                        </span>
                    </h3>
                    <hr />
                    <div class="table-responsive">
                        <table class="table table-hover" id="branchInfoTable">
                            <thead>
                                <tr>
                                    <th style="width: 65%;">ชื่อ-สกุล</th>
                                    <th class="text-center">ลงทะเบียนวันที่</th>
                                    <th class="text-center">TODO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($registerReportInfo as $info) {?>
                                    <tr>
                                        <td><?=$info['fullName']?></td>
                                        <td class="text-center">
                                            <?php
                                                $date = new DateTime($info['registerDate']);
                                                $result = $date->format('d/m/Y');
                                                echo $result;
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary" onClick="todo()">Todo</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function todo() {
        swal('Coming Soon!!');
    }

    function comingSoonAlert() {
        swal('Coming Soon!!');
    }
</script>