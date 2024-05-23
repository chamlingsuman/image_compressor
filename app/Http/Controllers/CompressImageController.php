<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class CompressImageController extends Controller
{
    public function compress(Request $request){
        $this->validate($request, [
            'image_format' => ['required', 'string', 'max:5'],
            'image' => ['required', 'image']
        ]);

        if($request->file('image')){
            $manager = new ImageManager(new Driver());
            $imageName = hexdec(uniqid()).'.'. $request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img = $img->resize(370,246);

            $img->save(base_path('public/compressed_images/'.$imageName), 60);
            $message = 'Image compressed successfully. <a download href="/compressed_images/' . $imageName . '">Download image</a>';
        }else{
            $message = 'No image file provided.';
        }
        
        //return redirect()->route("compress.image")->with("Image compressed successfully. <a download href='/dashboard'>Download image</a>");
        return redirect()->route('compress.image')->with('success', $message);
    }
}
