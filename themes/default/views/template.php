<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="description" content="<?php echo $description; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>favicon.ico?v=<?php echo $site_version; ?>">

    <title><?php echo $page_title; ?> - <?php echo $site_title; ?></title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/default/css/default.css?v=<?php echo $site_version; ?>">

    <?php if (isset($css_files) && is_array($css_files)) : ?>
        <?php foreach ($css_files as $css) : ?>
            <?php if ( ! is_null($css)) : ?>
                <link rel="stylesheet" href="<?php echo $css; ?>?v=<?php echo $site_version; ?>"><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="https://raw.github.com/scottjehl/Respond/master/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <?php // Fixed navbar ?>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only"><?php echo lang('core button toggle_nav'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo $this->settings->site_name; ?></a>
            </div>
            <div class="navbar-collapse collapse">
                <?php // Nav bar left ?>
                <?php echo $this->public_nav; ?>
                <?php if ($this->session->userdata('logged_in')) : ?>
                    <?php echo $this->private_nav; ?>
                <?php endif; ?>
                <?php // Nav bar right ?>
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($this->session->userdata('logged_in')) : ?>
                        <li><a href="<?php echo base_url('logout'); ?>"><?php echo lang('core button logout'); ?></a></li>
                    <?php else : ?>
                        <li class="<?php echo ($this->uri->segment(1) == 'login') ? 'active' : ''; ?>"><a href="<?php echo base_url('login'); ?>"><?php echo lang('core button login'); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php // Main body ?>
    <div class="container">

        <div class="row">
            <?php // Page title ?>
            <div class="col-md-12">
                <h1><?php echo $page_title; ?></h1>
            </div>
        </div>

        <?php // System messages ?>
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="padding-override">
                <div class="row alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
            <div class="padding-override">
                <div class="row alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            </div>
        <?php elseif (validation_errors()) : ?>
            <div class="padding-override">
                <div class="row alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo validation_errors(); ?>
                </div>
            </div>
        <?php elseif ($this->error) : ?>
            <div class="padding-override">
                <div class="row alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->error; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php // Main content ?>
        <div class="padding-override">
            <?php echo $content; ?>

            <footer class="row footer text-muted"><br />Page rendered in <strong>{elapsed_time}</strong> seconds</footer>
        </div>

    </div>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <?php if (isset($js_files) && is_array($js_files)) : ?>
        <?php foreach ($js_files as $js) : ?>
            <?php if ( ! is_null($js)) : ?>
                <?php echo "\n"; ?><script type="text/javascript" src="<?php echo $js; ?>?v=<?php echo $site_version; ?>"></script><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($js_files_i18n) && is_array($js_files_i18n)) : ?>
        <?php foreach ($js_files_i18n as $js) : ?>
            <?php if ( ! is_null($js)) : ?>
                <?php echo "\n"; ?><script type="text/javascript"><?php echo "\n" . $js . "\n"; ?></script><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>
