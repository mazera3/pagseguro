<?php
//Necessário testar em dominio com SSL
// define("URL", "https://bandamazera.com.br/pagseguro/");
define("URL", "http://localhost/projetos/pagseguro/");

//Quando o projeto estiver em desenvolvimento deixar true, quando estiver em produção colocar false para carregar as credenciais do PagSeguro
$sandbox = true; //false;
if($sandbox){
	//Credenciais do SandBox
    define("EMAIL_PAGSEGURO", "******@*******");
    define("TOKEN_PAGSEGURO", "**************************");
    define("URL_PAGSEGURO", "https://ws.sandbox.pagseguro.uol.com.br/v2/");
    define("SCRIPT_PAGSEGURO", "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
    define("EMAIL_LOJA", "******@*******");
    define("MOEDA_PAGAMENTO", "BRL");
    define("URL_NOTIFICACAO", "".URL."notifica.html");
}else{
	//Credenciais do PagSeguro
    define("TOKEN_PAGSEGURO", "1ca29c89-1868-48e1-b216-eb4f1313ebb5429eb50e4b49bf49977f7fb2f18704364e49-719f-4465-8289-edee3166d73c");
    define("URL_PAGSEGURO", "https://ws.pagseguro.uol.com.br/v2/");
    define("SCRIPT_PAGSEGURO", "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
    define("EMAIL_LOJA", "******@*******");
    define("MOEDA_PAGAMENTO", "BRL");
    define("URL_NOTIFICACAO", "".URL."notifica.html");
}
// permissões do diretorio 755
