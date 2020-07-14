<?php
  include("header.php");
?>
  <style type="text/css">
    .col-sm-2{
      text-align: center;
      color: white;
      margin-top: 40px;
      margin-bottom: 40px;
      height: 460px;
      padding: 20px;
      border: 1px solid white;
      border-radius: 25px;
      margin-right: 20px;
      background: #c92427;
      transition: all .5s;
      cursor: pointer;


    }

    .col-sm-2 img{
      display: block;
      margin:0 auto;
    }
    .col-sm-2 span{
      color: white;
    }
    .col-sm-2 h3{
      font-weight: bold;
    }
    .headline{
      color: #0079BE;
      text-transform: uppercase;
      font-weight: bold;
      text-align: center;
    }
    #first-info{
      margin-left: 16%;
    }
    .row-resiliency-guide{
      color: #0079BE;
      font-weight: bold;
    }
    .col-sm-2:hover{
      transform: scale(1.1);
      background: #0079BE;
      transition: all .5s;
    }
    @media screen and (max-width: 768px){
      #first-info{
        margin-right: 60px;
        margin-left: 60px;
      }
      .col-sm-2{
        height: auto;
        width: auto;
        margin-right: 60px;
        margin-left: 60px;
      }
    }
    @media screen and (max-width: 990px){
      .col-sm-2 h3{
        font-size: large !important;
      }
      .col-sm-2 p{
        font-size: small;
      }
    }

    
    
  </style>
    <div class="container">
        <div class="row">
        <div class="col-sm-6">
          <center>
            <h1 class="row-resiliency-guide">PREPARE</h1>
          </center>
          <h3 class="row-resiliency-guide">BUSINESS RESILIENCY GUIDE FOR SMALL BUSINESS</h3>
          
            <p>   
              Business disruptions are inevitable. A well prepared business can protect themselves from becoming one of the 40% to 60% of businesses that do not open after a disaster.  Simple steps taken now can mean the difference between staying open or closing for good.  
              Prepare your business today!
            </p>
        </div>
          <div class="col-sm-6">
            <img src="img/achievement.jpg" class="img-responsive">
          </div>
     </div>
   </div>

    <section>
        <div class="container">
          <h3 class="headline">HURRICANE PREPAREDNESS</h3>
          <h3 class="headline">FOR BEFORE, AFTER AND DURING THE STORM</h3>
       
          <div class="row">
          <div class="col-sm-2" data-target="#myModal" data-toggle="modal" id="first-info">
              
                <img src="img/information.png" class="img-responsive" style="width: 90px;">
                <h3>GENERAL</h3>
                <p><span class="fas fa-check"></span> Flood Safety</p>
                <p><span class="fas fa-check"></span> Returning Home After a Disaster</p>
                <p><span class="fas fa-check"></span> Coping with a Disaster or Traumatic Event</p>
                <p><span class="fas fa-check"></span> Safe Cleanup After a Disaster</p>

          </div>

          <div class="col-sm-2" data-target="#myModal" data-toggle="modal">
              <img src="img/us-map2.png" style="width: 100px;"  class="img-responsive">
              <h3>NATIONAL</h3>
              <p> <span class="fas fa-check"></span> National Hurricane Center</p>
              <p> <span class="fas fa-check"></span> FEMA</p>
              <p> <span class="fas fa-check"></span> Red Cross</p>
              <p> <span class="fas fa-check"></span> Disaster Assistance Improvement Program</p>
          </div>

          <div class="col-sm-2" data-target="#myModal" data-toggle="modal">
              <img src="img/texas map.png" style="width: 100px;" class="img-responsive">
              <h3>TEXAS</h3>
              <p> <span class="fas fa-check"></span> Texas Hurricane Center</p>
              <p> <span class="fas fa-check"></span> Texas Emergency Management Online</p>
          </div>
            
          <div class="col-sm-2" data-target="#myModal" data-toggle="modal">
              <img src="img/maps-and-flags.png" class="img-responsive" style="width: 90px;">
              <h3>LOCAL</h3>
              <p><span class="fas fa-check"></span> Harris Country Department of Homeland Safety & Emergency Management</p>
              <p><span class="fas fa-check"></span> Harris Country Flood Warning System</p>
              <p><span class="fas fa-check"></span> Galveston Country Office of Emergency Management</p>
              <p><span class="fas fa-check"></span> Disaster Assistance Improvement Program</p>
          </div>
        </div>

        </div>

        
    </section>

    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h2 class="modal-title">CONTACT US</h2></center>
 
          </div>
          <form>

            <div class="modal-body">
              <label >What is your name?*</label>
              <input placeholder="Name*" required="" type="text" class="form-control">
              <label>What is your email?*</label>
              <input type="email" name="" required="" class="form-control" placeholder="youremail@something.com*">
              <label>What is on your mind? Let us know*</label>
              <textarea class="form-control" required="" placeholder="Message*" rows="5"></textarea>
            </div>
            <div class="modal-footer">
              <button name="" class="btn btn-primary text-uppercase font-weight-bold" value="Send">
                Send  <span class="fas fa-paper-plane"></span>
              </button>
              <button type="button" class="btn btn-danger text-uppercase font-weight-bold" value="Send" data-dismiss="modal">
                close  <span class="fas fa-times"></span>
              </button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    
<?php

  include("footer.php");
?>
