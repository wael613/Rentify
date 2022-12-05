<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\File; 

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::latest()->paginate(10);

        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeeee(Request $request)
    {  if($request->hasFile("cover")){
        $file=$request->file("cover");
        $imageName=time().'_'.$file->getClientOriginalName();
        $file->move(\public_path("cover/"),$imageName);

        $property =new Property([
            "name" => $request->name,
            "address" =>$request->address ,
            "city" => $request->city,
            "monthlyCost"=> $request->monthlyCost,
            "description" => $request->description,
            "propertyType" =>$request->propertyType ,
            "furnishType" => $request->furnishType,
            "letType" =>$request->letType ,
            "availability" => $request->availability,
            "rooms" => $request->rooms,
            "baths" => $request->baths,
            "cover" =>$imageName,
            "options" => $request->options,
        ]);
       $property->save();
    }

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request['property_id']=$post->id;
                $request['image']=$imageName;
                $file->move(\public_path("/images"),$imageName);
                Image::create($request->all());

            }
        }

      

        return redirect()->route('properties.index')
            ->withSuccess(__('Property created successfully.'));
    }

    public function store(Request $request)
    {
        
        
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'monthlyCost' => 'required',
            'description' => 'required',
            'propertyType' => 'required',
            'furnishType' => 'required',
            'letType' => 'required',
            'availability' => 'required|date_format:Y-m-d',
            'rooms' => 'required',
            'baths' => 'required',
            'options' => 'required'
        ]);
        $input = $request->all();
        // $input['options'] = $request->input('options');

        


        Property::create(array_merge($input,[
            'user_id' => auth()->id()
        ]));

        // Property::create(array_merge($request->only('name','address', 'city', 'monthlyCost', 'description' ,'propertyType', 'furnishType ','letType','availability' ,'rooms' ,'baths','options'),[
        //     'user_id' => auth()->id()
        // ]));

        return redirect()->route('properties.index')
            ->withSuccess(__('Property created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return view('properties.show', [
            'property' => $property
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('properties.edit', [
            'property' => $property

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'monthlyCost' => 'required',
            'description' => 'required',
            'propertyType' => 'required',
            'furnishType' => 'required',
            'letType' => 'required',
            'availability' => 'required|date_format:Y-m-d',
            'rooms' => 'required',
            'baths' => 'required',
            'options' => 'required'
        ]);

        $input = $request->all();

        $property->update($input);

        return redirect()->route('properties.index')
            ->withSuccess(__('Property updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('properties.index')
            ->withSuccess(__('Property deleted successfully.'));
    }
}