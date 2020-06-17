  <link rel="icon" href="<?php echo base_url() ;?>assets/admin/img/profi.jpg" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php base_url() ;?>../assets/admin/vendor/bootstrap/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="<?php base_url() ;?>../assets/admin/vendor/font-awesome/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.print.css" rel="stylesheet" media="print" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php base_url() ;?>../assets/admin/css/simple-sidebar.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> 

<style type="text/css">
  .list-group > .list-group-item.active{
    background: linear-gradient(to right, #5577D4, yellow)
  }
  #keterangan-jamkerja{
    border: 1px solid lightgrey; margin: 2%;
    width: auto;
  }
  .container-main{
    margin-top: 2%;
  }

  .fc-time{ display: none; }

  .fc-unthemed .fc-today {
  background: red;
}
</style>

<style type="text/css">
            .old-select{
    position: absolute;
    top: -9999px;
    left: -9999px;
}

/* New-Select */

.new-select{
    width: 300px;
    height: 50px;
    margin: auto;
    
    margin-top: 50px;
    text-align: center;
    color: #444;
    line-height: 50px;
    position: relative;
}

.new-select .selection:active{
    transform:         rotateX(42deg);
    -o-transform:      rotateX(42deg);
    -ms-transform:     rotateX(42deg);
    -moz-transform:    rotateX(42deg);
    -webkit-transform: rotateX(42deg);
    transform-style:         preserve-3d;
    -o-transform-style:      preserve-3d;
    -ms-transform-style:     preserve-3d;
    -moz-transform-style:    preserve-3d;
    -webkit-transform-style: preserve-3d;
    transform-origin:         top;
    -o-transform-origin:      top;
    -ms-transform-origin:     top;
    -moz-transform-origin:    top;
    -webkit-transform-origin: top;
    transition:         transform         200ms ease-in-out;
    -o-transition:      -o-transform      200ms ease-in-out;
    -ms-transition:     -ms-transform     200ms ease-in-out;
    -moz-transition:    -moz-transform    200ms ease-in-out;
    -webkit-transition: -webkit-transform 200ms ease-in-out;
}

.new-select .selection{
    width: 100%;
    height: 100%;
    background-color: #fff;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    
    cursor: pointer;
    position: relative;
    z-index: 20; /* Doit être supérieur au nombre d'option */
    
    transform:         rotateX(0deg);
    -o-transform:      rotateX(0deg);
    -ms-transform:     rotateX(0deg);
    -moz-transform:    rotateX(0deg);
    -webkit-transform: rotateX(0deg);
    transform-style:         preserve-3d;
    -o-transform-style:      preserve-3d;
    -ms-transform-style:     preserve-3d;
    -moz-transform-style:    preserve-3d;
    -webkit-transform-style: preserve-3d;
    transform-origin:         top;
    -o-transform-origin:      top;
    -ms-transform-origin:     top;
    -moz-transform-origin:    top;
    -webkit-transform-origin: top;
    transition:         transform         200ms ease-in-out;
    -o-transition:      -o-transform      200ms ease-in-out;
    -ms-transition:     -ms-transform     200ms ease-in-out;
    -moz-transition:    -moz-transform    200ms ease-in-out;
    -webkit-transition: -webkit-transform 200ms ease-in-out;
}

.new-select .selection p{
    width: calc(100% - 60px);
    position: relative;
    
    transition:         all 200ms ease-in-out;
    -o-transition:      all 200ms ease-in-out;
    -ms-transition:     all 200ms ease-in-out;
    -moz-transition:    all 200ms ease-in-out;
    -webkit-transition: all 200ms ease-in-out;
}

.new-select .selection:hover p, .new-select .selection.open p{
    color: #bdc3c7;
}

.new-select .selection i{
    display: block;
    width: 1px;
    height: 70%;
    position: absolute;
    right: -1px; top: 15%; bottom: 15%;
    border: none;
    background-color: #bbb;
}

.new-select .selection > span{
    display: block;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 14px 8px 0 8px; /* Height: 14px / Width: 16px */
    border-color: #bbb transparent transparent transparent;
    
    position: absolute;
    top: 18px; /* 50 / 2 - 14 / 2 */
    right: 22px; /* 60 / 2 - 16 / 2 */
}

.new-select .selection.open > span{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 8px 14px 8px;
    border-color: transparent transparent #bbb transparent;
}

.new-option{
    text-align: center;
    background-color: #fff;
    cursor: pointer;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    position: relative;
    margin-top: 1px;
    
    position: absolute;
    left: 0; right: 0;
    
    transition:         all 300ms ease-in-out;
    -o-transition:      all 300ms ease-in-out;
    -ms-transition:     all 300ms ease-in-out;
    -moz-transition:    all 300ms ease-in-out;
    -webkit-transition: all 300ms ease-in-out;
}

.new-option p{
    width: calc(100% - 60px);
}

.new-option.reveal:hover{
    background-color: #444;
    color: #f5f5f5;
}
</style>

<!-- Calendar -->


<style type="text/css">
            .fc th {
                padding: 10px 0px;
                vertical-align: middle;
                background:#F2F2F2;
            }
            .fc-day-grid-event>.fc-content {
                padding: 4px;
            }
            #calendar {
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
        </style>
