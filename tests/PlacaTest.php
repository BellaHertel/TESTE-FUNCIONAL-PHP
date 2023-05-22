<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class PlacaTest extends TestCase
{
    public function testValidarPlaca()
    {
        $this->assertTrue($this->validarPlaca("ILY1T22"));
        $this->assertTrue($this->validarPlaca("WAG2H25"));
        
        $this->assertTrue($this->validarPlaca("ADA8G99"));
        $this->assertTrue($this->validarPlaca("AAA8F55"));
        
        $this->assertTrue($this->validarPlaca("AUA3F45"));
        $this->assertTrue($this->validarPlaca("AGG9J55"));
        
        $this->assertTrue($this->validarPlaca("AUA3K25"));
        $this->assertTrue($this->validarPlaca("HAS7F35"));
        
        $this->assertTrue($this->validarPlaca("ASA9H15"));
        $this->assertTrue($this->validarPlaca("HHA2Y45"));
        
        $this->assertTrue($this->validarPlaca("AAA3F55"));
        $this->assertTrue($this->validarPlaca("AAA3A54"));
        
        $this->assertTrue($this->validarPlaca("HAJ2F55"));
        $this->assertTrue($this->validarPlaca("HAA3F45"));
        
        $this->assertTrue($this->validarPlaca("AAF4F55"));
        $this->assertTrue($this->validarPlaca("AAA8F83"));
    }

    public function validarPlaca(string $placa): bool
    {

      // Placa com 7 caracteres
        if (strlen($placa) !== 7) {
        printf("Já foi aqui >:) \n");
            return false;
        }

      // Não pode conter caracteres especiais
        if (preg_match('/[^\p{L}\p{N}\s]/u', $placa)) {
        printf("Não pode ocorrer caracteres especiais ^_^ ");
        return false;
    }

    

      // Três primeiros dígitos Caractere alfabéticos não acentuados
        if (!ctype_alpha(substr($placa, 0, 3))) {
        printf("Aqui :) \n");
        return false;
        }

      // Quarto dígito um número
        if (!is_numeric(substr($placa, 3, 1))) {
        printf("Esse aqui não é um número na quarta posição >:) \n");
        return false;
        }

      // Quinto dígito não é um Caractere alfabéticos não acentuado
        if (!ctype_alpha(substr($placa, 4, 1))) {
        printf("Não é um caractere alfabétioco :D \n");
        return false;
        }

      // Dois últimos caracteres tem que ser números
        if (!is_numeric(substr($placa, strlen($placa) - 2, 2))) {
        printf("Dois últimos caracteres não são números :P \n");
        return false;
        }
    
        return true;
    }
}
