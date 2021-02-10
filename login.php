<html>
    <head>
        <title>
            Login - Sistem RPS IT-DEL
        </title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/mystyle.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </head>
    <body style="background-color:#ffffff;">

       
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-1">
                    <a href="Login.php"><img src="img/silabus.png" style="width:100px;padding:10px;"></a>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-11" style="margin-top:20px;">
                    <h4><b> Sistem Review RPS,Soal dan Berita Acara</b><br>
                    INSTITUT TEKNOLOGI DEL<img src="img/LogoDel.jpg" style="width:40px; height:40px; margin-left:10px;"></h4>
                    </h4>
                </div>
            </div>
        </div>

        <!-- Form Login -->    
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                
                    <div class="outter-form-login"style="background:#e6e6fe; border-radius:7px; border: 1px solid #1543DE; filter:contrast(99%);">
                        
                    <h4 class="text-center title-login"><b>Login</b></h4>
                        <!-- FORM -->
                        <form action="login_proses.php" class="inner-login" method="post">
                        <div class="row">
                        <div class="col-md-4">
                                    <center><img src="img/LogoDel.jpg" style="width:100px;"   alt=""></center>
                                   
                                </div>
                                <div class="col-md-offset-1 col-md-7" >
                                    <div class="form-group">
                                        <b>Username</b>
                                        <input type="text" class="form-control" name="username" style="border: 2px solid #808080; border-radius: 7px; background-color:#ffffff;" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <b>Password</b>
                                        <input type="password" class="form-control" name="password" style="border: 2px solid #808080;border-radius: 7px; background-color:#ffffff; " placeholder="Password">
                                    </div>
                                  
                                    <input type="submit" class="btn btn-block" style=" border-radius: 7px;  background-color:#195CDE; color:#ffffff; font-size:15px;"   value="Masuk" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>