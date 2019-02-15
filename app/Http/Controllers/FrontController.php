<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; // importez l'alias de la classe Book plus partique à utiliser dans le code 
use App\Category;


class FrontController extends Controller
{
    protected $paginate = 6;

    public function __construct(){

        // méthode pour injecter des données à une vue partielle 
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('title', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('categories', $categories ); // on passe les données à la vue
        });
    }

    public function index(){

        $products = Product::paginate($this->paginate); // pagination 

        return view('front.index', ['products' => $products]);

    }

    public function show(int $id){

        // vous ne récupérez qu'un seul livre 
        $product = Product::find($id);

        // que vous passez à la vue
        return view('front.show', ['product' => $product]);
    }



    public function showProductByCategory(int $id){
        // on récupère le modèle category.id 
        $category = Category::find($id);

        $products = $category->products()->paginate($this->paginate);

        return view('front.category', ['products' => $products, 'category' => $category]);
    }


    public function showBySold(){

        $nbProducts = Product::where('code', 'soldes')->count();
        $products = Product::where('code', 'soldes')->paginate($this->paginate);

        return view('front.index', ['products'=>$products, 'nbproducts'=>$nbProducts]);
    }

    public function byCategory(int $id){

        view()->composer('partials.menu', function($view) use ($id){

            $view->with('category_id', $id);

        });

        $nbProducts = Product::where('category_id', $id)->count();
        $products = Product::where('category_id', $id)->paginate($this->paginate);

        return view('front.index', ['products'=>$products, 'nbproducts'=>$nbProducts]);
    }

    
}

