<?php

namespace App\Http\Controllers\Auth;
 
use Auth;
use App\Models\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SocialAuthController extends Controller
{
  // Metodo encargado de la redireccion a Facebook
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {
        // Obtenemos los datos del usuario
		$social_type = $provider;
        $social_user = Socialite::driver($provider)->stateless()->user(); 
        // Comprobamos si el usuario ya existe
		$array =
			[
                'name' => $social_user->name,
				'password' => Hash::make($this->password_random()),
                'email' => $social_user->email,
                'avatar' => $social_user->avatar_original,
				'social_type' => trim($social_type)
            ];
        if ($user = User::where('email', $social_user->email)->first()) { 
            return $this->authAndRedirect($user); // Login y redirección
        } else {  
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            $user = User::create($array);
            return $this->authAndRedirect($user); // Login y redirección
        }
    }
 
    // Login y redirección
    public function authAndRedirect($user)
    {
		Auth::login($user,true);
		if (Auth::check()) 
		{
			return redirect()->to('/home#');
        }

    }
	
	public function password_random()
	{
		$opc_letras = TRUE; //  FALSE para quitar las letras
		$opc_numeros = TRUE; // FALSE para quitar los números
		$opc_letrasMayus = TRUE; // FALSE para quitar las letras mayúsculas
		$opc_especiales = FALSE; // FALSE para quitar los caracteres especiales
		$longitud = 15;
		$password = "";
		$password_princ = "";
		$letras ="abcdefghijklmnopqrstuvwxyz";
		$numeros = "1234567890";
		$letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$especiales ="|@#~$%()=^*+[]{}-_";
		$listado = "";
		 
		if ($opc_letras == TRUE) 
		{
			$listado .= $letras; 
		}
		if ($opc_numeros == TRUE) 
		{
			$listado .= $numeros; 
		}
		if($opc_letrasMayus == TRUE) 
		{
			$listado .= $letrasMayus; 
		}
		if($opc_especiales == TRUE) 
		{
			$listado .= $especiales; 
		}
		
		str_shuffle($listado);
		for( $i=1; $i<=$longitud; $i++) {
			$password[$i] = $listado[rand(0,$longitud)];
			str_shuffle($listado);
		}
		return $password;
	}
}
