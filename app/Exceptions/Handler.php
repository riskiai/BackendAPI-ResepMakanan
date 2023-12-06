<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /* Untuk Melakukan Exception Ketika Dia Bukan Role nya atau permissionnya  */
    // public function render($request, Throwable $e)
    // {
    //     if ($e instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
    //         return redirect()->route('dashboard')->with('failed', 'Anda Tidak Memiliki akses ke halaman tersebut');
    //     }
    
    //     return parent::render($request, $e);
    // }
    

}
