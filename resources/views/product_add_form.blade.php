@extends('app')
@section('title', 'Add Product Details')

@section('main_section')
<div class="create">
    <div class="create_content">
        <div class="container">
            <div class="row pt-2">
                <div class="col-lg-12 d-flex justify-content-between align-items-center mx-auto">
                    <h2>Create a New Product</h2>
                    <a href="/dashboard" class="btn btn-warning rounded">Go to Home</a>
                </div>
            </div>
            <hr class="my-2">
            <div class="row my-3">
            <div class="col-lg-6 mx-auto">
                <div class="card shadow">
                    <div class="card-header bg-info">
                        <h3 class="text-dark text-center fw-bold">Add New Product</h3>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" class="add-product-form" enctype="multipart/form-data">
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
                                <label class="fw-bold" for="image">Image:</label>
                                <input type="file" name="image" id="image" class="form-control image">
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
                            <div class="my-2 text-center">
                                <input type="submit" value="Add Product" class="btn btn-primary add-product">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@vite(['resources/js/product.js'])

@endsection
