<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
   public function index()
   {
    $datas = FAQ::paginate(5);

    return view('admin.faq.index', compact('datas'));
   }

   public function add()
   {
    return view('admin.faq.add');
   }

   public function faqstore(Request $request)
   {
       $request->validate([
           'question' => 'required|string|max:255',
           'answer' => 'required|string',
       ]);

       FAQ::create($request->all());

       return redirect()->route('faq.index')->with('success', 'F.A.Q created successfully.');
   }


   public function edit($id)
   {
      $data = FAQ::findOrFail($id);
       return view('admin.faq.edit', compact('data'));
   }

   // Update an existing FAQ
   public function update(Request $request, $id)
   {
       $request->validate([
           'question' => 'required|string|max:255',
           'answer' => 'required|string',
       ]);

      $data = FAQ::findOrFail($id);
      $data->update($request->all());

       return redirect()->route('faq.index')->with('success', 'FAQ updated successfully.');
   }

   // Delete an FAQ
   public function delete($id)
   {
      $data = FAQ::findOrFail($id);
      $data->delete();

       return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully.');
   }


   public function show($id)
   {
       $data = FAQ::find($id);
       return view('admin.faq.show', compact('data'));
   }

   public function faq_search(Request $request){
       $search = $request->search;
       $datas = FAQ::where('question', 'LIKE', '%'.$search.'%')->orWhere('question', 'LIKE', '%'.$search.'%')->paginate(3);
       return view('admin.faq.index', compact('datas'));
     }
}
