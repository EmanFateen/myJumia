@extends('layouts.master')
@extends('includes.navbar',['categories'=>$categories])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center mt-2 mb-3">
                <img src="https://tpc.googlesyndication.com/simgad/16295873285957447485" alt="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div  class="p-3" style="background-color:#fff">
                <div class="title-menu">CATEGORY</div>
                    <div class="ml-2">
                        @foreach ($categories as $cat)
                           @if($cat->parent_id == 0 )
                            <a class="cat-name" href="{{route('one_main_category',$cat->name)}}">{{  $cat->name  }} </a><br>
                            @endif
                            @isset($catName)
                                @if($catName == $cat->name)
                                    <div  class="m-2">
                                        @if($childCat)
                                        
                                            @foreach($childCat as $child)
                                                <a class="cat-name" href="{{route('one_main_category',$child->name)}}">{{  $child->name  }} </a><br>
                                            @endforeach
                                        @endif
                                      
                                        @if($siblingCat)
                                            @foreach($siblingCat as $child)
                                                <a class="cat-name" href="{{route('one_main_category',$child->name)}}">{{  $child->name  }} </a><br>
                                            @endforeach
                                        @endif
                                    </div>
                                @endif
                            @endisset
                        @endforeach
                    </div>
                <hr>
                <div class="title-menu">PRODUCT RATING</div>
                <div class="ml-2">
                    <div class="form-check" >
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="4" >
                        <label class="form-check-label" for="exampleRadios1">
                            @for($i=0; $i<  4  ;$i++)
                                <i class="fas fa-star prod-rare-star"></i>
                            @endfor
                            @for($i=0; $i<  1  ;$i++)
                                <i class="fas fa-star prod-rare-star-non"></i>
                            @endfor
                            & above
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="3">
                        <label class="form-check-label" for="exampleRadios1">
                            @for($i=0; $i<  3  ;$i++)
                                <i class="fas fa-star prod-rare-star"></i>
                            @endfor
                            @for($i=0; $i<  2  ;$i++)
                                <i class="fas fa-star prod-rare-star-non"></i>
                            @endfor
                            & above
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="2">
                        <label class="form-check-label" for="exampleRadios1">
                            @for($i=0; $i<  2  ;$i++)
                                <i class="fas fa-star prod-rare-star"></i>
                            @endfor
                            @for($i=0; $i<  3  ;$i++)
                                <i class="fas fa-star prod-rare-star-non"></i>
                            @endfor
                            & above
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="1">
                        <label class="form-check-label" for="exampleRadios1">
                            @for($i=0; $i<  1  ;$i++)
                                <i class="fas fa-star prod-rare-star"></i>
                            @endfor
                            @for($i=0; $i<  4  ;$i++)
                                <i class="fas fa-star prod-rare-star-non"></i>
                            @endfor
                            
                            & above
                        </label>
                    </div>
                </div>
                <hr>
                <div class="title-menu">BRAND</div>
                    <div class="ml-2">
                        @foreach ($brands as $product)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                {{$product->brand}}
                            </label>
                        </div>
                            
                        @endforeach
                    </div>
                
            </div>
        </div>

        <div class="col-8">
            <div  class="p-3" style="background-color:#fff">
                {{ count($products) }} products found 
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="row mr-1 ml-1">
                            @foreach ($products as $prod)
                                <div class="col-3 mb-3 prod-card">
                                    <img src="{{$prod->image}}" alt="" style="width:100%">
                                    <div class="prod-name" id="#prod-name">{{$prod->name}}</div>
                                    <div class="prod-price">{{$prod->price}} </div>
                                    @if($prod->old_price)
                                    <div class="prod-old-price">{{$prod->old_price}} <span class="prod-offer p-1">{{$prod->offer}}</span></div> 
                                    @endif
                                    @for($i=0; $i< $prod->rate ;$i++)
                                        <i class="fas fa-star prod-rare-star"></i>
                                    @endfor
                                    <br>
                                    <a  class="btn mb-2 mt-2 prod-btn add_to_cart_BTN open-modal" data-toggle="modal" data-target="#staticBackdrop" id="{{$prod->id}}">Add to cart</a>
                                    


                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Success!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Item has been added to cart successfully.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn continue_shopping_BTN" data-dismiss="modal">Continue Shopping</button>
                                            <a type="button" class="btn view_cart_BTN"  href="{{route('get_cart')}}">View Cart and checkout</a>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection