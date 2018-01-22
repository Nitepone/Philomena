<!DOCTYPE html>
<html>
<head>
	<title>Server Side Calc</title>
	<style>
	.grid-container {
		display: grid;
		grid-template-columns: auto auto auto;
	}
	.grid-item {
		width: auto;
		height: auto;
	}
	.calc-container {
		width: 210px;
		height: 340px;
		margin: auto;
	}
	.calc-button {
		width: 70px;
		height: 100%;
	}
	.screen {
		font-size: 20px;
		width: 196px;
	}
	</style>
</head>
<body>
	<form id="calcForm" method="POST" action="calcHelper.php">
	<div class="calc-container">
		<input type="text" class="screen" name="screen" id="screen" onchange="updateFormula()">
		<div class="grid-container">
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend(1)">1</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend(2)">2</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend(3)">3</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend(4)">4</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend(5)">5</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend(6)">6</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend(7)">7</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend(8)">8</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend(9)">9</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend(0)">0</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend('+')">+</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend('=')">Eval</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend('/')">/</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend('x')">x</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend(' ')">Space</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend('-')">-</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="calcAppend('^')">^</button>
			</div>
			<div class="grid-item">
				<button type="button" class="calc-button" onclick="clearView()">Clear</button>
			</div>
		</div>
	</div>
	</form>
	<script>
	var formula = "";
	function calcAppend(t){
		if (t == '='){
			submitForm();
		} else {
			formula += t;
			updateView();
		}
	}
	function submitForm(){
		document.getElementById("calcForm").submit();
		clearView;
	}
	function clearView(){
		formula = "";
		updateView();
	}
	function updateFormula(){
		formula = document.getElementById("screen").value;
	}
	function updateView(){
		document.getElementById("screen").value = formula;
	}
	</script>
</body>
</html>
