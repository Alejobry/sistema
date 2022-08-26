<?php 
 
 function getPlantilla2_HTML($tatus,$array_usu,$cart){

  $PLANTILLA2 = '<body>
<header class="clearfix">
      <div id="logo">
        <img src="png/tatu.png">
      </div>
      <h1>STUDIO JORMATH TATTOO </h1>
      <h2>Informacion del Cliente</h2>
      <div id="project">
        <div><span>Cedula: </span> ' . $array_usu["Cedula"] . '</div>
        <div><span>Nombres: </span> ' . $array_usu["Nombres"] . '</div>
        <div><span>Apellidos: </span> ' . $array_usu["Apellidos"] . '</div>
        <div><span>Correo: </span> ' . $array_usu["Correo"] . '</div>
        <div><span>Telefono: </span> ' . $array_usu["Telefono"] . '</div>
        <div><span>Edad: </span> ' . $array_usu["Edad"] . ' Años</div>
      </div>
    </header>
    <main>
    <h2 style="text-align: center">Tatuajes Reservados </h2>
      <table>
        <thead>
          <tr>
            <th ></th>
            <th ></th>
            <th ></th>
            <th ></th>
            <th class="unit" >#CODIGO</th>
            <th class="unit">DESCRIPCION</th>
            <th class="unit">PRICE</th>

          </tr>
        </thead>
        <tbody>';

        foreach ($tatus as $tatu){


$PLANTILLA2 .= '<tr>

                <td ></td>
                <td ></td>
                <td ></td>
                <td ></td>
                <td class="unit">'.$tatu["id"].'</td>
                <td class="unit">'.$tatu["name"].'</td>
                <td class="unit">$ '.$tatu["price"].'</td>
               </tr>';  
        }
          
          
$PLANTILLA2 .='
          <tr>
            <td class="grand total"></td>
            <td class="grand total"></td>
            <td class="grand total"></td>
            <td class="grand total"></td>
            <td class="grand total"></td>
            <td  class="grand total"> TOTAL : </td>
            <td class="grand total">$'.$cart->total().'</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>Noticia:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    </body>      
   ';

     return $PLANTILLA2;

 }



 
