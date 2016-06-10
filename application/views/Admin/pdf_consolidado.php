<?php
// Include the main TCPDF library (search for installation path).

// TCPDF configuration
/*require_once('../lib/tcPDF/tcpdf_autoconfig_estimacion.php');
require_once('../lib/tcPDF/tcpdf.php');
require_once('../main.php');
*/ 
/*$ObjdataEstimacion =new Estimacion();
$filtro['WHERE']='id_estimacion = :id_estimacion';
$filtro['PARAMS']['id_estimacion']=$_GET['id_estimacion'];
/*$ObjdataEstimacion->sqlSelect = 't.id_estimacion, t.titulo, t.descripcion,  p0.descripcion AS clase, t.id_estatus,
 p1.nombre AS estatus, p2.abreviatura AS moneda, p2.nombre AS nombre_moneda, t.ra_mod_date , t.ra_add_date,
  p3.descripcion AS tipo, p4.descripcion AS prioridad, p5.abreviatura AS origen, t.fecha_vencimiento
  p6.nombre AS creado_por, p7.nombre AS modificado_por';*/

  /*
$dataEstimacion = $ObjdataEstimacion->getRecords($filtro);
//echo $ObjdataEstimacion->getQuery();
if($dataEstimacion[0]['id_estatus']==2){
$ObjdataEstimacion->updateRecord(array('id_estatus'=>'4'),array('id_estimacion'=>$_GET['id_estimacion']) );
}
if($dataEstimacion[0]['id_estatus']==1){
echo"Solicitud de Estimacion aun pendiente";}

if($dataEstimacion[0]['id_estatus']==3){
echo"Solicitud de Estimacion rechazada";}

$objDEstimacion =new Detalle_Estimacion();
$filtro2['WHERE']='t.id_estimacion = :id';
$filtro2['PARAMS']['id']=$_GET['id_estimacion'];
$objDEstimacion->sqlSelect = 't.id_detalle_estimacion, t.id_estimacion, t.precio, t.titulo,
t.descripcion, t.justificacion, p0.nombre AS articulo,t.codigo_almacen, t.cantidad, t.subtotal,
t.ra_add_user,
t.ra_mod_user,
p1.titulo AS titulo_p, p1.descripcion AS descripcion_p, p2.titulo AS titulo_d, p2.descripcion AS descripcion_d,
p3.abreviatura AS unidad_medida, p3.descripcion AS nombre_um, p4.nombre AS creado_por, p5.nombre AS modificado_por';
$dataDEstimacion = $objDEstimacion->getRecords($filtro2);


//echo $objDEstimacion->getQuery();

*/
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Planificacion Financiera');
$pdf->SetTitle('Estimacion');

$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Orinoco Iron".' 001'.$_GET['id_estimacion'] , PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('helvetica', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();



//var_dump($dataDEstimacion);
// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

/*
// TITULO DEL REPORTE
$html='<h1>'.$dataEstimacion[0]['titulo'].'</h1><br>';

$html=$html.'<table>';

$html=$html.'<tr><td ><li>Solicitado por: '.$dataEstimacion[0]['creado_por'].'</li></td>';
$html=$html.'<td ><li>Realizado por: '.$dataEstimacion[0]['modificado_por'].'</li></td></tr>';

$html=$html.'<tr><td ><li>Fecha de Solicitud: '.$dataEstimacion[0]['ra_add_date'].'</li></td>';
$html=$html.'<td ><li>Fecha de Estimacion: '.$dataEstimacion[0]['ra_mod_date'].'</li></td></tr>';

$html=$html.'<tr><td><li>Clase de estimacion: '.$dataEstimacion[0]['clase'].'</li></td>';
$html=$html.'<td><li>Fecha de Vencimiento: '.$dataEstimacion[0]['fecha_vencimiento'].'</li></td></tr>';

$html=$html.'</table>';

$html=$html.'<h4>Descripcion: '.$dataEstimacion[0]['descripcion'].'</h4><br>';

//  CUERPO DEL REPORTE
$html=$html.'<table>';
$html=$html.'<thead>';
$html=$html.'<tr><td >Codigo</td>';
$html=$html.'<td >Titulo</td>';
$html=$html.'<td >Titulo P</td>';
$html=$html.'<td>Descripcion</td>';
$html=$html.'<td>Cantidad</td>';
$html=$html.'<td>Justificacion</td>';
$html=$html.'<td>Costo Estimado</td></tr>';
$html=$html.'</thead>';

$html=$html.'</tbody>';
for( $i=0; $i<count($dataDEstimacion); $i++){

$html=$html.'<tr><td >'.$dataDEstimacion[$i]['codigo_almacen'].'</td>';
$html=$html.'<td >'.$dataDEstimacion[$i]['titulo'].'</td>';
$html=$html.'<td >'.$dataDEstimacion[$i]['titulo_p'].'</td>';
$html=$html.'<td>'.$dataDEstimacion[$i]['descripcion'].'</td>';
$html=$html.'<td>'.$dataDEstimacion[$i]['cantidad'].'</td>';
$html=$html.'<td>'.$dataDEstimacion[$i]['justificacion'].'</td>';
$html=$html.'<td>'.$dataDEstimacion[$i]['precio'].'</td></tr>';



}
$html=$html.'</tbody>';
$html=$html.'</table>';
*/
$html=$html.'<h4>Justificacion: '.$dataEstimacion[0]['observacion'].'</h4>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_'.$_GET['id_estimacion'].'.pdf', 'I');

