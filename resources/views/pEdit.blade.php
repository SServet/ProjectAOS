<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

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

       <?php
       use Illuminate\Support\Facades\Input;
       $kunden = DB::table('kunden')->get();
       $mitarbeiter = DB::table('mitarbeiter')->get();
       $arbeitsscheinprojekt = DB::table('arbeitsschein')->('pid',1)->get();
       $user = Auth::user();
       $pid = Input::get('pid');
       $projekt = DB::table('projects')->where('pid', $pid)->get();
       $projekt = $projekt[0];
       $artikel = DB::table('article')->get();
       ?>

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
          @if ($user->isAdmin == 1)
          <li>
            <a href="/Einstellungen">EINSTELLUNGEN</a>
          </li>
          @endif
          <li>
            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); 
            document.getElementById('logout-form').submit();"> LOGOUT
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
       <img src="{{ asset('assets/img/rz_logo.jpg') }}" id="logoRight">
       <br>
       <br>
       <p id="LabelContent">PROJEKT BEARBEITEN</p>
       <hr>
       <!-- Chosen -->
       <!-- CSS -->
       <link rel="stylesheet" href="{{ asset('assets/css/chosen.css') }}">

       <form action="{{ route('SubmitEditProjekt') }}" method="post">
         <table  id="inputTable">
           <table  id="inputTable">
            <tr>
             <td><p class="inputLabels">Projekt-Referenz</p></td>
             <td>
              <input type="text" id="Projekt-Referenz" class="form-control input-lg" name="pid" value="{{$projekt->pid}}" readonly>
            </td>
          </tr>
          <tr>
            <td><p class="inputLabels">Kunde</p></td>
            <td>
              <input type="text" id="kunde" class="form-control input-lg" name="kid" value="{{$projekt->kid}}" readonly>
            </td>
          </tr>
          <tr>
           <td><p class="inputLabels">Mitarbeiter</p></td>
           <td>
            <select data-placeholder="Mitarbeiter auswählen..." id="mitarbeiter_select" class="chosen-select" style="width:350px;" tabindex="2" name="mid">
              @foreach ($mitarbeiter as $mitarbeiter)
              <option selected>
                @if ($mitarbeiter->id == $projekt->mid)
                  {{$mitarbeiter->id}}. {{$mitarbeiter->lastname}} {{$mitarbeiter->firstname}}
                @endif
              </option>
                <option>{{$mitarbeiter->id}}. {{$mitarbeiter->lastname}} {{$mitarbeiter->firstname}}</option>
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <td><p class="inputLabels">Artikel </p></td>
          <td>
            <button type="button" class="btn .btn-default" style="width:350px;"><a href="{{url('Artikel_Hinzufuegen')}}" target="_blank">Artikel anlegen</a></button>
              
            <select data-placeholder="Artikel auswählen..." id="artikel_select" class="chosen-select form-control input-lg" style="width:350px; height: 400px;" tabindex="2" name="artid">
              <option value="" id="inputArtikel"></option>
              @foreach ($artikel as $art)
                <option>{{$art->artid}}. {{$art->articlename}}</option>
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <td><p class="inputLabels">Artikelanzahl</p></td>
          <td><input type="number" class="form-control input-lg" min="1" name="artAnz" value="{{$projekt->artAnz}}"></td>
        </tr>
        <tr>
          <td><p class="inputLabels">Bezeichnung</p></td>
          <td><input type="text" id="Bezeichnung" class="form-control input-lg" name="label" value="{{$projekt->label}}"></td>
        </tr>
        <tr>
          <td><p class="inputLabels">Beschreibung</p></td>
          <td><textarea id="Beschreibung" class="form-control input-lg" name="description">{{$projekt->description}}</textarea></td>
        </tr>

        <tr>
         <td><p class="inputLabels">Erstelldatum</p></td>
         <td><input type="date" id="Erstelldatum" class="form-control input-lg" name="dateOfOrder" value="{{$projekt->dateOfOrder}}"></td>
       </tr>
       <tr>
         <td><p class="inputLabels">Abgeschlossen Am</p></td>
         <td><input type="date" id="AbgeschlossenAm" class="form-control input-lg" name="finishedOn" value="{{$projekt->finishedOn}}"></td>
       </tr>
       <tr>
         <td><p class="inputLabels">Abgerechnet Am</p></td>
         <td><input type="date" id="AbgerechnetAm" class="form-control input-lg" name="settledOn" value="{{$projekt->settledOn}}"></td>
       </tr>
       <tr></tr>
       <tr>
        <td></td>
        <td>
          <button type="submit" class="btn .btn-default" id="submitButton"> Bearbeiten </button>
        </td>
      </tr>
      <input type="hidden" name="mid" value="{{$user->id}}"/>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </table>

  </form> 
</div>
</div>
</div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->


<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript" src="{{ asset('assets/css/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/css/chosen.jquery.js') }}"></script>


<script>

 $(document).ready(function() {
  var date = new Date();

  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();

  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;

  var today = year + "-" + month + "-" + day;       
  $("#Erstelldatum").attr("value", today);

  $( "#Erstelldatum" ).datepicker({
    numberOfMonths: 2,
    dateFormat: "yy-mm-dd" 
  });

  $( "#AbgeschlossenAm" ).datepicker({
    numberOfMonths: 2,
    dateFormat: "yy-mm-dd" 
  });
  
  $( "#AbgerechnetAm" ).datepicker({
    numberOfMonths: 2,
    dateFormat: "yy-mm-dd"
  });
  $(".chosen-select").chosen();
});
</script>



<!-- Bootstrap Core JavaScript -->


<!-- Menu Toggle Script  -->
<script>

  $("#menu-toggle").click(function(e) {
   e.preventDefault();
   $("#wrapper").toggleClass("toggled");
   
 });

  function setToday(){
    document.getElementById("Erstelldatum").value = new Date().toDateInputValue();
  }

</script>

</body>

</html>