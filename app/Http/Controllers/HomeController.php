<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Admin;
use App\Models\Auction;
use App\Models\Item;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $auctions = Auction::orderBy('date','asc')->limit(3)->get();

        return view('home.index', [
            'auctions' => $auctions
        ]);
    }


    public function indexAuction(){
        $auctions = Auction::all(); 

        return view('home.indexAuction', [
            'auctions' => $auctions
        ]);
    }


    public function viewAuctionItems(Auction $auction){
        // $auction = Auction::findorFail($auctionId);

        return view('home.viewAuctionItems', [
            'auction' => $auction
        ]);
    }


    public function singleAuctionItem($auctionId, $itemId){
        $auction = Auction::findorFail($auctionId);

        $item = Item::findorFail($itemId);

        return view('home.singleAuctionItem', [
            'auction' => $auction,
            'item' => $item
        ]);
    }






    public function search(request $request){
        $auctions = Auction::where('title', 'LIKE', '%' . request('search'). '%')->get();

        $searchVal = request('search');

        return view('home.searchAuction', [
            'auctions' => $auctions,
            'searchVal' => $searchVal
        ]);
    }
}
