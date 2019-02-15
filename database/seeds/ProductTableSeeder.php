<?php

use Illuminate\Database\Seeder;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // on prendra garde de bien supprimer toutes les images avant de commencer les seeders
        Storage::disk('local')->delete(Storage::allFiles());

        // création des genres 

        App\Category::create([
            'title' => 'Homme'
        ]);
        App\Category::create([
            'title' => 'Femme'
        ]);
        // création de 30 vêtements à partir de la factory
        factory(App\Product::class, 30)->create()->each(function($product){

            // associons un genre à un livre que nous venons de créer
            $category = App\Category::find(rand(1,2));

            // pour chaque $product on lui associe un genre en particulier
            $product->category()->associate($category);

            //ajout des images
            //on utilise un site en ligne pour recuperer des images aleatoirement
            $link = str_random(12).'.jpg'; // hash de lien pour la sécurité (injection de scripts protection)

            $file = file_get_contents('https://placeimg.com/375/300/nature'); //flux


            $product->update([
                'url_image' => $link
            ]);


            Storage::disk('local')->put($link, $file);


            $product->save(); // il faut sauvegarder l'association pour faire persister en base de données

        });
    }  
}