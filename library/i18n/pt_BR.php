<?php

// Tradu��o para o Portugu�s por Nivaldo Arruda - nivaldo@gmail.com
$portugues = array();
$portugues['isEmpty']= 'Este campo n�o pode ser vazio';
$portugues['stringEmpty'] = "'%value%' � uma string vazia";

// Email
$portugues['emailAddressInvalid'] = 'N�o um email v�lido no formato nome@servidor';
$portugues['emailAddressInvalidFormat'] = 'N�o um email v�lido no formato nome@servidor';

//hostname
$portugues['hostnameIpAddressNotAllowed']  = "'%value%' Parece ser um endere�o de IP, mas endere�os de IP n�o s�o permitidos";
$portugues['hostnameUnknownTld'] = "'%value%' parece ser um DNS, mas n�o foi possivel validar o TLD";
$portugues['hostnameDashCharacter'] = "'%value%' parece ser um DNS, mas cont�m um 'dash' (-) em uma posi��o inv�lida";
$portugues['hostnameInvalidHostnameSchema'] = "'%value%' parece ser um DNS, mas n�o foi poss�vel comparar com o schema para o TLD '%tld%'";
$portugues['hostnameUndecipherableTld'] = "'%value%' parece ser um DNS mas n�o foi poss�vel extrair o TLD";
$portugues['hostnameInvalidHostname'] = "'%value% n�o � compat�vel com a estrutura DNS";
$portugues['hostnameInvalidLocalName'] = "'%value%' n�o parece ser uma rede local v�lida";
$portugues['hostnameLocalNameNotAllowed'] = "'%value%' parece ser o nome de uma rede local, mas nome de rede local n�o s�o permitido";

//identical

$portugues['notSame'] = "Compara��o n�o bate";
$portugues['missingToken'] = "N�o foi fornecido par�metros para teste";

//greater then
$portugues['notGreaterThan'] = "'%value%' n�o � maior que '%min%'";

//float
$portugues['notFloat'] = "'%value%' n�o � do tipo float";

//date
$portugues['dateNotYYYY-MM-DD'] = "'%value%' deve estar no formato aaaa-mm-dd";
$portugues['dateInvalid'] = "'%value%' n�o parece ser um data v�lida";
$portugues['dateFalseFormat'] = "'%value%' n�o combina com o formato informado";

//digits
$portugues['notDigits'] = "'%value%' n�o cont�m apenas d�gitos";

//between
$portugues['notBetween'] = "'%value%' n�o est� entre '%min%' e '%max%', inclusive";
$portugues['notBetweenStrict'] = "'%value%' n�o est� estritamente entre '%min%' e '%max%'";

//alnum
$portugues['notAlnum'] = "'%value%' n�o possu� apenas letras e d�gitos";

//alpha
$portugues['notAlpha'] = "'%value%' n�o possu� apenas letras";

//in array
$portugues['notInArray'] = "'%value%' n�o foi encontrado na lista";

//int
$portugues['notInt'] = "'%value%' n�o parece ser um inteiro";

//ip
$portugues['notIpAddress'] = "'%value%' n�o parece ser um endere�o ip v�lido";

//lessthan
$portugues['notLessThan'] = "'%value%' n�o � menor que '%max%'";

//notempty
$portugues['isEmpty'] = "Campo vazio, mas um valor diferente de vazio � esperado";

//regex
$portugues['regexNotMatch'] = "'%value%' n�o foi validado na express�o '%pattern%'";

//stringlength
$portugues['stringLengthTooShort'] = "'%value%' � menor que %min% (tamanho m�nimo desse campo)";
$portugues['stringLengthTooLong'] = "'%value%' � maior que  %max% (tamanho maximo desse campo)";

//$portugues[''] = "";
return $portugues;
?>