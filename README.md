# pagseguro
pagseguro com checkout transparente
Referências:
https://sandbox.pagseguro.uol.com.br/
https://dev.pagseguro.uol.com.br/docs
JavaScript pagseguro:
<script type="text/javascript" src=
"https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

JavaScript:
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
       
1.Necessário testar em dominio com SSL
define("URL", "http://localhost/pagseguro/");

Quando o projeto estiver em desenvolvimento deixar true, quando estiver em produção colocar false para carregar as //credenciais do PagSeguro: sandbox = true ou false
	//Credenciais do SandBox
caso sandbox = true
   EMAIL_PAGSEGURO: seu_email_pag_seguro
   TOKEN_PAGSEGURO: seu_token_pag_seguro
   URL_PAGSEGURO: https://ws.sandbox.pagseguro.uol.com.br/v2/
   SCRIPT_PAGSEGURO: https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js
   EMAIL_LOJA: email_da_loja
   MOEDA_PAGAMENTO: BRL
   URL_NOTIFICACAO: URL/notifica.html
caso: false
   URL_PAGSEGURO: https://ws.pagseguro.uol.com.br/v2/
   SCRIPT_PAGSEGURO: https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js

permissões do diretorio 755
