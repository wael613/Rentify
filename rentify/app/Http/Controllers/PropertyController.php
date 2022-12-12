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
            'options' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        // $input['options'] = $request->input('options');

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        


        Property::create(array_merge($input,[
            'user_id' => auth()->id()
        ]));

        // Property::create(array_merge($request->only('name','address', 'city', 'monthlyCost', 'description' ,'propertyType', 'furnishType ','letType','availability' ,'rooms' ,'baths','options'),[
        //     'user_id' => auth()->id()
        // ]));

        return redirect()->route('properties.index')
            ->withSuccess(__('Property created successfully.'));
    }

    public function storeOrigin(Request $request){
        
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

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

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

    public function approve(Property $property){

        //$property->status = 'validated';
        //$property->update(['status' => 'validated']);

        $property->status = 'validated';
 
        $property->save();

        return redirect()->route('properties.index')
            ->withSuccess(__('Property approved'));
    }

    public function decline(Property $property){

        //$property->status = 'validated';
        //$property->update(['status' => 'validated']);

        $property->delete();

        return redirect()->route('properties.index')
            ->withSuccess(__('Property declined'));
    }

    public function properties(){
        // $properties = Property::where('status',"validated");

        $properties = Property::latest()->paginate(5);

        return view('properties', compact('properties'));
    }

    public function details(Property $property){
        return view('details', compact('property'));
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $properties = Property::where('name','LIKE','%'.$search_text.'%')->get();

        return view('search',compact('properties'));
    }

    public function filter(Request $request)
    {

        // $type = DB::table('coworking_spaces')->select('type')->distinct()->get()->pluck('type');

        $search_text = $_GET['propertyType'];
        $properties = Property::where('propertyType','LIKE','%'.$search_text.'%')->get();

        // $coworkingSpaces = CoworkingSpace::query();

        // if($request->filled('type')){
        //     $coworkingSpaces->where('type',$request->type);
        // }

        return view('filter',compact('properties'));
    }
    
}
