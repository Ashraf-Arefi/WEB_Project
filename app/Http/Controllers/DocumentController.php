<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Document;
use App\Models\Mojrem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Comment\Doc;
use Symfony\Component\HttpFoundation\File\File;

class DocumentController extends Controller
{
    public function create($id)
    {
        return view('admin.upload_document');
    }

    public function store(Request $request, $id)
    {
        $images = array();
        if ($files = $request->file('documents')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path('img/document'), $name);
                $images[] = $name;
                /*Insert your data*/
                DB::table('document')->insert([
                    'user_id' => $id,
                    'document_name' => $name
                ]);
                /*Insert your data*/
            }
        }
        return redirect()->route('admin.mojrem.list');
    }

    public function show(Request $request ,$id)
    {
        $documents = DB::table('document')
            ->join('person','id','=','user_id')
            ->select()
            ->where('user_id', $id)->get();
        return view('admin.view_document' , compact('documents'));
    }

    public function delete(Request $request, $document_name)
    {
        $documentItem = DB::table('document')->select('document_name')->where('document_name', $document_name);
        $documentItem->delete();

        return redirect()->back();

    }

    public function upload_doc(Request $request, $id)
    {
        $file = $request->file('img');
        $name = $file->getClientOriginalName();
        $file->move(public_path('img/document'), $name);
        /*Insert your data*/
        DB::table('document')->insert([
            'user_id' => $id,
            'document_name' => $name
        ]);
        return redirect()->back();
    }
}
