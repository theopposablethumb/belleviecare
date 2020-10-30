<?php
//Process a new form submission in HubSpot in order to create a new Contact.

$hubspotutk = $_COOKIE['hubspotutk'];  //grab the cookie from the visitors browser.
$ip_addr = $_SERVER['REMOTE_ADDR'];  //IP address too.
$hs_context = array(
        'hutk' => $hubspotutk,
        'ipAddress' => $ip_addr,
        'pageUrl' => 'http://www.example.com/form-page',
        'pageName' => 'Example Title'
    );
$hs_context_json = json_encode($hs_context);

//Need to populate these varilables with values from the form.
$str_post = "firstname=" . urlencode($firstname)
        . "&lastname=" . urlencode($lastname)
        . "&email=" . urlencode($email)
        . "&mobilephone=" . urlencode($mobilephone)
        . "&zip=" . urlencode($zip)
        . "&hs_context=" . urlencode($hs_context_json);  //Leave this one be :)

 //replace the values in this URL with your portal ID and your form GUID
$endpoint = 'https://forms.hubspot.com/uploads/form/v2/6461446/0da9c75a-63e6-43b2-95b1-d2642aeb8a80';

$ch = @curl_init();
@curl_setopt($ch, CURLOPT_POST, true);
@curl_setopt($ch, CURLOPT_POSTFIELDS, $str_post);
@curl_setopt($ch, CURLOPT_URL, $endpoint);
@curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
@curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = @curl_exec($ch);  //Log the response from HubSpot as needed.
@curl_close($ch);
echo $response;

?>