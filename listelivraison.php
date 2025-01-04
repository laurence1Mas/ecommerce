<?php
include('config_db/config.php');
include 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;


// les choses a charger comme pdf dans la page
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste des livraison</title>
</head>

<style>
  body{
    font-family: Arial, Helvetica, sans-serif;
    
    width:100%;
  }
  table{
    border-collapse: collapse;
    width:100%;
  }
  
  th, td{
    border: 1px solid black;
    padding: 2px;
  }

.entete{
    text-align:center;
    padding: 2px;
}
.republique{
    font-weight: bold;
    padding: 0,5px;
}
#footer { position: fixed; right: 0px; bottom: 10px; text-align: center;}
        #footer .page:after { content: counter(page, decimal); }
 @page { margin: 20px 30px 40px 50px; }
 thead{
  display: table-header-group;
  page-break-inside: avoid;
}
</style>
<body>
    <div class="entete ">    
    <h2 class="republique">REPUBLIQUE DEMOCRATIQUE DU CONGO <br>
        PROVINCE DU NORD-KIVU <br>
        JOE SUIT FASHION
    </h2>          
    <p style="font-family: Arial, Helvetica, sans-serif; text-align:center; border-style: double;
    font-weight: bold;
    font-size: 25px;">LISTE DES LIVRAISONS</p>
    </div>

<table class="table-bordered">
<thead style="background-color: dimgrey;">
    <th scope="col">##</th>
    <th scope="col">COMMANDE</th>
    <th scope="col">LIVREUR_ID</th>
    <th scope="col">ADRESSE</th>
    <th scope="col">FRAIS</th>
    <th scope="col">DATE</th>
    <th scope="col">ETAT</th>
</thead>
<tbody>';
$sql = "SELECT * FROM vlivraisons";
$result = mysqli_query($con, $sql);
$numero = 1;
while ($agent = mysqli_fetch_assoc($result)) {
    $html .= '
            <tr>
                <td>' . $numero . '</td>
                <td>' . $agent['refcommande'] . '</td>               
                <td>' . $agent['livreur_id'] . '</td>
                <td>' . $agent['adresse'] . '</td>
                <td>' . $agent['fraisLivraison'] . '</td>
                <td>' . $agent['dateLiv'] . '</td>
                <td>' . $agent['etatLiv'] . '</td>
            </tr>
            ';
    $numero++;
}

$html .= '</tbody>
</table>
<div id="footer">
    <p>joesuitgoma@gmail.com</p>
    <p class="page">Page </p>
  </div> 
</body>
</html>';
$dompdf = new Dompdf();
$option = new Options();
$option->set('chroot', realpath(''));
$dompdf->set_option("isPhpEnabled", true);
$dompdf = new Dompdf($option);
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('print.pdf', ['Attachment' => false]);


?>