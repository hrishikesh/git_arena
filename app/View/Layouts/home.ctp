<?php
/**
 * @var view $this
 */
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
    <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php echo $this->Html->charset(); ?>
    <title>Git Arena | Login</title>
    <?php
    //echo $this->Html->meta('icon');//remove the comment whenever you add the favicon to the application
    echo $this->Html->css(array('bootstrap', 'jquery-ui', 'custom'));
    echo $this->fetch('meta');
    echo $this->fetch('css');

    echo $this->Html->script(array(
        'jquery-1.8.3',
        'jquery-ui',
        'custom',
        'highCharts/highcharts-more',
        'highCharts/highstock'
    ));
    echo $this->fetch('script');
    ?>
    <link rel="icon" href="/app/webroot/img/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="/app/webroot/img/favicon.ico" type="image/x-icon"/>

    <!--[if gte IE 9]>
    <style type="text/css">
        .gradient {
            filter: none;
        }
    </style>
    <![endif]-->
</head>
<body class="loginLowerBg">
<?php
echo $this->element('header');
?>
<div class="loginBody clearfix">
    <section class="container">
        <div id="TTSbarbutton"></div>
        <?php if ($this->Session->check('Message.flash')) { ?>
        <div class="container">

            <?php
            if ($this->Session->check('Message.flash')) {
                echo $this->Session->flash();
            }
            ?>

        </div>
        <?php
    }
        echo $this->fetch('content');
        ?>

    </section>
</div>
<?php
echo $this->element('footer');
?>
<?php
//echo $this->element('sql_dump');
?>
</body>
</html>