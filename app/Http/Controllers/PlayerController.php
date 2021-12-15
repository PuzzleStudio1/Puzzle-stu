<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return view('admin.playersList',compact('players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStoreForm($request);

        Player::create([
            'name' => $request['name'],
            'code' => $request['code'],
            'help' => $request['help']
        ]);

        return back()->with('success', true);
    }

    protected function validateStoreForm($request)
    {
        return $request->validate([
            'name' => ['required'],
            'code' => ['required']
        ], [
            'name.required' => 'لطفا نام پخش کننده را وارد کنید.',
            'code.required' => 'لطفا کد پخش کننده را وارد نمایید .'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        return view('admin.playerEdit', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $this->validateUpdateForm($request);

        $player->update([
            'name' => $request['name'],
            'code' => $request['code'],
            'help' => $request['help']
        ]);

        return redirect()->route('player.index')->with('success', true);
    }

    public function validateUpdateForm($request)
    {
        return $request->validate([
            'name' => ['required'],
            'code' => ['required']
        ], [
            'name.required' => 'لطفا نام پخش کننده را وارد کنید.',
            'code.required' => 'لطفا کد پخش کننده را وارد نمایید .'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('player.index')->with('success',true);
    }
}
