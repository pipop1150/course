<div class="container" id="facultyPanel" style="display: none;">
    <div class="row">
        <div class="col-md-12  col-sm-12 col-xs-12">
            <h2><span onClick="goBackToDegreePanel()" style="cursor: pointer;">&lt;&lt; </span>การจัดการข้อมูลหลักสูตร</h2>
            <hr />

            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <h3 id="facultyTitle">
                                
                            </h3>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <h3 style="float: right;">
                                <button class="btn btn-primary" onClick="addFacultyInfo()">เพิ่มคณะ</button>
                            </h3>
                        </div>
                    </div>
                    <hr />
                    <!-- course table -->
                    <div class="table-responsive">
                        <table class="table table-hover" id="facultyInfoTable">
                            <thead>
                                <tr>
                                    <th style="width: 35%;">ชื่อคณะ</th>
                                    <th style="width: 35%;">Faculty Name</th>
                                    <th class="text-center">จัดการข้อมูลสาขา</th>
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

<script>

    function goBackToDegreePanel() {
        $('#facultyPanel').fadeOut(200, function() {
            setTableLoading('degreeInfoTable');
            updateDegreeInfoTable();
            $('#degreePanel').fadeIn(200);
        });
    }

    function initFacultyPanel(degreeId, degreeNameTH, degreeNameEN) {
        //**-- Set globalDegreeId
        globalDegreeId = degreeId;
        $('#facultyPanel #facultyTitle').html(degreeNameTH);
        updateFacultyInfoTable(degreeId);
    }

    function updateFacultyInfoTable(degreeId) {
        getData('getFaculty?degreeId=' + degreeId, function(result) {
            if (result.length === 0) {
                setTableNotFound('facultyInfoTable');
                return;
            }

            setMainTable(result, 'facultyInfoTable', 'manageFaculty', 'editFaculty', 'deleteFaculty', 'จัดการสาขา');
        });
    }

    function addFacultyInfo() {
        //**-- use globalDegreeId
        setMainModalValues('เพิ่มคณะ', 'degreeId', globalDegreeId, '', '',
            'ชื่อคณะ', 'facultyNameTH', '',
            'Faculty Name', 'facultyNameEN', '', 
            'onAddFacultyInfoInMainModalClick()', 'btn btn-primary', 'เพิ่ม');
        $('#mainModal').modal('show');
    }

    function onAddFacultyInfoInMainModalClick() {
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
            postData('addFaculty', data, function(result) {
                if (result.success) {
                    swal(result.message);
                    setTableLoading('facultyInfoTable');
                    //**-- use globalDegreeId
                    updateFacultyInfoTable(globalDegreeId);
                    $('#mainModal').modal('hide');
                }
            });
        });
    }

    function manageFaculty(facultyId, facultyNameTH, facultyNameEN) {
        setTableLoading('branchInfoTable');
        $('#facultyPanel').fadeOut(200, function() {
            $('#branchPanel').fadeIn(200);
            initBranchPanel(facultyId, facultyNameTH, facultyNameEN);
        });
    }

    function editFaculty(facultyId, facultyNameTH, facultyNameEN) {
        setMainModalValues('ชื่อคณะ: ' + facultyNameTH, 'facultyId', facultyId, '', '',
            'ชื่อคณะ', 'facultyNameTH', facultyNameTH,
            'Faculty Name', 'facultyNameEN', facultyNameEN, 
            'onEditFacultyInfoInMainModalClick()', 'btn btn-warning', 'แก้ไข');
        $('#mainModal').modal('show');
    }

    function onEditFacultyInfoInMainModalClick() {
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
            postData('updateFaculty', data, function(result) {
                if (result.success) {
                    swal(result.message);
                    setTableLoading('facultyInfoTable');
                    //**-- use globalDegreeId
                    updateFacultyInfoTable(globalDegreeId);
                    $('#mainModal').modal('hide');
                }
            });
        });
    }

    function deleteFaculty(facultyId, facultyNameTH, facultyNameEN) {
        swal({
            title: "คุณต้องการลบข้อมูลใช่หรือไม่?",
            type: "error",
            showCancelButton: true,
            confirmButtonColor: "#d9534f",
            confirmButtonText: "ลบ",
            cancelButtonText: 'ยกเลิก',
            closeOnConfirm: false
        }, function() {
            var data = 'facultyId=' + facultyId + '&facultyNameTH=' + facultyNameTH + '&facultyNameEN=' + facultyNameEN;
            postData('deleteFaculty', data, function(result) {
                if (result.success) {
                    swal(result.message);
                    setTableLoading('facultyInfoTable');
                    //**-- use globalDegreeId
                    updateFacultyInfoTable(globalDegreeId);
                }
            });
        });
    }
</script>