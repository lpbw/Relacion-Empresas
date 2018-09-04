<?
include "coneccion.php";

		$consulta990 = "select * from preguntas order by id";
		$resultado990 = mysql_query($consulta990) or die("$consulta990 ". mysql_error());
		while($res990=mysql_fetch_assoc($resultado990))
		{
			$pregunta.="{$res990['pregunta']}|";
		}
	$pregunta=explode('|', $pregunta);
	$pregunta1=$pregunta[0];
	$pregunta2=$pregunta[1];
	$pregunta3=$pregunta[2];
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Encuesta</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url();
}
-->
</style>
<link href="images/textos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>
<script src="js/highcharts.js"></script>
<script src="js/highcharts-3d.js"></script>
<script src="js/modules/exporting.js"></script>
</head>

<body onload="MM_preloadImages('images/icono_borrar_r.png')">
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td><img src="images/spacer.gif" width="10" height="20" /></td>
      </tr>
      <tr>
        <td align="center">
          <table width="850" border="0" cellspacing="7" cellpadding="0">
            <tr>
              <td align="center" class="login" height="30">Resultados Encuesta</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td><img src="images/spacer.gif" width="10" height="20" /></td>
      </tr>
      <tr>
        <td><table width="844" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="250" valign="middle" bgcolor="#eeeeee"><table width="90%" border="0" align="center" cellspacing="0">
			<tr>
			  <td align="center" valign="top" class="info">&nbsp;</td>
			  </tr>
			  <tr>
			  <td align="center" valign="top" class="info"><table width="100%" border="1" cellspacing="0" cellpadding="0">
			  <?
			  	$consultat = "SELECT * FROM resultados order by id";
				$resultadot = mysql_query($consultat) or die("$consultat ". mysql_error());
				$rest=mysql_num_rows($resultadot);
			  ?>
  <tr>
    <td align="center" class="totales" height="35">Encuestas tomadas: <b><? echo $rest;?></b></td>
  </tr>
</table></td>
			  </tr>
			<?
			$consulta11 = "SELECT edad, count(*) as dato FROM resultados where edad<>'' group by edad";
			$resultado11 = mysql_query($consulta11) or die("$consulta11 ". mysql_error());
			while($res11=mysql_fetch_assoc($resultado11))
			{
				$dato11.="['{$res11['edad']}', {$res11['dato']}],";
			}
				$dato11=trim($dato11, ',');
			 ?>
			  <script type="text/javascript">
			   $(function () {
    $('#container11').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: '<? echo "Rango de Edades";?>'
        },
        tooltip: {
            pointFormat: '<b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name} <b>{point.percentage:.1f}%</b>'
                }
            }
        },
        series: [{
            type: 'pie',
            name: ' ',
            data: [
                <? echo $dato11; ?>
            ]
        }]
    });
});
			   </script>
			<tr>
			  <td align="center" valign="top" class="info">&nbsp;</td>
			  </tr>
			<tr>
                  <td align="center" valign="top" class="info"><div id="container11" style="height: 400px"></div></td>
                </tr>
				<?
			$consulta12= "SELECT genero, count(*) as dato FROM resultados where genero<>'' group by genero";
			$resultado12 = mysql_query($consulta12) or die("$consulta12 ". mysql_error());
			while($res12=mysql_fetch_assoc($resultado12))
			{
				$dato12.="['{$res12['genero']}', {$res12['dato']}],";
			}
				$dato12=trim($dato12, ',');
			 ?>
			  <script type="text/javascript">
			   $(function () {
    $('#container12').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: '<? echo "Genero";?>'
        },
        tooltip: {
            pointFormat: '<b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name} <b>{point.percentage:.1f}%</b>'
                }
            }
        },
        series: [{
            type: 'pie',
            name: ' ',
            data: [
                <? echo $dato12; ?>
            ]
        }]
    });
});
			   </script>
			<tr>
			  <td align="center" valign="top" class="info">&nbsp;</td>
			  </tr>
			<tr>
                  <td align="center" valign="top" class="info"><div id="container12" style="height: 400px"></div></td>
                </tr>
            <?
			$num=0;
			$consulta = "select count(*) as dato from resultados where r1<>'' group by r1";
			$resultado = mysql_query($consulta) or die("$consulta ". mysql_error());
			while($res=mysql_fetch_assoc($resultado))
			{
				$num=$num+$res['dato'];
			}
			
			$consulta1 = "select r1, count(*) as dato from resultados where r1<>'' group by r1 ORDER BY FIELD(r1,'No lo se', 'Nada Probable', 'Poco Probable', 'Probable', 'Muy Probable') desc";
			$resultado1 = mysql_query($consulta1) or die("$consulta1 ". mysql_error());
			while($res1=mysql_fetch_assoc($resultado1))
			{
				$d=($res1['dato']/$num)*100;
				
				$dato.="{name:'{$res1['r1']}', y:{$d} },";
			}
				$dato=trim($dato, ',');
				
			 ?>
			  <script type="text/javascript">
				$(function () {
    // Create the chart
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<? echo $pregunta1?>'
        },
        
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Porcentaje'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
			pointFormat: '<b>{point.y:.1f}%</b>'
        },

        series: [{
            name: ' ',
            colorByPoint: true,
            data: [<? echo $dato?>]
        }],
        
    });
});
</script>
			     <tr>
			       <td align="center" valign="top" class="info">&nbsp;</td>
		        </tr>
			    <tr>
                  <td width="100%" align="center" valign="top" class="info"><div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div></td>
                </tr>
				<?
			$num2=0;
			$consulta22 = "select count(*) as dato from resultados where r2<>'' group by r2";
			$resultado22 = mysql_query($consulta22) or die("$consulta22 ". mysql_error());
			while($res22=mysql_fetch_assoc($resultado22))
			{
				$num2=$num2+$res22['dato'];
			}
			
			$consulta2 = "select r2, count(*) as dato from resultados where r2<>'' group by r2";
			$resultado2 = mysql_query($consulta2) or die("$consulta2 ". mysql_error());
			while($res2=mysql_fetch_assoc($resultado2))
			{
				$d2=($res2['dato']/$num2)*100;
				
				$dato2.="{name:'{$res2['r2']}', y:{$d2} },";
			}
				$dato2=trim($dato2, ',');
				
			 ?>
			  <script type="text/javascript">
				$(function () {
    // Create the chart
    $('#container2').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<? echo $pregunta2?>'
        },
        
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Porcentaje'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
			pointFormat: '<b>{point.y:.1f}%</b>'
        },

        series: [{
            name: ' ',
            colorByPoint: true,
            data: [<? echo $dato2?>]
        }],
        
    });
});
</script>
                <tr>
                  <td align="center" valign="top" class="info">&nbsp;</td>
                </tr>
                <tr>
                  <td align="center" valign="top" class="info"><div id="container2" style="height: 400px"></div></td>
                </tr>
			<?
			$num3=0;
			$consulta33 = "select count(*) as dato from resultados where r3<>'' group by r3";
			$resultado33 = mysql_query($consulta33) or die("$consulta33 ". mysql_error());
			while($res33=mysql_fetch_assoc($resultado33))
			{
				$num3=$num3+$res33['dato'];
			}
			
			$consulta3 = "select r3, count(*) as dato from resultados where r3<>'' group by r3";
			$resultado3 = mysql_query($consulta3) or die("$consulta3 ". mysql_error());
			while($res3=mysql_fetch_assoc($resultado3))
			{
				$d3=($res3['dato']/$num3)*100;
				
				$dato3.="{name:'{$res3['r3']}', y:{$d3} },";
			}
				$dato3=trim($dato3, ',');
				
			 ?>
			  <script type="text/javascript">
				$(function () {
    // Create the chart
    $('#container3').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<? echo $pregunta3?>'
        },
        
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Porcentaje'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
			pointFormat: '<b>{point.y:.1f}%</b>'
        },

        series: [{
            name: ' ',
            colorByPoint: true,
            data: [<? echo $dato3?>]
        }],
        
    });
});
</script>
                <tr>
                  <td valign="top">&nbsp;</td>
                </tr>
                <tr>
                  <td valign="top"><div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"></div></td>
                </tr>
		<?
			$num4=0;
			$consulta44 = "select count(*) as dato from resultados where r2<>'' and r1='Muy Probable' group by r2";
			$resultado44 = mysql_query($consulta44) or die("$consulta44 ". mysql_error());
			while($res44=mysql_fetch_assoc($resultado44))
			{
				$num4=$num4+$res44['dato'];
			}
			
			$consulta4 = "select r2, count(*) as dato from resultados where r2<>'' and r1='Muy Probable' group by r2";
			$resultado4 = mysql_query($consulta4) or die("$consulta4 ". mysql_error());
			while($res4=mysql_fetch_assoc($resultado4))
			{
				$d4=($res4['dato']/$num4)*100;
				
				$dato4.="{name:'{$res4['r2']}', y:{$d4} },";
			}
				$dato4=trim($dato4, ',');
				
			 ?>
			  <script type="text/javascript">
				$(function () {
    // Create the chart
    $('#container4').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<? echo "<b>Cuando contestaron Muy Probable</b> <br/>$pregunta2";?>'
        },
        
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Porcentaje'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
			pointFormat: '<b>{point.y:.1f}%</b>'
        },

        series: [{
            name: ' ',
            colorByPoint: true,
            data: [<? echo $dato4?>]
        }],
        
    });
});
</script>
          <tr>
                  <td valign="top">&nbsp;</td>
                </tr>
				<tr>
                  <td valign="top"><div id="container4" style="min-width: 310px; height: 400px; margin: 0 auto"></div></td>
                </tr>
				<?
			$num5=0;
			$consulta55 = "select count(*) as dato from resultados where r3<>'' and r1='Muy Probable' group by r3";
			$resultado55 = mysql_query($consulta55) or die("$consulta55 ". mysql_error());
			while($res55=mysql_fetch_assoc($resultado55))
			{
				$num5=$num5+$res55['dato'];
			}
			
			$consulta5 = "select r3, count(*) as dato from resultados where r3<>'' and r1='Muy Probable' group by r3";
			$resultado5 = mysql_query($consulta5) or die("$consulta5 ". mysql_error());
			while($res5=mysql_fetch_assoc($resultado5))
			{
				$d5=($res5['dato']/$num5)*100;
				
				$dato5.="{name:'{$res5['r3']}', y:{$d5} },";
			}
				$dato5=trim($dato5, ',');
				
			 ?>
			  <script type="text/javascript">
				$(function () {
    // Create the chart
    $('#container5').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<? echo "<b>Cuando contestaron Muy Probable</b><br/>$pregunta3";?>'
        },
        
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Porcentaje'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
			pointFormat: '<b>{point.y:.1f}%</b>'
        },

        series: [{
            name: ' ',
            colorByPoint: true,
            data: [<? echo $dato5?>]
        }],
        
    });
});
</script>
				<tr>
                  <td valign="top">&nbsp;</td>
                </tr>
				<tr>
                  <td valign="top"><div id="container5" style="min-width: 310px; height: 400px; margin: 0 auto"></div></td>
                </tr>
				<?
			$num6=0;
			$consulta66 = "select count(*) as dato from resultados where r2<>'' and (r1='Muy Probable' || r1='Probable') group by r2";
			$resultado66 = mysql_query($consulta66) or die("$consulta66 ". mysql_error());
			while($res66=mysql_fetch_assoc($resultado66))
			{
				$num6=$num6+$res66['dato'];
			}
			
			$consulta6 = "select r2, count(*) as dato from resultados where r2<>'' and (r1='Muy Probable' || r1='Probable') group by r2";
			$resultado6 = mysql_query($consulta6) or die("$consulta6 ". mysql_error());
			while($res6=mysql_fetch_assoc($resultado6))
			{
				$d6=($res6['dato']/$num6)*100;
				
				$dato6.="{name:'{$res6['r2']}', y:{$d6} },";
			}
				$dato6=trim($dato6, ',');
				
			 ?>
			  <script type="text/javascript">
				$(function () {
    // Create the chart
    $('#container6').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<? echo "<b>Cuando contestaron Muy Probable-Probable</b> <br/>$pregunta2";?>'
        },
        
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Porcentaje'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
			pointFormat: '<b>{point.y:.1f}%</b>'
        },

        series: [{
            name: ' ',
            colorByPoint: true,
            data: [<? echo $dato6?>]
        }],
        
    });
});
</script>
				<tr>
                  <td valign="top">&nbsp;</td>
                </tr>
				 <tr>
				   <td valign="top"><div id="container6" style="min-width: 310px; height: 400px; margin: 0 auto"></div></td>
			    </tr>
				<?
			$num7=0;
			$consulta77 = "select count(*) as dato from resultados where r3<>'' and (r1='Muy Probable' || r1='Probable') group by r3";
			$resultado77 = mysql_query($consulta77) or die("$consulta77 ". mysql_error());
			while($res77=mysql_fetch_assoc($resultado77))
			{
				$num7=$num7+$res77['dato'];
			}
			
			$consulta7 = "select r3, count(*) as dato from resultados where r3<>'' and (r1='Muy Probable' || r1='Probable') group by r3";
			$resultado7 = mysql_query($consulta7) or die("$consulta7 ". mysql_error());
			while($res7=mysql_fetch_assoc($resultado7))
			{
				$d7=($res7['dato']/$num7)*100;
				
				$dato7.="{name:'{$res7['r3']}', y:{$d7} },";
			}
				$dato7=trim($dato7, ',');
				
			 ?>
			  <script type="text/javascript">
				$(function () {
    // Create the chart
    $('#container7').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<? echo "<b>Cuando contestaron Muy Probable-Probable</b><br/>$pregunta3";?>'
        },
        
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Porcentaje'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
			pointFormat: '<b>{point.y:.1f}%</b>'
        },

        series: [{
            name: ' ',
            colorByPoint: true,
            data: [<? echo $dato7?>]
        }],
        
    });
});
</script>
				 <tr>
				   <td valign="top">&nbsp;</td>
			    </tr>
				 <tr>
				   <td valign="top"><div id="container7" style="min-width: 310px; height: 400px; margin: 0 auto"></div></td>
			    </tr>
				 <tr>
				   <td valign="top">&nbsp;</td>
			    </tr>
				 <tr>
				   <td valign="top" align="right"><a href="index.php" class="regresar">Regresar</a></td>
			    </tr>
				 <tr>
                  <td valign="top">&nbsp;</td>
                </tr>
              </table></td>
          </tr>
        </table></td>
      </tr>
    
    </table>

</form>
</body>
</html>
