<?php
header('Content-Type: text/html; charset=iso-8859-1');
require('header.php');

mysql_connect('127.4.199.2', 'adminWfnb7bh', 'j4eLxe-595Uk'); // Conecta com o banco de dados
mysql_select_db('backup'); // Seleciona o banco certo
$dados = mysql_query('SELECT * FROM log'); // Pega todos os registros da tabela log
?>
	<div id="grid_content">
		<div class="main_content">
			<h1>Backups</h1>
			<table cellpadding="0" cellspacing="0" border="0" class="tabela">
				<thead>
					<tr>
						<th>In&iacute;cio</th>
						<th>Fim</th>
						<th>Servidor</th>
						<th>Arquivo</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>

				<?php 
				    while($log = mysql_fetch_assoc($dados)){
      				      if($log['status'] == "OK"){
            				$cor = "'#20B2AA'";
        			      }else{
            				$cor = "'#ff0202'";
        			      }
    					echo "<tr>";
    					echo "<td>{$log['inicio']}</td>";
    					echo "<td>{$log['fim']}</td>";
    					echo "<td>{$log['server']}</td>";
					echo "<td>{$log['arquivo']}</td>";
    					echo "<td align=center><b><font color=$cor>{$log['status']}</font></b></td>";
    					echo "</tr>"; 
				      }
				?>
				</tbody>
			</table>
		</div>
</div>

<?php
require('footer.php');
?>
