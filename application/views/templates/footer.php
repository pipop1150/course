<style>
footer .col-md-4 {
  padding-bottom: 15px;
}

footer i {
  
  /*display: inline-block;*/
  -moz-border-radius: 100px;
  -webkit-border-radius: 100px;
  border-radius: 100px;
}

.fa-facebook {
  padding: 21px 18px;
  background-color: #3B5998;
}

.fa-google {
  padding: 21px 15px;
  background-color: #DD4B39;
}

.fa-twitter {
  padding: 21px 11px;
  background-color: #55ACEE;
}

.social-media {
  margin-bottom: 20px;
}

#map {
  height: 430px;
  position: relative;
  width: 100%;
}

.footer img {
  height: auto;
  position: relative;
  width: 100%;
}
.tab-pane.fade {
  color: #000;
}
.table-bordered{
  color: #ffffff;
}
.table-bordered th {
   text-align: center;   
}
.table-bordered td {
   padding-left: 10px;
   padding-top: 10px;
   padding-bottom: 10px;
}
</style>

<footer class="footer">
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
          <h3>ข้อมูลการติดต่อ</h3>
          <hr />
          <table class="table-bordered" border="0">
              <tr>
                <th width="25%">ที่อยู่</th>
                <td>1110/5 ถนน วิภาวดีรังสิต<br/> แขวง ลาดยาว เขต จตุจักร<br/> กรุงเทพมหานคร 10900</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>corporate_comm@stjohn.ac.th</td>
              </tr>
              <tr>
                <th>เบอร์โทร</th>
                <td>
                  แผนกรับสมัคร โทร 086-909-1727<br/>
                   <!-- ป. ตรี โทร 081-820-6026<br/> -->
                   <!-- ป. โท โทร 081-820-6026<br/>
                   ป. เอก โทร 081-809-0330<br/> -->
                </td>
              </tr>
              <tr>
                <th>Social</th>
                <td><a href="https://www.facebook.com/stjohn.university/" target="_blank">stjohn.university</a></td>
              </tr>
          </table>
          <br/>
          <!--<div class="row">
            <a href="https://www.facebook.com/stjohn.university/" target="_blank">
            <div class="col-md-12 col-sm-12 col-xs-4 text-center social-media">
                <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
            </div>
            </a>
            <div class="col-md-12 col-sm-12 col-xs-4 text-center social-media">
              <i class="fa fa-google fa-2x" aria-hidden="true"></i>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-4 text-center social-media">
              <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
            </div>
          </div>-->
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">
          <h3>แผนที่</h3>
          <hr />
          <!--<iframe width="100%" height="450" 
            frameborder="0" style="border:0" 
            src="https://www.google.com/maps/embed/v1/place?q=st%20john%20university%20thailand&key=AIzaSyDbnmuGFBJORiPE72AhjsBq8nGvNVWQCvo" 
            allowfullscreen></iframe>-->
            <!--<a href="<?=asset_url();?>images/map.jpg" target="_black"><img src="<?=asset_url();?>images/map.jpg" /></a>
            <div id="map"></div>-->

            <div class="panel">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1primary" data-toggle="tab">แผนที่มหาวิทยาลัย</a></li>
                            <li class=""><a href="#tab2primary" data-toggle="tab">แผนที่มหาวิทยาลัย Google Map</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab1primary">
                          <a href="<?=asset_url();?>images/map2.jpg" target="_black"><img src="<?=asset_url();?>images/map2.jpg" /></a>
                        </div>
                        <div class="tab-pane fade" id="tab2primary">
                          <iframe width="100%" height="400" 
                          frameborder="0" style="border:0" 
                          src="https://www.google.com/maps/embed/v1/place?q=st%20john%20university%20thailand&key=AIzaSyDbnmuGFBJORiPE72AhjsBq8nGvNVWQCvo" 
                          allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>


        </div>
      </div>

      


    </div>
  </div>
</footer>

<script>
  function initMap() {
    var sjuLatLng = {lat: 13.8103858, lng: 100.5607525};

    // Create a map object and specify the DOM element for display.
    var map = new google.maps.Map(document.getElementById('map'), {
      center: sjuLatLng,
      scrollwheel: false,
      zoom: 16
    });

    // Create a marker and set its position.
    var marker = new google.maps.Marker({
      map: map,
      position: sjuLatLng,
      title: 'Saint John University'
    });
  }
</script>
 <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv7TEmqDMVo5Z91ba_pIo3gujxAyVLMvQ&callback=initMap"
    async defer></script>-->