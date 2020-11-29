<html>
  <head><title>login</title>

  <!-- inporting Bootstrap CSS -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 
  </head>

  <!-- Finishing importing -->

<body>
  <div class="container">
    <form name = "regForm" action="checkloginpage.php" method="post">
        <h2 style='text-align:center'>Login to testimonial application system</h2> <br />

        <div class="form-row">
          <div class="col-md-6">
            <div class="md-form form-group">
            <label for = "email">Email</label>
            <input type="email" class="form-control" name="email" id = "email" placeholder="Email" required/>
            </div>
          </div><br>



            <div class="col-md-6">
            <div class="md-form form-group">
            <label for = "pass">Password</label>
            <input type="password" class="form-control" name="pass" id = "pass" placeholder="Password" required/>
            </div>
          </div>
        </div> <br>







          <div class="col-12">
          <input type="submit"/>
          </div>



        
    </form>

    <p style='position: relative; bottom: 0; width:100%; text-align: right'>If you don't registered yet please click <a href= 'reg.html'>here</a> to register</p>

  </div>

  <!-- Importing Popper jquery etc. -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

  <!-- Finishing importing -->

</body>

<script type="text/javascript">


</script>

</html>

