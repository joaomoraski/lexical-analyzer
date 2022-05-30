<?php
class Token {

    public $tokens;
    public static $ALFABETO = "abcdefghijklmnopqrstuvwyxz";
    public static $NUMBERS = "0123456789";
    public static $IF = 'IF';
    public static $ELSE = 'ELSE';
    public static $INT = 'INT';
    public static $RETURN = 'RETURN';
    public static $VOID = 'VOID';
    public static $WHILE = 'WHILE';
    public static $MAIS = 'PLUS';
    public static $MENOS = 'MINUS';
    public static $VEZES = 'TIMES';
    public static $DIVIDE = 'DIVIDE';
    public static $MENOR = 'LESS';
    public static $MENORIGUAL = 'LESS_EQUAL';
    public static $MAIOR = 'GREATER';
    public static $MAIORIGUAL = 'GREATER_EQUAL';
    public static $DIFFERENT = 'DIFFERENT';
    public static $EQUALS = 'EQUALS';
    public static $ABREPARENTESES = 'LPAREN';
    public static $FECHAPARENTESES = 'RPAREN';
    public static $ABRECOLCHETES = 'LBRACKETS';
    public static $FECHACOlCHETES = 'RBRACKETS';
    public static $ABRECHAVES = 'LBRACES';
    public static $FECHACHAVES = 'RBRACES';
    public static $RECEBE = 'ATTRIBUTION';
    public static $PONTOVIRGULA = 'SEMICOLON';
    public static $VIRGULA = 'COMMA';
    public static $ID = 'ID';
    public static $NUMERO = 'NUMBER';

    /**
     * @return array
     */
    public function getTokens() : array
    {
        return $this->tokens;
    }

    /**
     * @param array $tokens
     */
    public function setTokens($tokens)
    {
        $this->tokens = $tokens;
    }


}

