<?php
/**
 * Created by Leo Bernard. More at leolabs.org
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ExceptionBase.NET</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="<?php echo base_url() ?>res/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 20px;
            padding-bottom: 40px;
        }

            /* Custom container */
        .container-narrow {
            margin: 0 auto;
            max-width: 700px;
        }
        .container-narrow > hr {
            margin: 30px 0;
        }

            /* Main marketing message and sign up button */
        .jumbotron {
            margin: 30px 0;
            text-align: center;
        }
        .jumbotron h1 {
            font-size: 72px;
            line-height: 1;
            margin-bottom: 32px;
        }
        .jumbotron .btn {
            font-size: 21px;
            padding: 14px 24px;
        }

            /* Supporting marketing content */
        .marketing {
            margin: 60px 0;
        }

        .singleException tbody tr td,
        .singleException thead tr th,
        .multiException thead tr th,
        .multiException tbody tr td{
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: center;
            white-space: pre;
            min-height: 1.5em;
            display: block;
        }

        pre {
            white-space: pre;
            overflow: auto;
            word-wrap: normal;
        }
    </style>
    <link href="<?php echo base_url() ?>res/css/bootstrap-responsive.css" rel="stylesheet">
</head>

<body>
<div class="container-narrow">

    <div class="masthead">
        <h3 class="muted" style="display: inline-block; margin-bottom: 0">ExceptionBase.NET</h3>

        <h4 class="pull-right muted hidden-phone" style="display: inline-block; margin-top: 20px; margin-bottom: 0;"><?php echo $subLine; ?></h4>
    </div>

    <hr>
