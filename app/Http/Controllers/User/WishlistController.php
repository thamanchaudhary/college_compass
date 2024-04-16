<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CollegeList;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    protected $panel = 'Wishlist';
    protected $base_route = '';
    protected $view_path = 'site.';
    protected $folder = 'wishlist';
    protected $folder_path;
    protected $product;


    public function __construct(Wishlist $product)
    {
        $this->middleware('auth');
        $this->product = $product;
    }

    public function index()
    {
        $data['wishlistCount'] = 0;
        if (auth()->check()) {
            $data['wishlistCount'] = Wishlist::where('user_id', auth()->id())->count();
            //get  products in wishlist
            $data['wishlist_college'] = Wishlist::where('user_id', auth()->id())->get();
            $data['college'] =  CollegeList::whereIn('id', $data['wishlist_college']->pluck('college_id'))->get();
        }
        return view(parent::loadView($this->view_path . '.wishlist'), compact('data'));
    }

    public function store(Request $request)
    {
        $college_id = $request->college_id;
        $user_id = auth()->user()->id;
        $wishlist = Wishlist::where('college_id', $college_id)->where('user_id', $user_id)->first();
        if ($wishlist) {
            return response()->json(['status' => false, 'data' => 'College already added to wishlist', 'msg' => 'College already added to wishlist']);
        } else {
            $wishlist = new Wishlist();
            $wishlist->college_id = $college_id;
            $wishlist->user_id = $user_id;
            $wishlist->save();
            return response()->json(['status' => true, 'data' => 'College added to wishlist', 'msg' => 'College added to wishlist' . ' College added to wishlist']);
        }
    }

    public function destroy(Request $request)
    {
        $college_id = $request->id;
        $user_id = auth()->user()->id;
        $wishlist = Wishlist::where('college_id', $college_id)->where('user_id', $user_id)->first();
        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['status' => true, 'data' => 'College removed from wishlist', 'msg' => 'College removed from wishlist']);
        } else {
            return response()->json(['status' => false, 'data' => 'College not found in wishlist', 'msg' => 'College not found in wishlist']);
        }
    }
}
