<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RegisterService;
use InvalidArgumentException;
use App\Http\Requests\RegisterUserRequest;

class RegisterController extends Controller
{

    public function __construct(private RegisterService $registerService){
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterUserRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $this->registerService->registerUser($validatedData);
        } catch (InvalidArgumentException $e) {
            return back()->withErrors(['cpf' => $e->getMessage()])->withInput();
        }
        $request->session()->regenerate();
        return redirect()->route('receiver');
    }
}
