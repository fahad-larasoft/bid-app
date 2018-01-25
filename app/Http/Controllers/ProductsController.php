<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductBid;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
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
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        auth()->user()->products()->create($request->all());

        flash('New product has been added successfully.')->success();

        return redirect()->route('home');
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
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());

        flash('Product has been updated successfully.')->success();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        flash('Product has been deleted successfully.');

        return redirect()->route('home');
    }

    public function storeBid(CreateProductBid $request, Product $product) {
        $request->validate(['bidding_amount' => 'required|numeric']);

        $product->biddingUsers()->attach(auth()->id(), ['bidding_amount' => $request->bidding_amount]);

        flash("Your bid has been made successfully on {$product->name} with amount $$request->bidding_amount")->success();

        return redirect()->back();
    }

    public function bids(Product $product) {
        $biddingUsers = $product->biddingUsers()->orderBy('product_bid_pivot.bidding_amount', 'DESC');

        $highest_bid_user = $biddingUsers->first();

        $biddingUsers = $biddingUsers->paginate(15);

        return view('seller.bids', compact('product', 'biddingUsers', 'highest_bid_user'));
    }
}
