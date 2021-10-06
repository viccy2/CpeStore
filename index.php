<!DOCTYPE html>
<html>
<head>
	<title>CPEstore || Home</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width" initial-scale="1">
     <!--============================STYLES=====================================================-->
  
	<link rel="stylesheet" type="text/css" href="css/sb-admin-2.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="css/notifications/Lobibox.min.css">
    <link rel="stylesheet" href="css/notifications/notifications.css">
    <link rel="stylesheet" type="text/css" href="css/modal.css">
	<script src="js/jquery.3.2.1.min.js"></script>
	  


	
</head>
<!--=================================BODY================================================-->
<body onload="searchAll('');">

	<!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light  topbar mb-4 " style="background-color:#1d52ba">
        	 <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
        <p style="font-size:16px;margin-top:25px;color:white;">CPE<span style="text-transform:lowercase;font-size:16px;margin-top:25px;color:white;">store</span></p>
        </div>
        
      </a>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto" >

        <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell fa-fw" style="color:white"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">0</span>
              </a>
             
            </li>

            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white small"><?php echo $_SESSION['username']; ?></span>
                <img class="" >
                <img src='images/your-picture.png'  style='width:40px;height:40px;border-radius: 50%' >
              </a>
              <!-- Dropdown - User Information -->
             
            </li>

          </ul>

        </nav>
   

<div class="payment-cart-pro  ">
            <div class="container-fluid text-gray-600">
            <div class="row" id="displaybox">

</div></div></div>
<!--=======================================FOOTER=============================================-->
<div style="position:fixed;bottom:0;width:100%;color:#1d52ba;height:30px;padding: 0.4rem">
    <center>
     <span ><b></b> &copy;  2021 Powered by <b><a href="https://vaad.netlify.app/" style="color:#1d52ba">VAD.INC</a></b></span></center>
  </div>
<!--=======================================/FOOTER=============================================-->

 <div class="modal fade" id="companyDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true " style="margin-top:3pc;">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Product Check-Out</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="details" method="post" action="purchase.php">
          <input type="text" name="id" value="" id='addDet' hidden>
          <input type="text" name="tquantity" value="" id='quants' hidden>
          <input type="text" name="newquantity" value="" id='tquants' hidden>
          
          <div class="input-field">
            <i class="fa fa-glob">Quantity to Purchase : </i><br>
            <input type="text" name="website" placeholder="Enter Quantity to Purchase" required="required"  class="form-control" oninput="getPrice();" id="quant">
          </div><br>
          <div class="input-field">
            <i class="fa fa-glob">Initial Price : (#)</i>
            <input type="text" name="website"  required="required" id="website" class="form-control">
          </div><br>
           <div class="input-field">
            <div><b>Total Price</b> : <b>(#)</b> <div id="total"></div> </div>
          </div>
         
         
          
           
           
           
         
            
          </form>
        </div>
        <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Cancel</button>
        <button class="btn" href="#" onclick="addDetails()">Check-Out</button>
         
        </div>
      </div>
    </div>
  </div>
	
	  <!--============================SCRIPTS=====================================================-->

    <script>
       function searchAll()
          {
          c = 'yes';
          $.post("search.php",{first:c},function(response) {
          var arr = JSON.parse(response);
          var i;
          var out = "";
          for(i = 0; i < arr.length; i++) {
          out += " <div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'><div class='card payment-card responsive-mg-b-30 card border-left-primary shadow h-100 py-2'><div class='container'><img src='"+arr[i].product_image+"' alt='Person' width='120' height='120' style='width:100%;height:250px;border-radius:5%'></div><div class='payment-inner-pro'><i class='fa fa-cc-paypa' aria-hidden='true'></i><h5></h5><div class='row m-t-10 container-fluid'><div class='col-sm-6'><strong class='m-r-5'>Product Name : </strong>"+arr[i].product_name+"<br><strong class='m-r-5'>Price : </strong>#"+arr[i].product_price+"<br> <strong class='m-r-5'>Available Quantity : </strong>"+arr[i].product_quantity+"</div><div class='col-sm-6 text-right'> <button onclick='add("+arr[i].product_id+" ) ' class='btn pd-setting-ed' ' data-target='#companyDetailsModal' data-toggle='modal'><i class='fa fa-plus fa fa-sm' aria-hidden='true'></i> Add to Cart</button></div></div></div></div><br></div>";

            }
            $('#displaybox').html(out);
            });
            };
          
</script>
<script>
    function add(e) {
    // alert(e);
    a = document.getElementById('addDet').value=e;
    c = a;
          $.post("details.php",{first:c},function(response) {
          var arr = JSON.parse(response);
          var i;
          var out = "";
          for(i = 0; i < arr.length; i++) {
            document.getElementById('website').value=arr[i].product_price;
            document.getElementById('quants').value=arr[i].product_quantity;
            

          
            }
            
            });

 };
</script>
<script>
  function getPrice(){
    a=document.getElementById('quant').value;
    b=document.getElementById('website').value;
    c=document.getElementById('total').innerHTML= +a * +b;
    d=document.getElementById('quants').value;
    document.getElementById('tquants').value=+d - +a;
  }
</script>
  <!-- < COMPANY DETAILS> -->
 <script>
      function addDetails(){
     $(document).ready(function(){
        var form = $("#details");
        var formData = new FormData($("#details")[0]);

          $.ajax({
              url: form.attr("action"),
              type: 'POST',
              enctype: 'multipart/form-data',
              data: formData,

              success: function(data){
                $("#main").show();
                $("#loader").hide();
                $("#error").show();
                $('#error').text('');
                $('#error').text(data);
                var b = data;
               var match = data.match("purchase successfull ");
               var matchs = data.match("Out of Stock");
               
                if (match!=null) {
                   $(this).hide();
                    Lobibox.notify('success', {
                    size: 'mini',
                    msg: data
                });
                var a =setTimeout(function(){
               location.reload(true);
                },5000);
                  var jarvis = new Artyom();
                 jarvis.say(data);
                };
                if (matchs!=null) {
                 var d= Lobibox.notify('error', {
                    size: 'mini',
                    msg: data
                });
                   var jarvis = new Artyom();
                 jarvis.say("Already a member");
                };
               
                
                
              },
              error: function(data){
                alert("not success");
              },
              cache: false,
              contentType: false,
              processData: false
         

         }); 
        }); 
        };
 </script>
 <script src="js/app.js"></script>
 <script src="js/notifications/Lobibox.js"></script>
 <script src="js/sb-admin-2.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>