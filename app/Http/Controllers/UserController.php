<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|User[]
     */
    public function index()
    {
        return User::all('id', 'name');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return array
     */
    public function show(int $id): array
    {
        // Определяем пользователя.
        $user = User::find($id);
        // Объявляем пустую переменную.
        $project = [];
        // Перебираем проект для получения чисто названия, этих проектов.
        foreach ($user->project as $key) {
            $project[]['title'] = $key->title;
        }
        // Возвращаем данные в api.
        return [
            'id' => $user->id,
            'name' => $user->name,
            'project' =>
                [
                    $project,
                ]
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
