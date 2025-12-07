<?php
namespace App\Services;

use App\Domain\ValueObjects\CPFVO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;

class RegisterService
{
    public function registerUser(array $data): User
    {
        // Validação do CPF usando o Value Object
        $cpfVO = new CPFVO($data['cpf'] ?? null);

        // Criação do usuário
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'cpf' => $cpfVO->getValue() ?: null,
        ]);

        Auth::login($user);

        return $user;
    }
}