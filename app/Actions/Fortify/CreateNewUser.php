<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Crypt;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validar los campos de texto y contraseña
        Validator::make($input, [
            'username' => ['required', 'string', 'max:255'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'apellido_materno' => ['required', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:10'],
            'fecha_nacimiento' => ['nullable', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Si hay un campo 'foto_perfil' en la solicitud, manejarlo
        $foto_perfil_path = null;
        if (isset($input['foto_perfil'])) {
            Validator::make($input, [
                'foto_perfil' => ['image', 'max:2048'],
            ])->validate();
            $foto_perfil_path = $input['foto_perfil']->store('user-avatars');
        }

        // Cifrar campos sensibles
        $usernameCifrado = Crypt::encryptString($input['username']);
        $nombreCifrado = Crypt::encryptString($input['nombre']);
        $apellidoPaternoCifrado = Crypt::encryptString($input['apellido_paterno']);
        $apellidoMaternoCifrado = Crypt::encryptString($input['apellido_materno']);
        $telefonoCifrado = isset($input['telefono']) ? Crypt::encryptString($input['telefono']) : null;
        $fechaNacimientoCifrado = isset($input['fecha_nacimiento']) ? Crypt::encryptString($input['fecha_nacimiento']) : null;

        // Crear el usuario
        $user = User::create([
            'username' => $usernameCifrado,
            'nombre' => $nombreCifrado,
            'apellido_paterno' => $apellidoPaternoCifrado,
            'apellido_materno' => $apellidoMaternoCifrado,
            'telefono' => $telefonoCifrado,
            'fecha_nacimiento' => $fechaNacimientoCifrado,
            'foto_perfil' => $foto_perfil_path,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // Asignar el rol
        $user->assignRole('aficionado');

        return $user;
    }
}
