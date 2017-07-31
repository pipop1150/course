<div class="container" id="courseEditorPanel" style="display: none;">
    <div class="row">
        <div class="col-md-12">
            <h2><span onClick="goBackToBranchPanel()" style="cursor: pointer;">&lt;&lt; </span>การจัดการข้อมูลหลักสูตร</h2>
            <hr />

            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 id="courseEditorTitle">
                                
                            </h3>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                            
                                <div class="col-md-12">
                                    <div id="courseEditor">
                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-2" style="float: right;">
                                <button class="btn btn-info" onClick="previewCourseDetail()">ตัวอย่าง</button>
                                <button class="btn btn-primary" onClick="updateCourseDetail()">บันทึก</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>

    var glocalBranchNameTH = '';
    var glocalBranchNameEN = '';

    $(document).ready(function() {
        $('#courseEditor').summernote({
            height: 300
        });
    });

    function goBackToBranchPanel() {
        $('#courseEditorPanel').fadeOut(200, function() {
            setTableLoading('branchInfoTable');
            updateBranchInfoTable(globalFacultyId);
            $('#branchPanel').fadeIn(200);
        });
    }

    function initCourseEditorPanel(branchId, branchNameTH, branchNameEN) {
        globalBranchId = branchId;
        glocalBranchNameTH = branchNameTH;
        glocalBranchNameEN = branchNameEN
        $('#courseEditorPanel #courseEditorTitle').html(branchNameTH);
        $('#courseEditor').summernote('code', '');
        updateCourseEditor(branchId);
    }

    function updateCourseEditor(branchId) {
        getData('getCourseDetail', '?branchId=' + branchId, function(result) {
            if (result.success) {
                $('#courseEditor').summernote('code', result.courseDetail);
            } 
        });
    }

    function previewCourseDetail() {
        var courseDetail = encodeURIComponent($('.note-editable.panel-body').html());
        $.ajax({
            url: '<?=$config['base_url']?>admin/courseDetail.php',
            method: 'post',
            data: 'courseDetail=' + courseDetail + '&branchNameTH=' + glocalBranchNameTH,
            success: function(result) {
                var newWindow = window.open();
                newWindow.document.write(result);
                newWindow.window.history.pushState({}, '', 'previewCourseDetail')
            },
            error: systemError
        });
        // window.open('<?=$config['base_url']?>home/courseDetail/' + globalBranchId, '_blank');
        // window.location = '<?=$config['base_url']?>home/courseDetail?courseDetail=' + courseDetail;
    }

    function updateCourseDetail() {
        swal({
            title: "คุณต้องการแก้ไขข้อมูลใช่หรือไม่?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2980B9",
            confirmButtonText: "บันทึก",
            closeOnConfirm: false
        }, function() {
            // var courseDetail = $('#courseEditor').summernote('code');
            var courseDetail = encodeURIComponent($('.note-editable.panel-body').html());
            var data = 'courseDetail=' + courseDetail + '&branchId=' + globalBranchId;
            postData('updateCourseDetail', "", data, function (result) {
                if (result.success) {
                    swal({
                        title: result.message,
                        text: "คุณต้องการย้อนกลับไปหน้าก่อนหน้าหรือไม่?",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#5cb85c",
                        confirmButtonText: "ย้อนกลับ",
                        cancelButtonText: 'ยกเลิก',
                        closeOnConfirm: false
                        }, function() {
                            goBackToBranchPanel();
                            swal.close();
                        }
                    );
                }
            });
        });
    }
</script>