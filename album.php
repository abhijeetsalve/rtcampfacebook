<?php
session_start();
?>
<!DOCTYPE html>
    <html>
      <head>
        <title> abhijeet </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="./css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="./css/superslides.css">
      </head>
      <body>
          <!-- Title start-->
         <div class="navbar">
            <div class="navbar-inner">
              <a class="brand" href="#">rtCamp</a>
              <ul class="nav">
                <li class="active"><a href="http://localhost/rtCamp/">Home</a></li>
                <li><a href="http://localhost/portfolio/">Portfolio</a></li>
                <li><a href="http://loachost/">About me</a></li>
                <?php
				if(isset($_SESSION['fb']))
				{
					?><li><a href="https://loaclhost/rtCamp/index.php?logout=t">Logout</a></li><?php
				}
				?>
              </ul>
            </div>
        </div>
          <!-- Title End -->

<?php
require_once './Facebook/autoload.php';

        $fb = new Facebook\Facebook([
          'app_id' => $_SESSION['APPID'],
          'app_secret' => $_SESSION['APPSID'],
          'default_graph_version' => $_SESSION['VERID'],
          ]);
        $accessToken = $_SESSION["fb"];        
        $albumID = $_GET['token'];
        
            $res = $fb->get('/'.$albumID.'/photos?fields=picture,name,height,width,images', $accessToken);
            ?>

              <div id="slides">
                <div class="slides-container">
            <?php
            
            foreach($res->getDecodedBody()["data"] as $photo) 
            {
                echo '<img class="d-block img-fluid" src="'.$photo["images"][0]["source"].'"/>';
            } 
            ?>
                </div>
                    <nav class="slides-navigation">
                        <a href="#" class="next">Next</a>
                        <a href="#" class="prev">Previous</a>
                  </nav>
              </div>

          

  <script src="./js/jquery.min.js"></script>
  <script src="./javascripts/jquery.easing.1.3.js"></script>
  <script src="./javascripts/jquery.animate-enhanced.min.js"></script>
  <script src="./js/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
  <script>
    $(function() {
      $('#slides').superslides({
        hashchange: true,
        play: 2000
      });

      $('#slides').on('mouseenter', function() {
        $(this).superslides('stop');
        console.log('Stopped')
      });
      $('#slides').on('mouseleave', function() {
        $(this).superslides('start');
        console.log('Started')
      });
    });
  </script>
</body>
</html>

