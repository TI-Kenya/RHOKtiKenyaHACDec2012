<form action="areaadmin.php?id=<?php echo $id;?>" method="post">
		<p>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Name" value="<?php echo $name; ?>">
		<p>Problem&nbsp;&nbsp;&nbsp;<input type="text" name="Problem" value="<?php echo $problem; ?>">
		<p>Description<textarea name="description"  cols="5" rows="5" id="description" ><?php echo $description; ?></textarea>
		<p>Reported&nbsp;&nbsp;&nbsp;<b><?php echo $time; ?></b>
		<p>Solved&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo strtoupper($solved); ?></b>
		<p>Solved&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <input name="solved" type="radio" value="yes" <?php 
		 if($solved == 'yes'){echo " checked";}?>> Solved
		 &nbsp;&nbsp;
		 <input name="solved" type="radio" value="no" <?php 
		 if($solved == 'no'){echo " checked";}?>> Not Solved
		<p><input type="submit" name="submit" value="Edit">
		</form>