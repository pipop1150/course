<link href="<?=$config['base_url']?>assets/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
<script src="<?=$config['base_url']?>assets/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<!--
    <div class="row">
        <div class="col-md-12">
            <div id="editor">
                asd
            </div>

            <script>
                $(document).ready(function() {
                    $('#editor').summernote('code', 'asdqwe123');
                });
            </script>
        </div>
    </div>
-->


<div class="container" id="degreePanel">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2>การจัดการข้อมูลหลักสูตร</h2>
            <hr />

            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <h3>
                                หลักสูตร
                            </h3>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <h3 style="float: right;">
                                <button class="btn btn-primary" onClick="addDegreeInfo()">เพิ่มหลักสูตร</button>
                            </h3>
                        </div>
                    </div>
                    <hr />
                    <!-- course table -->
                    <div class="table-responsive">
                        <table class="table table-hover" id="degreeInfoTable">
                            <thead>
                                <tr>
                                    <th style="width: 35%;">ชื่อหลักสูตร</th>
                                    <th style="width: 35%;">Degree Name</th>
                                    <th class="text-center">จัดการคณะ</th>
                                    <th class="text-center">แก้ไข</th>
                                    <th class="text-center">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center" colspan="5">Loading...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!---->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Model for degreeInfo and facultyInfo -->
<div class="modal fade" tabindex="-1" role="dialog" id="mainModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <form id="mainModalForm">
            <input type="hidden" id="firstMainModalInputHidden" />
            <input type="hidden" id="secondMainModalInputHidden" />
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon" id="titleTH"></div>
                    <input type="text" class="form-control" id="inputTH" tabindex="1">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon" id="titleEN"></div>
                    <input type="text" class="form-control" id="inputEN" tabindex="2">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" tabindex="-1">ปิด</button>
        <button type="button" class="btn btn-warning" id="mainModalEditButton" tabindex="3">แก้ไข</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    // Global variable
    var globalDegreeId = -1;
    var globalFacultyId = -1;
    var globalBranchId = -1;

    // init degreeInfoTable
    $(document).ready(function() { 
        updateDegreeInfoTable();
        $("#mainModal").on('shown.bs.modal', function () {
            $('#inputTH').focus();
        });

        $('#mainModalEditButton').on('focus', function() {
            $('#inputTH').focus();
            $('#inputTH').select();
        });
    });

    function updateDegreeInfoTable() {
        getData('getDegree', "", function(result) {
            if (result.length === 0) {
                setTableNotFound('degreeInfoTable');
                return;
            }

            setMainTable(result, 'degreeInfoTable', 'manageDegree', 'editDegree', 'deleteDegree', 'จัดการคณะ');
        });
    }
    
    // ajax
    function getData(apiMethod, apiGetParams, cb) {
        $.ajax({
            url: '<?=$config['base_url']?>admin/api/' + apiMethod + ".php" + apiGetParams,
            success: function(result) {
                if (cb) {
                    cb(result);
                }
            },
            error: systemError
        });
    }

    function postData(apiMethod, apiGetParams, data, cb) {
        $.ajax({
            url: '<?=$config['base_url']?>admin/api/' + apiMethod + ".php" + apiGetParams,
            method: 'post',
            data: data,
            success: function(result) {
                if (cb) {
                    cb(result);
                }
            },
            error: systemError
        });
    }

    // for degreeInfoTable and facultyInfoTable
    function setMainTable(result, tableId, manageMethodName, editMethodName, deleteMethodName, manageButtonName) {
        result.forEach(function(row, index) {
            if (index === 0) {
                $('#' + tableId + ' tbody').html('<tr>'  +
                    '<td>' + row.th +'</td>' +
                    '<td>' + row.en + '</td>' +
                    '<td class="text-center"><button class="btn btn-primary" onClick="' + manageMethodName + '(\'' + row.id + '\', \'' + row.th + '\', \'' + row.en + '\')">' + manageButtonName + '</button></td>' +
                    '<td class="text-center"><button class="btn btn-warning" ' + 
                        'onClick="' + editMethodName + '(\'' + row.id + '\', \'' + row.th + '\', \'' + row.en + '\')">แก้ไข</button>' +
                    '</td>' +
                    '<td class="text-center"><button class="btn btn-danger" onClick="' + deleteMethodName + '(\'' + row.id + '\', \'' + row.th + '\', \'' + row.en + '\')">ลบ</button></td>' +
                '</tr>');

                return;
            }

            $('#' + tableId + ' tbody').append('<tr>' + 
                '<td>' + row.th +'</td>' +
                '<td>' + row.en + '</td>' +
                '<td class="text-center"><button class="btn btn-primary" onClick="' + manageMethodName + '(\'' + row.id + '\', \'' + row.th + '\', \'' + row.en + '\')">' + manageButtonName + '</button></td>' +
                '<td class="text-center"><button class="btn btn-warning" ' + 
                        'onClick="' + editMethodName + '(\'' + row.id + '\', \'' + row.th + '\', \'' + row.en + '\')">แก้ไข</button>' +
                    '</td>' +
                '<td class="text-center"><button class="btn btn-danger" onClick="' + deleteMethodName + '(\'' + row.id + '\', \'' + row.th + '\', \'' + row.en + '\')">ลบ</button></td>' +
            '</te>');
        });
    }

    function setMainModalValues(title, firstHiddenName, firstHiddenVal, secondHiddenName, secondHiddenVal,
        bodyTH, bodyTHName, bodyTHVal, 
        bodyEN, bodyENName, bodyENVal,
        onClickFunctionName, buttonClass, buttonName) {

        $('#mainModal .modal-title').html(title);

        $('#mainModal .modal-body #firstMainModalInputHidden').attr('name', firstHiddenName);
        $('#mainModal .modal-body #firstMainModalInputHidden').val(firstHiddenVal);
        $('#mainModal .modal-body #secondMainModalInputHidden').attr('name', secondHiddenName);
        $('#mainModal .modal-body #secondMainModalInputHidden').val(secondHiddenVal);

        $('#mainModal .modal-body #titleTH').html(bodyTH);
        $('#mainModal .modal-body #inputTH').attr('placeholder', bodyTH);
        $('#mainModal .modal-body #inputTH').attr('name', bodyTHName);
        $('#mainModal .modal-body #inputTH').val(bodyTHVal);

        $('#mainModal .modal-body #titleEN').html(bodyEN);
        $('#mainModal .modal-body #inputEN').attr('placeholder', bodyEN);
        $('#mainModal .modal-body #inputEN').attr('name', bodyENName);
        $('#mainModal .modal-body #inputEN').val(bodyENVal);

        $('#mainModalEditButton').attr('onClick', onClickFunctionName);
        $('#mainModalEditButton').attr('class', buttonClass);
        $('#mainModalEditButton').html(buttonName);
    }

    // main modal template
    function editDegree(degreeId, degreeNameTH, degreeNameEN) {
        setMainModalValues('ชื่อหลักสูตร: ' + degreeNameTH, 'degreeId', degreeId, '', '',
            'ชื่อหลักสูตร', 'degreeNameTH', degreeNameTH,
            'Degree Name', 'degreeNameEN', degreeNameEN, 
            'onEditDegreeInfoInMainModalClick()', 'btn btn-warning', 'แก้ไข');
        $('#mainModal').modal('show');
    }

    function onEditDegreeInfoInMainModalClick() {
        swal({
            title: "คุณต้องการแก้ไขข้อมูลใช่หรือไม่?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ec971f",
            confirmButtonText: "แก้ไข",
            cancelButtonText: 'ยกเลิก',
            closeOnConfirm: false
        }, function() {
            var data = $('#mainModalForm').serialize();
            postData('updateDegree', "", data, function(result) {
                if (result.success) {
                    swal(result.message);
                    setTableLoading('degreeInfoTable');
                    updateDegreeInfoTable();
                    $('#mainModal').modal('hide');
                }
            });
        });
    }
    
    function addDegreeInfo() {
        setMainModalValues('เพิ่มหลักสูตร', '', '', '', '',
            'ชื่อหลักสูตร', 'degreeNameTH', '',
            'Degree Name', 'degreeNameEN', '', 
            'onAddDegreeInfoInMainModalClick()', 'btn btn-primary', 'เพิ่ม');
        $('#mainModal').modal('show');
    }

    function onAddDegreeInfoInMainModalClick() {
        swal({
            title: "คุณต้องการเพิ่มข้อมูลใช่หรือไม่?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2980B9",
            confirmButtonText: "เพิ่ม",
            cancelButtonText: 'ยกเลิก',
            closeOnConfirm: false
        }, function() {
            var data = $('#mainModalForm').serialize();
            postData('addDegree', "", data, function(result) {
                if (result.success) {
                    swal(result.message);
                    setTableLoading('degreeInfoTable');
                    updateDegreeInfoTable();
                    $('#mainModal').modal('hide');
                }
            });
        });
    }

    function deleteDegree(degreeId, degreeNameTH, degreeNameEN) {
        swal({
            title: "คุณต้องการลบข้อมูลใช่หรือไม่?",
            type: "error",
            showCancelButton: true,
            confirmButtonColor: "#d9534f",
            confirmButtonText: "ลบ",
            cancelButtonText: 'ยกเลิก',
            closeOnConfirm: false
        }, function() {
            var data = 'degreeId=' + degreeId + '&degreeNameTH=' + degreeNameTH + '&degreeNameEN=' + degreeNameEN;
            postData('deleteDegree', "", data, function(result) {
                if (result.success) {
                    swal(result.message);
                    setTableLoading('degreeInfoTable');
                    updateDegreeInfoTable();
                }
            });
        });
    }

    function setTableLoading(tableId) {
        $('#' + tableId + ' tbody').html('<tr><td class="text-center" colspan="5">Loading...</td></tr>');
    }

    function setTableNotFound(tableId) {
        $('#' + tableId + ' tbody').html('<tr><td class="text-center" colspan="5">ไม่พบข้อมูล</td></tr>');
    }

    function manageDegree(degreeId, degreeNameTH, degreeNameEN) {
        setTableLoading('facultyInfoTable');
        $('#degreePanel').fadeOut(200, function() {
            $('#facultyPanel').fadeIn(200);
            initFacultyPanel(degreeId, degreeNameTH, degreeNameEN);
        });
    }

    function systemError() {
        swal("ไม่สามารถติดต่อระบบ Admin ได้ กรุณาติดต่อผู้ดูแลระบบทางเทคนิค");
    }
</script>
<?php
    include "faculty.php";
    include "branch.php";
    include "courseEditor.php";
?>