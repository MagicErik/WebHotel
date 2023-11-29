<?php 
// Generate json file
function write(User $User) {
    $myJSONvar = $User->jsonSerialize();
    file_put_contents("result_data.json", $myJSONvar);
}

?>
