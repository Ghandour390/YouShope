<?php

  

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;

use App\Models\Produit;
use App\Http\Controllers\response;

  

class ClientProduitController extends Controller

{

    // /**

    //  * Write code on Method

    //  *

    //  * @return response()

    //  */

    public function index()

    {

        $produits = Produit::all();

        return view('client.produits',compact('produits'));

    }

  

    // /**

    //  * Write code on Method

    //  *

    //  * @return response();

    //  */

    public function cart()

    {

        return view('cart');

    }

  

    // /**

    //  * Write code on Method

    //  *

    //  * @return response()

    //  */

    public function addToCart($id)

    {

        $produit = Produit::findOrFail($id);

          

        $cart = session()->get('cart', []);

  

        if(isset($cart[$id])) {

            $cart[$id]['quantitue']++;

        } else {

            $cart[$id] = [

                "name" => $produit->name,

                "quantitue" => 1,

                "prix" => $produit->prix,

                "image" => $produit->image

            ];

        }

          

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produit added to cart successfully!');

    }

  

    // /**

    //  * Write code on Method

    //  *

    //  * @return response()

    //  */

    public function update(Request $request)

    {

        if($request->id && $request->quantitue){

            $cart = session()->get('cart');

            $cart[$request->id]["quantitue"] = $request->quantitue;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');

        }

    }

  

    // /**

    //  * Write code on Method

    //  *

    //  * @return response()

    //  */

    public function remove(Request $request)

    {

        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);

            }

            session()->flash('success', 'Product removed successfully');

        }

    }

}
