<?php
//validamos si trae la orden
if (!isset($_REQUEST['id'])) {
    header('Location: ../index.php');
}
//LIBRERIA PARA UTILIZAR PHPMAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
//GUARDAMOS LA VARIABLE ID
$orden = $_GET['id'];
//instanciamos una variable carta
include_once '../La-carta.php';
$cart = new Cart;
//BASE
include '../Configuracion.php';
//VALIDAMOS SI ESTA VACIA LA VARIBLE SESION
if ($_SESSION['sessCustomerID'] == null || $_SESSION['sessCustomerID'] == '') {
    header("location: ../../login.php ");
}
//CONSULTA DEL CLIENTE
$querycli = $db->query("SELECT * FROM clientes WHERE id = " . $_SESSION['sessCustomerID']);
$array_usu = mysqli_fetch_array($querycli);
//GUARDARQUERY DENTRO DE ARRAY DE LOS PRODUCTOS RESERVADOS
$tatus = array();
$qutatu = $db->prepare("SELECT m.id , m.name , m.price
FROM mis_productos as m
inner join orden_articulos as  oar
on oar.product_id = m.id and oar.order_id ='" . $orden . "'");
$qutatu->execute();
$resultado = $qutatu->get_result();
while ($row = $resultado->fetch_assoc()) $tatus[] = $row;
$db->close();
//llama la libreria PDF
require_once('pdf/vendor/autoload.php');
//LLAMAMOS A LA PLANTILLA 
require_once('plantilla2.php');
//LLAMAMOS LOS ESTILOS CSS DE LA PLANTILLA
$css = file_get_contents('css/style.css');
//variable de la libreria pdf
$mpdf = new \Mpdf\Mpdf([]);
//GUARDO UNA VARIABLE CORREO PARA ENVIARSELO en su correo
$correo=$array_usu["Correo"];
//UTILIZAMOS EL METODO DE LA PLANTILLA
$plantilla = getPlantilla2_HTML($tatus, $array_usu, $cart);
//DESTRUIMOS EL CARRO
$cart->destroy();

$mpdf->writeHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
 //$mpdf->Output('reporte.pdf', 'D');   //Para verlo
//GUARDAMOS EL PDF EN ESTA VARIABLE
$pdf = $mpdf->Output("", "S");
//ENVIAMOS EL COOREO
enviarPDF($pdf,$correo);
//FUNCION PARA ENVIAR
function enviarPDF($pdf,$correo){
   // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // 0 para q no se vea
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // smtp del tipo del correo
        $mail->SMTPAuth   = true;
        $mail->Username   = 'galojose38@gmail.com';                     // SMTP username(Correo)
        $mail->Password   = 'galoromero1997';                               // SMTP password (Contraseña)
        $mail->SMTPSecure = 'tls';                           // 'tls'
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('galojose38@gmail.com', 'Galo');               //Quien lo envia
        $mail->addAddress("$correo");                    // A quien lo envia
        //   $mail->addAddress('ejemplo@example.com');                   // Correo secundario al que lo quieras enviar

        //ARCHIVOS ADJUNTOS
        $mail->addStringAttachment($pdf,"Archivo.pdf");


        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'RESERVA';                     //ASUNTO
        $mail->Body    = 'Reserva desde la Pagina WEB';              //MENSAJE

        $mail->send();
        echo"   <script> 
        alert('Se envio correctamente');
        </script>   ";
        echo 'Se envio correctamente';
    } catch (Exception $e) {
        echo"   <script> 
        alert('Error al enviar');
        </script>   ";
        echo "Error al enviar: {$mail->ErrorInfo}";
    }
}
//ENVIA AL INDEX
header('Location: ../index.php');
