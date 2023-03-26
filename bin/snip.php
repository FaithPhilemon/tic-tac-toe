<?php
$winner = 'n';
$box = array('','','','','','','','','');
if (isset($_POST["gobtn"]))
	{
		$box[0] = $_POST["box0"];
		$box[1] = $_POST["box1"];
		$box[2] = $_POST["box2"];
		$box[3] = $_POST["box3"];
		$box[4] = $_POST["box4"];
		$box[5] = $_POST["box5"];
		$box[6] = $_POST["box6"];
		$box[7] = $_POST["box7"];
		$box[8] = $_POST["box8"];

		if(($box[0] == 'x' && $box[1] == 'x' && $box[2] == 'x')  || ($box[3] == 'x' && $box[4] == 'x' && $box[5] == 'x') || ($box[6] == 'x' && $box[7] == 'x' && $box[8] == 'x') || ($box[0] == 'x' && $box[3] == 'x' && $box[6] == 'x')  || ($box[1] == 'x' && $box[4] == 'x' && $box[7] == 'x') || ($box[2] == 'x' && $box[5] == 'x' && $box[8] == 'x') || ($box[0] == 'x' && $box[4] == 'x' && $box[8] == 'x') || ($box[2] == 'x' && $box[4] == 'x' && $box[6] == 'x') )
		{
			$winner = 'x';
			Print "<h1>X Wins!</h1>";
		}

		$blank = 0;
		for ($i = 0; $i <= 8 ; $i++)
		{
			if($box[$i] == '')
			{
				$blank = 1;
			}
		}
		if($blank == 1)
		{
			$i = rand() % 8;
			while($box[$i] != '')
			{
				$i = rand() % 8;
			}
			$box[$i] = 'o';
			if(($box[0] == 'o' && $box[1] == 'o' && $box[2] == 'o')  || ($box[3] == 'o' && $box[4] == 'o' && $box[5] == 'o') || ($box[6] == 'o' && $box[7] == 'o' && $box[8] == 'o') || ($box[0] == 'o' && $box[3] == 'o' && $box[6] == 'o')  || ($box[1] == 'o' && $box[4] == 'o' && $box[7] == 'o') || ($box[2] == 'o' && $box[5] == 'o' && $box[8] == 'o') || ($box[0] == 'o' && $box[4] == 'o' && $box[8] == 'o') || ($box[2] == 'o' && $box[4] == 'o' && $box[6] == 'o') )
			{
				$winner = 'o';
				Print "<h1>O Wins!</h1>";
			}
			
		}
		else if ($winner == 'n')
		{
			$winner = 't';
			Print "<h1>Game Tied!</h1>";
		}
	}
?>
<html>
<head>
	<title>Tic Tac Toe</title>
	<style>
	body {
		background-color: brown;
		text-align: center;
	}
	#ip{
		border-radius: 50px;
    	border: 2px solid black;
    	padding: 50px; 
    	width: 200px;
    	height: 15px;
    	margin-bottom: 20px;
    	margin-top: 20px;
    	margin-right: 20px;
    	font-size: 30px;
	}
	#go{
		 
    	width: 200px;
    	height: 15px;
    	margin-top: 20px;
    	padding: 50px;
    	border-radius: 50px;
	}
	</style>
</head>
<body>
	<img src="Tic-Tac-Toe-Pro.jpg" alt="banner" style="width:1000px;height:300px;">
	<div style="margin:0 auto;width:75%;text-align:center;">
	<form name = "ticktactoe" method = "post" action = "index.php">
		<?php
			for($i = 0; $i <=8; $i++)
			{
				printf('<input type = "text" id = "ip" name = "box%s" value = "%s">', $i, $box[$i]);
				if ($i == 2 || $i == 5 || $i == 8){
				print("<br>");
				}
			}
			if($winner == 'n')
			{
				print('<input type = "submit" name = "gobtn" value = "Next Move" id = "go">');
			}
			else
			{
				print('<input type = "button" name = "newgamebtn" value = "Play Again" id = "go" onclick = "window.location.href=\'index.php\'">');
			}
	
		?>
	</form>
	</div>
</body>
</html>
