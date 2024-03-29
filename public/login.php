<?php
require_once("../include/bittorrent.php");
dbconn();

$langid = intval($_GET['sitelanguage'] ?? 0);
if ($langid)
{
	$lang_folder = validlang($langid);
	$enabled = \App\Models\Language::listEnabled();
	if (!in_array($lang_folder, $enabled)) {
	    nexus_redirect(getBaseUrl());
    }
	if(get_langfolder_cookie() != $lang_folder)
	{
		set_langfolder_cookie($lang_folder);
		nexus_redirect($_SERVER['REQUEST_URI']);
	}
}
require_once(get_langfile_path("", false, $CURLANGDIR));

failedloginscheck ();
cur_user_check () ;

$s = "<select name=\"sitelanguage\" onchange='submit()'>\n";
$secret = htmlspecialchars($_GET['secret'] ?? '');
$langs = langlist("site_lang", true);
foreach ($langs as $row)
{
	if ($row["site_lang_folder"] == get_langfolder_cookie()) $se = "selected=\"selected\""; else $se = "";
	$s .= "<option value=\"". $row["id"] ."\" ". $se. ">" . htmlspecialchars($row["lang_name"]) . "</option>\n";
}
$s .= "\n</select>";
?>
<form method="get" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
    <input type="hidden" name="secret" value="<?php echo $secret ?>">
</form>

<?php

unset($returnto);
if (!empty($_GET["returnto"])) {
	$returnto = $_GET["returnto"];
	if (empty($_GET["nowarn"])) {
		print("<h1>" . $lang_login['h1_not_logged_in']. "</h1>\n");
		print("<p><b>" . $lang_login['p_error']. "</b> " . $lang_login['p_after_logged_in']. "</p>\n");
	}
} // ------------------ NexusPHP ------------------
?>
<head>
    <title><?php echo htmlspecialchars($SITENAME)?> | Login</title>
</head>
    <link href="/lagom/theme.css?v=1.4.3" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/lagom/fontawesome-all.min.css" />

<body class="lagom   lagom-not-portal lagom-layout-condensed lagom-layout-banner page-login" data-phone-cc-input="1">
    <div class="app-nav app-nav-condensed hidden-print">
        <section id="header">
            <div class="container">
                <a href="/index.php" class="logo"><img src="/pic/logo.png" title="<?php echo htmlspecialchars($SITENAME)?>" alt="<?php echo htmlspecialchars($SITENAME)?>" /></a>
            </div>
        </section>
    </div>

    <div class="app-main">
        <div class="main-body login-page">
            <div class="container">
                <div class="main-grid  row">
                    <div class="main-content col-sm-12">

                        <div class="header-lined text-center m-b-24">
                            <h1>
                                <span class="text-lighter text-small">This page is restricted</span>
                                <br />
                                Secure Client Login
                            </h1>
                        </div>

                        <div class="logincontainer">
                            <div class="logincontainer-body">
                                <form method="post" action="takelogin.php">
                                    <input type="hidden" name="secret" value="<?php echo $secret?>">

                                    <div class="form-group">
                                        <label for="inputEmail">Username</label>
                                        <input type="text" name="username" class="form-control input-lg" placeholder="Enter username" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex space-between">
                                            <label for="inputPassword">Password</label>
                                            <a href="/recover.php">Forgot?</a>
                                        </div>
                                        <input type="password" name="password" class="form-control input-lg" id="inputPassword" placeholder="Password" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex space-between">
                                            <label for="two_step_code">Two step code</label>
                                        </div>
                                        <input type="text" name="two_step_code" class="form-control input-lg" id="inputtwostepcode placeholder="<?php echo $lang_login['two_step_code_tooltip'] ?>" autocomplete="off">
                                    </div>
                                    <?php
                                    show_image_code ();
                                    if ($securelogin == "yes")
                                        $sec = "checked=\"checked\" disabled=\"disabled\"";
                                    elseif ($securelogin == "no")
                                        $sec = "disabled=\"disabled\"";
                                    elseif ($securelogin == "op")
                                        $sec = "";

                                    if ($securetracker == "yes")
                                        $sectra = "checked=\"checked\" disabled=\"disabled\"";
                                    elseif ($securetracker == "no")
                                        $sectra = "disabled=\"disabled\"";
                                    elseif ($securetracker == "op")
                                        $sectra = "";
                                    ?>
                                    <div class="text-center margin-bottom">

                                    </div>
                                    <input id="login" type="submit" class="btn btn-lg btn-primary btn-block" value="Login" />
                            </div>
                            <div class="logincontainer-footer">
                                <div class="text-light">Not a member yet? <a href="/signup.php">Create a New Account</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="main-footer hidden-print">
            <div class="container">
                <div class="footer-content">
                    <p>Copyright &copy; 2023 <?php echo htmlspecialchars($SITENAME)?>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
        <div class="modal system-modal fade" id="modalAjax" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="lm lm-close"></i></button>
                        <h3 class="modal-title"></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
