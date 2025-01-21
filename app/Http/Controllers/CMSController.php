<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cmspage;
use Str;
use File;

class CMSController extends Controller
{
    public function index()
    {
        $records = Cmspage::paginate(5);
        return view('admin.cms_page.index', compact('records'));
    }

    public function add()
    {
        return view('admin.cms_page.add');
    }


    public function cmsstore(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'introduction' => 'required|string',
    ]);


    $data = new Cmspage();


    if (!empty($request->file('upload'))) {
        $file = $request->file('upload');
        $randomStr = Str::random(30);
        $filename = $randomStr . '.' . $file->getClientOriginalExtension();
        $file->move('upload/', $filename);
        $data->upload = $filename;
    }

    if (!empty($request->file('upload_document'))) {
        $file = $request->file('upload_document');
        $randomStr = Str::random(30);
        $filename = $randomStr . '.' . $file->getClientOriginalExtension();
        $file->move('upload/', $filename);
        $data->upload_document = $filename;
    }


    $data->title = $request->title;
    $data->introduction = $request->introduction;
    $data->description = $request->description;
    $data->metatitle = $request->metatitle;
    $data->metadescription = $request->metadescription;
    $data->status = $request->status;

    // Save the data
    $data->save();

    toastr()->timeOut(5000)->closeButton()->addSuccess('Page created successfully.');
    return redirect()->route('cms.index');
}



   public function edit($id)
   {
      $data = Cmspage::findOrFail($id);
       return view('admin.cms_page.edit', compact('data'));
   }

   public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'introduction' => 'required|string',
    ]);

    $data = Cmspage::findOrFail($id);


    if (!empty($request->file('upload'))) {

        if (!empty($data->upload) && file_exists('upload/' . $data->upload)) {
            unlink('upload/' . $data->upload);
        }
        $file = $request->file('upload');
        $randomStr = Str::random(30);
        $filename = $randomStr . '.' . $file->getClientOriginalExtension();
        $file->move('upload/', $filename);
        $data->upload = $filename;
    }


    if (!empty($request->file('upload_document'))) {

        if (!empty($data->upload_document) && file_exists('upload/' . $data->upload_document)) {
            unlink('upload/' . $data->upload_document);
        }
        $file = $request->file('upload_document');
        $randomStr = Str::random(30);
        $filename = $randomStr . '.' . $file->getClientOriginalExtension();
        $file->move('upload/', $filename);
        $data->upload_document = $filename;
    }


    $data->title = $request->title;
    $data->introduction = $request->introduction;
    $data->description = $request->description ?? $data->description;
    $data->metatitle = $request->metatitle ?? $data->metatitle;
    $data->metadescription = $request->metadescription ?? $data->metadescription;
    $data->status = $request->status ?? $data->status;


    $data->save();
    toastr()->timeOut(5000)->closeButton()->addSuccess('CMS Page updated successfully.');
    return redirect()->route('cms.index');

}



   public function delete($id)
   {
      $data = Cmspage::findOrFail($id);
      $data->delete();
      toastr()->timeOut(5000)->closeButton()->addSuccess('CMS Page deleted successfully.');
      return redirect()->route('cms.index');
   }


   public function show($id)
   {
       $data = Cmspage::find($id);
       return view('admin.cms_page.show', compact('data'));
   }

   public function cms_search(Request $request){
       $search = $request->search;
       $datas = Cmspage::where('title', 'LIKE', '%'.$search.'%')->orWhere('title', 'LIKE', '%'.$search.'%')->paginate(3);
       return view('admin.cms_page.index', compact('datas'));
     }
}
