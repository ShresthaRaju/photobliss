<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PhotosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
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
    public function store(Request $request)
    {
        //
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

    //get the details of the selected photo and return response
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
}
