<?php

namespace Xorth\Xpression\Tokenizers;

interface Tokenizer
{
    /**
     * Processes an infix notation string to split
     * it in tokens.
     *
     * @param string $expression
     * @return array
     */
    public function process($expression);
}