
<div id='footer'>
<div class="Contact">
         <div class="container">
            <div class="row">
               
        
         
            <div class="titlepage3">
                      <ul> <br>
                     
                         <?php echo footer_about(); ?>
                              <li>
                             <br><br> <?php echo footer_link(); ?>
                                  <div class="location_icon">
                                 
                                  
                  <div class="titlepage3" id = "contact">
                      <center>
                     <br> <br><h2>Leave a Message</h2>
                  </div>
               <?php echo contact_us(); ?>
            <form  method="post">
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <form>
                     <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                           <input class="form-control" placeholder="Name" type="name" name="name">
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                           <input class="form-control" placeholder="Phone Number" type="phone" name="phone">
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                           <input class="form-control" placeholder="Email" type="email" name="email">
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                           <input class="textarea" placeholder="Message" name="msg"></input>
                        </div>
                     </div>
               </div>
               <button class="send-btn" type="submit" name="send">Send</button>
            </div> 
            
        </div>
        </form>
</div>