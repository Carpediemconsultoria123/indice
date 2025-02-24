<?php

$status_atendimento = $_POST['status_atendimento'];
$data_solicitacao = $_POST['data_solicitacao'];
$empresa = $_POST['empresa'];
$gestor_atendido = $_POST['gestor_atendido'];
$nivel_atencao = $_POST['nivel_atencao'];
$setor_responsavel1 = $_POST['setor_responsavel1'];
$observacao1 = $_POST['observacao1'];
$setor_responsavel2 = $_POST['setor_responsavel2'];
$observacao2 = $_POST['observacao2'];
$setor_responsavel3 = $_POST['setor_responsavel3'];
$observacao3 = $_POST['observacao3'];
$sla_resposta = $_POST['sla_resposta'];
$cs_responsavel = $_POST['cs_responsavel'];

// Configurações de Credenciais
$servidor = "localhost";  // Corrigido para "localhost"
$usuario = "root";  // Usuário padrão do XAMPP
$senha = "Carpe@123";  // Senha padrão vazia no XAMPP
$banco = "indice_cs";  // Nome do seu banco de dados

// Criando a conexão
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verificando a conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

$smtp = $conexao->prepare("INSERT INTO formulario (status_atendimento, data_solicitacao, empresa, gestor_atendido, nivel_atencao, setor_responsavel1, observacao1, setor_responsavel2, observacao2, setor_responsavel3, observacao3, sla_resposta, cs_responsavel) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$smtp-> bind_param("sssssssssssss", $status_atendimento, $data_solicitacao, $empresa, $gestor_atendido, $nivel_atencao, $setor_responsavel1, $observacao1, $setor_responsavel2, $observacao2, $setor_responsavel3, $observacao3, $sla_resposta, $cs_responsavel);

if($smtp->execute()){
    echo "Mensagem enviada com sucesso!";
}else{
    echo "Erro no envio da mensagem!".$smtp->error;
}

$smtp->close();
$conexao->close();

?>
