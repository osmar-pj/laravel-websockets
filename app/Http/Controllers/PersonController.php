<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Name;
use App\Events\NewMessage;

class PersonController extends Controller
{
    public function newPerson(Request $request) {
        $new_person = new Name($request->all());
        $new_person->save();

        broadcast(new NewMessage($new_person));

        return response()->json([
            'new_person' => $new_person
        ]);
    }

    public function persons() {
        $persons = Name::get();

        return response()->json([
            'persons' => $persons
        ]);
    }
}
