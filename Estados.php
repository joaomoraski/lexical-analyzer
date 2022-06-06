<?php
include('Token.php');

class Estados
{

    public $linhaAtual;
    public $indiceAtual;
    public $caracterAtual;
    public $proximoCaracter;
    public $tokens;

    public function setVariaveis($linhaAtual, $indiceAtual)
    {
        $this->linhaAtual = $linhaAtual;
        $this->indiceAtual = $indiceAtual;
        $this->caracterAtual = $linhaAtual[$indiceAtual];
        $this->proximoCaracter = $indiceAtual + 1 > strlen($linhaAtual) ? $linhaAtual[$indiceAtual] : $linhaAtual[$indiceAtual + 1];
    }

    public function verificarTokensDaLinha(): array
    {
        $i = 0;
        while ($i < strlen($this->linhaAtual)) {
            $this->q0();
            $i++;
        }
        return $this->tokens;
    }

    public function q0(): void
    {
        if ($this->caracterAtual == " ") {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            return;
        }
        switch ($this->caracterAtual) {
            case '+':
                $this->q1();
                break;
            case '-':
                $this->q2();
                break;
            case '*':
                $this->q3();
                break;
            case '/':
                $this->q4();
                break;
            case '<':
                $this->q5();
                break;
            case '>':
                $this->q7();
                break;
            case '=':
                $this->q9();
                break;
            case '!':
                $this->q11();
                break;
            case '(':
                $this->q13();
                break;
            case ')':
                $this->q14();
                break;
            case '[':
                $this->q15();
                break;
            case ']':
                $this->q16();
                break;
            case '{':
                $this->q17();
                break;
            case '}':
                $this->q18();
                break;
            case ';':
                $this->q19();
                break;
            case ',':
                $this->q20();
                break;
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) $this->qNumber();
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) $this->q21();
    }

    public function q1(): void
    {
        $this->tokens[] = Token::$MAIS;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q2(): void
    {
        $this->tokens[] = Token::$MENOS;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);

    }

    public function q3(): void
    {
        $this->tokens[] = Token::$VEZES;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q4(): void
    {
        $this->tokens[] = Token::$DIVIDE;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q5(): void
    {
        if ($this->proximoCaracter == '=') {
            $this->q6();
            return;
        }
        $this->tokens[] = Token::$MENOR;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q6(): void
    {
        $this->tokens[] = Token::$MENORIGUAL;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q7(): void
    {
        if ($this->proximoCaracter == '=') {
            $this->q8();
            return;
        }
        $this->tokens[] = Token::$MAIOR;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q8(): void
    {
        $this->tokens[] = Token::$MAIORIGUAL;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q9(): void
    {
        if ($this->proximoCaracter == '=') {
            $this->q10();
            return;
        }
        $this->tokens[] = Token::$RECEBE;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q10(): void
    {
        $this->tokens[] = Token::$EQUALS;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q11(): void
    {
        if ($this->proximoCaracter == '=') {
            $this->q12();
        }
    }

    public function q12(): void
    {
        $this->tokens[] = Token::$DIFFERENT;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q13(): void
    {
        $this->tokens[] = Token::$ABREPARENTESES;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q14(): void
    {
        $this->tokens[] = Token::$FECHAPARENTESES;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q15(): void
    {
        $this->tokens[] = Token::$ABRECOLCHETES;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q16(): void
    {
        $this->tokens[] = Token::$FECHACOlCHETES;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q17(): void
    {
        $this->tokens[] = Token::$ABRECHAVES;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q18(): void
    {
        $this->tokens[] = Token::$FECHACHAVES;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q19(): void
    {
        $this->tokens[] = Token::$PONTOVIRGULA;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q20(): void
    {
        $this->tokens[] = Token::$VIRGULA;
        $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
    }

    public function q21(): void
    {
        if ($this->caracterAtual == 'i') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q22();
        }
        if ($this->caracterAtual == 'e') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q24();
        }

        if ($this->caracterAtual == 'r') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q27();
        }
        // void
        if ($this->caracterAtual == 'v') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q32();
        }
        // while
        if ($this->caracterAtual == 'w') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q35();
        }
        // float
        if ($this->caracterAtual == 'f') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q39();
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->qId();
        }
    }

    public function q22(): void
    {
        if ($this->caracterAtual == 'f') {
            if (strpos(Token::$ALFABETO, $this->proximoCaracter) !== false) {
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
                $this->qId();
            }
            if ($this->proximoCaracter == '(') {
                $this->tokens[] = Token::$IF;
                $this->tokens[] = Token::$ABREPARENTESES;
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 2);
                return;
            }
            if ($this->proximoCaracter == ' ') {
                $this->tokens[] = Token::$IF;
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 2);
                return;
            }
        }
        if ($this->caracterAtual == 'n') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q23();
        }
    }

    public function q23(): void
    {
        if ($this->caracterAtual == 't') {
            if ($this->proximoCaracter == ' ') {
                $this->tokens[] = Token::$INT;
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 2);
                return;
            }
            if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
                $this->qId();
            }
        }
    }

    public function q24()
    {
        if ($this->caracterAtual == 'l') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q25();
        }
    }

    public function q25()
    {
        if ($this->caracterAtual == 's') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q26();
        }
    }

    public function q26()
    {
        if ($this->caracterAtual == 'e') {
            if ($this->proximoCaracter == '(') {
                $this->tokens[] = Token::$ELSE;
                $this->tokens[] = Token::$ABREPARENTESES;
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 2);
                return;
            }
            if ($this->proximoCaracter == ' ') {
                $this->tokens[] = Token::$ELSE;
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 2);
                return;
            }
        }
    }


    // return
    public function q27()
    {
        if ($this->caracterAtual == 'e') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q28();
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qId();
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qNumber();
        }
    }

    public function q28()
    {
        if ($this->caracterAtual == 't') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q29();
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qId();
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qNumber();
        }
    }

    public function q29()
    {
        if ($this->caracterAtual == 'u') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q30();
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qId();
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qNumber();
        }
    }

    public function q30()
    {
        if ($this->caracterAtual == 'r') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q31();
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qId();
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qNumber();
        }
    }

    public function q31()
    {
        if ($this->caracterAtual == 'n') {
            if ($this->proximoCaracter == '(') {
                $this->tokens[] = Token::$RETURN;
                $this->tokens[] = Token::$ABREPARENTESES;
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 2);
                return;
            }
            if ($this->proximoCaracter == ' ') {
                $this->tokens[] = Token::$RETURN;
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 2);
                return;
            }
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qId();
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qNumber();
        }
    }
    // return

    // void
    public function q32()
    {
        if ($this->caracterAtual == 'o') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q33();
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qId();
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qNumber();
        }
    }

    public function q33()
    {
        if ($this->caracterAtual == 'i') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q34();
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qId();
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qNumber();
        }
    }

    public function q34()
    {
        if ($this->caracterAtual == 'd') {
            if ($this->proximoCaracter == ')') {
                $this->tokens[] = Token::$VOID;
                $this->tokens[] = Token::$FECHAPARENTESES;
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 2);
                return;
            }
            if ($this->proximoCaracter == ' ') {
                $this->tokens[] = Token::$VOID;
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 2);
                return;
            }
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qId();
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qNumber();
        }
    }
    // void

    // while
    public function q35()
    {
        if ($this->caracterAtual == 'h') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q36();
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qId();
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qNumber();
        }
    }

    public function q36()
    {
        if ($this->caracterAtual == 'i') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q37();
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qId();
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qNumber();
        }
    }

    public function q37()
    {
        if ($this->caracterAtual == 'l') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q38();
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qId();
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qNumber();
        }
    }

    public function q38()
    {
        if ($this->caracterAtual == 'e') {
            if ($this->proximoCaracter == '(') {
                $this->tokens[] = Token::$WHILE;
                $this->tokens[] = Token::$ABREPARENTESES;
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 2);
                return;
            }
            if ($this->proximoCaracter == ' ') {
                $this->tokens[] = Token::$WHILE;
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 2);
                return;
            }
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qId();
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qNumber();
        }
    }
    // while

    // float
    public function q39(): void
    {
        if ($this->caracterAtual == 'l') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q40();
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qId();
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qNumber();
        }
    }

    public function q40(): void
    {
        if ($this->caracterAtual == 'o') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q41();
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qId();
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qNumber();
        }
    }

    public function q41(): void
    {
        if ($this->caracterAtual == 'a') {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->q42();
        }
        if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qId();
        }
        if (strpos(Token::$NUMBERS, $this->caracterAtual) !== false) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
            $this->qNumber();
        }
    }

    public function q42(): void
    {
        if ($this->caracterAtual == 't') {
            if ($this->proximoCaracter == ' ') {
                $this->tokens[] = Token::$FLOAT;
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 2);
                return;
            }
            if (strpos(Token::$ALFABETO, $this->caracterAtual) !== false) {
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
                $this->qId();
            }
        }
    }


    public function qNumber()
    {
        while (strpos(Token::$NUMBERS, $this->caracterAtual)) {
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
        }
        $this->tokens[] = Token::$NUMERO;
    }

    public function qId(): void
    {
        while ($this->caracterAtual != ' ' && $this->caracterAtual != ';' && $this->indiceAtual != strlen($this->linhaAtual)) {
            if ($this->proximoCaracter == '(') {
                $this->tokens[] = Token::$ID;
                $this->tokens[] = Token::$ABREPARENTESES;
                $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 2);
                return;
            }
            $this->setVariaveis($this->linhaAtual, $this->indiceAtual + 1);
        }
        $this->tokens[] = Token::$ID;
    }


}