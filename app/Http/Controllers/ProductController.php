<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductDetail;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(){
        $userDetail = User::select('first_name')->where('users.id', Auth::user()->id)->first();
        $productDetails = ProductDetail::with('categories')->get();
        return view('dashboard',compact('productDetails','userDetail'));
    }

    public function imageStore(Request $request)
    {
        $image = $request->file('file');
   
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
   
        return response()->json(['success'=>$imageName]);
    }
    public function store(Request $request){
        try {   
            $products = ProductDetail::create([
                                    'product_name'        => $request->productName,
                                    'product_category_id' => $request->category,
                                    'unit_type'           => $request->type,
                                    'images'              => $request->image,
                                    'price'               => $request->price,
                                    'discount_percentage' => $request->discountPercentage,
                                    'discount_amount'     => $request->discountAmount,
                                    'discount_from'       => $request->from,
                                    'discount_to'         => $request->disTo,
                                    'tax_percentage'      => $request->taxPercentage,
                                    'tax_amount'          => $request->taxAmount,
                                    'in_stock'            => $request->inStock,

            ]);
             $category = ProductCategory::create([
                                    'product_detail_id' => $products->id,
                                    'category_name'     => $request->categoryName,

            ]);
            $products->categories()->attach($category->id);
                return response()->json([
                    'status'            => 'Success',
                    'message'           => 'Product Added successfully.',
                ], 200);
            } catch (Exception $e) {
                return response()->json([
                    'status'            => 'Error',
                ], 500);
            }

    }

    public function productAddForm(){
        $userDetail = User::select('first_name')->where('users.id', Auth::user()->id)->first();
        return view('product_add_form', compact('userDetail'));
    }

    public function categoryAddForm(){
        $userDetail = User::select('first_name')->where('users.id', Auth::user()->id)->first();
        return view('category_add_form', compact('userDetail'));
    }

    public function edit(Request $request)
    {
        $userDetail = User::select('first_name')->where('users.id', Auth::user()->id)->first();
        try {
            $productId = $request->productId;
            $productDetails = ProductDetail::with('categories')->where('id',$productId)->get();
            return response()->json([
                'status'   => 'success',
                'response' => $productDetails,
            ], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error"     => "Database Error",
                "message"   => "Unable to get the details",
                "code"      => "TR-USER-06"
            ], 500);
        }
    }

    public function update(Request $request)
    {
        $id = $request->productId;
        try {
            $data = ProductDetail::where('id', $id)
                ->update([
                                    'product_name'        => $request->productName,
                                    'product_category_id' => $request->category,
                                    'unit_type'           => $request->type,
                                    'price'               => $request->price,
                                    'discount_percentage' => $request->discountPercentage,
                                    'discount_amount'     => $request->discountAmount,
                                    'discount_from'       => $request->from,
                                    'discount_to'         => $request->disTo,
                                    'tax_percentage'      => $request->taxPercentage,
                                    'tax_amount'          => $request->taxAmount,
                                    'in_stock'            => $request->inStock,
                ]);
            return response()->json([
                'status' => 'Success',
                'message' => 'Updated Successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error"   => "Database Error",
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $viewData = ProductDetail::where('id', $id)->first();
            return response()->json([
                'status'      => 'Success',
                'data'    => $viewData,
            ], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
            return response()->json([
                "error"     => "Database Error",
                "message"   => "Unable to view the product details.",
            ], 500);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $results = ProductDetail::where('id', $id)->delete();
        return response()->json([
            'status' => 'Success',
            'message' => 'Deleted Successfullly'
        ], 200);
    }

}
