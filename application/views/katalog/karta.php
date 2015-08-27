<div class="monter-lista">
<h1>B-Huset</h1>
<img src="/images/booth/b_huset.jpg" />
<table>
    <tr>
    	<td>
    		<h2>Efter Plats</h2>
    		<ul>
    			<?php foreach(Model::factory('company')->get_company_booth(false, '1', 'place') as $booth){ ?>
    			<li><a href="/katalog/foretag/<? echo $booth['company_id']; ?>"><?php echo $booth['place'].': '.$booth['name']; ?></a></li>
    			<?php } ?>
    		</ul>
    	</td>
    	<td>
    		<h2>Efter Företag</h2>
    		<ul>
    			<?php foreach(Model::factory('company')->get_company_booth(false, '1', 'name') as $booth){ ?>
    			<li><a href="/katalog/foretag/<? echo $booth['company_id']; ?>"><?php echo $booth['place'].': '.$booth['name']; ?></a></li>
    			<?php } ?>
    		</ul>
    	
    	</td>
    </tr>
</table>
<img src="/images/booth/c_huset.jpg" />
<table>
    <tr>
    	<td>
    		<h2>Efter Plats</h2>
    		<ul>
    			<?php foreach(Model::factory('company')->get_company_booth(false, '2', 'place') as $booth){ ?>
    			<li><a href="/katalog/foretag/<? echo $booth['company_id']; ?>"><?php echo $booth['place'].': '.$booth['name']; ?></a></li>
    			<?php } ?>
    		</ul>
    	</td>
    	<td>
    		<h2>Efter Företag</h2>
    		<ul>
    			<?php foreach(Model::factory('company')->get_company_booth(false, '2', 'name') as $booth){ ?>
    			<li><a href="/katalog/foretag/<? echo $booth['company_id']; ?>"><?php echo $booth['place'].': '.$booth['name']; ?></a></li>
    			<?php } ?>
    		</ul>
    	
    	</td>
    </tr>
</table>
</div>