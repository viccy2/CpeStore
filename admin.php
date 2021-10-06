<!DOCTYPE html>
<html>
<head>
	<title>CPEstore || Admin</title>
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
<body >

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

        </nav><br><br><br>

      <form action="reg.php"  method="post" id="form">
          <div class="card" style="margin-top:0px">
            <div class="card-header" style="text-align:center;">
              Add New Product
            </div>
            <div class="card-body">
            <div class="form-field">
            <input type="text" name="name" placeholder="Product's Name" required class="form-control">
            </div><br>
            <div class="form-field">
            <input type="number" name="price" placeholder="Product's price (#)" required class="form-control">
            </div><br>
            <div class="form-field">
            <input type="number" name="quantity" placeholder="Product's Quantity" required class="form-control">
            </div><br>
            <center>
           <div class="">
            <input type="file" class="inputfile" name="fileToUpload" id="your_picture"  onchange="showPreview(this);" data-multiple-caption="{count} files selected" hidden />
            <label for="your_picture">
            <figure id="meme-bg-target">
            <img src="images/your-picture.png" alt="" class="your_picture_image" style="height:50px;width:50px;border-radius:50%">
            <p class="text-gray-500">Select product Picture</p>
              </figure>
            </label>
         </div></center>
         </div><center>
         <div class="card-footer">
           <input id="Send" class="btn" type="button" value="Add Product" style="width:150px;background-color:#1d52ba;color:white; ">
         </div>
          </div></center>
      </form>
	<!--=======================================FOOTER=============================================-->
<div style="position:fixed;bottom:0;width:100%;color:#1d52ba;height:30px;padding: 0.4rem">
    <center>
     <span ><b></b> &copy;  2021 Powered by <b><a href="https://vaad.netlify.app/" style="color:#1d52ba">VAD.INC</a></b></span></center>
  </div>
<!--=======================================/FOOTER=============================================-->
	  <!--============================SCRIPTS=====================================================-->
    <script>
    $(document).ready(function() {
      $("#Send").click(function(){
      var form = $("#form");
      var formData = new FormData($("#form")[0]);

         $.ajax({
                url: form.attr("action"),
              type: 'POST',
              enctype: 'multipart/form-data',
              data: formData,
        success: function(data){
                var b = data;
                var match = data.match("added successfully");
                var matchs = data.match("error");
              
                if (match!=null) {
                   $(this).hide();
                    Lobibox.notify('success', {
                    size: 'mini',
                    msg: data
                });
                 var a =setTimeout(function(){
                location.reload(true);
                },5000);
                };
                if (matchs!=null) {
                 var d= Lobibox.notify('error', {
                    size: 'mini',
                    msg: data
                });
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
    });
</script>
  <script>
       function showPreview(objFileInput) 
      {
    if (objFileInput.files[0]) 
    {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
            $("#meme-bg-target img").attr('src', e.target.result);
        }
        fileReader.readAsDataURL(objFileInput.files[0]);
         }
          }
           </script> 
    
 <script src="js/app.js"></script>
 <script src="js/notifications/Lobibox.js"></script>
 <script src="js/sb-admin-2.js"></script>
  
</body>
</html>