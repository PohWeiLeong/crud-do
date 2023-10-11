<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

	<title>Reversi Game</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			text-align: center;
		}

		h1 {
			font-size: 2em;
		}

		.board {
			display: inline-block;
			text-align: center;
			vertical-align: middle;
		}

		.board button {
			font-size: 2em;
			padding: 20px 40px;
			width:30px;
			height:60px;
			cursor: pointer;
			display: flex;
 			justify-content: center;
  			align-items: center;
		}

		.board .white {
			color: #000;
		}

		.board .black {
			color: #fff;
		}

		table{
			border-collapse: collapse;
			border-spacing: 0;
		}

		table td {
			padding:0px;
		}
	</style>
</head>
<body>
	<h1>Reversi Game</h1>

	<div class="board">
		<table>
		<?php
				$size = 8;
				$flag1=1;
				$flag2=1;

				for ($i = 1; $i < $size+1; $i++) {
					echo '<tr>';

					for ($j = 1; $j < $size+1; $j++) {

						if(($flag1==1&&$flag2==1)||$flag1==1&&$flag2==0){
								echo '<td> <button style="background-color:#27AE60">  </button></td>';
							$flag1=0;	
						}
						else if (($flag1==0&&$flag2==1)||($flag1==0&&$flag2==0)){
							echo '<td><button style="background-color:#229954">  </button></td>';
							$flag1=1;
							
						}
												
					}

					echo '</tr>';

					if($flag2==1){
						$flag2=0;
						$flag1=0;
					}
					else{
						$flag2=1;
						$flag1=1;
					}
				}
			?>
			</table>
	</div>

	<script>
	
		const buttons = document.querySelectorAll('.board button');
		let currentPlayer = 'white';

		buttons.forEach((button) => {
			button.addEventListener('click', () => {

				button.classList.add(currentPlayer);

				if (currentPlayer === 'white') {
					currentPlayer = 'black';
					button.innerHTML='<i class="fa-solid fa-circle"></i>'
				} else {
					currentPlayer = 'white';
					button.innerHTML='<i class="fa-solid fa-circle" ></i>'

				}
				button.disabled = true;
			});
		});
	</script>
</body>
</html>

