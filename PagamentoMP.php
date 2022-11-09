<?php


class PagamentoMP{
                    // vamos dar alguns atributos a esta class
                    // como :
                    // O botão que irá retornar da função PagarMP (string)
                    public $btn_mp;
                    // Definiremos o botão que irá retornar, se será uma lightbox
                    // do mercado pago ou não, como padrão será false. o user será
                    // redirecionado para o site do mercado pago
                    private $lightbox = false;
                    // Esta variável recebe uma array com os dados da transação
                    public $info = array();
                    // Se for em modo de teste, esta variável recebe true, caso
                    // contrário o sistema estará em modo de produção
                    private $sandbox = true;
                    // Suas credenciais do mercado pago
                    private $client_id = “11381075144954”;
                    private $client_secret = “tKmZlGgmPw9hKQz4KCZju39D27cJvoRv”;
                    /* Em seguida as duas funções */
                


                public function PagarMP($ref,$nome,$valor,$url){
                    // iniciando as credenciais do MP
                    // Os valores de client_id e client_secret são informados
                    // como atributos da classe
                    $mp = new MP($this->client_id, $this->client_secret);

                $preference_data = array(
                    “items” => array(
                        array(
                        "id"            =>  0001,
                        "title"         => $nome,
                        "currency_id"   => "BRL",
                        "picture_url"   => "http://localhost:8080/StarLanches/img/logo.png",
                        "description"   => $nome,
                        "quantity"      => 1,
                        "unit_price"    => $valor
                        )
                    ),
                    “back_urls” => array(
                        “success” => $url.“/notifica.php?success”,
                        “failure” => $url.“/notifica.php?failure”,
                        “pending” => $url.“/notifica.php?pending”
                    ),

                    “notification_url” => $url.“/notifica.php”,
                    “external_reference” => $ref
                );

                $preference = $mp->create_preference($preference_data);

                
                // Criar link para o botão de pagamento normal ou sandbox
                if($this->sandbox):
                //sandbox
                $mp->sandbox_mode(TRUE);
                $link = $preference["response"]["sandbox_init_point"];
                    else:
                        // normal em produção
                        $mp->sandbox_mode(FALSE);
                        $link = $preference["response"]["init_point"];
                    endif;
                $this->btn_mp = ‘<a id="btnMP" target="_blank" href="'.$link.'" ’;
                $this->btn_mp .= ‘name="MP-Checkout" >Pagar</a>’;

                if($this->lightbox):
                    $this->btn_mp .= ' <script type="text/javascript" src="//secure.mlstatic.com/mptools/render.js"></script> ';
                endif;
                    
                return $this->btn_mp;

            }
        }

?>