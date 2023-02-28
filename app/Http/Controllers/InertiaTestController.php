<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;

class InertiaTestController extends Controller
{
    //
    public function inertia_test()
    {
      return Inertia::render('InertiaTest',[
        'blogs' => InertiaTest::all()
      ]);
    }




    public function index()
    {
        return Inertia::render('Inertia/Index',[
          'blogs' => InertiaTest::all()
        ]);
    }


    public function create()
    {
      return Inertia::render('Inertia/Create');  
    }


    public function show($id)
    {
    //    dd($id);
      return Inertia::render('Inertia/Show', [
        'id' => $id,
        'blog' => InertiaTest::findOrFail($id),
      ]);
    }

    
    public function store(Request $request)
    {
      $request->validate([
        'title' => ['required', 'max:20'],
        'content' => ['required', 'max:255']
      ]);

      //use文で読みこんだモデルのインスタンス化
      $inertiaTest = new InertiaTest;
      $inertiaTest->title = $request->title;
      $inertiaTest->content = $request->content;
      $inertiaTest->save();

      return to_route('inertia.index')
      ->with([
        'message' =>  '登録しました'
      ]);
    }

    public function delete($id)
    {
      $book =  InertiaTest::findOrFail($id);
      $book->delete();

      return to_route('inertia.index')
      ->with([
        'message' => '削除しました。'
      ]);

    }
}

 