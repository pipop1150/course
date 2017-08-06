<?php

include "../application/config/config.php";
include "../module/header.php";

?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?=$config['base_url'].'/admin.php'?>"></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="<?=$config['base_url'].'/admin.php'?>">Admin Page</a></li>
      <li><a href="<?=$config['base_url'].'/admin/question.php'?>">Quest Page</a></li>
      <li><a href="<?=$config['base_url'].'/admin/answer.php'?>">Answer Page</a></li>
    </ul>
  </div>
</nav>

<div class="container" id="questionPanel">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2>จัดการคำตอบ</h2>
            <hr />
            <div class="card">
                <div class="card-content">
                    <h3>
                        รายการคำตอบ
                    </h3>
                    <hr />
                    <div class="table-responsive" id="questionPanel">
                        <table class="table table-hover" id="answerTable">
                            <thead>
                                <tr>
                                    <th style="width: 45%;">คำถาม</th>
                                    <th style="width: 45%;">คำตอบ</th>
                                    <th class="text-center">จัดการคำตอบ</th>
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
<div class="modal fade" tabindex="-1" role="dialog" id="answerModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">จัดการคำตอบ</h4>
      </div>
      <div class="modal-body">
        <form id="answerForm">
            <input type="hidden" name="answerId" id="answerId" />
            <div class="form-group">
                <label for="answer" id="questionLabel">คำถาม</label>
                <textarea class="form-control" rows="5" id="question" name="question" disabled></textarea>
            </div>
            <div class="form-group">
                <label for="answer" id="answerLabel">คำตอบ</label>
                <textarea class="form-control" rows="5" id="answer" name="answer"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <div class="col-md-4" style="float: left">
            <select class="form-control" id="statusSelection" name="statusSelection">
                <option>Loading...</option>
            </select>
        </div>

        </form>
        
        <button type="button" class="btn btn-default" data-dismiss="modal" tabindex="-1">ปิด</button>
        <button type="button" class="btn btn-primary" id="answerSubmit" tabindex="3">บันทึก</button>
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
        getAnswers(setAnswerInformation);
        getAnswerStatus(setAnswerStatusInformation);
    });

    function setAnswerInformation(results) {
        var resultList = results.result;
        setPagination(results.pagesCount, results.activePage);
        for(var i=0; i<resultList.length; i++) {
            var data = resultList[i];
            if (i == 0) {
                $('#answerTable tbody').html( '' +
                    '<tr>' + 
                        '<td>' + data.question + '</td>' + 
                        '<td>' + data.answer + '</td>' + 
                        '<td class="text-center">' + 
                            '<button class="btn btn-primary" ' + 
                                'onClick="manageAnswer(' + data.answerId + ', \'' + data.answer + '\', \'' + data.question + '\', \'' + data.status + '\')">จัดการคำตอบ</button>' +
                        '</td>' + 
                    '</tr>' +
                '');

                continue;
            }

            $('#answerTable tbody').append( '' +
                '<tr>' + 
                    '<td>' + data.question + '</td>' + 
                    '<td>' + data.answer + '</td>' + 
                    '<td class="text-center">' + 
                        '<button class="btn btn-primary" ' + 
                            'onClick="manageAnswer(' + data.answerId + ', \'' + data.answer + '\', \'' + data.question + '\', \'' + data.status + '\')">จัดการคำตอบ</button>' +
                    '</td>' + 
                '</tr>' +
            '');
        }
    }

    function setAnswerStatusInformation(result) {
        var answerList = result.answerList;
        for(var i=0; i<answerList.length; i++) {
            var data = answerList[i];
            if (i == 0) {
                $('#statusSelection').html( '' +
                    '<option value="' + data['answerStatusId'] + '">' + data['answerStatusDetail'] + '</option>' +
                '');

                continue;
            }

            $('#statusSelection').append( '' +
                '<option value="' + data['answerStatusId'] + '">' + data['answerStatusDetail'] + '</option>' +
            '');
        }
    }

    function manageAnswer(answerId, answer, question, answerStatus) {
        $('#answerId').val(answerId);
        $('#question').val(question);
        $('#answer').val(answer);
        $('#statusSelection').val(answerStatus);
        $('#answerModal').modal('show');
    }

    $('#answerSubmit').click(function() {
        swal({
            title: "คุณต้องการบันทึกการเปลี่ยนแปลงคำตอบใช่หรือไม่?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2980B9",
            confirmButtonText: "เปลี่ยนแปลง",
            cancelButtonText: 'ยกเลิก',
            closeOnConfirm: false
        }, function() {
            var data = $('#answerForm').serialize();
            postData('reviseAnswer', data, function(result) {
                console.log(result);
                if (result.success) {
                    swal(result.message);
                    getAnswers(setAnswerInformation);
                    $('#answerModal').modal('hide');
                }
            });
        });
    });

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

    function getAnswers(cb) {
        $.ajax({
            url: '<?=$config["base_url"]?>admin/api/getAnswers.php?pageNumber=' + pageNumber,
            success: function(result) {
                cb(result);
            }
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

    function getAnswerStatus(cb) {
        $.ajax({
            url: '<?=$config["base_url"]?>admin/api/getAnswerStatus.php',
            success: function(result) {
                cb(result);
            },
            error: systemError
        });
    }

    function systemError() {
        swal("ไม่สามารถติดต่อระบบ Admin ได้ กรุณาติดต่อผู้ดูแลระบบทางเทคนิค");
    }

    function onPaginationClick(newPageNumber) {
        pageNumber = newPageNumber;
        getAnswers(setAnswerInformation);   
    }
</script>