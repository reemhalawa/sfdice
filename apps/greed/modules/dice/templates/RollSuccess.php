<div style="margin-bottom: 25px">
	<a href="/sfdice/web/greed_dev.php/dice">
		Back
	</a>
</div>
<div style="margin-bottom: 15px">
	Number N of dice thrown is <b><?php echo $dThrow; ?></b>
</div>
<?php
	foreach($aPrintedDicesResult as $dRollNumber=>$aSides)
	{
?>
<div style="margin-bottom: 10px">
	<span style="margin-right: 15px">Dice <b><?php echo $dRollNumber; ?></b>: </span>
	<?php
		foreach($aSides['aDices'] as $dKey=>$dSide)
		{
	?>
			<span style="margin-right: 10px"><?php echo $dSide; ?></span>
	<?php
		}
	?>
	<span style="margin-left: 20px">
		<b>Score:</b> <?php echo $aSides['dScore']; ?>
	</span>
</div>
<?php
	}
?>
<div style="margin-top: 25px">
	<a href="/sfdice/web/greed_dev.php/dice">
		Back
	</a>
</div>