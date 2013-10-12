
		<div class="membre-infos">
			<div class="image-membre">
				 <?php echo get_avatar( $user->ID, 'avatar-image'); ?> 
			</div>
			<div class="infos">
				<div class="name">
					<span class="membre-name"><?php echo $user->display_name; ?></span>
					<span class="membre-rank"> (admin)</span>
					<div class="ligne-membre"></div>
				</div>
				<div class="game">
					Joue à : <span class="color-membre">Smite</span>
				</div>
				<div class="age">
					Age : <span class="color-membre">23 ans</span>
				</div>
				<div class="nationalite">
					Nationalité : <span class="color-membre">Belge</span>
				</div>
			</div>
		</div>