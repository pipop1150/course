<?php

include "../application/config/config.php";
include "../module/header.php";

?>

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
                        <table class="table table-hover" id="questionTable">
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
            <input type="hidden" name="questionId" id="questionId" />
            <div class="form-group">
                <label for="answer" id="questionLabel">คำถาม</label>
                <textarea class="form-control" rows="5" id="question" name="question"></textarea>
            </div>
            <div class="form-group">
                <label for="answer" id="answerLabel">คำตอบ</label>
                <textarea class="form-control" rows="5" id="answer" name="answer"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="col-md-4" style="float: left">
            <select class="form-control" id="statusSelection">
                <option>asd</option>
            </select>
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal" tabindex="-1">ปิด</button>
        <button type="button" class="btn btn-primary" id="questionSubmit" tabindex="3">บันทึก</button>
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
        getQuestions(setAnswerInformation);
    });

    function setAnswerInformation(results) {
        var resultList = results.result;
        setPagination(results.pagesCount, results.activePage);
        for(var i=0; i<resultList.length; i++) {
            var data = resultList[i];
            if (i == 0) {
                $('#questionTable tbody').html( '' +
                    '<tr>' + 
                        '<td>' + data.question + '</td>' + 
                        '<td>' + data.answer + '</td>' + 
                        '<td class="text-center">' + 
                            '<button class="btn btn-primary" ' + 
                                'onClick="manageAnswer(' + data.answerId + ', \'' + data.answer + '\', \'' + data.question + '\')">จัดการคำตอบ</button>' +
                        '</td>' + 
                    '</tr>' +
                '');

                continue;
            }

            $('#questionTable tbody').append( '' +
                '<tr>' + 
                    '<td>' + data.question + '</td>' + 
                    '<td>' + data.answer + '</td>' + 
                    '<td class="text-center">' + 
                        '<button class="btn btn-primary" ' + 
                            'onClick="manageAnswer(' + data.answerId + ', \'' + data.answer + '\', \'' + data.question + '\')">จัดการคำตอบ</button>' +
                    '</td>' + 
                '</tr>' +
            '');
        }
    }

    function manageAnswer(answerId, answer, question) {
        $('#question').val(question);
        $('#answer').val(answer);
        $('#answerModal').modal('show');
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

    function getQuestions(cb) {
        $.ajax({
            url: '<?=base_url()?>admin/api/getAnswers?pageNumber=' + pageNumber,
            success: function(result) {
                cb(result);
            }
        });
    }
</script>