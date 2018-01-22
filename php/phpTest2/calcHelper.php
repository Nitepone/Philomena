<?php
	$formula = explode(" ", htmlspecialchars($_POST['screen']));
	$binaryOperators = ['^','x','*','/','+','-'];
	$unaryOperators = ['|','_'];

	function binaryEval(){
		global $formula;
		$o = array_shift($formula);
		$v1 = evaluate();
		$v2 = evaluate();
		if ($o == '^'){
			return pow($v1,$v2);
		}
		else if ($o == 'x' || $o == '*'){
			return $v1*$v2;
		}
		else if ($o == '/'){
			return $v1/$v2;
		}
		else if ($o == '+'){
			return $v1+$v2;
		}
		else if ($o == '-'){
			return $v1-$v2;
		}
	}

	function unaryEval(){
		echo "No unary yet...";
	}

	function evaluate(){
		global $formula;
		global $binaryOperators, $unaryOperator;
		$currentOperator = $formula[0];
		if (in_array($currentOperator, $binaryOperators)){
			echo "BinaryEval<br/>";
			return binaryEval();
		}
		elseif (in_array($currentOperator, $unaryOperatorsi)){
			echo "UnaryEval<br/>";
			return unaryEval();
		}
		else {
			echo "Hit int " . $currentOperator . "<br/>";
			return array_shift($formula);
		}
	}
	echo evaluate($formula);
