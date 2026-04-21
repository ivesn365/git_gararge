<?php
    require_once ("../header.php");
    header('Content-Type: text/html; charset=UTF-8');
    if($_SESSION['roleSys']){
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" rel="stylesheet" href="resources/sheet.css" >
<link type="text/css" rel="stylesheet" href="resources/style.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
      <title>IHS-RDC | PLANNING MAINTENANCE </title>
      <link rel="shortcut icon" href="../assets/img/logo.png" />
      <script src="https://www.gstatic.com/charts/loader.js"></script>


      <style>
      
      .contenue div{
          margin-bottom:5px;
      }
        
.tableFixHead  th { position: sticky; top: 0; z-index: 1; }

/* Just common table stuff. Really. */
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px; }
th     { background:#eee; }
.col_1 {
   position: sticky; left: 0; z-index: 1
   background-color:white;
   border-bottom:2px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:left;font-weight:bold;color:#000000;font-family:'Times New Roman';font-size:10pt;vertical-align:middle;white-space:normal;overflow:hidden;word-wrap:break-word;direction:ltr;padding:0px 3px 0px 3px;
   
}
 #myInput {
  background-image: url('https://www.w3schools.com/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
}
.s60{
    cursor: pointer;
}
      </style>

<div class="ritz grid-container table-responsive-sm tableFixHead" dir="ltr">
    <table class="waffle table table-striped table-bordered table-hover" cellspacing="0" cellpadding="0" id="myTable">
        <thead>
        <tr>
            <th class="row-header"></th>
            <th id="689376430C0" style="width:25px;" class="column-headers-background"></th>
            <th id="689376430C1" style="width:213px;" class="column-headers-background"></th>
            <th id="689376430C2" style="width:55px;" class="column-headers-background"></th>
            <th id="689376430C3" style="width:46px;" class="column-headers-background"></th>
            <th id="689376430C4" style="width:79px;" class="column-headers-background"></th>
            <th class="freezebar-cell frozen-column-cell freezebar-vertical-handle"></th>
            <th id="689376430C5" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C6" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C7" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C8" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C9" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C10" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C11" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C12" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C13" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C14" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C15" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C16" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C17" style="width:90px;"class="column-headers-background"></th>
            <th id="689376430C18" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C19" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C20" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C21" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C22" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C23" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C24" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C25" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C26" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C27" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C28" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C29" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C30" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C31" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C32" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C33" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C34" style="width:90px;" class="column-headers-background"></th>
            <th id="689376430C34" style="width:90px;" class="column-headers-background"></th>


        </tr>
        </thead>
        <tbody>
        <tr style="height: 19px">
            <th id="689376430R0" style="height: 19px;" class="row-headers-background">
                <div class="row-header-wrapper" style="line-height: 19px"></div>
            </th><td class="s0" colspan="98">  
                


            </th>
            <th class="freezebar-cell"></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
<tr  translate="yes">


            <th id="689376430R2" style="height: 163px;" class="row-headers-background">
                <div class="row-header-wrapper" style="line-height: 163px">3</div>
              
            </th>
            <div class="row" style="margin-left:20px;position:sticky; left: 0; z-index: 1;"> 
            <h1>PLANNING MAINTENANCE </h1>
            <div class="row">
            <div class="col-sm-12">
            <a  class="btn btn-primary mb-2 text-white" href="../page-accueil" style="margin-bottom:20px;margin-top:5px;float:left;color:white"> Tableau de bord
                </a>
                </div>
                <div  class="col-sm-12">
                    <div id="containerAlert"></div>
                </div>
                </div>
                <br>
                <div class="col-sm-4">
     <form method="POST" action="#">
                        <div class="form-group">
                            <label for="dateFiltre">Filter par mois</label>
                            <input class="form-control" type="month" name="dateFiltre" id="dateFiltre">
<button class="btn btn-sm btn-primary" type="submit" name="btn_filtre" style="margin-top:5px">Filtrer</button>
                        </div>
                        
                    </form>
                    
                    </div>
                     <div class="col-sm-4">
  <div class="form-group" >
                            

</div>
                    
                    </div>
                    
                    </div>

                      
                        </div>

                    </div><br>
                    

         

        <th class="s7 softmerge">
            <div class="softmerge-inner" style="width:76px;left:-1px">
               
            </div>
        </th>

        <th class="freezebar-cell"></th>
        <th class="freezebar-cell"></th>
        <th class="freezebar-cell"></th>
        <th class="freezebar-cell"></th>
        <th class="freezebar-cell"></th>
    <?php

    if(isset($_POST['btn_filtre']))
    {
         
        
        $nbres = 31;
        $i = 1;
       //echo substr($_POST['dateFiltre'], -2);
  
    $_SESSION['M'] = substr($_POST['dateFiltre'], -2);
    $aa = substr($_POST['dateFiltre'], 0, 4);
    $_SESSION['Y'] = $aa;
    $mois = $_SESSION['M'];
    $somRouge = 0;
    while ($i <= 31)
    {
        setlocale(LC_TIME,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra');
        $premierJour = strftime("%A - %d/%m/%Y", strtotime("$i-$mois-$aa"));
        setlocale(LC_TIME,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra');
        if (strchr($premierJour, "Sunday"))
          {
              setlocale(LC_TIME,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra');
              echo ' <th class="s9">'.ucwords($premierJour).'</th>';
          }
        elseif (strchr($premierJour, "Saturday"))
           {
               setlocale(LC_TIME,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra');
               echo '<th class="s10" >'.ucwords($premierJour).'</th>';
           }
        else
           {
               if($i == intval(date('d')) && ($mois == intval(date('m'))) && ($aa == intval(date('Y')))){
               setlocale(LC_TIME,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra');
               echo '<th class="s11" style="background-color: red">'.ucwords($premierJour).'</th>';
               }
               else{
                  setlocale(LC_TIME,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra');
               echo '<th class="s11">'.ucwords($premierJour).'</th>'; 
               }
           }
       $i++;
    }


    ?>

<div class="text text-center align-items-center">
                            <h5 class="text text-bold">Filtrer par couleur</h5>
                            <button class="btn btn-primary" id="show"> Afficher tout</button>
                    <button class="btn btn-danger" id="red"> Rouge</button>
                       <button class="btn btn-success" id="vert"> <?=Planing::AfficherNbreParCouleur($_SESSION['M'],3,$_SESSION['Y'])?></button>
                          <button class="btn btn-warning" id="hide"> <?=Planing::AfficherNbreParCouleur3($_SESSION['M'],3,$_SESSION['Y'])?></button>
                             <button class="btn" id="gris">  <?=Planing::AfficherNbreParCouleur2($_SESSION['M'],2,$_SESSION['Y'])?></button>
                              <button class="btn btn-info" id="bleu"> <?=Planing::AfficherNbreParCouleur2($_SESSION['M'],3,$_SESSION['Y'])?></button>
                    </div>
<th class="s11">
     
</th>
<th class="s11">
     
</th>
        </tr>


        <tr style="height: 20px" translate="no">
            <th id="689376430R55" style="height: 20px;" class="row-headers-background">
                <div class="row-header-wrapper" style="line-height: 20px">-</div>
            </th>
            <td class="s53">No</td><td class="s54">DESIGNATION </td><td class="s53">PLACES</td><td class="s53">No BUS</td><td class="s53 col_1">PLAQUE</td><td class="freezebar-cell"></td><td class="s55"></td><td class="s55"></td><td class="s55"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td>
            <td class="s56"></td>
            <td class="s56"></td>
            <td class="s56"></td>
            <td class="s56"></td>
        </tr>
    <?php
        $tourSS = 1;

               $v = Vehicule::affichers("SELECT * FROM vehicule WHERE status=1");
               $titre = "Vehicule";


        
        ?>
        <tr style="height: 20px">
            <th id="689376430R56" style="height: 20px;" class="row-headers-background">
                <div class="row-header-wrapper" style="line-height: 20px">-</div></th>
            <td class="s57" colspan="5" style="color:white"><?=$titre?></td>
            <td class="freezebar-cell"></td>
            <td class="s58"></td>
            <td class="s58"></td>
            <td class="s58"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
        </tr>
        <?php
        $j = 1;
      
      if ($v)
        {
          
            foreach ($v as $i){ ?>

                <tr style="height: 20px" translate="no">
                    <th id="689376430R57" style="height: 20px;" class="row-headers-background ">
                        <div class="row-header-wrapper" style="line-height: 20px"><?=$j?></div>
                    </th>
                    <td class="s60"><?=$j++?></td>
                    <td class="s61"><?=$i->getMarque().'  '.$i->getType() ?></td>
                    <td class="s60"><?=$i->getNbrePlace() ?></td>
                    <td class="s60">-</td>
                     <td class="s60 col_1"><?=$i->getNumeroPlaque() ?></td>
                    <td class="freezebar-cell"></td>
                       <?php
                    $f = 1;
                    $g = $i->getNumeroPlaque();
                    $indexe = 0;
                    $comments = 0;
                   $valueI=1;
                    while ($f <= 31){
                         
                         $g .=$f; 
                        // $indexe = Planing::Indexe($i->getNumeroPlaque(), $f.'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
                         $idpanne = Planing::idPanneV($i->getNumeroPlaque(), $f.'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
                         //$statusPlaning = Planing::idPanneV($i->getNumeroPlaque(), $f.'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
                         $afficherContenueList = Planing::AfficherContenueList($i->getNumeroPlaque(), $f.'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
                        
                       
                        
                         if($afficherContenueList)
                         {
                           
                              
	                        $valueI = rand();
	                //        $idPanneMec = Planing::fullStatusIdPanne($d,$i->getNumeroPlaque(),$f.'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
	                        
                             if(true)
                             { ?>
                             <td class="s60 ">
                                 <?php
                                 if($afficherContenueList){
                                     foreach($afficherContenueList as $x){
                                        $d = $x->getContenue();
                                         $idPanneMec = Planing::fullStatusIdPanne($x->getId());
                                         $anomalieNon = Planing::fullPanneNonAffecter($d,$i->getNumeroPlaque(),$f.'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
                                         
                                         $date = new DateTime(date($x->getDateDebut()));
                                           $comments = $x->getDateFin();
                                    
                                if($x->getStatus() == 3){ ?>
                                    <input type="hidden" value="<?=$d?>" id="v<?=$valueI?>"/> 
                              <div class="s60 contenue item vert" data-color="vert"   title="<?=Planing::planMNT(Panne::IDDPANNE($x->getPlaque(),$x->getContenue(),$date->format('Y-m-d')))?>" style="background-color: green"><?=$d?>   </div>                                 

                              <?php  }
                              elseif($idPanneMec){ 
                              if($x->getIdagent() == 2){
                              ?>
                                  <input type="hidden" value="<?=$d?>" id="v<?=$valueI?>" /> 
                              <div class="s60 contenue gris" title="<?=Planing::planMNT($idPanneMec)?>" style="background-color: #D3D3D3"  onclick="showModalDetail('<?=$valueI?>','<?=$g?>','<?=$indexe?>', <?=$x->getId()?>,2)" ><?=$d?></div>
                            <?php  }
                            else{ ?>
                                <input type="hidden" value="<?=$d?>" id="v<?=$valueI?>" /> 
                              <div class="s60 contenue orange item" data-color="orange" title="<?=Planing::planMNT($idPanneMec)?>" style="background-color: #FFA500"  onclick="showModalDetail('<?=$valueI?>','<?=$g?>','<?=$indexe?>', <?=$x->getId()?>,2)" ><?=$d?></div>

                          <?php  }
                                  
                              }
                              elseif(($f < intval(date('d'))) && (intval($_SESSION['M']) == intval(date('m')) ) && (intval($_SESSION['Y']) == intval(date('Y')) )){ 
                                    if($x->getIdagent() == 3){
                            ?>
                                <input type="hidden" value="<?=$d?>" id="v<?=$valueI?>"/> 
                              <div class="s60 contenue bleu" style="background-color: #87CEFA;"   ><?=$d?>        </div>
                           <?php 
                                    }else{ 
                                    $somRouge++;
                                    
                                    ?>
                                       <input type="hidden" value="<?=$d?>" id="v<?=$valueI?>"/> 
                              
                                   <div class="s60 contenue item" data-color="red" style="background-color: red"   onclick="showModalDetail('<?=$valueI?>','<?=$g?>','<?=$indexe?>', <?=$x->getId()?>,2)" ><?=$d?>        </div>
                                      
 
                                        
                                  <?php  }
                             ?>
                             <?php  }
                             elseif($x->getIdagent() == 1){ ?>
                                  <input type="hidden" value="<?=$d?>" id="v<?=$valueI?>"/> 
                              
                                  <div class="s60 contenue" style="background-color: #000000;color:#FFFFFF"   onclick="showModalDetail('<?=$valueI?>','<?=$g?>','<?=$indexe?>', <?=$x->getId()?>,1)" ><?=$d?>        </div>   
                           <?php  }
                             else{ ?>
                                <input type="hidden" value="<?=$d?>" id="v<?=$valueI?>"/> 
                              
                                  <div class="s60 contenue"   onclick="showModalDetail('<?=$valueI?>','<?=$g?>','<?=$indexe?>', <?=$x->getId()?>,2)" ><?=$d?>        </div>   
                                    
                          
                           <?php } 
                           
                                         $valueI++;
                                     }
                                 }
                             ?>
                             
                                 </td> 
                           <?php 
                            $valueI++;
                         
                           }
                                $valueI++;
                                 ?>
                             
                           
                           <?php
                         
                        }else{ 
                         $valueI++;
                        ?>
                               <td class="s60" onclick="showModal('<?=$g?>',<?=$indexe?>)" id="jr<?=$g?>"></td>
                      <?php  }
                         ?>
                        
                      <?php 
                      
                      
                      $f++;
                      $valueI++;
                      $g = $i->getNumeroPlaque();
                     }
                     
                    ?>
                    
                    
                    
                    


           <?php 
                
                 $valueI++;
            }
        }
        

    }
    else{ 
          $nbres = 31;
    $i = 1;
    $mois = date('m');
    $aa = date('Y');
    $_SESSION['Y'] = $aa;
    $_SESSION['M'] = $mois;
    while ($i <= 31)
    {
        setlocale(LC_TIME,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra');
        $premierJour = strftime("%A - %d/%m/%Y", strtotime("$i-$mois-$aa"));
        setlocale(LC_TIME,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra');
        if (strchr($premierJour, "Sunday"))
          {
              setlocale(LC_TIME,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra');
              echo ' <th class="s9">'.ucwords($premierJour).'</th>';
          }
        elseif (strchr($premierJour, "Saturday"))
           {
               setlocale(LC_TIME,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra');
               echo '<th class="s10">'.ucwords($premierJour).'</th>';
           }
        else
           {
                if($i == intval(date('d'))){
               setlocale(LC_TIME,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra');
               echo '<th class="s11" style="background-color: red">'.ucwords($premierJour).'</th>';
               }
               else{
                  setlocale(LC_TIME,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra');
               echo '<th class="s11">'.ucwords($premierJour).'</th>'; 
               }
           }
        $i++;
    }

     $datLe = new DateTime("1-".$_SESSION['M']."-".$_SESSION['Y']);
     $datLKC = $datLe->format("m-Y");

    ?>

<div class="text text-center align-items-center">
                            <h5 class="text text-bold">Filtrer par couleur</h5>
                            <button class="btn btn-primary" id="show"> Afficher tout</button>
                    <button class="btn btn-danger" id="red"> Rouge</button>
                       <button class="btn btn-success" id="vert"> <?=Planing::AfficherNbreParCouleur($_SESSION['M'],3,$_SESSION['Y'])?></button>
                          <button class="btn btn-warning" id="hide"> <?=Planing::AfficherNbreParCouleur3($_SESSION['M'],3,$_SESSION['Y'])?></button>
                             <button class="btn" id="gris">  <?=Planing::AfficherNbreParCouleur2($_SESSION['M'],2,$_SESSION['Y'])?></button>
                              <button class="btn btn-info" id="bleu"> <?=Planing::AfficherNbreParCouleur2($_SESSION['M'],3,$_SESSION['Y'])?></button>
                    </div>
<th class="s11"></th>
<th class="s11">
     
</th>
        </tr>


        <tr style="height: 20px" translate="no">
            <th id="689376430R55" style="height: 20px;" class="row-headers-background">
                <div class="row-header-wrapper" style="line-height: 20px">-</div>
            </th>
            <td class="s53 col_1">N°</td><td class="s54">DESIGNATION </td><td class="s53">PLACES</td><td class="s53">N° BUS</td><td class="s53 col_1">PLAQUE</td><td class="freezebar-cell"></td><td class="s55"></td><td class="s55"></td><td class="s55"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td><td class="s56"></td>
            <td class="s56"></td>
            <td class="s56"></td>
            <td class="s56"></td>
            <td class="s56"></td>
            <td class="s56"></td>
            <td class="s56"></td>
            <td class="s56"></td>
        </tr>
        
        <?php

          $somRouge = 0;

               $v = Vehicule::affichers("SELECT * FROM vehicule WHERE status=1");


        ?>
        <tr style="height: 20px">
            <th id="689376430R56" style="height: 20px;" class="row-headers-background">
                <div class="row-header-wrapper" style="line-height: 20px">-</div></th>
            <td class="s57" colspan="5" style="color:white">Vehicule</td>
            <td class="freezebar-cell"></td>
            <td class="s58"></td>
            <td class="s58"></td>
            <td class="s58"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
            <td class="s59"></td>
        </tr>
        <?php
        $j = 1;
      
      if ($v)
        {
          
            foreach ($v as $i){ ?>

                <tr style="height: 20px" translate="no">
                    <th id="689376430R57" style="height: 20px;" class="row-headers-background ">
                        <div class="row-header-wrapper" style="line-height: 20px"><?=$j?></div>
                    </th>
                    <td class="s60"><?=$j++?></td>
                    <td class="s61"><?=$i->getMarque().'  '.$i->getType() ?></td>
                    <td class="s60"><?=$i->getNbrePlace() ?></td>
                    <td class="s60">-</td>
                     <td class="s60 col_1"><?php
                     echo $i->getNumeroPlaque() ?></td>
                    <td class="freezebar-cell"></td>
                       <?php
                    $f = 1;
                    $g = $i->getNumeroPlaque();
                    $indexe = 0;
                    $comments = 0;
                   $valueI=1;
                    while ($f <= 31){
                         
                         $g .=$f; 
                        // $indexe = Planing::Indexe($i->getNumeroPlaque(), $f.'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
                         $idpanne = Planing::idPanneV($i->getNumeroPlaque(), $f.'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
                         //$statusPlaning = Planing::idPanneV($i->getNumeroPlaque(), $f.'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
                         $afficherContenueList = Planing::AfficherContenueList($i->getNumeroPlaque(), $f.'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
                        
                       
                        
                         if($afficherContenueList)
                         {
                           
                              
	                        $valueI = rand();
	                //        $idPanneMec = Planing::fullStatusIdPanne($d,$i->getNumeroPlaque(),$f.'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
	                        
                             if(true)
                             { ?>
                             <td class="s60 ">
                                 <?php
                                 if($afficherContenueList){
                                     foreach($afficherContenueList as $x){
                                        $d = $x->getContenue();
                                         $idPanneMec = Planing::fullStatusIdPanne($x->getId());
                                         $anomalieNon = Planing::fullPanneNonAffecter($d,$i->getNumeroPlaque(),$f.'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
                                         
                                         $date = new DateTime(date($x->getDateDebut()));
                                           $comments = $x->getDateFin();
                                    
                                if($x->getStatus() == 3){ ?>
                                    <input type="hidden" value="<?=$d?>" id="v<?=$valueI?>"/> 
                              <div class="s60 contenue item vert" data-color="vert"   title="<?=Planing::planMNT(Panne::IDDPANNE($x->getPlaque(),$x->getContenue(),$date->format('Y-m-d')))?>" style="background-color: green"><?=$d?>   </div>                                 

                              <?php  }
                              elseif($idPanneMec){ 
                              if($x->getIdagent() == 2){
                              ?>
                                  <input type="hidden" value="<?=$d?>" id="v<?=$valueI?>" /> 
                              <div class="s60 contenue gris" title="<?=Planing::planMNT($idPanneMec)?>" style="background-color: #D3D3D3"  onclick="showModalDetail('<?=$valueI?>','<?=$g?>','<?=$indexe?>', <?=$x->getId()?>,2)" ><?=$d?></div>
                            <?php  }
                            else{ ?>
                                <input type="hidden" value="<?=$d?>" id="v<?=$valueI?>" /> 
                              <div class="s60 contenue orange item" data-color="orange" title="<?=Planing::planMNT($idPanneMec)?>" style="background-color: #FFA500"  onclick="showModalDetail('<?=$valueI?>','<?=$g?>','<?=$indexe?>', <?=$x->getId()?>,2)" ><?=$d?></div>

                          <?php  }
                                  
                              }
                              elseif(($f < intval(date('d'))) && (intval($_SESSION['M']) == intval(date('m')) ) && (intval($_SESSION['Y']) == intval(date('Y')) )){ 
                                    if($x->getIdagent() == 3){
                            ?>
                                <input type="hidden" value="<?=$d?>" id="v<?=$valueI?>"/> 
                              <div class="s60 contenue bleu" style="background-color: #87CEFA;"   ><?=$d?>        </div>
                           <?php 
                                    }else{ 
                                    $somRouge++;
                                    
                                    ?>
                                       <input type="hidden" value="<?=$d?>" id="v<?=$valueI?>"/> 
                              
                                   <div class="s60 contenue item" data-color="red" style="background-color: red"   onclick="showModalDetail('<?=$valueI?>','<?=$g?>','<?=$indexe?>', <?=$x->getId()?>,2)" ><?=$d?>        </div>
                                      
 
                                        
                                  <?php  }
                             ?>
                             <?php  }
                             elseif($x->getIdagent() == 1){ ?>
                                  <input type="hidden" value="<?=$d?>" id="v<?=$valueI?>"/> 
                              
                                  <div class="s60 contenue" style="background-color: #000000;color:#FFFFFF"   onclick="showModalDetail('<?=$valueI?>','<?=$g?>','<?=$indexe?>', <?=$x->getId()?>,1)" ><?=$d?>        </div>   
                           <?php  }
                             else{ ?>
                                <input type="hidden" value="<?=$d?>" id="v<?=$valueI?>"/> 
                              
                                  <div class="s60 contenue"   onclick="showModalDetail('<?=$valueI?>','<?=$g?>','<?=$indexe?>', <?=$x->getId()?>,2)" ><?=$d?>        </div>   
                                    
                          
                           <?php } 
                           
                                         $valueI++;
                                     }
                                 }
                             ?>
                             
                                 </td> 
                           <?php 
                            $valueI++;
                         
                           }
                                $valueI++;
                                 ?>
                             
                           
                           <?php
                         
                        }else{ 
                         $valueI++;
                        ?>
                               <td class="s60" onclick="showModal('<?=$g?>',<?=$indexe?>)" id="jr<?=$g?>"></td>
                      <?php  }
                         ?>
                        
                      <?php 
                      
                      
                      $f++;
                      $valueI++;
                      $g = $i->getNumeroPlaque();
                     }
                     
                    ?>
                    
                    
                    
                    


           <?php 
                
                 $valueI++;
            }
        }
        

    }
    ?>


        </tbody>
    </table>

</div>
        <div class="modal modal-sheet position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSheet">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5 mecanicien" id="mecanicien"></h1>
                    <h6 style="color:red;text-align:right" id="h2_index">Index</h6>
                    <span class="datedebut"></span>
                    <span class="datefin"></span>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form method="Post" action="../data.html">
                     <h3 id="h_plaque"></h3>
                    
                 
                
                  

                    <div class="form-group">
                        <label for="tacheInput">Tâche à faire</label>
                        <textarea class="form-control form-control-lg" id="tacheInput" required name="tacheInput"></textarea>
                    </div>

                    <div class="form-group">
                        <input  id="inputT" type="hidden"  class="plaque" name="plaque">

                    </div>
                        <div class="form-group">
                        <input  id="idPanne" type="hidden"  class="idPanne" name="idPanne">

                    </div>

                    <button type="button" onclick="saveTache()" id="btn_save" class="btn btn-primary mb-2 text-white">Valider</button>
                   
                 <button type="button" hidden  onclick="updateTache()"  name="btn_affecter_tache" class="btn btn-primary mb-2 text-white btn_update">Modifier</button>

  <br> <button type="button"   name="btn_affecter_tache_planning" onclick="deletePlanning()" id="btn_delete" class="btn btn-danger mb-2 text-white btn_update">Supprimer</button>
</form>
                 
                </div>
                <div class="modal-footer flex-column border-top-0">
                    <button type="button" onclick="close()"  class="btn btn-lg btn-light w-100 mx-0" ></button>
                </div>
            </div>
        </div>
    </div>
    
       <div class="modal modal-sheet position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSheetCommentaire">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5 mecanicien" id="mecanicien"></h1>
                    <h6 style="color:red;text-align:right" id="h2_index2">Index</h6>
                    <span class="datedebut"></span>
                    <span class="datefin"></span>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                     <h3 id="h_plaque2"></h3>
                    
                 
                
                  <p id="body2" style="font-style: italic;color:red"></p>

                    <div class="form-group">
                        
                        <label for="tacheInput">Commentaire</label>
                        <textarea class="form-control form-control-lg" id="tacheInput2" required name="tache"></textarea>
                    </div>

                    <div class="form-group">
                        <input  id="inputT2" type="hidden" class="plaque">

                    </div>

                 <button type="button"   onclick="commentaire()" id="btn_comments" name="btn_affecter_tache" class="btn btn-primary mb-2 text-white">Valider</button>

                 
                </div>
                <div class="modal-footer flex-column border-top-0">
                    <button type="button" onclick="close()"  class="btn btn-lg btn-light w-100 mx-0" ></button>
                </div>
            </div>
        </div>
    </div>
    
    <div id="myModalImprimer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="modal-body py-0">
                     <h3></h3>
                    <form  action="../workOder/planing.php" method="POST">
                    <div class="form-group">
                        <label for="client">CLIENT</label>
                        <select class="form-control form-control-lg" id="client" required name="client">
                            <option value="">Veuillez selectionner le site svp </option>
                            <option value="MUMI">MUMI</option>
                            <option value="KAMOA">KAMOA</option>
                            <option value="TFM">TFM</option>
                            <option value="CongoEquipement">CAT/CONGO EQUIPEMENT</option>
                            <option value="tous">IMPRIMER TOUS LES SITES</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input  value="<?=$_SESSION['M']?>" type="hidden" class="mois">

                    </div>

                    <button type="submit"  name="btn_imprimer" class="btn btn-primary mb-2 text-white">Imprimer</button>
</form>
                 
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  <div id="myModalImprimerDay" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="modal-body py-0">
                     <h3></h3>
                    <form  action="../workOder/planing.php" method="POST">
                         <div class="form-group">
                             <label for="jour">Jour</label>
                              <input class="form-control form-control-lg" name="jour"  type="number" id="jour" class="jour" required>
                             </div>
                    <div class="form-group">
                        <label for="client">CLIENT</label>
                        <select class="form-control form-control-lg" id="client" required name="client">
                            <option value="">Veuillez selectionner le site svp </option>
                            <option value="MUMI">MUMI</option>
                            <option value="KAMOA">KAMOA</option>
                            <option value="TFM">TFM</option>
                            <option value="CongoEquipement">CAT/CONGO EQUIPEMENT</option>
                            <option value="tous">IMPRIMER TOUS LES SITES</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input  value="<?=$_SESSION['M']?>" type="hidden" class="mois">
                         <input  value="0" type="hidden" class="mois">

                    </div>

                    <button type="submit"  name="btn_imprimer" class="btn btn-primary mb-2 text-white">Imprimer</button>
</form>
                 
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

 

<script type= "text/javascript">
 function showModal(val1, val2)
    { 
        $("#inputT").val(val1);
        $("#h_plaque").html("Plaque : "+val1.substr(0, 8));
         $("#h2_index").html("Index : "+val2);
        $("#tacheInput").val('');
        $(".btn_update").css("display","none");
        $("#btn_save").css("display","block");
     
       
        window.$("#modalSheet").modal('show');


    }
    
 function showModalDetail(val1,val2, val3, val4, val5)
    { 
      
        $("#tacheInput").val($("#v"+val1).val());
         $("#idPanne").val(val4);
          $("#inputT").val(val2);
          $("#h_plaque").html("Plaque : "+val2.substr(0, 8));
            $("#h2_index").html("Index : "+val3);
        $("#btn_save").css("display","none");
       $(".btn_update").css("display","block");
       $("#btn_work").css("display","block");
       if(val5 == 1) $("#btn_delete").css("display","block");

       
       // $('#btn_work').attr(href, "https://lkcorporationsprl.org/printCarteTravail-"+val4+"-lkc.html");
        window.$("#modalSheet").modal('show');
    }
    
     function showModalDetailCommentaire(val1,val2, val3)
    {
      
        $("#body2").html($("#v"+val1).val());
          $("#inputT2").val(val2);
          $("#h_plaque2").html("Plaque : "+val2.substr(0, 8));
            $("#h2_index2").html("Index : "+val3);
    
       
       // $('#btn_work').attr(href, "https://lkcorporationsprl.org/printCarteTravail-"+val4+"-lkc.html");
        window.$("#modalSheetCommentaire").modal('show');
    }

 function saveTache() {
     const plaque = document.getElementById("inputT").value.trim();
     const tache = document.getElementById("tacheInput").value.trim();

     if (plaque && tache) {
         $.ajax({
             url: "../data.html",
             method: "POST",
             data: {
                 btn_save_tache_planing: true,
                 plaque: plaque,
                 tacheInput: tache
             },
             success: function (data) {
                 $("#jr" + plaque).html(tache);
                 $('#modalSheet').modal('toggle');
             },
             error: function (xhr, status, error) {
                 console.error("Erreur lors de l'enregistrement :", error);
                 alert("Une erreur est survenue lors de l'enregistrement.");
             }
         });
     } else {
         alert("Veuillez remplir tous les champs avant d'enregistrer.");
     }
 }

  function newPannePlanning() {
  
    $.ajax({
                url: "../data.html",
                method: "POST",
                data: { btn_affecter_tache_planning: document.getElementById("inputT").value,
                        tacheInput2:document.getElementById("tacheInput").value
                },
                success: function (data) {
                 $("#jr"+document.getElementById("inputT").value).html(document.getElementById("tacheInput").value);
                 $('#modalSheet').modal('toggle');
                 //alert(data)
                  window.open('../page-formconfirmation-'+data, '_blank')
                }


            })
  }
  
function updateTache() { 
   
    $.ajax({
                url: "../data.html",
                method: "POST",
                data: {
                    plaque: document.getElementById("inputT").value,
                        tacheInput_update:document.getElementById("tacheInput").value
                },
                success: function (data) {
                 $("#jr"+document.getElementById("inputT").value).html(document.getElementById("tacheInput").value);
                 $('#modalSheet').modal('toggle');
                }


            })
            
  }
  
  function close(){
       $('#modalSheet').modal('toggle');
  }
  
  function deletePlanning(){
      if(confirm("Voulez-vous supprimer cette tâche?")){
          $.ajax({
                url: "../data.html",
                method: "POST",
                data: { id_panne_delete_planing: document.getElementById("idPanne").value
                },
                success: function (data) {
                    location.reload();
                }


            })
      }
  }
  
  function commentaire() {
  
    $.ajax({
                url: "data.html",
                method: "POST",
                data: { plaque_commentaire: document.getElementById("inputT2").value,
                        comments:document.getElementById("tacheInput2").value
                },
                success: function (data) {
                // $("#jr"+document.getElementById("inputT").value).html(document.getElementById("tacheInput").value);
                // $('#modalSheet').modal('toggle');
                  window.location.replace('../planing/')
                }


            })
  }
  
  
   // loadMois()

   
   function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


 
// Fonction pour filtrer par couleur
function filtrerParCouleur(couleur) {
   
   alert(document.getElementsByClassName('orange').innerTEXT)
}

$(document).ready(function(){
  $("#hide").click(function(){
      $(".red").hide();
       $(".gris").hide();
       $(".vert").hide();
    $(".bleu").hide();
  });
  $("#red").click(function(){
   
     $(".orange").hide();
       $(".gris").hide();
       $(".vert").hide();
    $(".bleu").hide();
  });
 
  $("#gris").click(function(){

     $(".orange").hide();
      $(".red").hide();
     
       $(".vert").hide();
    $(".bleu").hide();
  });

  $("#vert").click(function(){
      
     $(".orange").hide();
      $(".red").hide();
       $(".gris").hide();
    
    $(".bleu").hide();
  });

  $("#bleu").click(function(){
  
     $(".orange").hide();
      $(".red").hide();
       $(".gris").hide();
       $(".vert").hide();
  
  });
  $("#show").click(function(){
    $(".orange").show();
     $(".red").show();
       $(".gris").show();
       $(".vert").show();
    $(".bleu").show();
  });
});

// Exemple d'utilisation : filtrer par la couleur 'red'


    
  function totalRed(){
      document.getElementById("red").innerHTML = <?=$somRouge?>
  } 
totalRed()

</script>

<?php
}else{
    header("Location:../page-connexion");
}
?>
