@extends('main')
@section('screen')

    <div id="main">
        <div id="header">
            <h2> Products </h2>
            <a id="add-bt" href="{{ route('addproduct') }}"> Add product
            </a>
            <a class="normal-bt"> Export </a>
            <a class="normal-bt"> Import </a>
        </div>

        <div id="product-list">
            <!-- ----------------- Navbar ---------------- -->
            <div class="nav-tab">
                <ul>
                    <li><a class="product_tabs" data-tabs="all">All</a> </li>
                    <li><a class="product_tabs" data-tabs="active">Active</a> </li>
                    <li><a class="product_tabs" data-tabs="draft">Draft</a> </li>
                    <li><a class="product_tabs" data-tabs="archived">Archived</a> </li>
                </ul>
            </div>
            <!-- ----------------- Button group ---------------- -->
            <div id="level1">
                <div id="search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search">
                </div>
                <div class="group">
                    <button> Product Vendor </button>
                    <button> Tagged with </button>
                    <button> Status </button>
                    <button> More filters </button>
                </div>
                <div class="save-bt">
                    <button> Saved </button>
                    <button> Sort </button>
                </div>
            </div>
            <!-- ----------------- List ---------------- -->
            <div class="level2">
                <button id="selectedCheck"> <input type="checkbox" id="mainCheck">
                    <span id="selectedNum"> </span>
                    <span> Selected </span>
                </button>
                <button> Edit Product </button>
                <button> More Action </button>
            </div>
            <table class="list" id="table-list">
                <thead id="thead">
                    <tr>
                        <td> <input type="checkbox" id="thCheck"> </td>
                        <td> Product </td>
                        <td> Status </td>
                        <td> Inventory </td>
                        <td> Type </td>
                        <td> Vendor </td>
                    </tr>
                </thead>
                <tbody id="table-body">
                    {{-- <tr>
                        <td> <input type="checkbox" id="thCheck"> </td>
                        <td> Product </td>
                        <td> {{ $productList->price }} </td>
                        <td> Inventory </td>
                        <td> Type </td>
                        <td> Vendor </td>
                    </tr> --}}
                    @if ($productList)
                        @foreach ($productList as $productLists)
                            <tr>
                                <td> <input type="checkbox" class="table-check"> </td>
                                <td>{{$productLists->title}} </td>
                                <td>{{$productLists->description}}</td>
                                <td>{{$productLists->price}}</td>
                                <td>{{$productLists->compare_price}}</td>
                                <td>{{$productLists->vendor}}</td>
                                <td><a href="{{route('update_product').'?id='. $productLists->id}}"> Edit </a></td>
                                <td><a href="{{route('deleteproduct').'?id='. $productLists->id}}"> Delete </a></td>
                            </tr>          
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="pagination">
                {{$productList->onEachSide(1)->links()}}
                {{-- <button id="prev"> <i class="fas fa-chevron-left"></i> </button>
                <button id="nxt"> <i class="fas fa-chevron-right"></i> </button> --}}
            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function () {
            productModule.activarion_tabs();
        });
    </script>
@endsection
