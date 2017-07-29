<style>
    #registerForm .col-md-2, .col-md-4, .col-md-10 {
        margin-bottom: 15px;
    }
</style>
<?php 
    $isFromShortInfo = false;
    if (!empty($shortRegistrationInfo)) {
        $isFromShortInfo = true;
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2>ลงทะเบียน</h2>
            <hr />
            <div class="card">
                <div class="card-content">
                    <h3>ข้อมูลผู้สมัคร</h3>
                    <hr />
                    <form class="form-horizontal" id="registerForm">
                        <!-- First row -->
                        <div class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <label class="col-sm-12 control-label">รหัสประชาชน:</label>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="text" class="form-control" name="idCard" 
                                placeholder="รหัสประชาชน" onKeyPress="return handleIDCard(event)"
                                maxlength="13" value="<?=($isFromShortInfo ? $shortRegistrationInfo['idCard'] : '')?>" />
                            </div>
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <label class="col-sm-12 control-label">วัน/เดือน/ปี เกิด:</label>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="text" class="form-control" 
                                name="birthday" id="birthday" placeholder="วัน/เดือน/ปี(ค.ศ.) เกิด"
                                value="<?=($isFromShortInfo ? $shortRegistrationInfo['birthday'] : '')?>" />
                            </div>
                        </div>

                        <!-- Second row -->
                        <div class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <label class="col-sm-12 control-label">ชื่อ-สกุล:</label>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                                <select class="form-control" name="titleTH" id="titleTH" onChange="onTitleChange(event)">
                                    <option>นาย</option>
                                    <option>นางสาว</option>
                                    <option>นาง</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-8">
                                <input type="text" class="form-control" name="firstNameTH" 
                                placeholder="ชื่อ" value="<?=($isFromShortInfo ? $shortRegistrationInfo['firstNameTH'] : '')?>" />
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="text" class="form-control" name="lastNameTH" 
                                placeholder="สกุล" value="<?=($isFromShortInfo ? $shortRegistrationInfo['lastNameTH'] : '')?>" />
                            </div>
                        </div>
                        
                        <!-- Third row -->
                        <div class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <label class="col-sm-12 control-label">Full name:</label>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                                <select class="form-control" name="titleEN" id="titleEN" disabled>
                                    <option>Mr.</option>
                                    <option>Mrs.</option>
                                    <option>Miss</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-8">
                                <input type="text" class="form-control" name="firstNameEN" placeholder="First name" />
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="text" class="form-control" name="lastNameEN" placeholder="Last Name" />
                            </div>
                        </div>

                        <!-- Fourth row -->
                        <div class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <label class="col-sm-12 control-label">เพศ:</label>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <select class="form-control" name="gender" id="gender" disabled>
                                    <option>ชาย</option>
                                    <option>หญิง</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <label class="col-sm-12 control-label">สัญชาติ:</label>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6" >
                                <input type="text" class="form-control" name="nationality" placeholder="สัญชาติ" />
                            </div>
                        </div>

                        <!-- Fifth row -->
                        <div class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <label class="col-sm-12 control-label">ที่อยู่:</label>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type="text" class="form-control" name="address" placeholder="ที่อยู่ปัจจุบัน บ้านเลขที่, ถนน, แขวง/ตำบล, เขต/อำเภอ" />
                            </div>
                        </div>

                        <!-- Sixth row -->
                        <div class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <label class="col-sm-12 control-label">จังหวัด:</label>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <select class="form-control" name="province">
                                    <option>กรงเทพมหานคร</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <label class="col-sm-12 control-label">รหัสไปรษณีย์:</label>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <input type="text" class="form-control" name="postcode" placeholder="รหัสไปรษณีย์" onKeyPress="return handleNumber(event)" />
                            </div>
                        </div>

                        <!-- Seventh row -->
                        <div class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <label class="col-sm-12 control-label">โทรศัพท์:</label>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="sr-only"></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                                    </div>
                                    <input type="text" class="form-control" name="phone" placeholder="มือถือ"
                                    value="<?=($isFromShortInfo ? $shortRegistrationInfo['phone'] : '')?>" />
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <label class="col-sm-12 control-label">Email:</label>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="sr-only"></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                    </div>
                                    <input type="text" class="form-control" name="email" placeholder="Email"
                                    value="<?=($isFromShortInfo ? $shortRegistrationInfo['email'] : '')?>" />
                                </div>
                            </div> 
                        </div>
                        <br />

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h3>ประวัติการศึกษา</h3>
                            </div>
                        </div>
                        <hr />

                        <!-- Fifth row -->
                        <div class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <label for="idNumber" class="col-sm-12 control-label">สถานบันการศึกษา:</label>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type="text" class="form-control" name="eduIns" placeholder="สถานบันการศึกษา" />
                            </div>
                        </div>

                        <!-- Fourth row -->
                        <div class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <label for="idNumber" class="col-sm-12 control-label">จบการศึกษาระดับ:</label>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <select class="form-control" name="rankEdu">
                                    <option>มัธยม</option>
                                    <option>ปวช.</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <label for="birthday" class="col-sm-12 control-label">เกรดเฉลี่ย:</label>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <input type="text" class="form-control" name="gradeAverage" placeholder="เกรดเฉลี่ย" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-sm-5 hidden-xs"></div>
                            <div class="col-md-2 col-sm-2 col-xs-12" style="margin-top: 15px;">
                                <input class="btn btn-primary form-control" type="submit" onClick="onSubmit(event)" value="ลงทะเบียน" />
                            </div>
                        </div>
                    </form>

                </div> <!-- card-content -->
            </div> <!-- card -->

        </div>
    </div>
</div>

<!--<div class="container">
    <form class="form-horizontal" id="registerForm2">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h4>ประวัติการศึกษา</h4>
            </div>
        </div>
        <hr />

        <div class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
                <label for="idNumber" class="col-sm-12 control-label">สถานบันการศึกษา:</label>
            </div>
            <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="text" class="form-control" name="eduIns" placeholder="สถานบันการศึกษา" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
                <label for="idNumber" class="col-sm-12 control-label">จบการศึกษาระดับ:</label>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <select class="form-control" name="rankEdu">
                    <option>มัธยม</option>
                    <option>ปวช.</option>
                </select>
            </div>
            <div class="col-md-2 col-sm-2 hidden-xs">
                <label for="birthday" class="col-sm-12 control-label">เกรดเฉลี่ย:</label>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <input type="text" class="form-control" name="gradeAverage" placeholder="เกรดเฉลี่ย" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-sm-5 hidden-xs"></div>
            <div class="col-md-2 col-sm-2 col-xs-12" style="margin-top: 15px;">
                <input class="btn btn-primary form-control" type="submit" onClick="onSubmit(event)" value="ลงทะเบียน" />
            </div>
        </div>
    </form>
</div>-->

<script>
    $('#birthday').datepicker({
        language: 'th'
    });

    function onSubmit(event) {
        event.preventDefault();
        var form = $("#registerForm").serialize();
        var data = form.concat(
            '&', 'titleEN=', $('#titleEN').val(), 
            '&', 'gender=', $('#gender').val()
        );
        $.ajax({
            url: "/st-project/courses/register",
            data: data,
            type: "POST",
            success: function(result) {
                console.log(result);
            }
        });
    }

    function onTitleChange(event) {
        switch (event.target.value) {
            case "นาย": 
                $('#titleEN').val("Mr.");
                $('#gender').val('ชาย');
                break;
            case "นาง":
                $('#titleEN').val("Mrs.");
                $('#gender').val('หญิง');
                break;
            case "นางสาว":
                $('#titleEN').val("Miss");
                $('#gender').val('หญิง');
                break;
        }
    }

    function handleIDCard(event) {
        return handleNumber(event);
        // TODO: handle idCard and inform the user
        // if (handleNumber(event)) {
        //     var idCard = document.getElementsByName('idCard')[0].value;
        //     if (idCard.length === 12) {
        //         console.log(idCard);
        //     }
        // }
    }

    function handleNumber(event) {
        if (event.keyCode > 47 && event.keyCode < 58) {
            return true;
        }
        
        return false;
    }

    function checkIDCard(id){
        if(id.length != 13) {
            return false;
        }
        
        var sum = 0;
        for(var i=0; i<12; i++) {
            sum += parseFloat(id.charAt(i))*(13-i);
        }
            
        if((11-sum%11)%10!=parseFloat(id.charAt(12))) {
            return false;
        }

        return true;
    }
</script>