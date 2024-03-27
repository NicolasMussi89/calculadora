<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Salário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Calculadora de Salário</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="nome">Nome do Vendedor:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="meta_semanal">Meta de Venda Semanal (em R$):</label>
                <input type="number" id="meta_semanal" name="meta_semanal" value="20000" required>
            </div>
            <div class="form-group">
                <label for="meta_mensal">Meta de Venda Mensal (em R$):</label>
                <input type="number" id="meta_mensal" name="meta_mensal" value="80000" required>
            </div>
            <button type="submit" name="calcular">Calcular Salário</button>
        </form>
   
        <?php
        if (isset($_POST["calcular"])) {
            $nome = $_POST["nome"];
            $meta_semanal = $_POST["meta_semanal"];
            $meta_mensal = $_POST["meta_mensal"];
            $salario_minimo = 1412; // Salário mínimo definido para todos os vendedores
           
            // Verificar se a meta semanal foi atingida
            if ($meta_semanal >= 20000) {
                // Calculando bônus por cumprimento de meta semanal (1% sobre o valor da meta)
                $bonus_semanal = $meta_semanal * 0.01;
               
                // Calculando bônus por excedente de meta semanal (5% sobre o excedente)
                $excedente_semanal = ($meta_semanal - 20000) * 0.05;
            } else {
                $bonus_semanal = 0;
                $excedente_semanal = 0;
            }
           
            // Verificar se a meta mensal foi atingida
            if ($meta_mensal >= 80000 && $bonus_semanal > 0) {
                // Calculando bônus por excedente de meta mensal (10% sobre o excedente)
                $excedente_mensal = ($meta_mensal - 80000) * 0.10;
            } else {
                $excedente_mensal = 0;
            }
           
            // Calculando o salário final
            $salario_final = $salario_minimo + $bonus_semanal + $excedente_semanal + $excedente_mensal;
   
            echo "<div class='resultado'>";
            echo "<h3>Resultado</h3>";
            echo "<p>Nome do Vendedor: $nome</p>";
            echo "<p>Salário Final: R$ " . number_format($salario_final, 2, ",", ".") . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
