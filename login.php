<?php

require 'google-api/vendor/autoload.php';
require_once 'backend/autoload.php';

$client = new Google_Client();


$client->setClientId('67252877907-o6gl10gb0o3vfljoeme17qqcoffu5b57.apps.googleusercontent.com');

$client->setClientSecret('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');

$client->setRedirectUri('http://localhost/rs_fitness/login.php');

$client->addScope("email");
$client->addScope("profile");


if (isset($_GET['code'])) {
    //session_destroy();
    $user_model = new UsersModel();
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();


   
    $_SESSION['google_email'] =  $google_account_info['email'];
    $_SESSION['user_lastname'] =  $google_account_info['familyName'];
    $_SESSION['user_firstname'] =  $google_account_info['givenName'];
    $_SESSION['user_fullname'] = $google_account_info['givenName'] . ' ' . $google_account_info['familyName'];

    $result = $user_model->get_user_gmail($google_account_info['email']);
    if (empty($result)) {
        header('Location: register.php');
    } else {
        $_SESSION['user_lastname'] =  $result['lastname'];
        $_SESSION['user_firstname'] =  $result['firstname'];
        $_SESSION['user_middlename'] =  $result['middlename'];
        $_SESSION['user_fullname'] = $result['firstname'] . ' ' . $result['middlename'] . ' ' . $result['lastname'];
        $_SESSION['validated'] = 1;
        $_SESSION['is_admin'] = $result['is_admin'];
        header('Location: index.php');
    }
} else {
    //$_SESSION['error'] = "1";
}


class UsersModel
{
    private $base_table = "rs_users";
    public $data_helper = null;

    public function __construct()
    {
        $this->data_helper = new DataController($this->base_table);
    }

    public function get_user_gmail($email = null)
    {
        global $db;
        $result = $db->get_row("SELECT * FROM {$this->base_table} WHERE gmail_address = ?", [$email]);
        return  $result;
    }
}
class DataController
{
    private $base_table = null;

    public function __construct($tbl = null)
    {
        $this->base_table = $tbl;
    }

    public function get_row_details($pk = null)
    {
        global $db;
        return $db->get_row("SELECT * FROM {$this->base_table} WHERE id = ?", [$pk]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="frontend/build/images/favicon.png" type="image/png" />
    <title>MaLoFit | Login</title>

    <!-- Bootstrap -->
    <link href="frontend/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="frontend/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="frontend/plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="frontend/plugins/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="frontend/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <!-- <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a> -->

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo '<div class = "alert alert-danger">Failed to login. Unauthorized account</div>';
                    }
                    ?>
                    <form>
                        <h1>Login</h1>
                        <p class = "text-muted">Login to start your session</p>
                        <div>
                            <a class="form-control btn btn-md btn-info" href="<?php echo $client->createAuthUrl(); ?>"><i class='fa fa-google'></i>&nbsp;Login with Google</a>

                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">


                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h3>MaLoFit</h3>
                                <p>Regional Science High School III S.Y 2021-2022</p>
                                <p>&copy; <?php echo date('Y'); ?> All Rights Reserved</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>


        </div>
    </div>
</body>

</html>