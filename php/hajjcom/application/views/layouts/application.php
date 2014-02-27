<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title><?= $title; ?></title>

  
    <link rel="stylesheet" href="<?= "$base/$foundation_css"; ?>">

    <link rel="stylesheet" href="<?= "$base/$app_css"; ?>">

    <script src="<?= "$base/$modernizr"; ?>"></script>

</head>
<body>
    <div id="top-montage">
        <div class="row">
            <div id="logo"><?= img("images/logo.png"); ?></div>
        </div>
    </div>
    <div class="contain-to-grid sticky">
        <nav class="top-bar" data-topbar>
            <ul class="title-area">
                <li class="name">
                    <h1><a href="#">NAHCON Portal</a></h1>
                </li>
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>
            
            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <ul class="right">
                    <li class="has-dropdown">
                    <a href="#">Logged in as Tafsan Travels</a>
                        <ul class="dropdown">
                            <li><a href="#">Edit Profile</a></li>
                            <li><?= anchor('verification/logout','Logout'); ?></li>
                        </ul>
                    </li>
                </ul>
            
                <!-- Left Nav Section -->
                <ul class="left">
                    <?php
                        $nav = array("Home" => "verification", "Applicants" => "applicants", "Payments" => "applicants/payment", "Operations" => "applicants/payment");
                        foreach($nav as $link => $uri) {
                            echo "<li";
                            echo $this->uri->segment(1) == $uri ? ' class="active"' : "";
                            echo ">" . anchor($uri, $link) . "</li>";
                        }
                    ?>
                </ul>
            </section>
        </nav>
    </div>
    <div id="page">
        <div class="row">
            <div class="large-4 columns">
                <div class="box">
                    <div class="title">Welcome <?= $this->session->userdata('display_name'); ?></div>
                    <div class="content">
                        <p><strong>Tafsan Travels and Tours</strong><br/>
                        19, Ayinde Sanni street, Magodo GRA, Lagos</p>
                        <table class="no-style">
                            <tr>
                                <td>Total Applicants</td><td><?= $applicant_count; ?></td>
                            </tr>
                            <tr>
                                <td>Last Login</td><td><?= $this->session->userdata('last_login'); ?></td>
                            </tr>
                        </table>
                        <div><?= anchor("agent/edit", "&raquo; Edit Agent Profile"); ?></div>
                    </div>
                </div>
                <div class="box">
                    <div class="title">HOWTO</div>
                    <div class="content">
                        <p>This is some information telling us howto use the system</p>
                        <ul>
                            <li>Step 1</li>
                            <li>Step 2</li>
                            <li>Step 3</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="large-8 columns" id="switcher">
                <?= $this->message->display('success'); ?>
                <?= $yield; ?>
            </div>
        </div>
    </div>
    <script src="<?= "$base/$jquery"; ?>"></script>
  
    <script src="<?= "$base/$foundation_js"; ?>"></script>

    <script type="text/javascript" language="javascript" src="<?= "$base/$caroufredsel_js"; ?>"></script>
    <!-- optionally include helper plugins -->
    <!--
    <script type="text/javascript" language="javascript" src="helper-plugins/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" language="javascript" src="helper-plugins/jquery.touchSwipe.min.js"></script>
    <script type="text/javascript" language="javascript" src="helper-plugins/jquery.transit.min.js"></script>
    <script type="text/javascript" language="javascript" src="helper-plugins/jquery.ba-throttle-debounce.min.js"></script>
    -->
    <script>
        $(document).foundation();
        $(function() {
            $(document).on('click', '.load-implicit', function() {
                $("#switcher").load($(this).attr('href'));
                return false;
            });
        });
    </script>
</body>
</html>