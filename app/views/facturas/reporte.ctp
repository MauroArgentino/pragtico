<?php
/**
 * Este archivo contiene la presentacion.
 *
 * PHP versions 5
 *
 * @filesource
 * @copyright       Copyright 2007-2008, Pragmatia de RPB S.A.
 * @link            http://www.pragmatia.com
 * @package         pragtico
 * @subpackage      app.views
 * @since           Pragtico v 1.0.0
 * @version         $Revision: 528 $
 * @modifiedby      $LastChangedBy: mradosta $
 * @lastmodified    $Date: 2009-05-20 16:56:44 -0300 (Wed, 20 May 2009) $
 * @author          Martin Radosta <mradosta@pragmatia.com>
 */
 
$documento->create(array('password' => 'PaXXHttBXG66'));
$documento->doc->getActiveSheet()->getDefaultStyle()->getFont()->setName('Courier New');
$documento->doc->getActiveSheet()->getDefaultStyle()->getFont()->setSize(6);

$documento->doc->getActiveSheet()->getDefaultRowDimension()->setRowHeight(10);
$documento->doc->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$documento->doc->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);


if (!empty($groupParams)) {
    $documento->doc->getActiveSheet()->getHeaderFooter()->setOddHeader(
        sprintf("&L%s\n%s - %s\nCP: %s - %s - %s\nCUIT: %s",
            $groupParams['nombre_fantasia'],
            $groupParams['direccion'],
            $groupParams['barrio'],
            $groupParams['codigo_postal'],
            $groupParams['ciudad'],
            $groupParams['pais'],
            $groupParams['cuit']));
}

/*
if (!empty($employer)) {
    //$left = sprintf("&L%s\n%s - %s\nCP: %s - %s - %s\nCUIT: %s", $employer['Empleador']['nombre'], $employer['Empleador']['direccion'], $employer['Empleador']['barrio'], $employer['Empleador']['codigo_postal'], $employer['Empleador']['ciudad'], $employer['Empleador']['pais'], $employer['Empleador']['cuit']);
    $left = '';
    $center = "&CLibro Especial de Sueldos - Art. 52 Ley 20744";
} else {
    $left = sprintf("&L%s\n%s - %s\nCP: %s - %s - %s\nCUIT: %s",
        $groupParams['nombre_fantasia'],
        $groupParams['direccion'],
        $groupParams['barrio'],
        $groupParams['codigo_postal'],
        $groupParams['ciudad'],
        $groupParams['pais'],
        $groupParams['cuit']);
    $center = "&CLibro Especial de Sueldos - Art. 52 Ley 20744" . $groupParams['libro_sueldos_encabezado'];
}
$right = '&RHoja &P';

$documento->doc->getActiveSheet()->getHeaderFooter()->setOddHeader($left . $center . $right);

$styleBoldCenter = array('style' => array(
    'font'      => array('bold' => true),
    'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
    'borders'   => array( 'bottom'     => array('style' => PHPExcel_Style_Border::BORDER_DOTTED))));
$styleBoldRight = array('style' => array('font'     => array(
    'bold'      => true),
    'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT)));
$styleBold = array('style' => array('font' => array(
    'bold'      => true)));
$styleRight = array('style' => array(
    'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT)));
$styleBorderBottom = array('style' => array(
    'borders' => array( 'bottom'     => array('style' => PHPExcel_Style_Border::BORDER_DASHDOT))));


*/
/*
if ($data['Type'] == 'summarized') {
    $documento->setWidth('A', 100);
    $documento->setWidth('B', 10);

    $fila = 1;
    foreach ($data['Total'] as $k => $v) {
        $documento->setCellValue('A' . $fila, $k);
        $documento->setCellValue('B' . $fila, $v);
        $fila++;
    }
} elseif ($data['Type'] == 'detailed') {
    */

    $styleBoldCenter = array('style' => array(
        'font'      => array('bold' => true),
        'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
        'borders'   => array('bottom'     => array('style' => PHPExcel_Style_Border::BORDER_DOTTED))));

    $styleBoldRight = array('style' => array(
        'font'      => array('bold' => true),
        'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT)));

    $styleBold = array('style' => array('font' => array(
        'bold'      => true)));

    $styleRight = array('style' => array(
        'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT)));

    $documento->setWidth('A', 10);
    $documento->setWidth('B', 30);
    $documento->setWidth('C', 35);
    $documento->setWidth('D', 10);
    $documento->setWidth('E', 11);
    $documento->setWidth('F', 11);
    $documento->setWidth('G', 11);
    $documento->setWidth('H', 11);

    $fila = 1;
    $col = 'A';
    $titles = true;

    $documento->setCellValue('A' . $fila . ':D' . $fila, 'Empresa Usuario: ' . $data['employer']['nombre'], $styleBold);
    $documento->setCellValue('G' . $fila . ':H' . $fila, 'Periodo: ' . $data['invoice']['ano'] . str_pad($data['invoice']['mes'], 2, '0' ,STR_PAD_LEFT) . $data['invoice']['periodo'], $styleBoldRight);
    $fila+=2;

    $documento->setCellValue('A' . $fila, 'Legajo', $styleBoldCenter);
    $documento->setCellValue('B' . $fila, 'Apellido y Nombre', $styleBoldCenter);
    $documento->setCellValue('C' . $fila, 'Concepto', $styleBoldCenter);
    $documento->setCellValue('D' . $fila, 'Cantidad', $styleBoldCenter);
    $documento->setCellValue('E' . $fila, 'Liquidado', $styleBoldCenter);
    $documento->setCellValue('F' . $fila, 'F. Rem.', $styleBoldCenter);
    $documento->setCellValue('G' . $fila, 'F. No Rem.', $styleBoldCenter);
    $documento->setCellValue('H' . $fila, 'F. Benef.', $styleBoldCenter);

    foreach ($data['details'] as $detail) {

        $fila++;
        $col = 'A';
        $documento->setCellValue($col . $fila, $detail['Trabajador']['legajo'], $styleBold);
        $col++;
        $documento->setCellValue($col . $fila, sprintf('%s %s', $detail['Trabajador']['apellido'], $detail['Trabajador']['nombre']), $styleBold);
        $col++;

        foreach ($detail['Concepto'] as $concept) {
            foreach ($concept as $k => $v) {
                if (!in_array($col, array('C', 'D'))) {
                    $documento->doc->getActiveSheet()->getStyle($col . $fila)->getNumberFormat()->setFormatCode('"$ "0.00');
                    $documento->setCellValue($col . $fila, $v, $styleRight);
                } else {
                    $documento->setCellValue($col . $fila, $v);
                }
                $col++;
                continue;
            }
            $fila++;
            $col = 'C';
        }

        $col = 'E';
        foreach ($detail['Totales'] as $k => $v) {
            $documento->doc->getActiveSheet()->getStyle($col . $fila)->getNumberFormat()->setFormatCode('"$ "0.00');
            $documento->setCellValue($col . $fila, $v, $styleBoldRight);
            $col++;
        }
        $fila++;
    }

    $fila+=2;
    $documento->setCellValue('B' . $fila . ':F' . $fila, 'TOTALES', $styleBoldCenter);
    $fila++;
    $documento->setCellValue('B' . $fila . ':D' . $fila, 'Total de Empleados Facturados', $styleBold);
    $documento->setCellValue('E' . $fila . ':F' . $fila, $data['totals']['Total de Empleados Facturados'], $styleBoldRight);
    $fila++;
    $documento->setCellValue('B' . $fila . ':D' . $fila, 'Facturado Remunerativo', $styleBold);
    $documento->doc->getActiveSheet()->getStyle('E' . $fila)->getNumberFormat()->setFormatCode('"$ "0.00');
    $documento->setCellValue('E' . $fila . ':F' . $fila, $data['totals']['Facturado Remunerativo'], $styleBoldRight);
    $fila++;
    $documento->setCellValue('B' . $fila . ':D' . $fila, 'Facturado No Remunerativo', $styleBold);
    $documento->doc->getActiveSheet()->getStyle('E' . $fila)->getNumberFormat()->setFormatCode('"$ "0.00');
    $documento->setCellValue('E' . $fila . ':F' . $fila, $data['totals']['Facturado No Remunerativo'], $styleBoldRight);
    $fila++;
    $documento->setCellValue('B' . $fila . ':D' . $fila, 'Facturado Beneficios', $styleBold);
    $documento->doc->getActiveSheet()->getStyle('E' . $fila)->getNumberFormat()->setFormatCode('"$ "0.00');
    $documento->setCellValue('E' . $fila . ':F' . $fila, $data['totals']['Facturado Beneficios'], $styleBoldRight);
    $fila++;
    $documento->setCellValue('B' . $fila . ':D' . $fila, 'Iva', $styleBold);
    $documento->doc->getActiveSheet()->getStyle('E' . $fila)->getNumberFormat()->setFormatCode('"$ "0.00');
    $documento->setCellValue('E' . $fila . ':F' . $fila, $data['totals']['Iva'], $styleBoldRight);
    $fila++;
    $documento->setCellValue('B' . $fila . ':D' . $fila, 'Total', $styleBold);
    $documento->doc->getActiveSheet()->getStyle('E' . $fila)->getNumberFormat()->setFormatCode('"$ "0.00');
    $documento->setCellValue('E' . $fila . ':F' . $fila, $data['totals']['Total'], $styleBoldRight);
    $fila+=2;
    $documento->setCellValue('B' . $fila . ':D' . $fila, 'Liquidado Remunerativo', $styleBold);
    $documento->doc->getActiveSheet()->getStyle('E' . $fila)->getNumberFormat()->setFormatCode('"$ "0.00');
    $documento->setCellValue('E' . $fila . ':F' . $fila, $data['totals']['Liquidado Remunerativo'], $styleBoldRight);
    $fila++;
    $documento->setCellValue('B' . $fila . ':D' . $fila, 'Liquidado No Remunerativo', $styleBold);
    $documento->doc->getActiveSheet()->getStyle('E' . $fila)->getNumberFormat()->setFormatCode('"$ "0.00');
    $documento->setCellValue('E' . $fila . ':F' . $fila, $data['totals']['Liquidado No Remunerativo'], $styleBoldRight);
    $fila++;
    $documento->setCellValue('B' . $fila . ':D' . $fila, 'Total Liquidado', $styleBold);
    $documento->doc->getActiveSheet()->getStyle('E' . $fila)->getNumberFormat()->setFormatCode('"$ "0.00');
    $documento->setCellValue('E' . $fila . ':F' . $fila, $data['totals']['Total Liquidado'], $styleBoldRight);

$fileFormat = 'Excel5';
$documento->save($fileFormat);
?>