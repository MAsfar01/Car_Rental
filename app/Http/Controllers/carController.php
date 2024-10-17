<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class carController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required',
            'model' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'color' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // Initialize the image path
    $imagePath = null;

    // Check if the request contains an image file
    if ($request->hasFile('image')) {
        // Get the original file name
        $originalName = $request->file('image')->getClientOriginalName();
        // Store the image with the original name in the 'public/images/Car-pics' directory
        $imagePath = $originalName;
    }
        
        $user = DB::table('cars')->insert([



            'name'       => $request->name,
            'model'      => $request->model,
            'brand'      => $request->brand,
            'price'      => $request->price,
            'color'      => $request->color,
            'image'      => $imagePath,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        if ($user) {
            echo "<h1>Data Successfully Added</h1>";
        } else {
            echo "<h1>Data Added Failed</h1>";
        }
    }

    public function showCar(){
        $cars = Car::all(); // Retrieve all car records from the database
        return view('view_car', compact('cars'));
        

        

    }
    public function update(Request $request)
    {
        if ($request->input('action') === 'update') {
            $data = $request->validate([
                'car_id' => 'required|exists:cars,id',
                'name'   => 'required',
                'model'  => 'required',
                'brand'  => 'required',
                'price'  => 'required|numeric',
                'color'  => 'required',
            ]);
    
            $car = Car::find($data['car_id']);
            if ($car) {
                $car->update([
                    'name'  => $data['name'],
                    'model' => $data['model'],
                    'brand' => $data['brand'],
                    'price' => $data['price'],
                    'color' => $data['color'],
                ]);
                return redirect()->route('view_car')->with('success', 'Car updated successfully.');
            }
    
            return redirect()->route('view_car')->with('error', 'Car not found.');
        }
    
        return redirect()->route('view_car');
    }
    
// here we added the new car Function in this laraval
public function destroy(Request $request)
{
    $data = $request->validate([
        'car_id' => 'required|exists:cars,id',
    ]);

    $car = Car::find($data['car_id']);
    if ($car) {
        $car->delete();
        return redirect()->route('view_car')->with('success', 'Car deleted successfully.');
    }

    return redirect()->route('view_car')->with('error', 'Car not found.');
}

}
