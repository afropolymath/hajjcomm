<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title><?= $title; ?></title>

  
    <link rel="stylesheet" href="<?= "$base/$foundation_css"; ?>">

    <link rel="stylesheet" href="<?= "$base/$site_css"; ?>">

    <script src="<?= "$base/$modernizr"; ?>"></script>

</head>
<body>
    <div id="top-montage">
        <div class="row">
            <div class="large-7 columns">
                <div id="logo"><?= img("images/logo.png"); ?></div>
            </div>
            <div class="large-5 columns">
                <form role="form" class="search-form">
                    <label for="q">Search the NAHCON Site</label>
                    <div class="row collapse">
                        <div class="large-9 columns">
                            <input type="text" name="q" placeholder="Enter search terms" class="radius"/>
                        </div>
                        <div class="large-3 columns">
                            <input type="submit" name="search" value="Search" class="button radiuss">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="navbar">
        <div class="row">
            <ul class="right">
                <li><?= anchor("verification/login", "Tour Agents Login"); ?></li>
            </ul>
            <ul>
                <li><?= anchor("#", "Home"); ?></li>
                <li><?= anchor("#", "About the NAHCON"); ?></li>
                <li><?= anchor("#", "NAPERS"); ?></li>
                <li><?= anchor("#", "News"); ?></li>
                <li><?= anchor("#", "FAQs"); ?></li>
                <li><?= anchor("#", "Contact"); ?></li>
            </ul>
        </div>
    </div>
    <div id="">
        <ul class="example-orbit" data-orbit data-options="animation:fade; bullets:false; pause_on_hover:true; resume_on_mouseout:true; slide_number:false; timer_speed: 3000">
            <li>
                <?= img("images/1.jpg"); ?>
                <div class="orbit-caption">
                  HAJJ Event Highlights at Saudi Arabia
                </div>
            </li>
            <li>
                <?= img("images/2.jpg"); ?>
                <div class="orbit-caption">
                  The Imam Praying and Leading the people
                </div>
            </li>
            <li>
                <?= img("images/3.jpg"); ?>
                <div class="orbit-caption">
                  The Venue is Jampacked.
                </div>
            </li>
        </ul>
    </div>

    
    <div id="page">
        <?= $yield; ?>    
    </div>
    <div id="footer">
        <div class="row">
            <div class="footer-image"><?= img("images/nahcon_footer.jpg"); ?></div>
            <div class="large-3 columns">
                <h1>About the Commission</h1>
                <ul class="link-list">
                    <li><?= anchor("#","Our History"); ?></li>
                    <li><?= anchor("#","Mission"); ?></li>
                    <li><?= anchor("#","Vision"); ?></li>
                    <li><?= anchor("#","NAHCON ACTS"); ?></li>
                </ul>
            </div>
            <div class="large-9 columns">
                <h1>Getting a VISA</h1>
                <ul class="link-list">
                    <li><?= anchor("#","Application Procedure"); ?></li>
                    <li><?= anchor("#","Flight Updates"); ?></li>
                    <li><?= anchor("#","Affiliated Agencies"); ?></li>
                    <li><?= anchor("#","Travel Document Policies"); ?></li>
                </ul>
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