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
</style>

<footer class="footer">
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-12">
          <h3>Social Media</h3>
          <hr />
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-4 text-center social-media">
              <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-4 text-center social-media">
              <i class="fa fa-google fa-2x" aria-hidden="true"></i>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-4 text-center social-media">
              <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <div class="col-md-10 col-sm-9 col-xs-12">
          <h3>แผนที่</h3>
          <hr />
          <!--<iframe width="100%" height="450" 
            frameborder="0" style="border:0" 
            src="https://www.google.com/maps/embed/v1/place?q=st%20john%20university%20thailand&key=AIzaSyDbnmuGFBJORiPE72AhjsBq8nGvNVWQCvo" 
            allowfullscreen></iframe>-->
            <a href="<?=asset_url();?>images/map.jpg" target="_black"><img src="<?=asset_url();?>images/map.jpg" /></a>
            <!--<div id="map"></div>-->
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