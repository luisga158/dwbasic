@extends('layouts.compulg')
@section('mainttl')
<br><h3>Laravel para Dummies</h3>
@endsection
@section('content')
<div class="container">
    <pre>
=====================================================================================================
Insatalación de Laravel
=====================================================================================================
Previamente debemos tener instalado XAMPP, WAMPP o MAMPP segun SO y preferencia.
Y por supuesto un editor para código.
-----------------------------------------------------------------------------------------------------
Requisitos de Laravel:
https://getcomposer.org/
https://www.npmjs.com/get-npm
Hay que instalarlos.
-----------------------------------------------------------------------------------------------------
Para el correcto funcionamiento de Composer y NodeJS.
Debemos ir a propiedades del sistema y en Opciones avanzadas, Variables del sistema.
Y en Path añadimos los directorios en mi caso:
D:\xampp\php
C:\ProgramData\ComposerSetup\bin

C:\Users\Gabriel\AppData\Roaming\Composer\vendor\bin
Igual a:
%USERPROFILE%\AppData\Roaming\Composer\vendor\bin

C:\Program Files\nodejs\
-----------------------------------------------------------------------------------------------------
Hecho esto seguimos con la instalación de Laravel:

Este comado lo use para la instalacion de laravel:
composer global require laravel/installer
=====================================================================================================

En la carpeta de mis proyectos, desde la consola de comandos:

1.-     laravel new dw      o       
1.-     laravel new dw --auth
2.-     cd dw
3.-     composer require laravel/ui
3.1.-   npm install &amp;&amp; npm run dev	(En algunos casos lo requiere, lo muestra en el 
                                        codigo que se despliega con el anterior comando)
5.-     composer require laravelcollective/html

=====================================================================================================
Pero y bueno como así que es lo que se modifica?, bueno aquí empieza la explicacion.
=====================================================================================================
Archivos de configuracion:
==========================
.env	(Nombre de la aplicacion, nombre de la base de datos, tipo de conexion, yo uso phpmyadmin)
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
Modifique:                                      APP_NAME=WebDevelopment
                                                DB_DATABASE=laraveldw
                                                QUEUE_CONNECTION=database
-----------------------------------------------------------------------------------------------------
Estos datos son de una cuenta previamente creada en mailtrap.io previamente.
Con un servidor VPS ya los valores se modificaran segun datos del servidor.

                                                MAIL_USERNAME=4df51a0a1f967e
                                                MAIL_PASSWORD=aaae23dade4fb4
                                                MAIL_ENCRYPTION=tls
                                                
Y elimine:                                      MAIL_ENCRYPTION=null
                                                MAIL_FROM_ADDRESS=null
                                                MAIL_FROM_NAME="${APP_NAME}"

No olvidar que es necesario crear la base de datos (DB_DATABASE):              laraveldw
=====================================================================================================
routes\web.php
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
});
=====================================================================================================
App\User.php
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
class User extends Authenticatable implements MustVerifyEmail
=====================================================================================================
En la carpeta resources\views\ ya se han creado los archivos pero debemos definir sus rutas.
=====================================================================================================
Por ello en el archivo routes\web.php, definimos el archivo que controlará estas vistas.
Y en el archivo:

App\Http\Controllers\HomeController.php

Despues de index, queda de la siguiente manera es:
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	public function verify()
    {
        return route('verification.resend');
        return view('auth\verify');
    }
    public function login()
    {
        return view('\auth\login');
    }
    public function register()
    {
        return view('auth\register');
    }
    public function confirm()
    {
        return view('auth\passwords\confirm');
    }
    public function email()
    {
        return view('auth\passwords\email');
    }
    public function reset()
    {
        return view('auth\passwords\reset');
    }

=====================================================================================================
Podemos realizar las migraciones y esta listo para autenticacion requerida.

6.0.-     php artisan migrate           (Para y crear tablas)
6.1.-     php artisan migrate:roolback	(Para eliminar tablas)
6.2.-	  php artisan migrate:refresh	(Para eliminar y crear de nuevo)

Para ver lo creado.

7.-     php artisan serve
=====================================================================================================
Para el idioma.
=====================================================================================================
config\app.php
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
cambie:                            'locale' => 'es'
=====================================================================================================
Hasta aqui trabajando con autenticacion.
Tendremos solo la tabla de usuarios, los comandos aplican igual a todo modelo creado.
Lo interesante es que copiando lo ya creado, todo se hace mas rapido.
Estas son las carpetas a copiar:
=====================================================================================================
Los archivos contenidos en las siguientes carpetas, son adaptaciones a los que laravel genera.
=====================================================================================================

Ya tengo mis archivos de idioma y vistas adaptados a mi gusto, los remplazo.
resources\lang\	        carpetas en y es.
resources\views\        todo completo
Y le añado mi plantilla base.
Copio tambien mi css, en 
public\css

Y remplazo vendor\laravel\framework\src\Illuminate\Notifications\resources\views\email.blade.php
Por el que tengo adaptado a idiomas en y es.

=====================================================================================================

Tambien puedo copiarlos archivos que he adaptado para la autenticacion:
.env
config\app.php
routes\web.php
App\User.php
app\Http\Controllers\HomeController.php
                                             
=====================================================================================================    
    </pre>
</div>
@endsection
@section('sidebar')
@endsection