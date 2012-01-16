<table id="details">
		<tr>
			<th colspan="3">
				<h2>Detaljer</h2>
			</th>
		</tr>
		<tr>
			<td rowspan="6" class="image">
				<a href="http://d2oqjo3nc0aqra.cloudfront.net/939672/product/standard/473.jpg">
					<img src="/<?php
					    echo (user::find_user_image($user['user_id']) 
					        ? user::find_user_image($user['user_id']) 
					        : 'upload/random_profiles/'.Model::factory('data')->get_random_profilepicture());
					    ?>" alt="Profilbild" class="profil fancybox" />
				</a>
			</td>
			<td class="name">
				Namn:
			</td>
			<td class="answer">
				<?php echo $user['fname'].' '.$user['lname']; ?>
			</td>
		</tr>
		<tr>
			<td class="name">
				Program:
			</td>
			<td class="answer">
				<?php echo $program['name'].'. År: '.$user['year']; ?>
			</td>
		</tr>
		<tr>
			<td class="name">
				Motivation:
			</td>
			<td class="answer">
				<?php echo $interest['motivation']; ?>
			</td>
		</tr>
		<tr>
			<td class="name">
				CV:
			</td>
			<td>
				<a href="/upload/user/cv/<?php echo $user['user_id']; ?>.pdf"><img src="/images/pdf_iconSMALL.png" alt="CV"></a>
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<?php
			    echo Form::open('/katalog/cvbasen/details/'.$user['user_id'])
			        .Form::button('firsthand', 'Förstahand')
			        .Form::button('secondhand', 'Reserv')
			        .Form::button('remove', 'Ta Bort')
			        .Form::close();
			?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<b><?php
				    switch($interest['company_request']) {
				        case 1:{
				            echo "Studenten markerad som förstahandsval";
				            break;
				        }
				        case 2:{
				            echo "Studenten markerad som reserv";
				            break;
				        }
				    }
				?></b>
			</td>
		</tr>
</table>