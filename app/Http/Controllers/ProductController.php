<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{ 

    protected $paginate = 10;  // generer 10 produits

    /**
     * 
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate($this->paginate); // si pas de paginate ->get() // on affiche les produit les plus rescent
        return view('back.product.index', ['products' => $products]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all();
        // permet de récupérer une collection type array avec en clé id => name
        $categories = Category::pluck('title', 'id')->all();
        return view('back.product.create', ['categories' => $categories, 'products' => $products]);
    }
        
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            'title' => 'required',
            'description' => 'required|string',
            'price' => 'numeric|required',
            'reference' => 'string|required'
            
        ]);
        $product = Product::create($request->all()); // creation produits

        $im = $request->file('picture');
        
        // si on associe une image à un produit 
        if (!empty($im)) {
            
            $link = $request->file('picture')->store('images');

            // mettre à jour la table picture pour le lien vers l'image dans la base de données
            $product->update([
                'url_image' => $link,
            ]);
        }
        
        return redirect()->route('admin.index')->with('message', 'success');
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
    public function edit($id)  // editblade
    {

        $product=Product::find($id);

        $categories = Category::pluck('title','id')->all();
            return view('back.product.edit', ['product' => $product,'categories' => $categories]);
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|string',
            'price' => 'numeric|required',
            'reference' =>'string|required'
            
        ]);

        $product = Product::find($id); //  on recupere dans la BDD le produit correspondant a $id


        $product->update($request->all());  // mon produit est mis a jour avec toutes les infos recues

        $im = $request->file('picture'); // on va chercher la la photo picture

        if (!empty($im)) { // si ce dossier n'est pas vide 

            $link = $request->file('picture')->store('images'); // on enregistre la photo dans le dossier image ( store =secur)


            $product->update([
                'url_image' => $link, // je preprend mon produt et le champs url image, j'y assicie le lien link crée = $link = le nom de l'image
            ]);
        }
        
        // on utilisera la méthode sync pour mettre à jour les auteurs dans la table de liaison
     

        return redirect()->route('admin.index')->with('message', 'article modifié');
   
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('admin.index')->with('message', 'success delete');
    }
}
