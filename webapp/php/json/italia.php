<?php

//ASTRAZIONE CLASSI PER IL FILE 'italia.json'

class Comuni
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $cap;

    /**
     * @var string
     */
    private $nome;


    /**
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string|null
     */
    public function getCap()
    {
        return $this->cap;
    }

    /**
     * @param string|null $cap
     */
    public function setCap($cap)
    {
        $this->cap = $cap;
    }

    /**
     * @return string|null
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string|null $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
}

class Province
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var array
     */
    private $comuni;

    /**
     * @var string
     */
    private $nome;


    /**
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return array|null
     */
    public function getComuni()
    {
        return $this->comuni;
    }

    /**
     * @param array|null $comuni
     */
    public function setComuni($comuni)
    {
        $this->comuni = $comuni;
    }

    /**
     * @return string|null
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string|null $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
}

class Regioni
{
    /**
     * @var array
     */
    private $province;

    /**
     * @var string
     */
    private $nome;


    /**
     * @return array|null
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param array|null $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }

    /**
     * @return string|null
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string|null $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
}

class Italia
{
    /**
     * @var array
     */
    private $regioni;


    /**
     * @return array|null
     */
    public function getRegioni()
    {
        return $this->regioni;
    }

    /**
     * @param array|null $regioni
     */
    public function setRegioni($regioni)
    {
        $this->regioni = $regioni;
    }
}

            