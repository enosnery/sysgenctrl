<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
include("inc/verifica_sessao.inc");
$index = $_SESSION['prodIndex'];
//query que seleciona o usuario e a senha do login informados
$produtos = "SELECT idusuario, nome, email, login, codigo_motorista, cpf, street, street_number, neighborhood, city, state, documento_url, cep, pagamento_id, pagamento_secret FROM usuario WHERE idusuario = $index;";

$resultado = pg_query($conexao, $produtos);

//verifica se a query retornou algum resultado
//print odbc_errormsg($conexao);
$num_linhas = pg_num_rows($resultado);

//echo $num_linhas." - Linhas</br>";
//echo $res." - Resultado</br>"
 // $result = $pg_fetch_all($resultado);
//$login = $resultado['LOGIN'];

//se retonou algum resultado, executar o registro do usuario
if ($num_linhas > 0)
	{
$i = 0 ;
  while ($row = pg_fetch_assoc($resultado)) {
		$i++;
  $email = $row['email'];
	$id = $row['idusuario'];
	$nome = $row['nome'];
  $login = $row['login'];
  $codigo = $row['codigo_motorista'];
  $cpf = $row['cpf'];
  $pagamento_id = $row['pagamento_id'];
  $pagamento_secret = $row['pagamento_secret'];
  $cep = $row['cep'];
  $street = $row['street'];
  $street_number = $row['street_number'];
  $neighborhood = $row['neighborhood'];
  $city = $row['city'];
  $state = $row['state'];
  $documento = $row['documento_url'];
	echo "<input id='index' name='index' type='hidden' value='$id'>";
  echo "<label for='documento'>Documento</label>";
  if($documento !== null && $documento !== ''){
  echo "<div class='prodDetailImg'>";
  echo "<img class='prodDetailImg img-responsive' width='320px;' src='$documento' />";
  echo "</div>";
}
  echo "<input id='foto' name='foto' class='form-control-file' style='margin-bottom:20px;' type='file' value='$nome'>";
  echo "<label for='nome'>Nome</label>";
	echo "<input id='nome' name='nome' class='prodDetailInput centAlign' value='$nome' maxlength='40'/>";
  echo "<label for='email'>Email</label>";
	echo "<input id='email' name='email' class='prodDetailInput centAlign' value='$email' maxlength='50'/>";
  echo "<label for='login'>Login</label>";
  echo "<input id='login' name='login' class='prodDetailInput centAlign' value='$login' readonly/>";
  echo "<label for='codigo'>Código</label>";
  echo "<input id='codigo' name='codigo' class='prodDetailInput centAlign' value='$codigo' readonly/>";
  echo "<label for='cpf'>CPF</label>";
  echo "<input id='cpf' name='cpf' class='prodDetailInput centAlign' value='$cpf' readonly/>";
  echo "<label for='cep'>CEP</label>";
  echo "<input id='cep' name='cep' class='prodDetailInput centAlign' value='$cep' onblur='pesquisacep();' />";
  echo "<label for='street'>Endereço</label>";
  echo "<input id='street' name='street' class='prodDetailInput centAlign' value='$street' />";
  echo "<label for='street_number'>Número</label>";
  echo "<input id='street_number' name='street_number' class='prodDetailInput centAlign' value='$street_number' />";
  echo "<label for='neighborhood'>Bairro</label>";
  echo "<input id='neighborhood' name='neighborhood' class='prodDetailInput centAlign' value='$neighborhood' />";
  echo "<label for='city'>Cidade</label>";
  echo "<input id='city' name='city' class='prodDetailInput centAlign' value='$city' />";
  echo "<label for='state'>Estado</label>";
  echo "<select name='state' id='state' class='form-control' >";
if($state === 'AC') {
  echo "<option value='AC' selected>Acre</option>";
}else{
  echo "<option value='AC'>Acre</option>";
}
if($state === 'AL') {
  echo "<option value='AL' selected>Alagoas</option>";
}else{
  echo "<option value='AL'>Alagoas</option>";
}
if($state === 'AP') {
  echo "<option value='AP' selected>Amapá</option>";
}else{
  echo "<option value='AP'>Amapá</option>";
}
if($state === 'AM') {
  echo "<option value='AM' selected>Amazonas</option>";
}else{
  echo "<option value='AM'>Amazonas</option>";
}
if($state === 'BA') {
  echo "<option value='BA' selected>Bahia</option>";
}else{
  echo "<option value='BA'>Bahia</option>";
}
if($state === 'CE') {
  echo "<option value='CE' selected>Ceará</option>";
}else{
  echo "<option value='CE'>Ceará</option>";
}
if($state === 'DF') {
  echo "<option value='DF' selected>Distrito Federal</option>";
}else{
  echo "<option value='DF'>Distrito Federal</option>";
}
if($state === 'ES') {
  echo "<option value='ES' selected>Espírito Santo</option>";
}else{
  echo "<option value='ES'>Espírito Santo</option>";
}
if($state === 'GO') {
  echo "<option value='GO' selected>Goiás</option>";
}else{
  echo "<option value='GO'>Goiás</option>";
}
if($state === 'MA') {
  echo "<option value='MA' selected>Maranhão</option>";
}else{
  echo "<option value='MA'>Maranhão</option>";
}
if($state === 'MT') {
  echo "<option value='MT' selected>Mato Grosso</option>";
}else{
  echo "<option value='MT'>Mato Grosso</option>";
}
if($state === 'MS') {
  echo "<option value='MS' selected>Minas Gerais</option>";
}else{
  echo "<option value='MS'>Minas Gerais</option>";
}
if($state === 'PA') {
  echo "<option value='PA' selected>Pará</option>";
}else{
  echo "<option value='PA'>Pará</option>";
}
if($state === 'PB') {
  echo "<option value='PB' selected>Paraíba</option>";
}else{
  echo "<option value='PB'>Paraíba</option>";
}
if($state === 'PR') {
  echo "<option value='PR' selected>Paraná</option>";
}else{
  echo "<option value='PR'>Paraná</option>";
}
if($state === 'PE') {
  echo "<option value='PE' selected>Pernambuco</option>";
}else{
  echo "<option value='PE'>Pernambuco</option>";
}
if($state === 'PI') {
  echo "<option value='PI' selected>Piauí</option>";
}else{
  echo "<option value='PI'>Piauí</option>";
}
if($state === 'RJ') {
  echo "<option value='RJ' selected>Rio de Janeiro</option>";
}else{
  echo "<option value='RJ'>Rio de Janeiro</option>";
}
if($state === 'RN') {
  echo "<option value='RN' selected>Rio Grande do Norte</option>";
}else{
  echo "<option value='RN'>Rio Grande do Norte</option>";
}
if($state === 'RS') {
  echo "<option value='RS' selected>Rio Grande do Sul</option>";
}else{
  echo "<option value='RS'>Rio Grande do Sul</option>";
}
if($state === 'RO') {
  echo "<option value='RO' selected>Rondônia</option>";
}else{
  echo "<option value='RO'>Rondônia</option>";
}
if($state === 'RR') {
  echo "<option value='RR' selected>Roraima</option>";
}else{
  echo "<option value='RR'>Roraima</option>";
}
if($state === 'SC') {
  echo "<option value='SC' selected>Santa Catarina</option>";
}else{
  echo "<option value='SC'>Santa Catarina</option>";
}
if($state === 'SP') {
  echo "<option value='SP' selected>São Paulo</option>";
}else{
  echo "<option value='SP'>São Paulo</option>";
}
if($state === 'SE') {
  echo "<option value='SE' selected>Sergipe</option>";
}else{
  echo "<option value='SE'>Sergipe</option>";
}
if($state === 'TO') {
  echo "<option value='TO' selected>Tocantins</option>";
}else{
  echo "<option value='TO'>Tocantins</option>";
}
  echo "</select>";
  echo "<label for='senha'>Senha</label>";
	echo "<input type='password' id='btn-senha' name='senha' class='prodDetailInput centAlign' value='' disabled>";
  echo "<a type='button' class='btn btn-primary' onclick='liberaSenha();'> Alterar Senha</a> ";
  echo "</input>";
  echo "<br/>";
  echo "<br/>";
  echo "<label for='pagamentoid'>ID Gerencianet</label>";
  echo "<input id='pagamentoid' name='pagamentoid' class='prodDetailInput centAlign' value='$pagamento_id' />";
  echo "<label for='pagamentosecret'>Secret Gerencianet</label>";
  echo "<input id='pagamentosecret' name='pagamentosecret' class='prodDetailInput centAlign' value='$pagamento_secret' />";
}
}


?>
