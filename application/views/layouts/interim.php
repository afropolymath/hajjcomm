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
<body class="interim">
    <div id="top-montage">
        <div class="row">
            <div id="logo"><?= img("images/logo.png"); ?></div>
        </div>
    </div>
    <div id="page">
        <div class="row">
            <div class="large-12 columns">
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