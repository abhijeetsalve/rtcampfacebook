<?php
session_start();
set_time_limit(0);
require_once './Facebook/autoload.php';

        $fb = new Facebook\Facebook([
          'app_id' => $_SESSION['APPID'],
          'app_secret' => $_SESSION['APPSID'],
          'default_graph_version' => $_SESSION['VERID'],
          ]);
        $accessToken = $_SESSION["fb"];        
        $albumID = $_GET['c1'];
        $folder = __DIR__;
        $tmp = 0;
                $zip = new ZipArchive;
                    if ($zip->open($_SESSION['fbusernm'].'.zip', ZipArchive::OVERWRITE) === TRUE)  
    {
            for($i=0;$i<count($albumID);$i++)
            {
                $tmp = 0;
                $res = $fb->get('/'.$albumID[$i].'', $accessToken);
                $alnm =$res->getDecodedBody();
                do
                {
                    if($tmp==0)       
                    {
                        $res = $fb->get('/'.$albumID[$i].'/photos?fields=picture,name,height,width,images,id&limit=99999', $accessToken);
                        foreach($res->getDecodedBody()["data"] as $photo)
                        {
                            $zip->addFromString($alnm['name']."/".$photo['id'].".jpg", file_get_contents($photo["images"][0]["source"]));
                           $tmp++; 
                        }
                    }
                    else
                    {
                        $x=substr($res->getDecodedBody()["paging"]["next"],33);
                        $res =  $fb->get($x, $accessToken);
                        foreach($res->getDecodedBody()["data"] as $photo)
                        {
                            $zip->addFromString($alnm['name']."/".$photo['id'].".jpg", file_get_contents($photo["images"][0]["source"]));
                            $tmp++;
                        }       
                    }
                }while(isset($res->getDecodedBody()["paging"]["next"]));
            }
    }
    $zip->close();
                header("location: ./".$_SESSION['fbusernm'].".zip");

