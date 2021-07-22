<?php  

class Payload 
{
        /**
     * IDs do Payload do Pix
     * @var string
     */
    const ID_PAYLOAD_FORMAT_INDICATOR = '00';
    const ID_MERCHANT_ACCOUNT_INFORMATION = '26';
    const ID_MERCHANT_ACCOUNT_INFORMATION_GUI = '00';
    const ID_MERCHANT_ACCOUNT_INFORMATION_KEY = '01';
    const ID_MERCHANT_ACCOUNT_INFORMATION_DESCRIPTION = '02';
    const ID_MERCHANT_CATEGORY_CODE = '52';
    const ID_TRANSACTION_CURRENCY = '53';
    const ID_TRANSACTION_AMOUNT = '54';
    const ID_COUNTRY_CODE = '58';
    const ID_MERCHANT_NAME = '59';
    const ID_MERCHANT_CITY = '60';
    const ID_ADDITIONAL_DATA_FIELD_TEMPLATE = '62';
    const ID_ADDITIONAL_DATA_FIELD_TEMPLATE_TXID = '05';
    const ID_CRC16 = '63';

    /**
     * Chave Pix
     *
     * @var string
     */
    private $pixKey;

    /**
     * Descrição do pagamento
     *
     * @var string
     */
    private $description;

    /**
     * Nome do titular da conta
     *
     * @var string
     */
    private $merchantName;

    /**
     * Cidade do titular
     *
     * @var string
     */
    private $merchantCity;

    /**
     * Id da transação pix
     *
     * @var string
     */
    private $txId;

    /**
     * Valor da transação
     *
     * @var string
     */
    private $amount;
    
    /**
     * Método responsável por definir o valor de $pixKey
     *
     * @param string $pixKey
     */
    public function setPixKey($pixKey)
    {
        $this->pixKey = $pixKey;
        return $this;
    }

    /**
     * Método responsável por definir o valor de $description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Método responsável por definir o valor de $merchantName
     *
     * @param string $merchantName
     */
    public function setMerchantName($merchantName)
    {
        $this->merchantName = $merchantName;
        return $this;
    }

    /**
     * Método responsável por definir o valor de $merchantCity
     *
     * @param string $merchantCity
     */
    public function serMerchantCity($merchantCity)
    {
        $this->merchantCity = $merchantCity;
        return $this;
    }

    /**
     * Método responsável por definir o valor de $txId
     *
     * @param string $txId
     */
    public function setTxId($txId)
    {
        $this->txId = $txId;
        return $this;
    }

    /**
     * Método responsável por definir o valor de $amount
     *
     * @param string $amount
     */
    public function setAmout($amount)
    {
        $this->amount = number_format($amount, 2, '.','');
        return $this;
    }

    /**
     * Método responsáavel por retornar valor completo de um objeto payload
     * @param string $id
     * @param string $value
     * @return $id.$size.$value
     */
    public function getValue($id, $value)
    {
        $size = str_pad(strlen($value),2,'0', STR_PAD_LEFT);
        return $id.$size.$value;
    }

    /**
     * Método responsável por retornar os valores completos da informação da conta
     * @return string
     */
    private function getMerchantAccountInformation()
    {   
        // domínio do banco
        $gui = $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION_GUI,'br.gov.bcb.pix');

        $key = $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION_KEY, $this->pixKey);
        // descrição do pagamento
        $description = strlen($this->description) ? $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION_DESCRIPTION, $this->description) : '';
    
        return $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION, $gui.$key.$description);
    }

    /**
     * Método responsável por retornar os valores completos do campo adicional do pix (TXID)
     *
     * @return STRING
     */
    private function getAdditionalDataFieldTemplate()
    {
        $txId = $this->getValue(self::ID_ADDITIONAL_DATA_FIELD_TEMPLATE_TXID, $this->txId);

        return $this->getValue(self::ID_ADDITIONAL_DATA_FIELD_TEMPLATE, $txId);
    }

    /**
     * Método responsável por calcular o valor da hash de validação do código pix
     * @return string
     */
    private function getCRC16($payload) {
        //ADICIONA DADOS GERAIS NO PAYLOAD
        $payload .= self::ID_CRC16.'04';

        //DADOS DEFINIDOS PELO BACEN
        $polinomio = 0x1021;
        $resultado = 0xFFFF;

        //CHECKSUM
        if (($length = strlen($payload)) > 0) {
            for ($offset = 0; $offset < $length; $offset++) {
                $resultado ^= (ord($payload[$offset]) << 8);
                for ($bitwise = 0; $bitwise < 8; $bitwise++) {
                    if (($resultado <<= 1) & 0x10000) $resultado ^= $polinomio;
                    $resultado &= 0xFFFF;
                }
            }
        }

        //RETORNA CÓDIGO CRC16 DE 4 CARACTERES
        return self::ID_CRC16.'04'.strtoupper(dechex($resultado));
    }

    /**
     * Método responsáavel por criar a string do pix
     * @return string
     */
    public function getPayload()
    {
        // cria o payload
        $payload = $this->getValue(self::ID_PAYLOAD_FORMAT_INDICATOR,'01').
                    $this->getMerchantAccountInformation().
                    $this->getValue(self::ID_MERCHANT_CATEGORY_CODE, '0000').
                    $this->getValue(self::ID_TRANSACTION_CURRENCY, '986').
                    $this->getValue(self::ID_TRANSACTION_AMOUNT, $this->amount).
                    $this->getValue(self::ID_COUNTRY_CODE, 'BR').
                    $this->getValue(self::ID_MERCHANT_NAME, $this->merchantName).
                    $this->getValue(self::ID_MERCHANT_CITY, $this->merchantCity).
                    $this->getAdditionalDataFieldTemplate();
                    // payload + crc16
        return $payload.$this->getCRC16($payload);
    }
}
