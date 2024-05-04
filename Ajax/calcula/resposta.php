<?php
$respostas = array(
   'expressao' => 'Por favor, ',
   'campos' => array(
      'todos_campos' => 'preencha todos os campos',
      'operado' => 'Escolhar uma operação',
      'campo_1' => 'preencha o Primeiro Campo',
      'campo_2' => 'preencha o Segundo Campo',
   ),
   'zero' => 'Divisão por zero não é permitida'
);



if (empty($_POST['num1']) && empty($_POST['num2']) && empty($_POST['opera'])) {
   echo json_encode($respostas['expressao'] . $respostas['campos']['todos_campos'] . '.');
} else {
   if (isset($_POST['opera'])) {
      $operadores = array('+', '-', '*', '/');
      $resultado = 0;
      $num1 = floatval($_POST['num1']);
      $num2 = floatval($_POST['num2']);
      $opera = $_POST['opera'];

      if (empty($_POST['num1']) && empty($_POST['num2'])) {
         echo json_encode($respostas['expressao'] . $respostas['campos']['campo_1'] . ' e ' . $respostas['campos']['campo_2'] . '.');
      } elseif (!isset($_POST['num1']) || $_POST['num1'] === '') {
         echo json_encode($respostas['expressao'] . $respostas['campos']['campo_1'] . '.');
      } elseif (!isset($_POST['num2']) || $_POST['num2'] === '') {
         echo json_encode($respostas['expressao'] . $respostas['campos']['campo_2'] . '.');
      } else {

         switch ($opera) {
            case '+':
               $resultado = $num1 + $num2;
               break;
            case '-':
               $resultado =  $num1 - $num2;
               break;
            case '*':
               $resultado =  $num1 * $num2;
               break;
            case '/':
               if ($num2 != 0) {
                  $resultado =  $num1 / $num2;
               } else {
                  $resultado = json_encode($respostas['zero'] . '.');
               }
               break;
            default:
               $resultado = json_encode($respostas['expressao'] . $respostas['campos']['campo_1'] . '.');
         }

         echo $resultado;
      }
   } else {
      echo json_encode($respostas['expressao'] . $respostas['campos']['operado']);
   }
}
