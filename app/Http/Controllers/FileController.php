<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([

            'files' => 'required',

            'files.*' => 'required|mimes:jpeg,jpg,png',

        ]);

        $files = [];

        if ($request->file('files')){

            foreach($request->file('files') as $key => $file)

            {

                $fileName = time().rand(1,99).'.'.$file->extension();

                //$file->move(public_path('uploads'), $fileName);
                $file->storeAs('files', $fileName);

                $files[]['name'] = $fileName;

            }

        }


        foreach ($files as $key => $file) {

            File::create($file);
        }

        return back()

            ->with('success','You have successfully upload file.');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
