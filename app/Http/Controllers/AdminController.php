<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Admin;
use App\Models\Auction;
use App\Models\Item;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }



    // CATEGORY 
    // category main page in admin panel
    public function indexCategory(){
        $categories = Category::all(); //get all the categories in the database
        return view('admin.indexCategory', [
            'categories' => $categories
        ]);
    }



    public function createCategory(){
        return view('admin.createCategory');
    }



    // Store category
    public function storeCategory(Request $request){
        // form validation
        $formFields =  $request->validate ([
            'name' => ['required', 'unique:categories']
        ]);

        Category::create($formFields);
       
        return redirect()->back()->with('message', 'Category Added Successfully');
    }



    public function editCategory($categoryId){ 

        $category = Category::findorFail($categoryId);

        return view('admin.editCategory', [
            'category' => $category
        ]);
    }



    public function updateCategory(Request $request, $categoryId){

        $category = Category::findorFail($categoryId);

        $formFields =  $request->validate ([
            'name' => 'required'
        ]);

        $category->update($formFields);
       
        return back()->with('message', 'Category updated successfully!'); 
    }





    public function destroyCategory($categoryId){ //$id value is passed from route wildcard

        $category = Category::findOrFail($categoryId); //try to find the category record with the $id before deleting(if record is not found, it will return 404)
        $category->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully!');
    }





    
    // AUCTION 
    public function indexAuction(){
        $auctions = Auction::all(); //get all the auctions in the database
        return view('admin.indexAuction', [
            'auctions' => $auctions
        ]);
    }



    public function createAuction(){
        // get all categories and send it to the auction form
        $categories = Category::all();
        return view('admin.createAuction', [
            'categories' => $categories
        ]);
    }


    public function storeAuction(Request $request){
        $formFields =  $request->validate ([
            'title' => 'required',
            'location' => 'required',
            'period' => 'required',
            'category_id' => 'required'
        ]);

        if($request->has('date') && !empty($request->input('date'))) {
            $formFields['date'] = request('date');
        } 

        // checking if an image file was uploaded in the form.(if it was then the path will be saved in the database and the image will be stored in the public folder)
        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('AuctionImage', 'public');
        }

        Auction::create($formFields);
       
        return redirect()->back()->with('message', 'Auction Added Successfully!');
    }



    // Show Edit auction Form
    public function editAuction($auctionId){ 
        // get all categories and send it to the edit auction form
        $categories = Category::all();

        $auction = Auction::findorFail($auctionId);

        return view('admin.editAuction', [
            'auction' => $auction,
            'categories' => $categories
        ]);
    }



    // Update auction
    public function updateAuction(Request $request, $auctionId){

        $auction = Auction::findorFail($auctionId);

        $formFields =  $request->validate ([
            'title' => 'required',
            'location' => 'required',
            'period' => 'required',
            'category_id' => 'required'
        ]);

        if($request->has('date') && !empty($request->input('date'))) {
            $formFields['date'] = request('date');
        } 

        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('AuctionImage', 'public');
        }

        $auction->update($formFields);
       
        return back()->with('message', 'Auction updated successfully!'); 
    }




    public function destroyAuction($auctionId){ 

        $auction = Auction::findOrFail($auctionId); 
        $auction->delete();

        return redirect()->back()->with('message', 'Auction Deleted Successfully');
    }






    // ITEM
    public function indexItem($auctionId){
        $auction = Auction::findOrFail($auctionId); //get the record of the auction title that was clicked on

        return view('admin.indexItem', [
            'auction' => $auction
        ]);
    }


    public function createItem($auctionId){
        $auction = Auction::findOrFail($auctionId);

        $categories = Category::all();

        return view('admin.createItem', [
            'auction' => $auction,
            'categories' => $categories
        ]);
    }


    public function storeItem(request $request, $auctionId){


        $formFields =  $request->validate ([
            'artist' => 'required',
            'year_produced' => 'required',
            'subject_classification' => 'required',
            'description_summary' => 'required',
            'description' => 'required',
            'estimated_price' => 'required'
        ]);


        // generate random 8 digit number and add it to the form field array to be saved in db
        $randomNumber = random_int(10000000, 99999999);
        $formFields['lot_number'] = $randomNumber;


        // adding auction id passed through route to form field
        $formFields['auction_id'] = $auctionId;


        // checking if the optional form fields are empty or not
        if($request->has('date') && !empty($request->input('date'))) {
            $formFields['date'] = request('date');
        } 

        if($request->has('medium') && !empty($request->input('medium'))) {
            $formFields['medium'] = request('medium');
        } 

        if($request->has('is_framed') && !empty($request->input('is_framed'))) {
            $formFields['is_framed'] = request('is_framed');
        } 

        if($request->has('dimension') && !empty($request->input('dimension'))) {
            $formFields['dimension'] = request('dimension');
        } 

        if($request->has('image_type') && !empty($request->input('image_type'))) {
            $formFields['image_type'] = request('image_type');
        } 

        if($request->has('material_used') && !empty($request->input('material_used'))) {
            $formFields['material_used'] = request('material_used');
        }
        
        if($request->has('weight') && !empty($request->input('weight'))) {
            $formFields['weight'] = request('weight');
        }
        

        // checking if an image file was uploaded in the form.(if it was then the path will be saved in the database and the image will be stored in the public folder)
        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('lotItemsImage', 'public');
        }

        Item::create($formFields);

        return redirect()->back()->with('message', 'Item Added Successfully!');
    }




    public function editItem($itemId){ 
        $categories = Category::all();

        $item = Item::findorFail($itemId);

        return view('admin.editItem', [
            'item' => $item,
            'categories' => $categories
        ]);
    }




    public function updateItem(request $request, $itemId){

        $item = Item::findorFail($itemId);

        $formFields =  $request->validate ([
            'artist' => 'required',
            'year_produced' => 'required',
            'subject_classification' => 'required',
            'description_summary' => 'required',
            'description' => 'required',
            'estimated_price' => 'required'
        ]);


        // checking if the optional form fields are empty or not
        if($request->has('date') && !empty($request->input('date'))) {
            $formFields['date'] = request('date');
        } 

        if($request->has('medium') && !empty($request->input('medium'))) {
            $formFields['medium'] = request('medium');
        } 

        if($request->has('is_framed') && !empty($request->input('is_framed'))) {
            $formFields['is_framed'] = request('is_framed');
        } 

        if($request->has('dimension') && !empty($request->input('dimension'))) {
            $formFields['dimension'] = request('dimension');
        } 

        if($request->has('image_type') && !empty($request->input('image_type'))) {
            $formFields['image_type'] = request('image_type');
        } 

        if($request->has('material_used') && !empty($request->input('material_used'))) {
            $formFields['material_used'] = request('material_used');
        }
        
        if($request->has('weight') && !empty($request->input('weight'))) {
            $formFields['weight'] = request('weight');
        }
        

        // checking if an image file was uploaded in the form.(if it was then the path will be saved in the database and the image will be stored in the public folder)
        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('lotItemsImage', 'public');
        }

        $item->update($formFields);
       
        return back()->with('message', 'Item updated successfully!');
    }




    public function destroyItem($itemId){ 
        $item = Item::findOrFail($itemId); 
        $item->delete();

        return redirect()->back()->with('message', 'Item Deleted Successfully');
    }


}
