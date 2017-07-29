<div class="container" id="branchPanel" style="display: none;">
    <div class="row">
        <div class="col-md-12">
            <h2><span onClick="goBackToFacultyPanel()" style="cursor: pointer;">&lt;&lt; </span>การจัดการข้อมูลหลักสูตร</h2>
            <hr />

            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 id="branchTitle">
                                
                            </h3>
                        </div>
                        <div class="col-md-4">
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
    function initBranchPanel(facultyId, facultyNameTH, facultyNameEN) {
        //**-- Set globalFacultyId
        globalFacultyId = facultyId;
        $('#branchPanel #branchTitle').html(facultyNameTH);
        updateBranchInfoTable(facultyId);
    }

    function goBackToFacultyPanel() {
        $('#branchPanel').fadeOut(200, function() {
            setTableLoading('facultyInfoTable');
            updateFacultyInfoTable(globalDegreeId);
            $('#facultyPanel').fadeIn(200);
        });
    }

    function updateBranchInfoTable(facultyId) {
        getData('getBranch?facultyId=' + facultyId, function(result) {
            console.log(result);
            setMainTable(result, 'branchInfoTable', 'manageBranch', 'editBranch', 'deleteBranch', 'จัดการรายละเอียดหลักสูตร');
        });
    }
</script>