<div class="container" id="branchPanel" style="display: none;">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2><span onClick="goBackToFacultyPanel()" style="cursor: pointer;">&lt;&lt; </span>การจัดการข้อมูลหลักสูตร</h2>
            <hr />

            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <h3 id="branchTitle">
                                
                            </h3>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <h3 style="float: right;">
                                <button class="btn btn-primary" onClick="addBranchInfo()">เพิ่มสาขา</button>
                            </h3>
                        </div>
                    </div>
                    <hr />
                    <!-- course table -->
                    <div class="table-responsive">
                        <table class="table table-hover" id="branchInfoTable">
                            <thead>
                                <tr>
                                    <th style="width: 35%;">ชื่อสาขา</th>
                                    <th style="width: 35%;">Branch Name</th>
                                    <th class="text-center">จัดการรายละเอียดหลักสูตร</th>
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

    function goBackToFacultyPanel() {
        $('#branchPanel').fadeOut(200, function() {
            setTableLoading('facultyInfoTable');
            updateFacultyInfoTable(globalDegreeId);
            $('#facultyPanel').fadeIn(200);
        });
    }

    function initBranchPanel(facultyId, facultyNameTH, facultyNameEN) {
        //**-- Set globalFacultyId
        globalFacultyId = facultyId;
        $('#branchPanel #branchTitle').html(facultyNameTH);
        updateBranchInfoTable(facultyId);
    }

    function updateBranchInfoTable(facultyId) {
        getData('getBranch?facultyId=' + facultyId, function(result) {
            if (result.length === 0) {
                setTableNotFound('branchInfoTable');
                return;
            }
            
            setMainTable(result, 'branchInfoTable', 'manageBranch', 'editBranch', 'deleteBranch', 'จัดการหลักสูตร');
        });
    }

    function addBranchInfo() {
        //**-- use globalFaculty
        setMainModalValues('เพิ่มหลักสูตรสาขา', 'facultyId', globalFacultyId, '', '',
            'ชื่อสาขา', 'branchNameTH', '',
            'Branch Name', 'branchNameEN', '', 
            'onAddBranchInfoInMainModalClick()', 'btn btn-primary', 'เพิ่ม');
        $('#mainModal').modal('show');
    }

    function onAddBranchInfoInMainModalClick() {
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
            postData('addBranch', data, function(result) {
                if (result.success) {
                    swal(result.message);
                    setTableLoading('branchInfoTable');
                    //**-- use globalFacultyId
                    updateBranchInfoTable(globalFacultyId);
                    $('#mainModal').modal('hide');
                }
            });
        });
    }

    function manageBranch(branchId, branchNameTH, branchNameEN) {
        $('#branchPanel').fadeOut(200, function() {
            $('#courseEditorPanel').fadeIn(200);
            initCourseEditorPanel(branchId, branchNameTH, branchNameEN);
        });
    }

    function editBranch(branchId, branchNameTH, branchNameEN) {
        setMainModalValues('ชื่อสาขา: ' + branchNameTH, 'branchId', branchId, '', '',
            'ชื่อสาขา', 'branchNameTH', branchNameTH,
            'Branch Name', 'branchNameEN', branchNameEN, 
            'onEditBranchInfoInMainModalClick()', 'btn btn-warning', 'แก้ไข');
        $('#mainModal').modal('show');
    }

    function onEditBranchInfoInMainModalClick() {
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
            postData('updateBranch', data, function(result) {
                if (result.success) {
                    swal(result.message);
                    setTableLoading('branchInfoTable');
                    //**-- use globalFacultyId
                    updateBranchInfoTable(globalFacultyId);
                    $('#mainModal').modal('hide');
                }
            });
        });
    }

    function deleteBranch(branchId, branchNameTH, branchNameEN) {
        swal({
            title: "คุณต้องการลบข้อมูลใช่หรือไม่?",
            type: "error",
            showCancelButton: true,
            confirmButtonColor: "#d9534f",
            confirmButtonText: "ลบ",
            cancelButtonText: 'ยกเลิก',
            closeOnConfirm: false
        }, function() {
            var data = 'branchId=' + branchId + '&branchNameTH=' + branchNameTH + '&branchNameEN=' + branchNameEN;
            postData('deleteBranch', data, function(result) {
                if (result.success) {
                    swal(result.message);
                    setTableLoading('branchInfoTable');
                    //**-- use globalFacultyId
                    updateBranchInfoTable(globalFacultyId);
                }
            });
        });
    }








    // function initBranchPanel(facultyId, facultyNameTH, facultyNameEN) {
    //     //**-- Set globalFacultyId
    //     globalFacultyId = facultyId;
    //     $('#branchPanel #branchTitle').html(facultyNameTH);
    //     updateBranchInfoTable(facultyId);
    // }

    // function goBackToFacultyPanel() {
    //     $('#branchPanel').fadeOut(200, function() {
    //         setTableLoading('facultyInfoTable');
    //         updateFacultyInfoTable(globalDegreeId);
    //         $('#facultyPanel').fadeIn(200);
    //     });
    // }

    // function updateBranchInfoTable(facultyId) {
    //     getData('getBranch?facultyId=' + facultyId, function(result) {
    //         console.log(result);
    //         setMainTable(result, 'branchInfoTable', 'manageBranch', 'editBranch', 'deleteBranch', 'จัดการรายละเอียดหลักสูตร');
    //     });
    // }
</script>