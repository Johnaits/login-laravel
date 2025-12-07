<?php

namespace App\Domain\ValueObjects;

use InvalidArgumentException;

final class CPFVO
{
    private string $value;

    public function __construct(?string $cpf)
    {
        $cleanedCpf = preg_replace('/\D/', '', $cpf ?? '');

        $this->validate($cleanedCpf);

        $this->value = $cleanedCpf;
    }

    private function validate(string $cpf): void
    {
        // Permite CPF vazio, já que é opcional
        if (empty($cpf)) {
            return;
        }

        if (strlen($cpf) !== 11) {
            throw new InvalidArgumentException('O CPF deve conter 11 dígitos.');
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            throw new InvalidArgumentException('CPF inválido.');
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                throw new InvalidArgumentException('CPF inválido.');
            }
        }
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}