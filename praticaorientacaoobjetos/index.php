
<?php
class pessoa {

    public $nome;
    public $idade;
}

$pessoa = new pessoa();

$pessoa->nome = "Ze";
$pessoa->idade = 35;


echo "Nome: " . $pessoa->nome . "<br>";
echo "Idade: " . $pessoa->idade;

?>
