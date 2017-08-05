<?php

include "../application/config/config.php";
include "../module/header.php";

?>

<div class="container" id="questionPanel">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2>ตอบคำถามจากทางบ้าน</h2>
            <hr />
            <div class="card">
                <div class="card-content">
                    <h3>
                        รายการคำถาม
                    </h3>
                    <hr />
                    <div class="table-responsive" id="questionPanel">
                        <table class="table table-hover" id="questionTable">
                            <thead>
                                <tr>
                                    <th style="width: 75%;">คำถาม</th>
                                    <th class="text-center">ตอบคำถาม</th>
                                    <th class="text-center">ลบคำถาม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" align="center">Loading...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation" class="text-center">
                <ul class="pagination" id="pagination">
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Main Model for degreeInfo and facultyInfo -->
<div class="modal fade" tabindex="-1" role="dialog" id="questionModel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">ตอบคำถาม</h4>
      </div>
      <div class="modal-body">
        <form id="answerForm">
            <input type="hidden" name="questionId" id="questionId" />
            <div class="form-group">
                <label for="answer" id="questionLabel"></label>
                <textarea class="form-control" rows="5" id="answer" name="answer"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" tabindex="-1">ปิด</button>
        <button type="button" class="btn btn-primary" id="questionSubmit" tabindex="3">ตอบคำถาม</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php

include "../module/footer.php";

?>

<script>
    var pageNumber = 1;
    $(document).ready(function() {
        getQuestions(setQuestionInformation);
    });

    function setQuestionInformation(results) {
        var resultList = results.result;
        setPagination(results.pagesCount, results.activePage);
        for(var i=0; i<resultList.length; i++) {
            var data = resultList[i];
            if (i == 0) {
                $('#questionTable tbody').html( '' +
                    '<tr>' + 
                        '<td>' + data.question + '</td>' + 
                        '<td class="text-center">' +
                            '<button class="btn btn-primary" ' + 
                                'onClick="answerQuestion(' + data.questionId + ', \'' + data.question + '\')">ตอบคำถาม</button>' +
                        '</td>' + 
                        '<td class="text-center">' + 
                            '<button class="btn btn-danger" ' + 
                                'onClick="deleteQuestion(' + data.questionId + ')">ลบคำถาม</button>' +
                        '</td>' + 
                    '</tr>' +
                '');

                continue;
            }

            $('#questionTable tbody').append( '' +
                '<tr>' + 
                    '<td>' + data.question + '</td>' + 
                    '<td class="text-center">' +
                        '<button class="btn btn-primary" ' + 
                            'onClick="answerQuestion(' + data.questionId + ', \'' + data.question + '\')">ตอบคำถาม</button>' +
                    '</td>' + 
                    '<td class="text-center">' + 
                        '<button class="btn btn-danger" ' + 
                            'onClick="deleteQuestion(' + data.questionId + ')">ลบคำถาม</button>' +
                    '</td>' + 
                '</tr>' +
            '');
        }
    }

    function setPagination(pageCount, activePage) {
        for (var i=1; i<=pageCount; i++) {
            if (i == 1) {
                $('#pagination').html('<li ' + (i == pageNumber ? 'class="active"' : '') + '>' + 
                    '<span onClick="onPaginationClick(' + i + ')">' + i + '</span></li>');
                continue;
            }

            $('#pagination').append('<li ' + (i == pageNumber ? 'class="active"' : '') + '>' + 
                    '<span onClick="onPaginationClick(' + i + ')">' + i + '</span></li>');
        }
    }

    function answerQuestion(questionId, question) {
        $('#questionLabel').html('คำถาม: ' + question);
        $('#questionId').val(questionId);
        $('#answer').val('');
        $('#questionModel').modal('show');
    }

    $('#questionSubmit').click(function() {
        swal({
            title: "คุณต้องการบันทึกการตอบคำถามใช่หรือไม่?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2980B9",
            confirmButtonText: "เพิ่ม",
            cancelButtonText: 'ยกเลิก',
            closeOnConfirm: false
        }, function() {
            var data = $('#answerForm').serialize();
            postData('answerQuestion', data, function(result) {
                if (result.success) {
                    swal(result.message);
                    getQuestions(setQuestionInformation);
                    $('#questionModel').modal('hide');
                }
            });
        });
    });

    function deleteQuestion(questionId) {
        swal({
            title: "คุณต้องการลบข้อมูลใช่หรือไม่?",
            type: "error",
            showCancelButton: true,
            confirmButtonColor: "#d9534f",
            confirmButtonText: "ลบ",
            cancelButtonText: 'ยกเลิก',
            closeOnConfirm: false
        }, function() {
            var data = 'questionId=' + questionId;
            postData('deleteQuestion', data, function(result) {
                if (result.success) {
                    swal(result.message);
                    getQuestions(setQuestionInformation);  
                }
            });
        });
    }

    function postData(apiMethod, data, cb) {
        $.ajax({
            url: '<?=$config["base_url"]?>admin/api/' + apiMethod + '.php',
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

    function systemError() {
        swal("ไม่สามารถติดต่อระบบ Admin ได้ กรุณาติดต่อผู้ดูแลระบบทางเทคนิค");
    }

    function onPaginationClick(newPageNumber) {
        pageNumber = newPageNumber;
        getQuestions(setQuestionInformation);   
    }

    function getQuestions(cb) {
        $.ajax({
            url: '<?=$config["base_url"]?>admin/api/getQuestions.php?pageNumber=' + pageNumber,
            success: function(result) {
                cb(result);
            }
        });
    }
</script>