<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'ime' => 'required',
        'pasmina' => 'required',
        'dob' => 'required|integer|min:0',
        'boja' => 'required',
    ]);

    Member::create($request->all());

    return redirect()->route('members.index')->with('success', 'Pas je uspješno dodan.');
}


    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Član obrisan.');
    }
}
