<?php

namespace App\Http\Controllers;

use App\Category;
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
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required|min:3,max:100',
            'product_price' => 'required',
            'product_qty' => 'required',
            'category_id' => 'required',
        ]);
        try {
            Product::create([
                'name' => $request->input('product_name'),
                'price' => $request->input('product_price'),
                'quantity' => $request->input('product_qty'),
                'category_id' => $request->input('category_id'),
                'user_id' => auth()->user()->id,
            ]);

            return redirect()->route('product.index')
                ->with('success', 'تمت عملية الإضافة بنجاح');
        } catch (\Exception $exception) {
            dd($exception);
            return back()->with('error', 'عذراً: حدث خلل أثناء الإرسال، حاول في وقت آخر' . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name' => 'required|min:3,max:100',
            'product_price' => 'required',
            'product_qty' => 'required',
            'category_id' => 'required',
        ]);
        $product = Product::find($id);
        $product->name = $request->input('product_name');
        $product->price = $request->input('product_price');
        $product->quantity = $request->input('product_qty');
        $product->category_id = $request->input('category_id');
        $product->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('product.index');
    }
}
