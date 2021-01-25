<html><head><meta charset="windows-1252"><link rel="icon" href="pixlr-bg-result2.png" type="image/png">
<!-- default favicon -->
<link rel="shortcut icon" href="pixlr-bg-result2.png" type="image/png">
<!-- wideley used favicon -->
<link rel="icon" href="pixlr-bg-result32.png" sizes="32x32" type="image/png">
<!-- for apple mobile devices -->
<link rel="apple-touch-icon-precomposed" href="pixlr-bg-result120.png" type="image/png" sizes="120x120">
<link rel="apple-touch-icon-precomposed" href="pixlr-bg-result152.png" type="image/png" sizes="152x152">
<!-- google tv favicon -->
<link rel="icon" href="pixlr-bg-result96.png" sizes="96x96" type="image/jpg"></head></html>
<?php
// Require the configuration before any PHP code as the configuration controls error reporting:
require('config.inc.php');

// Require the database connection:
require(MYSQL);

$page_title = 'CV Upload';
// Include the header file:
include('headercvupload.html');

extract($_POST);

$target_dir = $_SESSION['link_name'] . '/';

$temp = explode('.', $_FILES['fileToUpload']['name']);
$newvidname = round(microtime(true)) . '.' . end($temp);

$target_file = $target_dir . $newvidname;

if($upd)
{
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg" && $imageFileType != "m3u8" && $imageFileType != "ts" && $imageFileType != "flv" && $imageFileType != "wmv" && $imageFileType != "MP4" && $imageFileType != "AVI" && $imageFileType != "MOV" && $imageFileType != "3GP" && $imageFileType != "MPEG" && $imageFileType != "M3U8" && $imageFileType != "TS" && $imageFileType != "FLV" && $imageFileType != "WMV")
{
    echo "File Format Not Supported";
}

else
{
$video_path=$_FILES['fileToUpload']['name'];

$q = "INSERT INTO video(video_name) VALUES ('$video_path)";
$r = mysqli_query($dbc, $q);

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);
?> <style> h3{font-size:48px;} </style>
<h3>Successfully Posted!<a class= "two" href="<?php echo "{$_SESSION['link_name']}";?>"> Back to <?php echo "{$_SESSION['link_name']}";?></a></h3><?php
}
}
?>
<style>
a.two:link {font-family: lucida calligraphy; font-size:150%;}
a.two:visited {font-size:150%}
a.two:hover {font-size:150%;}
input[type=submit] {
    height: 20px;
    color:gray;
}
input[type=submit]:hover {
  cursor:grabbing;
}
h1
{
font-size: 30px;
}
input[type=file]{
    background-color:transparent;
}
button[type=file]
{
 color:transparent;
}
i {
-webkit-transition-duration: 0.8s;
-moz-transition-duration: 0.8s;
-o-transition-duration: 0.8s;
transition-duration: 0.8s;

-webkit-transition-property: -webkit-transform;
-moz-transition-property: -moz-transform;
-o-transition-property: -o-transform;
transition-property: transform;

overflow:hidden;
}
i[type=hoverplay]{
    z-index:99px;
left:200px;
top:500px;
}
i:hover
{
-webkit-transform:rotate(360deg);
-moz-transform:rotate(360deg);
-o-transform:rotate(360deg);
}
h2{font-size:64px;
}
h1{
    font-size:72px;
}
</style>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<h2>&nbsp;&nbsp; Choose CoverVideo.<br>&nbsp;&nbsp; Post to CoverVideo of <?php echo "{$_SESSION['link_name']}"; ?>.</h2><form method="post" enctype="multipart/form-data">
&nbsp;&nbsp; <h1>1)Choose 🍃</h1><input type="file" style="font-size:36px;border-bottom-left-radius:16px 5px;border-top-left-radius:220px 245px;border-bottom-right-radius:230px 240px;height:180px;width:825px;background-color:forestgreen ;color:white;z-index:7;padding-left:160px;padding-top:66px;" name="fileToUpload"/><br><br><br>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<h1>2)Post 🍃</h1><input type="submit" style="border-bottom-left-radius:5px 16px;border-top-left-radius:245px 220px;border-bottom-right-radius:240px 230px;height:150px;font-size:48px;width:500px;background-color:forestgreen;font-type:Lucida calligraphy;color:white;padding:6px;"value="POST VIDEO" name="upd"/>
</form>
<?php 
include('footercvupload.html');
?>
