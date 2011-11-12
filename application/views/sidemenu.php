					<ul>
						<?
						foreach($alternatives as $alt){
						?>
						<li>
							<a <? foreach($alt['attributes'] as $att => $value)
									echo $att.'="'.$value.'"';
								echo (((bool)strstr($alt['attributes']['href'], Request::$current->uri()))?'class="active"':'');
							?>>
								<span><?=$alt['content']; ?></span>
							</a>
						</li>
						<? } ?>
					</ul>