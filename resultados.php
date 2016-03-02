<!DOCTYPE html>
<html>
	<head>
		<title>Prova Feita | Resultados</title>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width,initial-scale=1'>
		<link rel="shortcut icon" href="_img/logo.ico" type="image/x-icon"/>
		<link rel='stylesheet' href='_css/style.css' media='screen and (color)'>
		<link rel='stylesheet' href='_css/mobile.css' media='(max-width: 720px)'>
	</head>
	<body>
		<?php include "_php/header.php";?>
		<div id='principal'>
			<?php
				include '_php/functions.php';
				include '_php/_class/calculoRegular.php';
				#Recebendo valor das notas.
				$m1 = recebeValor('m1');
				$nd = recebeValor('nd');
				$ni = recebeValor('ni');
				#Recebendo valor dos radios.
				$rd = recebeRadio("rd");#diciplina.
				$ri = recebeRadio("ri");#integrada.
				#Instanciando objeto nota.
				if($rd == 's' && $ri == 'n'){
					$n = new calculoRegular($m1, $nd,0);
				}elseif($rd == 'n' && $ri == 's'){
					$n = new calculoRegular($m1, 0, $ni);	
				}elseif($rd == 'n' && $ri == 'n'){
					$n = new calculoRegular($m1, 0, 0);		
				}else{
					$n = new calculoRegular($m1, $nd, $ni);		
				}
				#Váriaveis usadas nas criação da tabela dinamica.
				$texto1 = "Nota avaliação de Disciplina: ";
				$texto2 = "Parcial da M2: ";
				$texto3 = "Parcial da Média Final: ";
				$texto4 = "Você tirou notas muito baixas na M1 e na avaliação de Disciplina 
				           essa é nota mínima você terá que tirar na Integrada para ficar de exame: ";
				$texto5 = "Nota avaliação de Disciplina: ";
				$texto6 = "Nota mínima integrada para passar direto: ";
				$texto7 = "Nota Integrada ";
				$texto8 =  "Você tirou notas muito baixas na M1 e Integrada essa é nota mínima 
						   você tem que tirar na avaliação de Disciplina para ficar de exame: ";
				$texto9 = "As notas mínima que você que tem que tirar na avaliação de Disciplina 
						   e Integrada para passar direto são: ";	
			?>
			<table> 
				<th colspan='4' id='d'>Resultados:</th>
				<tr>
			    	<td class='e'>Nota M1: </td> 
			    	<td class='d'><?= $n->getM1(); ?></td>
				</tr>
				<?php
					if($rd == "s" && $ri == "n"){
						if($n->calcularMinIntegrada() > 10){
							echo "<tr>";	
							echo "<td class='e'>".$texto1."</td>";
				    		echo "<td class='d'>".$n->getNd()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>".$texto2."</td>";
							echo "<td class='d'>".$n->getM2()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>".$texto3."</td>";
							echo "<td class='d'>".$n->getMe()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>".$texto4."</td>";
							echo "<td class='d'>".$n->calcularMinIntegradaExame()."</td>";
							echo "</tr>";
						}else{
							echo "<tr>";	
							echo "<td class='e'>".$texto1."</td>";
				    		echo "<td class='d'>".$n->getNd()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>".$texto2."</td>";
							echo "<td class='d'>".$n->getM2()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>".$texto3."</td>";
							echo "<td class='d'>".$n->getMe()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>".$texto6."</td>";
							echo "<td class='d'>".$n->calcularMinIntegrada()."</td>";
							echo "</tr>";
						}
					}elseif($rd == "n" && $ri == "s"){
						if($n->calcularMinDisciplina() > 10){
							echo "<tr>";	
							echo "<td class='e'>".$texto7."</td>";
				    		echo "<td class='d'>".$n->getNi()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>".$texto2."</td>";
							echo "<td class='d'>".$n->getM2()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>".$texto3."</td>";
							echo "<td class='d'>".$n->getMe()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>".$texto8."</td>";
							echo "<td class='d'>".$n->calcularMinDisciplinaExame()."</td>";
							echo "</tr>";	
						}else{
							echo "<tr>";	
							echo "<td class='e'>".$texto7."</td>";
				    		echo "<td class='d'>".$n->getNi()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>".$texto2."</td>";
							echo "<td class='d'>".$n->getM2()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>".$texto3."</td>";
							echo "<td class='d'>".$n->getMe()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>".$texto6."</td>";
							echo "<td class='d'>".$n->calcularMinDisciplina()."</td>";
							echo "</tr>";
						}
					}else{
						if($rd == "n" && $ri == "n"){
							echo "<tr>";
							echo "<td class='e'>".$texto2."</td>";
							echo "<td class='d'>".$n->getMe()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>".$texto9."</td>";
					    	echo "<td class='d'>".$n->calcularMin()."</td>";
					    	echo "</tr>";
						}else{
							echo "<tr>";	
							echo "<td class='e'>".$texto1."</td>";
				    		echo "<td class='d'>".$n->getNd()."</td>";
							echo "</tr>";
							echo "<tr>";	
							echo "<td class='e'>".$texto7."</td>";
				    		echo "<td class='d'>".$n->getNi()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>".$texto2."</td>";
							echo "<td class='d'>".$n->getM2()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>Média Final:</td>";
							echo "<td class='d'>".$n->getMe()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class='e'>".$texto9."</td>";
					    	echo "<td class='d'>".$n->calcularMin()."</td>";
					    	echo "</tr>";
					    	echo "<tr>";
							echo "<td class='e'>Situação do Aluno:</td>";
							echo "<td class='d'>".$n->mostrarStatus()."</td>";
							echo "</tr>";
						}
					}
				?>	
			</table>
			</br>
			<a class='bot' id='vot'href='javascript:history.go(-1)'>Voltar</a>
		</div>
		<?php include "_php/footer.php"; ?>
	</body>
</html>