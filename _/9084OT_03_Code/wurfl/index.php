<?php
//Include the WURFL cloud client
//Edit this path to reflect your project structure
require_once 'src/autoload.php';

//Creates a configuration object
$config = new ScientiaMobile\WurflCloud\Config();

//Setup your API keys
$config->api_key = '';

//Create the cloud client
$client = new ScientiaMobile\WurflCloud\Client($config);

//Detect the device
$client->detectDevice();

//Use the capabilities
$tablet = $client->getDeviceCapability('is_tablet');
$brand = $client->getDeviceCapability('brand_name');
$model = $client->getDeviceCapability('model_name');
$os = $client->getDeviceCapability('device_os');
?>
<html>
    Tablet: <?php echo $tablet; ?> <br/>
    Brand: <?php echo $brand; ?> <br/>
    Model: <?php echo $model; ?><br/>
    OS: <?php echo $os; ?><br/>
</html>