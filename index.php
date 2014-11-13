<?php

#######################################################################
# The Tozny Variables
#######################################################################
define('REALM_KEY_ID','<YOUR REALM KEY ID>');
define('REALM_KEY_SECRET','<YOUR REALM KEY SECRET>');
define('API_URL','https://api.tozny.com/index.php');
#######################################################################


# Turn sessions on
session_start();

# Require the Tozny library
require_once('ToznyRemoteRealmAPI.php');

# Create the Tozny object
$tozny = new Tozny_Remote_Realm_API(
    getenv('REALM_KEY_ID') ?: REALM_KEY_ID,
    getenv('REALM_KEY_SECRET') ?: REALM_KEY_SECRET,
	API_URL
);

# Login
if(!empty($_REQUEST['tozny_action'])){
    # Check if we're already logged in
    if(empty($_SESSION['user']['user_id']) && $_REQUEST['tozny_action'] == 'tozny_login'){
        # Verify the login credentials
        if($tozny->verifyLogin($_REQUEST['tozny_signed_data'],$_REQUEST['tozny_signature'])){
            # Get the successful user and put him in a session
            $user = $tozny->decodeSignedData($_REQUEST['tozny_signed_data']);
            $user = $tozny->userGet($user['user_id']);
            $_SESSION['user'] = $user;
        }else{
            $alert = "There was a problem logging in.";
        }
    }
}

# Logout
if(!empty($_REQUEST['logout'])){
    unset($_SESSION);
    session_destroy();
}


?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="https://s3-us-west-2.amazonaws.com/tozny/production/interface/javascript/v2/tozny.css" rel="stylesheet" type="text/css" />
    
    <style>
        body {
            margin:0;
            padding:0;
        }
    </style>
</head>

<body>
<?php if(!empty($_SESSION['user']['user_id'])){ ?>

    <div class="row">
        <div class="col-md-12 text-center">
            <h1>You're logged in!</h1>
            <a href="index.php?logout=yes">Logout</a>
        </div>
    </div>

<?php } else { ?>

        <?php if(!empty($alert)){ ?>
                <div class="alert alert-danger"><?php echo $alert?></div>
        <?php } ?>
        
		<div id="tozny"></div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
		<script src="https://s3-us-west-2.amazonaws.com/tozny/production/interface/javascript/v2/jquery.tozny.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#tozny').tozny({
					"type": "login",
					"style": "button",
					"theme": "light",
					"button_theme": "light",
					"realm_key_id": "<?= getenv('REALM_KEY_ID') ?: REALM_KEY_ID?>",
					"api_url": "<?= API_URL?>",
					"form_action":"index.php"
				});
			});
		</script>
<?php } ?>
</body>
</html>





