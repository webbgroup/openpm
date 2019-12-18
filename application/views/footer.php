<?php /*

    Copyright (C) 2019 Joel Webb

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/ ?>
<?php if ($style) {
	foreach ($style as $color) {

	}
	?>
<input type="hidden" value="<?php echo $color->cvalue;?>" id="footer_color" />
<?php }
?>
<script type="text/javascript">
      $(document).ready(function(){
        var color = $("#footer_color").val();
        $("#footer_div").css('background-color', color)
        });
        </script>
<div class="footer" id="footer_div">

<div class="container">



<div class="row">
            <div class="col-lg-3 col-sm-3">
                   <h4>Information</h4>
                   <ul class="row">
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="<?php echo base_url();?>index.php/home/about">About</a></li>
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="<?php echo base_url();?>home/agents">Agents</a></li>
               <!--  <li class="col-lg-12 col-sm-12 col-xs-3"><a href="<?php echo base_url();?>home/blog">Blog</a></li> -->
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="<?php echo base_url();?>home/contact">Contact</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-sm-3">
                    <h4>Newsletter</h4>
                    <p>Get notified about the latest properties in our marketplace.</p>
                    <form class="form-inline" role="form">
                            <input type="text" placeholder="Enter Your email address" class="form-control" id="email" name="email">
                                <button class="btn btn-success" type="button" id="news_btn">Notify Me!</button></form>
            </div>

            <div class="col-lg-3 col-sm-3">
                    <h4>Follow us</h4>
                    <a href="#"><img src="<?php echo base_url();?>images/facebook.png" alt="facebook"></a>
                    <a href="#"><img src="<?php echo base_url();?>images/twitter.png" alt="twitter"></a>
                    <a href="#"><img src="<?php echo base_url();?>images/linkedin.png" alt="linkedin"></a>
                    <a href="#"><img src="<?php echo base_url();?>images/instagram.png" alt="instagram"></a>
            </div>

             <div class="col-lg-3 col-sm-3">
             <?php if ($address) {
	foreach ($address as $adr) {

	}
	?>
                    <h4>Contact us</h4>
                    <p><b></b><br>
<span class="glyphicon glyphicon-map-marker"></span> <?php echo $adr->content;?><br>
<!-- <span class="glyphicon glyphicon-envelope"></span> hello@bootstrapreal.com<br>
<span class="glyphicon glyphicon-earphone"></span> (123) 456-7890</p> -->
<?php }
?>
            </div>
        </div>
<p class="copyright">Copyright &copy 2015-<?php echo date('Y');?>. <a href='http://www.propbot.org'>OpenPM</a> <a href="http://www.PropBot.com">PropBot.com</a> All rights reserved. </p>


</div></div>
    <script src="<?php echo base_url();?>assets1/js/bootbox.min.js"></script>
    <script type="text/javascript">
   $(document).ready(function(){
            $('#news_btn').click(function(){
              var email = $('#email').val();
              if(email==""){
                 bootbox.dialog({
                                      message: "Please enter your email id",
                                      buttons: {
                                        "success" : {
                                          "label" : "OK",
                                          "className" : "btn-sm btn-primary"
                                        }
                                      }
                                    });
                 return false;
              }else{
                          $.ajax({
                          type: 'POST',
                          url: "<?php echo base_url();?>home/newsLetterReg",
                          cache: false,
                          data:'email='+email,
                          dataType: "json",
                          success: function(data) {
                              if(data.success == "yes"){
                                      bootbox.dialog({
                                      message: "Thank you! Your information was successfully saved!",
                                      buttons: {
                                        "success" : {
                                          "label" : "OK",
                                          "className" : "btn-sm btn-primary"
                                        }
                                      }
                                    });
                                          $('#email').val('');
                                  } else {
                                     bootbox.dialog({
                                      message: "Email aready registerd",
                                      buttons: {
                                        "success" : {
                                          "label" : "OK",
                                          "className" : "btn-sm btn-primary"
                                        }
                                      }
                                    });
                                     $('#email').val('');
                                  }
                          }
                      });
                  }
        });
  $("#btnunsub").click(function(){
    var unsubkey = $('#unsubkey').val();

       $.ajax({
                          type: 'POST',
                          url: "<?php echo base_url();?>home/unSubprocess",
                          cache: false,
                          data:'unsubkey='+unsubkey,
                          dataType: "json",
                          success: function(data) {
                              if(data.success == "yes"){
                                      /*bootbox.dialog({
                                      message: "Email Unsubscribed!",
                                      buttons: {
                                        "success" : {
                                          "label" : "OK",
                                          "className" : "btn-sm btn-primary"
                                        }
                                      }
                                    });*/
                                      window.location.href = "<?php echo base_url();?>";
                                  } else {
                                     /*bootbox.dialog({
                                      message: "Problem occured in  unsubscribing",
                                      buttons: {
                                        "success" : {
                                          "label" : "OK",
                                          "className" : "btn-sm btn-primary"
                                        }
                                      }
                                    });*/
                                     window.location.href = "<?php echo base_url();?>";
                                  }
                          }
                      });


  })
$("#btncancelun").click(function(){
window.location.href = "<?php echo base_url();?>";
});

});


    </script>


<!-- Modal -->
</body>
</html>



