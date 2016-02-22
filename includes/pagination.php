<?php 
//limite pro sql
function getLimit($pag, $paginationMax){
	$pag = ($pag - 1) * $paginationMax;
	return " LIMIT ".$pag.",".$paginationMax;
}
//lista erro do valitron
function pagination($total, $maximo, $pag){
	$totalPages = ceil($total/$maximo);

	if ($totalPages > 1) {	?>
		<div style="margin-top: 30px;">
			<div class="dataTables_info" style="float:left;"> Total: <?=$total?></div>
			<ul class="pagination" style="float:right;">
				<?php 
					//seta voltar
					if ($pag > 1) {
						echo "<li class='paginate_button'><a href='javascript:void(0);' data-pag='".($pag-1)."'><i class='fa fa-angle-left'></i></li>";
					}
					//calcula paginas
					$inicio = $pag > 3 ? ($pag - 3) : 1;
					$fim = ($pag + 3) > $totalPages ? $totalPages : ($pag + 3);
					//loop
					for ($i=$inicio; $i <= $fim; $i++) { 
						$marca = $i == $pag ? "active" : "";
						echo "<li class='paginate_button $marca'><a href='javascript:void(0);' data-pag='".$i."'>".$i."</a></li>";
					}
					//seta proximo
					if ($pag < $totalPages) {
						echo "<li class='paginate_button'><a href='javascript:void(0);' data-pag='".($pag+1)."'><i class='fa fa-angle-right'></i></a></li>";
					}
				?>
			</ul>
		</div>
	<?php	
	}
}
?>