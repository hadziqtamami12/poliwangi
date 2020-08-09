<link rel="icon" href="<?= base_url('assets/'); ?>dashboard/img/Rapat.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.print.css" rel="stylesheet" media="print" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard/vendor/nucleo/css/nucleo.css" type="text/css">

  <!-- <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css"> -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard/css/font-awesome/css/all.min.css" type="text/css">

  <!-- Page plugins -->
  <!--  CSS -->
	  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard/css/argon.css" type="text/css">

  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
  <link href="<?= base_url('assets/'); ?>vendor/select2.css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> 


  <style type="text/css">
    .nav-link.active{
        background: linear-gradient(to right, #5577D4, yellow);
        border-radius: 5px;
        width: 90%;
    }

    .text-muted .nav-link h4{ 
        color: white;
    }

    .logo{
      min-width: 100px;
      min-height: 100px;
      max-width: 500px;
      max-height: 500px;
    }

    .fc-time{ display: none; }

    .fc-unthemed .fc-today {
      background: #9BD7D1 !important;
      color: white;
      }
      .fc th {
        padding: 10px 0px;
        vertical-align: middle;
        background:#F2F2F2;
    }
    .fc-day-grid-event>.fc-content {
        padding: 4px;
    }

    #calendarIO {
        max-width: 900px;
        margin: 0 auto;
    }
    .error {
        color: #ac2925;
        margin-bottom: 15px;
    }
    .event-tooltip {
        width:150px;
        background: rgba(0, 0, 0, 0.85);
        color:#FFF;
        padding:10px;
        position:absolute;
        z-index:10001;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 11px;

    }
    .modal-header
    {
        background-color: #3A87AD;
        color: #fff;
    }

#menu-toggle{
  opacity: 0;
  cursor: default;
  margin-left: -90px;
  margin-right: 90px;
}
@media(max-width: 768px){
  #menu-toggle{
    opacity: 1;
    margin-left: 0;
  }
  .nav-breadcrumb{
    opacity: 0;
  }

  .card-info-item span, h1{
    font-size: 30px;
  }

  .card-info-item h4{
    font-size: 15px;
    margin-bottom: -5%;
  }

  .card-info-item .info-data{
    margin-left: 0;
  }

}

.card-info{
  display: flex;
  justify-content: space-around;
  width: 100%;

}

.card-info-item{
  color: white;
  width: 27%;
  background: #5577D4;
  margin: 1.5%;
  padding: 2%;
  border-radius: 5%;
  display: inline-flex;
  justify-content: space-around;
  align-items: center;
}

.card-info-item span{
  border-right: 5px solid yellow;
  color: white;
}

.info-data{
  margin-left: -5%;
  padding-left: 10%;
}

.info-data h1{
  color: yellow;
}

.info-data h4{
  color: yellow;
}

  </style>
    