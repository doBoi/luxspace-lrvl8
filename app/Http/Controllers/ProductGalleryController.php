<?php

namespace App\Http\Controllers;


use App\Models\product;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use Illuminate\Routing\Controller;
use App\Http\Requests\ProductGalleryRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $Product)
    {
        if (request()->ajax()) {
            $query = ProductGallery::where('products_id', $Product->id);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <form class="inline-block px-1" action="' . route('dashboard.gallery.destroy', $item->id) . '" method="POST">
                        <button class="bg-red-500  text-white font-bold py-1 px-1 rounded shadow-lg" type="submit">  Hapus </button>
                        ' . @method_field('delete') . @csrf_field() . '
                        </form>
                    ';
                })
                ->editColumn('url', function ($item) {
                    return '<img style="max-width: 150px" src="' . Storage::url($item->url) . '">';
                })
                ->editColumn('is_featured', function ($item) {
                    return $item->is_featured ? "Yes" : "No";
                })
                ->rawColumns(['action', 'url'])
                ->make();
        }
        return view('pages.dashboard.gallery.index', compact('Product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $Product)
    {
        return view('pages.dashboard.gallery.create', compact('Product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request, Product $Product)
    {
        $files = $request->file('files');
        if ($request->hasFile('files')) {
            foreach ($files as $file) {
                $path = $file->store('public/gallery');

                ProductGallery::Create([
                    'products_id' => $Product->id,
                    'url' => $path
                ]);
            }
        }
        return redirect()->route('dashboard.product.gallery.index', $Product->id);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductGallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('dashboard.product.gallery.index', $gallery->products_id);
    }
}
