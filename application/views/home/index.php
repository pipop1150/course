
<style>
    .input-form {
        margin-bottom: 20px;
    }

    @media (min-width: 768px) {
        .carousel-inner > .item > img {
            height: 400px;
            width: 100%;
        }
    }

    @media (max-width: 767px) {
        #carousel-example-generic {
            margin-top: 50px;
        }
    }

    .short-register {
        height: 440px; /*534px*/
    }

    .just-padding {
        padding: 15px;
    }

    .list-group.list-group-root {
        padding: 0;
        overflow: hidden;
    }

    .list-group.list-group-root .list-group {
        margin-bottom: 0;
    }

    .list-group.list-group-root .list-group-item {
        border-radius: 0;
        border-width: 1px 0 0 0;
    }

    .list-group.list-group-root > .list-group-item:first-child {
        border-top-width: 0;
    }

    .list-group.list-group-root > .list-group > .list-group-item {
        padding-left: 50px;
    }

    .list-group-item .glyphicon {
        margin-right: 5px;
    }

    span.list-group-item:hover {
        background-color: #f6f6f6;
        cursor: pointer;
    }

    .task-list-item.last-item {
        border-bottom: 1px solid #e7ecf1 !important;
    }

    .col-sm-12 .carousel {
        margin-bottom: 15px;
    }

    .list-todo.custom {
        background-color: #007AA1;
        color: #fff;
    }
</style>

<div class="container"> <!-- #f1f1f1 -->
    <div class="row">
        <div class="col-md-8 col-sm-12 col-sm-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <a href="http://www.stjohn.ac.th/sju/med_teacher.asp" target="_blank">
						    <img src="<?=asset_url()?>images/sp.jpg" />
                        </a>
                        <div class="carousel-caption">
                            <!--Test caption-->
                        </div>
                    </div>
                    <div class="item">
                        <a href="http://www.stjohn.ac.th/sju/med_learning.asp" target="_blank">
                            <img src="<?=asset_url()?>images/3.jpg" />
                        </a>
                        <div class="carousel-caption">
                            <!--Test caption-->
                        </div>
                    </div>
                    <div class="item">
                        <a href="http://www.stjohn.ac.th/sju/med2017.asp" target="_blank">
						    <img src="<?=asset_url()?>images/dt.jpg" />
                        </a>
                        <div class="carousel-caption">
                            <!--Test caption-->
                        </div>
                    </div>
                    <div class="item">
                        <a href="http://www.stjohn.ac.th/sju/phdl_2017.asp" target="_blank">
						    <img src="<?=asset_url()?>images/pn.jpg" />
                        </a>
                        <div class="carousel-caption">
                            <!--Test caption-->
                        </div>
                    </div>
                    <div class="item">
                        <a href="http://www.stjohn.ac.th/sju/ca2017.asp" target="_blank">
						    <img src="<?=asset_url()?>images/nt.jpg" />
                        </a>
                        <div class="carousel-caption">
                            <!--Test caption-->
                        </div>
                    </div>
                    <div class="item">
                        <a href="http://www.stjohn.ac.th/sju/engineer-logistics.asp" target="_blank">
						    <img src="<?=asset_url()?>images/lt.jpg" />
                        </a>
                        <div class="carousel-caption">
                            <!--Test caption-->
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?=asset_url()?>images/2.jpg" />
                        <div class="carousel-caption">
                            <!--Test caption-->
                        </div>
                    </div>
                    
                </div>
                

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-caption-top" style="color: #FAB321;">
                    คำถามเกี่ยวกับมหาวิทยาลัย
                </div>
                <div class="card-content" style="height: 313px; overflow: auto; background-color: #f2f6f7">
                    <?php foreach($answers as $index => $answer) { ?>
                    <div class="form-group">
                        <span><u>คำถาม: <?=$answer['question']?></u></span><br />
                        <span><font style="font-size: 0.9em;"><?=$answer['answer']?></font></span>
                    </div>
                    <hr />
                    <?php } ?>
                </div>
                <form id="makeQuestionForm" onSubmit="return false;">
                    <div class="input-group">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>">
                        <input type="text" class="form-control" id="question" name="question" placeholder="คำถาม">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button" id="makeQuestionSubmit">ส่งคำถาม</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <!--<div class="container course">-->
                <div class="row">
                    <?php foreach($degreeInfo as $degreeKey => $degree) {?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="card">
                            

                            <div class="card-content">
                                <!-- TAB -->
                                <div class="mt-element-list">
                                    <div class="mt-list-head list-todo custom">
                                        <div class="list-head-title-container">
                                            <h3 class="list-title"><?=$degree['degreeNameTH']?></h3>
                                        </div>
                                    </div>
                                    <div class="mt-list-container list-todo" id="accordion<?=$degreeKey?>" role="tablist" aria-multiselectable="true">
                                        <div class="list-todo-line"></div>
                                        <ul>
                                            <?php foreach($degree['facultyList'] as $facultyKey => $faculty) { ?>
                                            <li class="mt-list-item">
                                                <div class="list-todo-icon bg-white">
                                                    <!--<i class="fa fa-flag"></i>-->
                                                </div>
                                                <div class="list-todo-item dark">
                                                    <a class="list-toggle-container" data-toggle="collapse" data-parent="#accordion<?=$degreeKey?>" onclick=" " href="#task-<?=$degreeKey?>-<?=$facultyKey?>" aria-expanded="false">
                                                        <div class="list-toggle done uppercase">
                                                            <div class="list-toggle-title bold"><?=$faculty['facultyNameTH']?></div>
                                                            <!--<div class="badge badge-default pull-right bold"><?=sizeof($faculty['branchList'])?></div> -->
                                                        </div>
                                                    </a>
                                                    <div class="task-list panel-collapse collapse in" id="task-<?=$degreeKey?>-<?=$facultyKey?>">
                                                        <ul>
                                                            <?php foreach($faculty['branchList'] as $branchKey => $branch) { ?>
                                                            <?php $isLast = sizeof($faculty['branchList']) == ($branchKey+1);?>
                                                            <li class="task-list-item done <?=($isLast ? 'last-item' : '')?>">
                                                                <div class="task-icon">
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-bookmark" title="ดูรายละเอียด"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="task-status">
                                                                    <a class="pending" href="http://www.stjohn.ac.th/sju/admission_sju/index.php?Node=ADDMISSION" target="_blank">
                                                                        <i class="fa fa-plus" title="สมัครเรียน"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="task-content">
                                                                    <h4 class="uppercase bold">
                                                                        <a href="<?=base_url().'detail.php?detailId='.$branch['branchId']?>" target="_blank"><?=$branch['branchNameTH']?></a>
                                                                        <!--<span onClick="onBranchClick('<?=$branch['branchId']?>')" style="cursor: pointer;"><?=$branch['branchNameTH']?></span>-->
                                                                    </h4>
                                                                    <a href="<?=base_url().'detail.php?detailId='.$branch['branchId']?>" target="_blank"><font style="font-size: 0.75em;">รายละเอียดสาขา</font></a>
                                                                </div>
                                                            </li>
                                                            <?php } ?>
                                                        </ul>
                                                        
                                                    </div>
                                                </div>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>

                                <!-- TAB -->
                            </div>





                            
                        </div>
                    </div>
                    <?php }?>
                </div>
            <!--</div>-->
        </div>

    </div>

    <div class="row" id="facultyInfo" style="display: none;">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2>ปริญญาตรี</h2>
            <hr />
            <!--<div class="container">-->
                <div class="card">

                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-hover" id="facultyInfoTable">
                                <thead>
                                    <tr>
                                        <th>คณะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ไม่พบข้อมูล</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            <!--</div>-->
        </div>
    </div>

    <div class="row" id="branchInfo" style="display: none;">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2>ปริญญาตรี</h2>
            <hr />
            <!--<div class="container">-->
                <div class="card">

                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-hover" id="branchInfoTable">
                                <thead>
                                    <tr>
                                        <th>สาขาวิชา</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ไม่พบข้อมูล</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            <!--</div>-->
        </div>
    </div>

</div>

<!-- Modal -->
<div id="courseInfoModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p>ไม่พบข้อมูล</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $('#birthday').datepicker({
        language: 'th'
    });

    $('span.list-group-item').click(function() {
        $('span.list-group-item').each(function(index) {
            var item = ($('span.list-group-item')[index]);
            $(item).css('background-color', '#fff');
        });

        $(this).css('background-color', '#f6f6f6');
    });

    $('#makeQuestionSubmit').click(function(event) {
        event.preventDefault();
        makeQuestion();
        $('#question').val('');
    });

    $('#question').keypress(function (e) {
        if (e.which == 13) {
            makeQuestion();
            $(this).val('');
        }
    });

    function makeQuestion() {
        var data = $('#makeQuestionForm').serialize();
        console.log(data);
        $.ajax({
            url: '<?=base_url()?>home/makeQuestion',
            method: 'post',
            data: data,
            success: function(response) {
                console.log(response.success);
                if (response.success) {
                    swal("Success!!", response.message, "success")
                }
                else {
                    swal("Error!!", response.message, "error")
                }
            },
            error: function(response) {
                swal("Error!!", 'ไม่สามารถส่งคำถามซ้ำได้', "error")
            }
        });
    }

    function onBranchClick(branchId) {
        $.ajax({
            url: '<?=base_url()?>home/hasCourseDetail',
            method: 'post',
            data: 'branchId=' + branchId,
            success: function(result) {
                if (result.success) {
                    if (!result.hasCourseDetail) {
                        swal('ไม่พบข้อมูลหลักสูตร');
                    }
                    else {
                        window.open('<?=base_url()?>home/courseDetail/' + branchId);
                    }
                }
            },
            error: systemError
        });
    }

    function systemError() {
        swal("ไม่สามารถติดต่อระบบ กรุณาติดต่อผู้ดูแลระบบ");
    }
</script>