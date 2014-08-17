imageResizerPHP
===============

Use bare php to resize image on the basis of URL
Lets say, the directory name is "images", then the url will be like: http://www.yourdomainname.com/images/height/width/image_path.extension.
This means, you can get any size of image from a high resolution image.

You just need to create the directory and create the following two files:index.php and .htaccess.

Suppose your domain name is: http://www.yourdomainname.com and you need a image of height 300px and width 350px and if your image url is image_url and .jpg is its extension, then the new link for that image will be like this:
http://www.yourdomainname.com/images/300/350/image_url.jpg

if you want the full height and width of this image, try using:

http://www.yourdomainname.com/images/full/full/image_url.jpg

Works with jpg or png or gif images
