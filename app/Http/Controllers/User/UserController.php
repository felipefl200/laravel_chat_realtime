<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile()
    {
        return view('users.profile');
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();

        if ($request->email) unset($data['email']);

        if ($request->password)

            $data['password'] = Hash::make($data['password']);

        else

            unset($data['password']);

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            if ($user->imagem && Storage::exists("users/{$user->imagem}")) {
                Storage::delete(["users/{$user->imagem}"]);
            }

            $name = kebab_case($request->name) . uniqid($user->id);
            $extension = $request->imagem->extension();
            $nameImage = "{$name}.$extension";
            $data['image'] = $nameImage;

            $upload = $request->imagem->storeAs('users', $nameImage);

            if (!$upload)
                return redirect()
                    ->route('profile')
                    ->with('error', 'Falha ao fazer o upload');
        }


        $user->update($data);
        return redirect()
            ->route('profile')
            ->with('success', 'Atualizado com sucesso');
    }
}
