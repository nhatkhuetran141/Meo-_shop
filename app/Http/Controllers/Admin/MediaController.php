<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class MediaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $listImages = Media::all(); 
        // return view('admin.media.index2', compact('listImages')); 
        return view('admin.media.index'); 
    }

    public function storeMedia(Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);

        $filename = time() . "-" . $request->image->getClientOriginalName(); 
        $destinationPath = 'uploads';

        $x = pathinfo($filename, PATHINFO_FILENAME);
        dd($x); 

        $url = $request->image->move($destinationPath, $filename); 
        $media = new Media(); 
        $media->filename =  $url->getFilename(); 
        $media->url = $url->getPathname();
        $media->save(); 

        return redirect()->back();
    }

    public function showEditMedia($id)
    {   
        $media = Media::where('id', $id)->first(); 
        
        return view('admin.media.edit', compact('media'));
    }
}