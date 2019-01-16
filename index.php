<!DOCTYPE html>
<html>
<!-- Read from bound VCAP_CREDENTIALS -->
<?php

	
// use BlueMix VCAP_SERVICES environment 
if ($services = getenv("VCAP_SERVICES")) {
  $services_json = json_decode($services, true);
  $authUrl = $services_json["Object-Storage"][0]["credentials"]["auth_url"] . "/v3";
  $region = $services_json["Object-Storage"][0]["credentials"]["region"];
  $userId = $services_json["Object-Storage"][0]["credentials"]["userId"];
  $password = $services_json["Object-Storage"][0]["credentials"]["password"];
  $projectId = $services_json["Object-Storage"][0]["credentials"]["projectId"];
} else {
  throw new Exception('Not in Bluemix environment');
}

curl -X "POST" "https://iam.bluemix.net/oidc/token" \
     -H 'Accept: application/json' \
     -H 'Content-Type: application/x-www-form-urlencoded' \
     --data-urlencode "apikey={vSYzfvzLh5SkHyn80U6Za_u0u1EL4CTQyV4dOFBY5FeX}" \
     --data-urlencode "response_type=cloud_iam" \
     --data-urlencode "grant_type=urn:ibm:params:oauth:grant-type:apikey"


?>
