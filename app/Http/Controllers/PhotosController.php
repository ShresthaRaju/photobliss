<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class PhotosController extends Controller
{
    private $folder_path;

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);

        $this->folder_path = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photo.submit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadPhoto(Request $request)
    {
        //since the details have been json encoded while sending we need to decode here
        $photo_details = json_decode($request->details);

        if ($request->hasFile('photo')) {
            $photoFile  = $request->file('photo');
            $photo_name = time() . '_' . $photoFile->getClientOriginalName();

            // persist the photo details to database
            $photo                = new Photo();
            $photo->photo_name    = $photo_name;
            $photo->title         = $photo_details->title;
            $photo->story         = $photo_details->story;
            $photo->make          = $photo_details->make;
            $photo->model         = $photo_details->model;
            $photo->aperture      = $photo_details->aperture;
            $photo->exposure_time = $photo_details->exposure_time;
            $photo->focal_length  = $photo_details->focal_length;
            $photo->iso           = $photo_details->iso;
            $photo->location      = $photo_details->location;
            $photo->user_id       = Auth::id();

            if ($photo->save()) {
                foreach ($photo_details->tags as $pTag) {
                    $tag = Tag::firstOrCreate(['name' => $pTag]);
                    $photo->tags()->attach($tag);
                }

                // move the photo to public folder
                // check if folder already exists
                if (file_exists($this->folder_path . Auth::user()->username)) {
                    $this->move_photo($photoFile, $photo_name, Auth::user()->username);
                } else {
                    mkdir($this->folder_path . Auth::user()->username);
                    $this->move_photo($photoFile, $photo_name, Auth::user()->username);
                }

                return response()->json("Upload Successful");
            }
        }
    }

    // move the uploaded photo to specified path
    private function move_photo($photoFile, $photo_name, $directory_name)
    {
        $photoFile->move(public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $directory_name, $photo_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //get the details of the selected photo and return as response
    public function getPhotoDetails(Request $request)
    {
        if ($request->hasFile('selected_photo')) {

            $photo      = $request->file('selected_photo');
            $photo_name = $photo->getClientOriginalName();
            $exif       = exif_read_data($photo);

            // checks if the key exists in the given array
            if (Arr::exists($exif, 'FocalLength')) {
                $focal_length = $this->convert($exif['FocalLength']);
            } else {
                $focal_length = "";
            }

            if (Arr::exists($exif, 'FNumber')) {
                $aperture = $this->convert($exif['FNumber']);
            } else {
                $aperture = "";
            }

            $photo_details['name']          = $photo_name;
            $photo_details['width']         = $exif['COMPUTED']['Width'];
            $photo_details['height']        = $exif['COMPUTED']['Height'];
            $photo_details['make']          = Arr::exists($exif, 'Make') ? $exif['Make'] : '';
            $photo_details['model']         = Arr::exists($exif, 'Model') ? $exif['Model'] : '';
            $photo_details['focal_length']  = $focal_length;
            $photo_details['aperture']      = $aperture;
            $photo_details['exposure_time'] = Arr::exists($exif, 'ExposureTime') ? $exif['ExposureTime'] : '';
            $photo_details['iso']           = Arr::exists($exif, 'ISOSpeedRatings') ? $exif['ISOSpeedRatings'] : '';

            return response()->json($photo_details);
        }
    }

    // convert the string version of exif_attribute to float
    private function convert($exif_attribute)
    {
        $splitted = explode("/", $exif_attribute);
        return $splitted[0] / $splitted[1];
    }

    public function det()
    {
        $exif = exif_read_data(public_path('images/autumn.jpg'));
        dd(Arr::exists($exif, 'FocalLength'));
    }
}
