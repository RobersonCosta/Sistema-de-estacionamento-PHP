<?php
include_once 'veiculo.php';
include_once 'ocupacao.php';
include_once 'tipo.php';
include_once 'vaga.php';
include_once 'valor.php';

date_default_timezone_set('America/Sao_Paulo');

$objVaga = new Vaga();
$objTipo = new Tipo();
$objVeiculo = new Veiculo();
$objOcupacao = new Ocupacao();
$objValor = new Valor();
$vaga = new Vaga();

$listaVagas = $objVaga->listaVagas();
$listaTipos = $objTipo->listaTipos();
$listaOcupacoes = $objOcupacao->listaOcupacoes();
$listaValores = $objValor->listaValores();


$placa = $_POST['placa'];
$veiculo = $objVeiculo->buscaVeiculoPlaca($placa);
$hora = date('H:i:s');
$data = date('d/m/Y');

var_dump($placa);
if ($placa == null) {
    header("location: home.php");
} elseif ($veiculo->getPlaca() == $placa && $placa!=null){
    if ($listaOcupacoes!=null) {
        foreach ($listaOcupacoes as $ocup) {
            
            $hora_entrada = $ocup->getHora_entrada();
            $data_entrada = $ocup->getData_entrada();
            if ($ocup->getVeiculo() == $veiculo->getId() && $ocup->getHora_saida() == null && $ocup->getData_saida() == null) {  
                

                if ($ocup->getVeiculo() == $veiculo->getId() && strtotime($hora)>strtotime($hora_entrada) && strtotime($data)>=strtotime($data_entrada)) {
                    $auxiliar = $ocup->saidaHora_e_Data($ocup, $hora, $data);
                    $idVaga = $ocup->getVaga();
                    $vagaAux = $vaga->buscaVaga($idVaga);
                    
                    $preencherVaga = $vagaAux->status('FALSE');

                    
                    

                    $horaAux = DateTime::createFromFormat('H:i:s', $hora);
                    $hora_entradaAux = DateTime::createFromFormat('H:i:s', $hora_entrada);

                    $intervalo = $hora_entradaAux->diff($horaAux);
                                   
                    $var = $intervalo->format('%H:%I:%S');
                    $tempo = explode(':', $var);
                    $tempoAux = (int) $tempo[0];

                    
                    foreach ($listaValores as $valor) {
                        if ($tempoAux >= 6){
                            if ($valor->getPer_noite()=="t" && $valor->getTipo() == $veiculo->getTipo()) {
                                $valor_a_pagar = $valor->getValor();
                            }
                        } elseif ($tempoAux >=12){
                            if ($valor->getDiaria()=="t" && $valor->getTipo() == $veiculo->getTipo()) {
                                $valor_a_pagar = $valor->getValor();
                            }
                        } else{
                            if ($valor->getTipo() == $veiculo->getTipo()){
                                $auxiliar = $valor->getValor();
                                $valor_a_pagar = $auxiliar*$tempoAux;
                            }
                        }
                    }

                    $inserirValor = $ocup->valor($valor_a_pagar);
                    header("location: saindoEstacionamento.php?hora=$hora&data=$data&placa=$placa&valor_a_pagar=$valor_a_pagar");
                    break;
                }
                break;
            } else {     
                header("location: entrandoEstacionamentoJaCadastrado.php?hora=$hora&data=$data&placa=$placa");
            }
        }
    }else {    
            header("location: entrandoEstacionamentoJaCadastrado.php?hora=$hora&data=$data&placa=$placa");
    }
}else{ 
    header("location: entrandoEstacionamentoNaoCadastrado.php?hora=$hora&data=$data&placa=$placa");
}

?>