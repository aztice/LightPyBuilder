<?php
include 'config.php';
$id=$_GET['id'];
$url=api().'dist/'.$id.'py.exe';
$headers = get_headers($url);
$fileExists = strpos($headers[0], '200 OK') !== false;
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>LightPyBuilder Project</title>
</head>
<body>
  <h1>LightPyBuilder Project</h1>
  <p>This page provides the result of the build application of LightPyBuilder</p>
  <h2>Build Result</h2>
  
  <?php if ($fileExists) { echo "<!--"; } ?>
    <br>
    <center><h2>Your data is building, please refresh to check the new status</h2></center>
    <br>
    <center><button onclick="location.reload();" style="font-size:20px;">Refresh</button></center>
  <?php if ($fileExists) { echo "-->"; } ?>
  <?php if ($fileExists) {} else { echo "<!--"; } ?>
    <blockquote>
      <table>
        <tr>
          <th>
            <textarea style="width:350px;height:450px;" disabled>Logs:
              <?php echo str_replace('c:\\wwwroot\\127.0.0.1', '$builder$', file_get_contents(api() . $id . '.log')); ?>
            </textarea>
          </th>
        </tr>
        <tr>
          <th>
            <button style="font-size:25px;" onclick="window.location.href='<?php echo "./download/" . $id . "py.exe"; ?>';">Download the result (.exe)</button>
          </th>
        </tr>
      </table>
    </blockquote>
  <?php if ($fileExists) {} else { echo "-->"; } ?>
</body>
</html>
