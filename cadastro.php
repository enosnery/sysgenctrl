<?php
session_start();
include("./inc/conectar.inc");
include("./inc/cabecalho.inc");


  if (empty( $_POST['nome'])){ $_POST['nome'] = ''; $nome   = '';
} else {
            $nome = $_POST['nome'];
}
  if (empty( $_POST['titulo'])){ $_POST['titulo'] = ''; $titulo   = '';
} else {
            $titulo = $_POST['titulo'];
}
  if (empty( $_POST['zona'])){ $_POST['zona'] = ''; $zona   = '';
} else {
            $zona = $_POST['zona'];
}
  if (empty( $_POST['secao'])){ $_POST['secao'] = ''; $secao   = '';
} else {
            $secao = $_POST['secao'];
}
  if (empty( $_POST['municipio'])){ $_POST['municipio'] = ''; $municipio   = '';
} else {
            $municipio = $_POST['municipio'];
}
  if (empty( $_POST['datanasc'])){ $time = '00-00-0000'; $dtnasc = date("Y-m-d", strtotime($time)); 
} else {
            $dtnasctmp = str_replace("/","-",$_POST['datanasc']);
            $dtnasc = date("Y-m-d", strtotime($dtnasctmp));
} 


 if (empty( $_POST['sexo'])){ $_POST['sexo'] = ''; $sexo   = '';
} else {
            $sexo = $_POST['sexo'];
}
  if (empty( $_POST['profissao'])){ $_POST['profissao'] = ''; $profissao   = '';
} else {
            $profissao = $_POST['profissao'];
}
  if (empty( $_POST['estadocivil'])){ $_POST['estadocivil'] = ''; $estadocivil   = '';
} else {
            $estadocivil = $_POST['estadocivil'];
}
  if (empty( $_POST['naturalidade'])){ $_POST['naturalidade'] = ''; $naturalidade   = '';
} else {
            $naturalidade = $_POST['naturalidade'];
}
  if (empty( $_POST['nacionalidade'])){ $_POST['nacionalidade'] = ''; $nacionalidade   = '';
} else {
            $nacionalidade = $_POST['nacionalidade'];
}
  if (empty( $_POST['grauinstrucao'])){ $_POST['grauinstrucao'] = ''; $grauinstrucao   = '';
} else {
            $grauinstrucao = $_POST['grauinstrucao'];
}
  if (empty( $_POST['telres'])){ $_POST['telres'] = ''; $telres   = '';
} else {
            $telres = $_POST['telres'];
}
  if (empty( $_POST['telcel'])){ $_POST['telcel'] = ''; $telcel   = '';
} else {
            $telcel = $_POST['telcel'];
}
  if (empty( $_POST['telcom'])){ $_POST['telcom'] = ''; $telcom   = '';
} else {
            $telcom = $_POST['telcom'];
}
  if (empty( $_POST['rg'])){ $_POST['rg'] = ''; $rg   = '';
} else {
            $rg = $_POST['rg'];
}
  if (empty( $_POST['orgexp'])){ $_POST['orgexp'] = ''; $orgexp   = '';
} else {
            $orgexp = $_POST['orgexp'];
}
  if (empty( $_POST['dataexp'])){  $time = '00-00-0000'; $dataexp = date("Y-m-d", strtotime($time));
} else {    
            $dataexptmp = str_replace("/","-",$_POST['dataexp']);
            $dataexp = date("Y-m-d", strtotime($dataexptmp));
}
  if (empty( $_POST['cpf'])){ $_POST['cpf'] = ''; $cpf   = '';
} else {
            $cpf = $_POST['cpf'];
}
  if (empty( $_POST['endereco'])){ $_POST['endereco'] = ''; $endereco   = '';
} else {
            $endereco = $_POST['endereco'];
}  if (empty( $_POST['endnumero'])){ $_POST['endnumero'] = ''; $endnumero   = '';
} else {
            $endnumero = $_POST['endnumero'];
} 
 if (empty( $_POST['endcomp'])){ $_POST['endcomp'] = ''; $endcomp   = '';
} else {
            $endcomp = $_POST['endcomp'];
}
  if (empty( $_POST['endbairro'])){ $_POST['endbairro'] = ''; $endbairro   = '';
} else {
            $endbairro = $_POST['endbairro'];
}
  if (empty( $_POST['endcidade'])){ $cidade   = '';
} else {
            $cidade = $_POST['endcidade'];
}
  if (empty( $_POST['cep'])){ $_POST['cep'] = ''; $cep   = '';
} else {
            $cep = $_POST['cep'];
}
  if (empty( $_POST['pai'])){ $_POST['pai'] = ''; $pai   = '';
} else {
            $pai = $_POST['pai'];
}
  if (empty( $_POST['mae'])){ $_POST['mae'] = ''; $mae   = '';
} else {
            $mae = $_POST['mae'];
}
  if (empty( $_POST['email1'])){ $_POST['email1'] = ''; $email   = '';
} else {
            $email = $_POST['email1'];
}
  if (empty( $_POST['filiado'])){ $_POST['filiado'] = ''; $filiado   = '';
} else {
            $filiado = $_POST['filiado'];
}
  if (empty( $_POST['partido'])){ $_POST['partido'] = ''; $partido   = '';
} else {
            $partido = $_POST['partido'];
}
  if (empty( $_POST['diretorio'])){ $_POST['diretorio'] = ''; $diretorio   = '';
} else {
            $diretorio = $_POST['diretorio'];
}
  if (empty( $_POST['datains'])){ $time = '00-00-0000'; $datains = date("Y-m-d", strtotime($time));
} else {
            $datainstmp = str_replace("/","-",$_POST['datains']);
            $datains = date("Y-m-d", strtotime($datainstmp));
}
if (empty( $_POST['user'])){ $_POST['user'] = ''; $user   = '';
} else {
            $user = $_POST['user'];
}
if (empty( $_POST['tipouser'])){ $_POST['tipouser'] = ''; $tipouser   = '';
} else {
            $tipouser = $_POST['tipouser'];
}
if (empty( $_POST['cargo'])){ $_POST['cargo'] = ''; $cargo   = '';
} else {
            $cargo = $_POST['cargo'];
}
if (empty( $_POST['login'])){ $_POST['login'] = ''; $login   = '';
} else {
            $login = $_POST['login'];
            echo $login;
}

if ($tipouser!=3) {
	$cargo = '';
}

     $sql = "INSERT INTO 
        filiados (fili_nomecompleto, fili_datanasc, fili_sexo, fili_profissao, fili_estadocivil, fili_naturalidade, fili_nacionalidade, fili_instrucao, fili_telresid, fili_telcel, fili_telcom, fili_rg, fili_rgorgexp, fili_rgdataexp, fili_cpf, fili_endereco, fili_enderecocomplem, fili_endereconumero, fili_enderecobairro, fili_enderecocidade, fili_enderecocep, fili_pai, fili_mae, fili_email, fili_outrafiliacao, fili_outrafiliacaoqual, fili_diretorio, fili_datainsc, fili_titeleitoral, fili_titeleitoralzona, fili_titeleitoralsecao, fili_titeleitoralmunicipio, fili_tipo, fili_cargo, fili_usuario, fili_ativo)
        VALUES ('$nome', '$dtnasc', '$sexo', '$profissao', '$estadocivil', '$naturalidade', '$nacionalidade', '$grauinstrucao', '$telres', '$telcel', '$telcom', '$rg', '$orgexp', '$dataexp', '$cpf', '$endereco', '$endcomp', '$endnumero', '$endbairro', '$cidade', '$cep', '$pai', '$mae', '$email', '$filiado', '$partido', '$diretorio', '$datains', '$titulo', '$zona', '$secao', '$municipio', (select tipo.tipo_nome from tipo where tipo.tipo_id = '$tipouser'), '$cargo', '$login', 'S');";
    
    $qr = mysql_query($sql) or die (mysql_error());




header("Location: cadastro_form.php");



?>