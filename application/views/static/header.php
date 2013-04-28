<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <script src="<?php echo base_url(); ?>/res/js/jquery.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>res/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="<?php echo base_url(); ?>res/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link href="<?php echo base_url(); ?>res/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }

        .sidebar-nav {
            padding: 9px 0;
        }

        .container-fluid {
            max-width: 960px;
            margin: auto;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }

            .nav-collapse.in .btn-group {
                padding: 0;
                margin-top: 0 !important;
            }

            .searchField {
                width: 60% !important;
            }

            .btn-group.search {
                width: 40% !important;
            }

            .navbar-form {
                padding-right: 25px !important;
            }

            .exceptionGrouping, .singleExceptionGrouping {
                margin-top: 0 !important;
                width: 100% !important;
                float: none !important;
            }

            .exceptionGrouping .btn-group {
                width: 50% !important;
                margin-left: 0;
            }

            .singleExceptionGrouping .btn-group {
                margin-left: 0;
                width: 100% !important;
            }

            .exceptionGrouping a, #statusBtn {
                display: block;
            }
        }

        .singleException td {
            text-align: center;
        }

        .nav-collapse.in {
            overflow: visible !important;
        }

        .dropdown-menu {
            min-width: 100% !important;
            left: auto !important;
            right: 0;
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

        .searchField {
            width: 192px;
        }

        .btn-group {
            width: auto;
        }

        .btn-group button {
            width: 100%;
        }

        .exceptionTable, .singleException, .multiException {
            table-layout: fixed;
        }

        .exceptionTable tbody tr td {
            word-wrap: break-word;
        }

        .exceptionGrouping, .singleExceptionGrouping {
            margin-top: -42px;
        }

        .
    </style>
    <link href="<?php echo base_url(); ?>res/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="<?php echo site_url('/'); ?>">ExceptionBase.NET</a></i>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row-fluid">