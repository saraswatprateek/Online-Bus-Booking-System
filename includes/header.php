<?php ob_start(); ?>
<?php session_start(); 
// $_SESSION['s_username'] = null;
// $_SESSION['s_firstname'] = null;
// $_SESSION['s_lastname'] = null;
// $_SESSION['s_role'] = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Busy Bus - Book Your Bus Ticket Online</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>
.jumb {
    zoom: 1;
    filter: alpha(opacity=50);
    opacity: 0.6;
}
.jumb:hover {
    opacity: 1;
}
.cont {
  position: relative;
  width: 700px;
  height: 300px;
  overflow: hidden;
}

.item {
  position: absolute;
  top: 0;
  left: 0;
}

.item img {
  -webkit-transition: 0.6s ease;
  transition: 0.6s ease;
}

.container:hover .item img {
  -webkit-transform: scale(1.2);
  transform: scale(1.2);
}

</style>

</head>

<body>