<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplicación web para la gestion de Perfiles Clinicos de la Veterinaria Portugal">
    <meta name="keyword" content="Vetportugal, veterinario, mascotas, cuidadoresponsable">
    <link href="{{asset('veticon.ico')}}" rel="icon">

    <title>Plataforma de Gestión de Perfiles Clínicos</title>

    <!-- Bootstrap CSS -->
    <link href="{{asset('plantilla-plataforma/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('plantilla-plataforma/css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('plantilla-plataforma/css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('plantilla-plataforma/css/font-awesome.min.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- full calendar css-->
    <link href="{{asset('plantilla-plataforma/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')}}" rel="stylesheet" />
    <link href="{{asset('plantilla-plataforma/assets/fullcalendar/fullcalendar/fullcalendar.css')}}" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="{{asset('plantilla-plataforma/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <!-- owl carousel -->
    <link rel="{{asset('plantilla-plataforma/stylesheet" href="css/owl.carousel.css')}}" type="text/css">
    <link href="{{asset('plantilla-plataforma/css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{asset('plantilla-plataforma/css/fullcalendar.css')}}">
    <link href="{{asset('plantilla-plataforma/css/widgets.css')}}" rel="stylesheet">
    <link href="{{asset('plantilla-plataforma/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('plantilla-plataforma/css/style-responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('plantilla-plataforma/css/xcharts.min.css')}}" rel=" stylesheet">
    <link href="{{asset('plantilla-plataforma/css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.min.css')}}">
    <!-- DataPicker -->
    <link rel="stylesheet" href={{asset("bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}>

</head>

<body>

@include('vetsystem.layout.nav')
