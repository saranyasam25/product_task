@extends('app')
@section('title', 'DashBoard')

@section('main_section')
<div class="container">
    <div class="text-center mt-5">
        <h3>Product List</h3>
    </div>
    <div class="filter row pt-3 pb-3">
        <?php
        $role = Auth::user()['role'];
        ?>
        @if ($role == 'Admin')
        <div class="text-end">
            <button class="btn btn-warning"><a href="/product-form" class="text-decoration-none text-dark">Add New Product</a></button>
        </div>
        @endif
    </div>
    <div class="table table-responsive fixTableHead first_content">
        <table id="example" class="table table-bordered">
            <thead>
                <tr>
                    <th class="ps-3 pe-0 align-middle">Product Name</th>
                    <th class="ps-3 pe-0 align-middle">Category</th>
                    <th class="ps-3 pe-0 align-middle">Price</th>
                    <th class="ps-3 pe-0 align-middle">Discount %</th>
                    <th class="ps-3 pe-0 align-middle">Discount Amount</th>
                    <th class="ps-3 pe-0 align-middle">Discount From</th>
                    <th class="ps-3 pe-0 align-middle">Discount Till</th>
                    <th class="ps-3 pe-0 align-middle">Tax %</th>
                    <th class="ps-3 pe-0 align-middle">Tax Amount</th>
                    <th class="ps-3 pe-0 align-middle">Unit Type</th>
                    <th class="ps-3 pe-0 align-middle">In Stock</th>
                    <th class="ps-3 pe-0 align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                @isset($productDetails)
                @foreach ($productDetails as $data)
                    <tr>
                        <td class="ps-3 pe-0 align-middle">{{ $data['product_name'] }}</td>
                        <td class="ps-3 pe-0 align-middle">
                            @foreach ($data['categories'] as $category)
                                {{ $category->category_name }}
                            @endforeach
                        </td>
                        <td class="ps-3 pe-0 align-middle">{{ $data['price'] }}</td>
                        <td class="ps-3 pe-0 align-middle">{{ $data['discount_percentage'] }}</td>
                        <td class="ps-3 pe-0 align-middle">{{ $data['discount_amount'] }}</td>
                        <td class="ps-3 pe-0 align-middle">{{ $data['discount_from'] }}</td>
                        <td class="ps-3 pe-0 align-middle">{{ $data['discount_to'] }}</td>
                        <td class="ps-3 pe-0 align-middle">{{ $data['tax_percentage'] }}</td>
                        <td class="ps-3 pe-0 align-middle">{{ $data['tax_amount'] }}</td>
                        <td class="ps-3 pe-0 align-middle">{{ $data['unit_type'] }}</td>
                        <td class="ps-3 pe-0 align-middle">{{ $data['in_stock'] }}</td>
                        <td class="ps-3 pe-0 align-middle">
                            <div class="d-flex">
                                @if ($role == 'Admin')
                                    <button class="btn btn-link p-2 edit-icon"  data-toggle="modal" data-target="#editProductModal" data-id="{{ $data['id'] }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-link p-2 delete-icon"  data-id="{{ $data['id'] }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <button class="btn btn-link p-2 view-icon" data-toggle="modal" data-target="#viewProductModal" data-id="{{ $data['id'] }}">
                                        <i class="far fa-eye"></i>
                                    </button>
                                @elseif ($role == 'User')
                                    <button class="btn btn-link p-2 view-icon" data-toggle="modal" data-target="#viewProductModal" data-id="{{ $data['id'] }}">
                                        <i class="far fa-eye"></i>
                                    </button>
                                @endif
                            </div>
                        </td>                        
                    </tr>
                @endforeach
                @endisset
            </tbody>
        </table>
    </div>
</div>

<!-- edit Modal -->
<div class="modal" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <!-- Your form goes here, similar to the form you provided -->
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="my-2 pb-2">
                        <label class="fw-bold" for="product_name">Product Name:</label>
                        <input type="text" name="product_name" id="product_name" class="form-control product_name " placeholder="Enter the Product Name">
                    </div>
                    <div class="my-2 pb-2">
                        <label class="fw-bold" for="type">Unit Type:</label>
                        <select name="type" id="type" class="form-control type">
                            <option value="" disabled selected>Select Type</option>
                            <option value="Qty">QTY</option>
                            <option value="Ltr">Liter</option>
                            <option value="Kg">KiloGram</option>
                            <option value="Meter">Meter</option>
                        </select> 
                    </div>
                    <div class="my-2 pb-2">
                        <label class="fw-bold" for="Category">Category:</label>
                        <select name="category" id="category" class="form-control category">
                            <option value="" disabled selected>Select Category</option>
                            <option value="1">Fruits</option>
                            <option value="2">Vegetables</option>
                            <option value="3">Dairy</option>
                            <option value="4">Snacks</option>
                            <option value="5">Bread & Bakery</option>
                            <option value="6">Personal Care</option>
                            <option value="7">Health Care</option>
                            <option value="8">Household</option>
                            <option value="9">Baby Items</option>
                            <option value="10">Pet Care</option>
                        </select>
                    </div>
                    <div class="my-2 pb-2">
                        <label class="fw-bold" for="Price">Price:</label>
                        <input type="text" name="Price" id="price" class="form-control price" placeholder="Enter the Price">
                    </div>
                    <div class="row my-2 pb-2">
                        <div class="col-6">
                            <label class="fw-bold" for="discount_percentage">Discount Percentage:</label>
                            <input type="text" name="discount_percentage" id="discount_percentage" class="form-control discount_percentage" placeholder="Enter Disount Percentage">
                        </div>
                        <div class="col-6">
                            <label class="fw-bold" for="discount_amount">Discount Amount</label>
                            <input type="text" name="discount_amount" id="discount_amount" class="form-control discount_amount" placeholder="Discounted Amount">
                        </div>  
                    </div>
                    <div class="row my-2 pb-2">
                        <div class="col-6">
                            <label class="fw-bold" for="from">Discount From:</label>
                            <input type="date" name="from" id="from" class="form-control from" placeholder="Discount From">
                        </div>
                        <div class="col-6">
                            <label class="fw-bold" for="dis_to">Discount To:</label>
                            <input type="date" name="dis_to" id="dis_to" class="form-control dis_to" placeholder="Discount Till">
                        </div>
                    </div>
                    <div class="row my-2 pb-2">
                        <div class="col-6">
                            <label class="fw-bold" for="tax_percentage">Tax Percentage</label>
                            <input type="text" name="tax_percentage" id="tax_percentage" class="form-control tax_percentage" placeholder="Enter Tax Percentage">
                        </div>
                        <div class="col-6">
                            <label class="fw-bold" for="tax_amount">Tax Amount:</label>
                        <input type="text" name="tax_amount" id="tax_amount" class="form-control tax_amount" placeholder="Tax Amount">
                        </div>
                    </div>
                    <div class="my-2 pb-2">
                        <label class="fw-bold" for="in_stock">Stock In:</label>
                        <input type="text" name="in_stock" id="in_stock" class="form-control in_stock" placeholder="Enter the Stock In">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" value="Edit Product" class="btn btn-primary edit-product">
            </div>
        </div>
    </div>
</div>

{{-- view modal --}}

<div class="modal" id="viewProductModal" tabindex="-1" role="dialog" aria-labelledby="viewProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewProductModalLabel">View Product</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id" value="">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <p>Product Name : <span class="product_name"></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <p>Category : <span class="category"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <p>Price : <span class="price"></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <p>Discount Percentage : <span class="dis_perc"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <p>Discounted Amount : <span class="disc_amt"></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <p>In Stock :<span class="in_stock"> </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <p>Discounted From : <span class="disc_from"></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <p>Till :<span class="disc_till"> </p>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@vite(['resources/js/product.js'])
@endsection
