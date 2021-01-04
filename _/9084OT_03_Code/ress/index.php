<?php
//Include the WURFL cloud client
//Edit this path to reflect your project structure
require_once 'src/autoload.php';

//Creates a configuration object
$config = new ScientiaMobile\WurflCloud\Config();

//Setup your API keys
$config->api_key = '357280:gSusq6nAaYNoUGZm0xVcEvfi3421LwOy';

//Create the cloud client
$client = new ScientiaMobile\WurflCloud\Client($config);

//Detect the device
$client->detectDevice();

//Use the capabilities
$tablet = $client->getDeviceCapability('is_tablet');
$brand = $client->getDeviceCapability('brand_name');
$model = $client->getDeviceCapability('model_name');
$os = $client->getDeviceCapability('device_os');

if ($tablet)
{
    $stylesheet = 'tablet.css';
    if ($os == 'iOS')
    {
        $page_to_load = 'apple.html';
    }
    else if ($os == 'Android')
    {
        $page_to_load = 'tablet.html';
    }
    else
    {
        $page_to_load = 'other.html';
    }
}
else
{
    $stylesheet = 'desktop.css';
    $page_to_load = 'non_tablet.html';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>RESS Test</title>
    <meta name="apple-itunes-app" content="app-id=544007664">
    <meta name="google-play-app" content="app-id=com.google.android.youtube">
    <link type="text/css" rel="stylesheet" href="<?php echo $stylesheet;?>" />
    <script src="js/modernizr.js"></script>
    <script>
    </script>
</head>
<body>
<div id="container">
    Below is some accessories for your <?php echo $brand; ?> tablet device!
    <?php
        include($page_to_load);
    ?>
</div>
</body>
</html>