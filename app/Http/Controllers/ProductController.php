<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = product::query();
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="inline-block mr-2 mb-2">
                         <a href="' . route('dashboard.product.gallery.index', $item->id) . '" class="bg-blue-500  text-white font-bold py-1 px-1 rounded shadow-lg " >
                        Gallery
                        </a>
                        </div>
                        <div class="inline-block mr-2 mb-2">
                        <a href="' . route('dashboard.product.edit', $item->id) . '" class="bg-gray-500  text-white font-bold py-1 px-1 rounded shadow-lg " >
                        Edit
                        </a>
                        </div>
                        <div class="inline-block mr-2 mb-2">
                        <form class="inline-block" action="' . route('dashboard.product.destroy', $item->id) . '" method="POST">
                        <button class="bg-red-500  text-white font-bold py-1 px-1 rounded shadow-lg " type="submit">  Hapus </button>
                        </div>
                        ' . @method_field('delete') . @csrf_field() . '
                        </form>
                    ';
                })
                ->editColumn('price', function ($item) {
                    return number_format($item->price);
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        Product::create($data);

        return redirect()->route('dashboard.product.index');
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
        return view('pages.dashboard.product.edit', [
            'item' => $product
        ]);
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
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $product->update($data);

        return redirect()->route('dashboard.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.product.index');
    }
}
