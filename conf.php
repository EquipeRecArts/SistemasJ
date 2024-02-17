<?php
session_start();

date_default_timezone_set('America/Sao_Paulo');



function LimparStringBD($string)
{
    global $login_conf;
    $string = mysqli_real_escape_string($login_conf->conn, htmlspecialchars(trim($string)));
    return $string;
}

function FormatarNumeroTelefone($n)
{
    // Remover tudo que não for número
    $numeroLimpo = preg_replace("/[^0-9]/", "", $n);

    // Verificar o tamanho do número
    $tam = strlen($numeroLimpo);

    if ($tam == 13) {
        // COM CÓDIGO DE ÁREA NACIONAL E DO PAÍS e 9 dígitos
        return "(" . substr($numeroLimpo, 2, 2) . ") " . substr($numeroLimpo, 4, 5) . "-" . substr($numeroLimpo, 9);
    }
    if ($tam == 12) {
        // COM CÓDIGO DE ÁREA NACIONAL E DO PAÍS
        return "(" . substr($numeroLimpo, 2, 2) . ") " . substr($numeroLimpo, 4, 4) . "-" . substr($numeroLimpo, 8);
    }
    if ($tam == 11) {
        // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
        return "(" . substr($numeroLimpo, 0, 2) . ") " . substr($numeroLimpo, 2, 5) . "-" . substr($numeroLimpo, 7);
    }
    if ($tam == 10) {
        // COM CÓDIGO DE ÁREA NACIONAL
        return "(" . substr($numeroLimpo, 0, 2) . ") " . substr($numeroLimpo, 2, 4) . "-" . substr($numeroLimpo, 6);
    }
    if ($tam <= 9) {
        // SEM CÓDIGO DE ÁREA
        return substr($numeroLimpo, 0, $tam - 4) . "-" . substr($numeroLimpo, -4);
    }
}

function removerCaracteres($string, $traco_tirar = 1)
{
    if ($traco_tirar == 1) {
        $stringLimpa = preg_replace('/[^0-9.]/', '', $string);
    } else {
        $stringLimpa = preg_replace('/[^0-9.-]/', '', $string);
    }
    return $stringLimpa;
}


function FormatarDataHora($data)
{
    #Se não existe espaço, ou seja, date
    if (strpos($data, " ") === False) {
        $data = explode("-", $data)[2] . "/" . explode("-", $data)[1] . "/" . explode("-", $data)[0];
        $time = null;
        #Se for datetime
    } else {
        $date = explode(" ", $data)[0];
        $time = explode(":", explode(" ", $data)[1])[0] . ":" . explode(":", explode(" ", $data)[1])[1];
        $data_separado = explode("-", $date);
        $data = $data_separado[2] . "/" . $data_separado[1] . "/" . $data_separado[0];
    }
    return ['data' => $data, 'hora' => $time];
}

class PH3A
{
    public function API_key()
    {
        return '237ca8c0-0d81-f753-dfc9-0d75449d65ba';
    }
    public function Spider_ID_Protesto()
    {
        #return '4d2062c9-e034-4b97-9831-a18e96084405';
    }
    public function Spider_ID_Processo()
    {
        #return '89c1cdcf-9823-41cf-baea-8842db445db4';
    }
    public function host()
    {
        return str_replace("http", "", str_replace("https", "", $_SERVER['HTTP_HOST']));
    }
    public function Logar()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://hml-api.ph3a.com.br/DataBusca/api/Account/Login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
    "UserName" : "' . $this->API_key() . '"
}',
            CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $retorno = json_decode($response, true);
        if ($retorno['code'] == "200") {
            return $retorno['data']['Token'];
        } else {
            return false;
        }
    }

    public function Consultar_Multiplos($parametros, $token)
    {

        //$parametros = json_encode($parametros, JSON_UNESCAPED_UNICODE);

        $jsonData = array();
        foreach ($parametros as $parametro) {
            foreach ($parametro as $chave => $valor) {
                $jsonData[$chave] = $valor;
            }
        }
        $parametros = json_encode($jsonData, JSON_UNESCAPED_UNICODE);


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://hml-api.ph3a.com.br/DataBusca/search/1/9999999999',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $parametros,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Token: ' . $token . ''
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $retorno = json_decode($response, true);
        if (count($retorno) > 0) {
            return $retorno;
        } else {
            //var_dump($response);
            return false;
        }
    }

    public function Consultar_Data($numero_do_documento, $token)
    {

        if (strlen($numero_do_documento) < 14) {
            $json = '{
    "Document" : "' . $numero_do_documento . '",
    "Type": 4
}';
        } else {
            $json = '{
    "Document" : "' . $numero_do_documento . '"
}';
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://hml-api.ph3a.com.br/DataBusca/data',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Token: ' . $token . ''
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $retorno = json_decode($response, true);
        if ($retorno['Status'] == "200") {
            return $retorno;
        } else {
            return false;
        }
    }
    public function Consultar_Protesto($documento_cliente, $numero_do_documento, $token)
    {
        $data = date('Y-m-d H:i:s');
        if ($this->conn->query("INSERT INTO `consultas_protesto_temporario`(`retorno`, `documento_cliente`, `numero_do_documento`, `data`, `id`, `request_id_spider`) VALUES ('','$documento_cliente','$numero_do_documento','$data',null, '')")) {
            $id_inserido = $this->conn->insert_id;
        
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://hml-api.ph3a.com.br/DataCrawler/Spider',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '
            {
              "Id": "' . $this->Spider_ID_Protesto() . '",
              "Input": {  
                  "ApiType_In": "2",
                  "CpfCnpj_In": "' . $numero_do_documento . '"               
                    },
                "Options": {
                "Webhook": {
                  "url": "https://' . $this->host() . '/webhook_protesto.php?id_inserido=' . $id_inserido . '",
                  "authType": 0
                }
              }
            }
            ',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Token: ' . $token . ''
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
        
            $retorno = json_decode($response, true);
            if ($retorno['Status'] == "200" or $retorno['Status'] == "201") {
                $RequestId = $retorno['RequestId'];
                $this->conn->query("UPDATE `consultas_protesto_temporario` SET `request_id_spider`='$RequestId' WHERE `id`='$id_inserido'");
                return true;
            } else {
                $this->conn->query("DELETE FROM consultas_protesto_temporario WHERE id='$id_inserido'");
                return false;
            }
        } else {
            return false;
        }
    }
    public function Consultar_Processo($documento_cliente, $numero_do_documento, $token)
    {
        $data = date('Y-m-d H:i:s');
        if ($this->conn->query("INSERT INTO `consultas_processo_temporario`(`retorno`, `documento_cliente`, `numero_do_documento`, `data`, `id`, `request_id_spider`) VALUES ('','$documento_cliente','$numero_do_documento','$data',null, '')")) {
            $id_inserido = $this->conn->insert_id;
        
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://hml-api.ph3a.com.br/DataCrawler/Spider',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '
            {
              "Id": "' . $this->Spider_ID_Processo() . '",
              "Input": {  
                  "ApiType_In": "2",
                  "CpfCnpj_In": "' . $numero_do_documento . '"               
                    },
                "Options": {
                "Webhook": {
                  "url": "https://' . $this->host() . '/webhook_processo.php?id_inserido=' . $id_inserido . '",
                  "authType": 0
                }
              }
            }
            ',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Token: ' . $token . ''
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
        
            $retorno = json_decode($response, true);
            if ($retorno['Status'] == "200" or $retorno['Status'] == "201") {
                $RequestId = $retorno['RequestId'];
                $this->conn->query("UPDATE `consultas_processo_temporario` SET `request_id_spider`='$RequestId' WHERE `id`='$id_inserido'");
                return true;
            } else {
                $this->conn->query("DELETE FROM consultas_processo_temporario WHERE id='$id_inserido'");
                return false;
            }
        } else {
            return false;
        }
    }
}
