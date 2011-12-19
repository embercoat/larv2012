<div id="sidebar-1" class="sidebar">
	<table>
	<tr>
		<td colspan="2">
			<h2>Min katalog</h2>
		</td>
	</tr>
	<tr>
		<td class="f">
			<p>ABB AB</p>
		</td>
		<td class="x">
			<img src="/images/katalog/minus-circle.png" title="Ta bort från min katalog" alt="remove"> <!-- Klicka för att ta bort från min katalog-knapp -->
		</td>
	</tr>
	<tr>
		<td class="f">
			<p>LKAB</p>
		</td>
		<td class="x">
			<img src="/images/katalog/minus-circle.png" title="Ta bort från min katalog" alt="remove"> 
		</td>
	</tr>
	<tr>
		<td class="f">
			<p>Boliden</p>
		</td>
		<td class="x">
			<img src="/images/katalog/minus-circle.png" title="Ta bort från min katalog" alt="remove"> 
		</td>
	</tr>
	</table>
	 <ul class="horizontal">
		<li><a href="#" title="Här sätts dina valda företag ihop till din personliga LARV-katalog!" class="vtip">Exportera</a></li>
	</ul>
</div>
<script type="text/javascript">
	$(document).ready(function() {
        var el = $('#sidebar-1'),
            top_offset = $('.container').offset().top;
        $(window).scroll(function() {
          	var scroll_top = $(window).scrollTop();

          	if (scroll_top > top_offset) {
            	el.css('top', scroll_top - top_offset);
          	}
          	else {
            	el.css('top', '');
          	}
        });
	});
</script>
