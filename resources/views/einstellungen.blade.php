<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Arbeitsschein Online Service</title>

	<!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/simple-sidebar.css') }}" rel="stylesheet">

    <!-- Font-Links -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

    	<div id="wrapper">

    		<!-- Sidebar -->
    		<div id="sidebar-wrapper">
    			<ul class="sidebar-nav">
    				<li class="sidebar-brand">
    					<div id="divLabelAOS">
                            <a href="/home"/>
                            <p id="LabelAOS">AOS</p>
                            <p id="SubtitleAOS">Arbeitsschein Online Service</p>
                        </div>
                        <li>
                            <a href="/home">STARTSEITE</a>
                        </li>
                        <li>
                            <a href="/Tickets">TICKETS</a>
                        </li>
                        <li>
                            <a href="/Projekte">PROJEKTE</a>
                        </li>
                        <li>
                            <a href="/Arbeitsschein">ARBEITSSCHEINE</a>
                        </li>
                        <li>
                            <a href="/Einstellungen">EINSTELLUNGEN</a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();"> Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>

                <!-- /#sidebar-wrapper -->

                <!-- Page Content -->
                <div id="page-content-wrapper">
                 <div class="container-fluid">
                    <div class="row">
                       <div class="col-lg-12">
                        <div id="menu-toggle-div">
                          <a href="#"><img src="{{ asset('assets/img/grayBurger.png') }}" href="#menu-toggle" style="width: 40px" id="menu-toggle"></a>
                          </div>
                       </div>
                       <img src="{{ asset('assets/img/rz_logo.jpg') }}" id="logoRight">
                       <br>
                       <table id="importExportTable">
                        <tr>
                            <th id="labelImport">&nbsp;IMPORT:</th>
                            <th id="labelExport">EXPORT:</th>
                        </tr>
                        <tr>
                            <td><button class="importExportButton">KUNDEN</button></td>
                            <td><button class="importExportButton">KUNDEN</button></td>
                        </tr>
                        <tr>
                            <td><button class="importExportButton">ARTIKEL</button></td>
                            <td><button class="importExportButton">ARTIKEL</button></td>
                        </tr>
                        <tr>
                            <th>Termintypen</th>
                        </tr>
                        <tr>
                            <td>
                                <select class="chosen" style="width:150px;">
                                    <option>PHP</option>
                                    <option>PHP Array</option>
                                </select>
                            </td>
                        </tr>
                        <div>
                        </div>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Chosen Plugin -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">

<!-- jQuery -->
<script src="{{ asset('assets/js/jquery.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- Menu Toggle Script  -->
<script>

  $(".chosen").chosen({width: "50%"});

  $("#menu-toggle").click(function(e) {
     e.preventDefault();
     $("#wrapper").toggleClass("toggled");

     if(document.getElementById("menu-toggle").textContent == ">"){
        document.getElementById("menu-toggle").innerHTML = "<";
    }else{
        document.getElementById("menu-toggle").innerHTML = ">";
    }       
});

</script>

</body>

</html>





