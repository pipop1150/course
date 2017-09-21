<?php 
include "config/database.php"; 
include "module/header.php"; 

if(isset($_GET['detailId']))
{
	//Re-Load Data from DB
	$sql = mysql_query(" select * from branch where branchId = ".$_GET['detailId']);
	$data = mysql_fetch_array($sql);
}

?>

<div id="content" style="margin-bottom: 50px">
            
<style>
.detailData tr td:nth-child(1) {
  text-align: right;
  font-weight: bold;
}
dataDetail table {
  border-collapse: separate;
  background: #fff;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  margin: 50px auto;
  -moz-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
}

.detailData thead {
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
}

.detailData thead th {
  font-family: 'Patua One', cursive;
  font-size: 16px;
  font-weight: 400;
  color: #fff;
  text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.5);
  text-align: center;
  padding: 20px;
  background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuNSIgeTE9IjAuMCIgeDI9IjAuNSIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzY0NmY3ZiIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzRhNTU2NCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
  background-size: 100%;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #646f7f), color-stop(100%, #4a5564));
  background-image: -moz-linear-gradient(#646f7f, #4a5564);
  background-image: -webkit-linear-gradient(#646f7f, #4a5564);
  background-image: linear-gradient(#646f7f, #4a5564);
  border-top: 1px solid #858d99;
}
.detailData thead th:first-child {
  -moz-border-radius-topleft: 5px;
  -webkit-border-top-left-radius: 5px;
  border-top-left-radius: 5px;
}
.detailData thead th:last-child {
  -moz-border-radius-topright: 5px;
  -webkit-border-top-right-radius: 5px;
  border-top-right-radius: 5px;
}

.detailData tbody tr td {
  font-family: 'Open Sans', sans-serif;
  font-weight: 400;
  color: #5f6062;
  font-size: 13px;
  padding: 20px 20px 20px 20px;
  border-bottom: 1px solid #e0e0e0;
}

.detailData tbody tr:nth-child(2n) {
  background: #f0f3f5;
}

.detailData tbody tr:last-child td {
  border-bottom: none;
}
.detailData tbody tr:last-child td:first-child {
  -moz-border-radius-bottomleft: 5px;
  -webkit-border-bottom-left-radius: 5px;
  border-bottom-left-radius: 5px;
}
.detailData tbody tr:last-child td:last-child {
  -moz-border-radius-bottomright: 5px;
  -webkit-border-bottom-right-radius: 5px;
  border-bottom-right-radius: 5px;
}

.detailData tbody:hover > tr td {
  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
  opacity: 0.5;
  /* uncomment for blur effect */
  /* color:transparent;
  @include text-shadow(0px 0px 2px rgba(0,0,0,0.8));*/
}

.detailData tbody:hover > tr:hover td {
  text-shadow: none;
  color: #2d2d2d;
  filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
  opacity: 1;
}
#register h3 a {
  margin-left : 100px;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <!-- <div class="card-content"> -->
                <div>
                    <hr/>
                    <div class="panel">
                        <table class="col-md-offset-2 col-md-10 col-sm-10 col-xs-12">
                          <tr>
                            <td>&nbsp;</td>
                            <td align="left"><div id="toppic1"><strong>แผนกรับสมัคร<br /> 
                            &nbsp;086-909-1727</strong></div></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="left"><div id="toppic1"><strong>เบอร์ติดต่อคณะ/หน่วยงานที่เกี่ยวข้อง</strong></div></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="left" style="line-height:25px; padding-left: 10px;">คณะนิติศาสตร์  		095-575-1924 , 084-0107090<br />
                              คณะนิเทศศาสตร์	081-659-3542&nbsp;&nbsp; หลักสูตรปริญญาโท 0-2513-8576, 0-2512-5782 (วันพุธ – วันอาทิตย์)  <br />
                              คณะบริหารธุรกิจ		0-2938-7012 (วันพุธ – วันอาทิตย์) ,  081-422-1342  ,  081-721-9519<br />
                              คณะวิศวกรรมศาสตร์ 089-779-6156<br />
                              คณะศิลปศาสตร์		0-2938-6966 (วันพุธ – วันอาทิตย์)  ,092-959-7477	<br />
                              คณะปรัชญาและศาสนา		0-2938-7087 (วันพุธ – วันอาทิตย์) , 087-591-9589 <br />
                              คณะศึกษาศาสตร์			0-2938-8353  (วันพุธ – วันอาทิตย์)  , 081-860-1362 <br />
                              หลักสูตรปริญญาเอก	081-809-0330	<br />
                              หลักสูตรปริญญาโท / ป.บัณฑิต   081-820-6026</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="2"><div id="toppic1">แผนที่เดินทาง</div></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="2"><img src="http://www.stjohn.ac.th/sju/admission_sju/images/MapSmall.jpg" width="590" height="530" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                          </tr>

                        </table>
                    </div>

                  </div>
            </div>
        </div>
    </div>
</div>        </div>

<?php 
include "module/footer.php"; 
?>