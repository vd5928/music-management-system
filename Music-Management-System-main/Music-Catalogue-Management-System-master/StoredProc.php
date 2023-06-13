<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StoredProcedure</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
       
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            font-family: 'Varela Round', sans-serif;
        }

        .modal-login {
            color: #636363;
            width: 350px;
        }

        .modal-login .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            content: 1000px;
            
        }
        
        .modal-login .modal-header {
            border-bottom: none;
            position: relative;
            justify-content: center;
        }

        .modal-login h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -15px;
        }

        .modal-login .form-control:focus {
            border-color: #70c5c0;
        }

        .modal-login .form-control,
        .modal-login .btn {
            min-height: 40px;
            border-radius: 3px;
        }

        .modal-login .close {
            position: absolute;
            top: -5px;
            right: -5px;
        }

        .modal-login .modal-footer {
            background: #ecf0f1;
            border-color: #dee4e7;
            text-align: center;
            justify-content: center;
            margin: 0 -20px -20px;
            border-radius: 5px;
            font-size: 13px;
        }

        .modal-login .modal-footer a {
            color: #999;
        }

        .modal-login .avatar {
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: -70px;
            width: 95px;
            height: 95px;
            border-radius: 50%;
            z-index: 9;
            background: #60c7c1;
            padding: 15px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }

        .modal-login .avatar img {
            width: 100%;
        }

        .modal-login.modal-dialog {
            margin-top: 80px;
        }

        .modal-login .btn {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border: none;
        }

        .modal-login .btn:hover,
        .modal-login .btn:focus {
            background: #45aba6;
            outline: none;
        }

        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
        .signup-names{
            float: left;
        }
        .mar{
            margin-bottom: 5px;     
        }
        .cen{
            position: relative;
            right: 250px;
        }
        .centinp{
            position: 250px;;
        }
        .VT{
            text-align: center;
            text-decoration: underline;
            font-size: 200%;
        }
        .big{
            width:1250px;
            height:500px;
            text-align:center; 
            margin-left:-200px;
            /* margin-right:1000px; */
        }
        .spc{
            text-align:center;
            
        }
    </style>
</head>

<body>

    <!-- Modal HTML -->
    <div>
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
  </div>
</nav> -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <!-- <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div> -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="Song.html">Songs</a></li>
                <li><a href="Singer.html">Singers</a></li>
                <!-- <li><a href="#">Song Info</a></li> -->
                <li><a href="Movie.html">Movies</a></li>
                <li><a href="Trending.html">Trending</a></li>
                <li><a href="Playlist.html">Playlist</a></li>
               
            </ul>
            <ul class="nav navbar-nav navbar-right">
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Account <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Account Settings</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Help</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="Login.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="modal-dialog modal-login modal-lg cen">
            <div class="modal-content modal-lg big">
                <div class="modal-header">
                    <div class="avatar">
                        <img src="logo2.jpg" alt="Avatar">
                    </div>
                    <h4 class="modal-title">Playlist</h4>
                <div class="modal-body">
                        <table class="table table-sm table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">PlaylistID</th>
                                    <th scope="col">PlaylistName</th>
                                    <th scope="col">SongID</th>
                                    <th scope="col">SongName</th>
                                    <th scope="col">SingerName</th>
                                    <th scope="col">MovieName</th>
                                    <th scope="col">Language</th>
                                    <th scope="col">Genre</th>                                
                                  </tr>
                                </thead>
                                <?php
                            //connection
                        $con=mysqli_connect('127.0.0.1','root','');
                        if(!$con){
                            echo'Not connected to server';
                        }
                        if(!mysqli_select_db($con,'musicdb'))
                        {
                            echo'Data base not selected';
                        }
                        //Accepting request and assigned to $id

                        $id=$_POST['playlistID'];
                        //To get sigle value
                        $sql="CALL proc1('$id');";                           
                        $recod=mysqli_query($con,$sql);

                        While($row=mysqli_fetch_array($recod))
                        {
                            //assigning fetched data
                                    
                                         echo "<tr>";
                                         echo "<td>".$row['playlistID']."</td>";
                                         echo "<td>".$row['playlistName']."</td>";
                                         echo "<td>".$row['songID']."</td>";
                                         echo "<td>".$row['songName']."</td>";
                                         echo "<td>".$row['singerName']."</td>";
                                         echo "<td>".$row['movieName']."</td>";
                                         echo "<td>".$row['language']."</td>";
                                         echo "<td>".$row['genre']."</td>";
                                         echo "</tr>";
                                         
                        }
                    ?>
                              </table>
                   
                </div>
            </div>
        </div>
    </div>
</body>

</html>