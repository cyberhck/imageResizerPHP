<?php
/**
 * @author Nishchal Gautam <gautam.nishchal@gmail.com>
 * @category images
 * @copyright (c) 2013, Nishchal Gautam
 * @license http://www.wl-dm.blogspot.com/2013/01/terms-and-conditions.html
 * @version 1.0 Beta
 */
 header("Last-Modified: ".date("D, d M Y H:i:s",time()-3600000));
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 36000000));
// the browser will send a $_SERVER['HTTP_IF_MODIFIED_SINCE'] if it has a cached copy 
if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])){
  // if the browser has a cached version of this image, send 304
  header('Last-Modified: '.$_SERVER['HTTP_IF_MODIFIED_SINCE'],true,304);
  exit;
}
$image_id=$_GET['image_id'];
$chunk=  explode("/", $image_id);
$destination_height=$chunk[0];
$destination_width=$chunk[1];
$image="../site_contents/photos/".$chunk[2];
if(file_exists($image))
{
$extension=explode(".",$image);
$extension=end($extension);
switch ($extension) {
    case "jpg":
        $source_image=  imagecreatefromjpeg($image);
        break;
case "jpeg":
        $source_image=  imagecreatefromjpeg($image);
        break;
    case "gif":
        $source_image=  imagecreatefromgif($image);
        break;
    case "png":
        $source_image=  imagecreatefrompng($image);
        break;    
    default:
 exit();
        break;
}
        $source_height = imagesy($source_image);
        $source_width = imagesx($source_image);
        if($destination_height=="full")
        {
            $destination_height=$source_height;
        }
        if($destination_width=="full")
        {
            $destination_width=$source_width;
        }
        $destination_image=  imagecreatetruecolor($destination_width, $destination_height);
  $dst_x=0;
     $dst_y=0;
     $src_x=0;
  $src_y=0;
  imagecopyresized($destination_image,$source_image,$dst_x,$dst_y,$src_x,$src_y,$destination_width,$destination_height,$source_width,$source_height);
switch ($extension) {
    case "jpg":
   imagejpeg($destination_image);
   header("content-type:image/jpeg");
        break;
  case "jpeg":
   header("content-type:image/jpeg");
   imagejpeg($destination_image);
        break;
    case "gif":
   header("content-type:image/gif");
   imagegif($destination_image);
        break;
    case "png":
   header("content-type:image/png");
   imagepng($destination_image);
        break;
    default:
    break;
}
}
?>
