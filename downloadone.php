<?php
session_start();
require_once './Facebook/autoload.php';

        $fb = new Facebook\Facebook([
          'app_id' => $_SESSION['APPID'],
          'app_secret' => $_SESSION['APPSID'],
          'default_graph_version' => $_SESSION['VERID'],
          ]);
        $accessToken = $_SESSION["fb"];        
     $albumID = $_GET['token'];
        $folder = __DIR__;
                $zip = new ZipArchive;
                if ($zip->open($_SESSION['fbusernm'].'.zip', ZipArchive::OVERWRITE) === TRUE)  {
                    
                        $res = $fb->get('/'.$albumID.'', $accessToken);
                        $alnm =$res->getDecodedBody();
                                $res = $fb->get('/'.$albumID.'/photos?fields=picture,name,height,width,images,id', $accessToken);
                                foreach($res->getDecodedBody()["data"] as $photo)
                                {
                                    $zip->addFromString($alnm['name']."/".$photo['id'].".jpg", file_get_contents($photo["images"][0]["source"]));
                                }
                    
                }
                $zip->close();
                echo  "./".$_SESSION['fbusernm'].'.zip';
         ?>
         
             
