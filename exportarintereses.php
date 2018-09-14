<?
    require_once 'PHPExcel/Classes/PHPExcel.php';
    include "coneccion.php";
    // Create new PHPExcel object
    $Excel = new PHPExcel();

    // Set document properties
    $Excel->getProperties()->setCreator("Luis Perez")
    ->setLastModifiedBy("Luis Perez")
    ->setTitle("Reporte Intereses Misíon")
    ->setSubject("reporte Intereses")
    ->setDescription("Reporte de Intereses Misíon.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Reporte Intereses");

    //creamos nuestro array con los estilos para titulos 
    $h1 = array(
        'font' => array(
        'bold' => true, 
        'size' => 8, 
        'name' => 'Tahoma'
        ), 
        'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('rgb' => '000000')
        )
        ), 
        'alignment' => array(
        'vertical' => 'center', 
        'horizontal' => 'center'
        ),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '666666')
        )
    ); 

    //creamos nuestro array con los estilos para body
    $body = array(
        'font' => array(
        'bold' => false, 
        'size' => 8, 
        'name' => 'Tahoma'
        ), 
        'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('rgb' => '000000')
        )
        ), 
        'alignment' => array(
        'vertical' => 'center', 
        'horizontal' => 'center'
        )
    ); 

    //creamos nuestro array con los estilos para body
    $titulos = array(
        'font' => array(
        'bold' => false, 
        'size' => 8, 
        'name' => 'Tahoma'
        ), 
        'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('rgb' => '000000')
        )
        ), 
        'alignment' => array(
        'vertical' => 'center', 
        'horizontal' => 'center'
        )
    ); 

    $Excel->getActiveSheet()->getStyle('A1:C1')->applyFromArray($h1);
    $Excel->getActiveSheet()->mergeCells('A1:C1');
    $Excel->getActiveSheet()->setCellValue('A1',"REPORTE DE INTERESES");

    $QueryChihuahua = "SELECT * FROM chihuahua";
    $ResultadoChihuahua = mysql_query($QueryChihuahua) or die("Falla en query: $QueryChihuahua".mysql_error());
    $Fila=2;
    $Columna=0;
    while ($ResCh = mysql_fetch_assoc($ResultadoChihuahua))
    {
        $IdChihuahua=$ResCh['id_chih'];
        //$Excel->getActiveSheet()->mergeCells("A".$Count.":C".$count);
        $Excel->getActiveSheet()->setCellValueByColumnAndRow($Columna, $Fila,$ResCh['nombre']);
        $Excel->getActiveSheet()->getStyleByColumnAndRow(0,$Fila)->applyFromArray($body);
        $Fila++;

        $QueryIntereses = "SELECT ei.interes AS Interes,e.nombre AS Empresa FROM espana_chihuahua ech JOIN espana_intereses ei ON ech.id_interes=ei.id_interes JOIN espana e ON ei.id_espana=e.id_espana WHERE ech.id_chih=$IdChihuahua";
        $ResultadoIntereses = mysql_query($QueryIntereses) or die("Falla en query: $QueryIntereses".mysql_error());
        while($ResInt = mysql_fetch_assoc($ResultadoIntereses))
        {
            $Excel->getActiveSheet()->setCellValueByColumnAndRow(0, $Fila,"Empresa:");
            $Excel->getActiveSheet()->getStyleByColumnAndRow(0,$Fila)->applyFromArray($body);
            $Excel->getActiveSheet()->setCellValueByColumnAndRow(1, $Fila,$ResInt['Empresa']);
            $Excel->getActiveSheet()->getStyleByColumnAndRow(1,$Fila)->applyFromArray($body);
            $Fila++;
            $Excel->getActiveSheet()->setCellValueByColumnAndRow(0, $Fila,"Interes:");
            $Excel->getActiveSheet()->getStyleByColumnAndRow(0,$Fila)->applyFromArray($body);
            $Excel->getActiveSheet()->setCellValueByColumnAndRow(1, $Fila,$ResInt['Interes']);
            $Excel->getActiveSheet()->getStyleByColumnAndRow(1,$Fila)->applyFromArray($body);
            $Fila++;
        }

    }

    // Rename worksheet
    $Excel->getActiveSheet()->setTitle('Reporte Intereses');
    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $Excel->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Reporte Intereses.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');
    // If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0
    $objWriter = PHPExcel_IOFactory::createWriter($Excel, 'Excel2007');
    $objWriter->save('php://output');
    exit; 
?>