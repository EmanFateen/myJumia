<?php

namespace App\Http\Controllers;

include('simple_html_dom.php');

use Illuminate\Http\Request;
use App\Models\Catergory;
use App\Models\Product;

class MainController extends Controller
{

    public function index(){

        $products = Product::all();

        // If products not found, scarpe it
       if(count($products)==0)
        {
            $categories = Catergory::all();
            foreach ($categories as $cat){
                if($cat->link){
                   
                    $html_page = file_get_html($cat->link);
                  
                    $product_list_form_scrapping = $html_page->find('article[class="prd _fb col c-prd"]');

                    foreach($product_list_form_scrapping as $product_from_scrapping){

                       

                        $product = new Product();
                        $product->category_id = $cat->id;

                        //return $product_list_form_scrapping;
                        $product->brand = file_get_html('https://www.jumia.com.eg/'.$product_from_scrapping->find('a',0)->href)->find('div[class="row card _no-g -fh -pas"]',0)->find('div[class="col10"]',0)->find('div[class="-phs"]',0)->find('div[class="-fs14 -pvxs"]',0)->find('a',0)->innertext;


                        $product->image = file_get_html('https://www.jumia.com.eg/'.$product_from_scrapping->find('a',0)->href)->find('div[class="row card _no-g -fh -pas"]',0)->find('div[class="col6 -phs -pvxs"]',0)->find('div[class="-ptxs -pbs"]',0)->find('div[class="sldr _img _prod -rad4 -oh -mbs"]',0)->find('a',0)->href;


                        

                        // to get product link
                        foreach($product_from_scrapping->find('div[class="info"]') as $element)
                        {

                            $product->name  =   $element->find('h3[class="name"]',0)->innertext;
                            $product->price  =   $element->find('div[class="prc"]',0)->innertext;
                            if( $element->find('div[class="s-prc-w"]',0)){
                                $product->old_price =  $element->find('div[class="s-prc-w"]',0)->find('div[class="old"]',0)->innertext;
                                $product->offer =  $element->find('div[class="s-prc-w"]',0)->find('div[class="tag _dsct _sm"]',0)->innertext;
                            }
                            if($element->find('div[class="rev"]',0)){
                                $product->rate  =   $element->find('div[class="rev"]',0)->find('div[class="stars _s"]',0)->innertext;
                                $rate = explode(" ",$product->rate);
                                $product->rate = $rate[0];
                            }


                        }

                        $product->save();
                    }
                }
               // return 'done';
            }

            $products = Product::all();

        }
        $categories = Catergory::where('parent_id',0)->get();
        $brands  = Product::select('brand')->distinct()->get();
        return view('pages.index')->with(['products'=>$products,'brands'=>$brands,'categories'=>$categories]);
    }

    public function getProdactusOfCategory($catName){

        $leafCat = false; 
        $siblingCat = [];
        $childCat = [];
        $cat = Catergory::where('name',$catName)->first();

        if($cat){
            $childsIdsList = self::trackCatIds($cat);
            

            // this is the leaf catregory
            if(count($childsIdsList)<=0){
                $leafCat = true;
    
            }
            array_push($childsIdsList,$cat->id);

            $products = Product::whereIn('category_id',$childsIdsList)->get();

            $categories = Catergory::all();

            //if leaf cat get its sibling
            if($leafCat) 
            {
                $siblingCat  =  Catergory::where('parent_id',$cat->parent_id)->get();
            }
            else{
                $childCat = Catergory::whereIn('parent_id',$childsIdsList)->get();
            }

            $brands  = Product::whereIn('category_id',$childsIdsList)->select('brand')->distinct()->get();
            

            return view('pages.index')->with(['products'=>$products,'brands'=>$brands,'categories'=>$categories,'catName'=>$catName,'childCat'=>$childCat,'siblingCat'=>$siblingCat]);
        }
        else
           abort(404);
    }


    public function getCart(){

        $categories = Catergory::all();
        $brands  = Product::find(1);
        return view('pages.cart')->with(['categories'=>$categories]);

    }


    // function with ajax request 
    public function getCartItems(Request $request,$ids){

        if($request->ajax()){
            $ids_array = explode(",",$ids);
            $products  = Product::whereIn('id',$ids_array)->get();

            return  response()->json($products);
        }

    }

    // authenticated function 
    public function checkout(Request $request){
        return "Checkout Page";
    }

    
    // get all category childs for this cat 
    private function trackCatIds($cat)
    {

        static $leafFound = false; 
        static $totalChildsIdsList = array(); 
       
        $childsIdsList = Catergory::where('parent_id',$cat->id)->get();

        if(count($childsIdsList) <= 0 ) {
            $leafFound = true;
            return $totalChildsIdsList;
        }
        else
        {
            $totalChildsIdsList = self::mergeIds($totalChildsIdsList,$childsIdsList);
        }

        if(!$leafFound){
            foreach($childsIdsList as $child){

                return self::trackCatIds($child);
            }
        }
        else
        return $totalChildsIdsList;
        
    }

    // merge child Ids with total array
    private function mergeIds($totalChildsIdsList,$childsIdsList)
    {

        foreach($childsIdsList as $child)
        {
             array_push($totalChildsIdsList,$child->id);
        }

        return $totalChildsIdsList;
    }


}
