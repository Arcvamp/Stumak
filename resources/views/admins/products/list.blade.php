<!-- resources/views/dashboard.blade.php -->
@extends('admins.layout') <!-- This tells Blade that this page uses the layout defined in layout.blade.php -->

@section('title', 'Dashboard') <!-- This sets the page title to "Dashboard" -->
@section('content')
    <div class="container-fluid">
        <div class="position-relative mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4>All Products</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-primary text-decoration-none" href="../main/index.html">Home
                                </a>
                            </li>
                            <li class="breadcrumb-item d-flex justify-content-center align-items-center ps-0">
                                <iconify-icon icon="tabler:chevron-right"></iconify-icon>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Products</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="me-2">
                            <div class="breadbar"></div>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="datatables">
            <!-- start Zero Configuration -->
            <div class="card">

                <div class="card-body">

                    <div class="row">
                        <div class="mb-2 col-6">
                            <h4 class="card-title">List of All product</h4>
                        </div>
                        <div class="mb-2 col-6">
                            <button type="button"style="float:right;" class="btn bg-primary-subtle text-primary"
                                data-bs-toggle="modal" data-bs-target="#bs-example-modal-xlg">
                                <i class="ti ti-plus fs-4 me-2"></i>
                                Add New Product
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="productTable" class="table table-lg mb-0 table-striped table-bordered   dataTable">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Negotiation</th>
                                    <th>Contact</th>
                                    
                                    <th>option</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <!-- start row -->
                                <tr>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Negotiation</th>
                                    <th>Contact</th>
                                    
                                    <th>option</th>
                                </tr>
                                <!-- end row -->
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="bs-example-modal-xlg" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">Add new Product</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="productForm" class="form-horizontal" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Product Name Input -->
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="product_name" required>
                            <p class="fs-2">A product name is required and recommended to be unique.</p>
                        </div>

                        <!-- Vendor Email Input -->
                        <div class="mb-3">
                            <label for="vendor_email" class="form-label">Vendor Email <span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="vendor_email" required>
                            <p class="fs-2">The vendor email is required.</p>
                        </div>

                        <!-- Vendor Number Input -->
                        <div class="mb-3">
                            <label for="vendor_number" class="form-label">Vendor Number <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="vendor_number" required>
                            <p class="fs-2">The vendor number is required.</p>
                        </div>

                        <!-- Product Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                            <p class="fs-2">Set a description for the product for better visibility.</p>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label class="form-label">Product Images</label>
                            <input type="file" name="images[]" onchange="previewImage(this)" class="form-control"
                                multiple required>
                            <p class="fs-2">Only *.png, *.jpg, and *.jpeg image files are accepted.</p>
                            <div id="imagePreviewContainer" class="row"></div>
                        </div>



                        <!-- Pricing -->
                        <div class="mb-3">
                            <label for="basePrice" class="form-label">Base Price <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="base_price" required>
                        </div>
                        <div class="mb-3">
                            <div class="form-check py-2">
                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault"
                                    name="negotiable">
                                <label class="form-check-label" for="flexCheckDefault">
                                    negotiable
                                </label>
                            </div>
                        </div>

                        <!-- Category Selection -->
                        <div class="mb-3">
                            <label for="categories" class="form-label">Categories</label>
                            <select name="category_id" id="categoryDropdown" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Attributes will be dynamically added here -->
                        <div id="attributeContainer" class="mb-3"></div>

                        <!-- Submit Button -->
                        <div class="form-actions mb-9">
                            <button type="submit" id="addbtn" class="btn btn-primary">add product</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="update" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">P
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">Update Product</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="updateProduct" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="product_name" required>
                            <input type="text" hidden disabled class="form-control" name="product_id" required>
                            <p class="fs-2">A product name is required and recommended to be unique.</p>
                        </div>
                        <!-- Vendor Email -->
                        <div class="mb-3">
                            <label for="vendor_email" class="form-label">Vendor Email <span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="vendor_email" required>
                            <p class="fs-2">The vendor email is required.</p>
                        </div>
                        <!-- Vendor Number -->
                        <div class="mb-3">
                            <label for="vendor_number" class="form-label">Vendor Number <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="vendor_number" required>
                            <p class="fs-2">The vendor number is required.</p>
                        </div>
                        <!-- Product Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                            <p class="fs-2">Set a description for the product for better visibility.</p>
                        </div>
                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label class="form-label">Product Images</label>
                            <input type="file" name="images[]" onchange="previewImages(this)" class="form-control"
                                multiple>
                            <p class="fs-2">Only *.png, *.jpg, and *.jpeg image files are accepted.</p>
                            <div id="imagePreviewContainers" class="row"></div>
                        </div>
                        <!-- Pricing -->
                        <div class="mb-3">
                            <label for="basePrice" class="form-label">Base Price <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="base_price" required>
                            <p class="fs-2">Set the product price.</p>
                        </div>
                        <!-- Negotiable Option -->
                        <div class="mb-3">
                            <div class="form-check py-2">
                                <input class="form-check-input" type="checkbox" value="1" id="negotiable"
                                    name="negotiable">
                                <label class="form-check-label" for="negotiable">
                                    Negotiable
                                </label>
                            </div>
                        </div>
                        <!-- Category Selection -->
                        <div class="mb-3">
                            <label for="categories" class="form-label">Categories</label>
                            <select name="category_id" id="categoryDropdown" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            <p class="fs-2 mb-0">Assign a category to the product.</p>
                        </div>

                        <!-- Attributes Section (Dynamic) -->
                        <div id="attributeContainers" class="mb-3">
                            <!-- Dynamically loaded attributes will appear here -->
                        </div>

                        <!-- Submit Button -->
                        <div class="form-actions mb-9">
                            <button type="submit" id="updatebtn" class="btn btn-primary">update product</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    <div>

    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                let table = $("#productTable").DataTable({
                    "responsive": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        url: "{{ route('admin.product.fetch') }}", // Route for loading data
                        method: "GET",
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching data:', xhr.responseText);
                        }
                    },
                    "columnDefs": [{
                            "targets": [0],
                            "orderable": false
                        } // Disable sorting for image and description columns
                    ],
                    "order": [],
                    "columns": [{
                            data: 'image',
                            name: 'image',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'category',
                            name: 'category'
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'price',
                            name: 'price'
                        },
                        {
                            data: 'description',
                            name: 'description'
                        },
                        {
                            data: 'negotiation',
                            name: 'negotiation'
                        },
                        {
                            data: 'contact',
                            name: 'contact'
                        },
                        
                        {
                            data: null, // Action column
                            name: 'actions',
                            render: function(data, type, row) {
                                return `<div class="button-group" style="display:flex;">
                                       <a class="dropdown-item edit-btn d-flex align-items-center gap-3" href="javascript:void(0)" data-id="${row.id}">
                                <i class="fs-4 ti ti-edit"></i>
                              </a>
                        <a class="dropdown-item d-flex align-items-center delete-btn gap-3" href="javascript:void(0)" data-id="${row.id}" onclick="editProduct'${row.id}'" >
                                <i class="fs-4 ti ti-trash"></i>
                              </a>
                        </div>
                    `;
                            },
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            });

            $(document).ready(function() {
                // Handle form submission via AJAX
                $("#productForm").on("submit", function(event) {
                    event.preventDefault();
                    const addbutton = $("#addbtn");

                    // Change button content to spinner
                    addbutton.html(`
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...`);
                    addbutton.prop("disabled", true); // Disable the button
                    // Create a FormData object to handle file uploads
                    let formData = new FormData(this);

                    $.ajax({
                        url: "{{ route('admin.product.store') }}", // Route for form submission
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            // Show a success message
                            const previewContainer = document.getElementById(
                                "imagePreviewContainer");
                            previewContainer.innerHTML = "";
                            // Clear the form
                            $("#productForm")[0].reset();
                            $('#bs-example-modal-xlg').modal('hide');
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: response.message
                            });
                            $('#productTable').DataTable().ajax.reload();
                            // false keeps the pagination position
                        },
                        error: function(xhr) {
                            // Display errors if any
                            alert("An error occurred: " + xhr.responseText);
                            Swal.fire({
                                type: "error",
                                title: "Oops...",
                                text: xhr.responseText,
                            });
                            resetButton(addbutton);
                        }
                    });
                });
            });

            $('#productTable').on('click', '.edit-btn', function() {
                let id = $(this).data('id');
                if (!id) {
                    Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "Product ID is missing!",
                    });
                    return;
                }

                const attributeContainer = $('#attributeContainers');
                attributeContainer.empty(); // Clear any previous attributes

                // Fetch product details
                $.ajax({
                    url: "{{ route('admin.product.edit', '') }}/" + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        const product = response.product;
                        const attributes = product.attributes || [];
                        const categories = response.categories || [];
                        // Populate form fields
                        $('#updateProduct input[name="product_name"]').val(product.title);
                        $('#updateProduct input[name="product_id"]').val(product.id);
                        $('#updateProduct input[name="vendor_email"]').val(product.email);
                        $('#updateProduct input[name="vendor_number"]').val(product.contact);
                        $('#updateProduct textarea[name="description"]').val(product.description);
                        $('#updateProduct input[name="base_price"]').val(product.price);
                        $('#updateProduct input[name="negotiable"]').prop('checked', product.negotiation);

                        $('#update [name="category_id"]').val(product.category_id || '');

                        // Populate attributes
                        if (attributes.length > 0) {
                            attributes.forEach(attribute => {
                                const attributeHtml = `
                                <div class="mb-3">
                                    <label for="attribute_${attribute.id}" class="form-label">${attribute.name}</label>
                                    <input type="text" class="form-control"
                                        name="attributes[${attribute.id}]"
                                        id="attribute_${attribute.id}"
                                        value="${attribute.value || ''}"
                                        placeholder="Enter value for ${attribute.name}" required>
                                </div>`;
                                attributeContainer.append(attributeHtml);
                            });
                        } else {
                            attributeContainer.html(
                                '<p class="text-muted">No attributes available for this product.</p>');
                        }

                        // Populate images
                        const imagePreviewContainer = $('#imagePreviewContainers');
                        imagePreviewContainer.empty(); // Clear existing previews

                        let productImages = product.image;
                        if (typeof productImages === 'string') {
                            try {
                                productImages = JSON.parse(productImages); // Parse JSON string if necessary
                            } catch (error) {
                                console.error("Error parsing product images:", error);
                                productImages = [];
                            }
                        }

                        if (Array.isArray(productImages) && productImages.length > 0) {
                            productImages.forEach((image, index) => {
                                const previewHtml = `
                        <div class="col-md-3 mb-3" data-image-index="${index}">
                            <img src="/storage/${image}" alt="Product Image" class="img-thumbnail" 
                                style="width: 100px; height: 100px;">
                            <button type="button" class="btn btn-danger btn-sm mt-1 remove-image-btn" 
                                data-index="${index}">
                                Remove
                            </button>
                            <input type="hidden" name="existing_images[]" value="${image}">
                        </div>`;
                                imagePreviewContainer.append(previewHtml);
                            });
                        } else {
                            console.warn("No images found or product.image is not an array.");
                            imagePreviewContainer.html(
                                '<p class="text-muted">No images available for this product.</p>');
                        }

                        $('#update').modal('show');
                    },
                    error: function(xhr) {
                        console.error("Error fetching product data:", xhr.responseText);
                        Swal.fire({
                            type: "error",
                            title: "Oops...",
                            text: "Unable to fetch product data. Please try again.",
                        });

                    }
                });
            });

            $(document).on('click', '.remove-image-btn', function() {
                const index = $(this).data('index');
                // Remove the image preview and hidden input
                $(`[data-image-index="${index}"]`).remove();
            });

            // Handle Delete Button Click
            $('#productTable').on('click', '.delete-btn', function() {
                let id = $(this).data('id');
                if (confirm('Are you sure you want to delete this product?')) {
                    $.ajax({
                        url: "{{ route('admin.product.destroy', '') }}/" + id, // Route to delete product
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}" // CSRF token for security
                        },
                        success: function(response) {
                            if (response.success) {
                                table.ajax.reload(null, false); // Reload table without resetting pagination
                                alert('');
                                Swal.fire({
                                    type: "success",
                                    title: "successfull",
                                    text: "Product deleted successfully",
                                });
                            } else {
                                Swal.fire({
                                    type: "success",
                                    title: "successfull",
                                    text: "Failed to delete product",
                                });

                            }
                        },
                        error: function(xhr) {
                            console.error('Delete error:', xhr.responseText);
                            Swal.fire({
                                type: "error",
                                title: "Oops...",
                                text: "Failed to delete product",
                            });
                            alert('An error occurred. Check console for details.');
                        }
                    });
                }
            });

            function previewImages(input) {
                const previewContainer = document.getElementById("imagePreviewContainers");
                previewContainer.innerHTML = ""; // Clear any existing previews

                if (input.files && input.files.length > 0) {
                    Array.from(input.files).forEach((file, index) => {
                        if (file.type.startsWith("image/")) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                // Create the preview container div
                                const imgDiv = document.createElement("div");
                                imgDiv.classList.add("col-md-3", "mb-3");
                                imgDiv.dataset.index = index;

                                // Create the image element
                                const imgElement = document.createElement("img");
                                imgElement.src = e.target.result;
                                imgElement.classList.add("img-thumbnail");
                                imgElement.style.width = "100px";
                                imgElement.style.height = "100px";
                                imgElement.alt = "Image Preview";

                                // Create the remove button
                                const removeButton = document.createElement("button");
                                removeButton.type = "button";
                                removeButton.classList.add("btn", "btn-danger", "btn-sm", "mt-1",
                                    "remove-image-btn");
                                removeButton.textContent = "Remove";
                                removeButton.addEventListener("click", () => {
                                    imgDiv.remove(); // Remove the preview
                                    input.files = removeFileFromInput(input.files,
                                        index); // Update file input
                                });

                                // Append image and remove button to container
                                imgDiv.appendChild(imgElement);
                                imgDiv.appendChild(removeButton);
                                previewContainer.appendChild(imgDiv);
                            };
                            reader.readAsDataURL(file);
                        } else {
                            console.warn();
                            Swal.fire({
                                type: "error",
                                title: "Oops...",
                                text: `Skipped file: ${file.name}. Not an image.`,
                            });

                        }
                    });
                } else {

                    Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "No files selected or browser does not support file inputs.",
                    });
                }
            }

            function previewImage(input) {
                const previewContainer = document.getElementById("imagePreviewContainer");
                previewContainer.innerHTML = ""; // Clear existing previews

                if (input.files && input.files.length > 0) {
                    Array.from(input.files).forEach((file, index) => {
                        if (file.type.startsWith("image/")) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                // Create the preview container div
                                const imgDiv = document.createElement("div");
                                imgDiv.classList.add("col-md-3", "mb-3");
                                imgDiv.dataset.index = index;

                                // Create the image element
                                const imgElement = document.createElement("img");
                                imgElement.src = e.target.result;
                                imgElement.classList.add("img-thumbnail");
                                imgElement.style.width = "100px";
                                imgElement.style.height = "100px";
                                imgElement.alt = "Image Preview";

                                // Create the remove button
                                const removeButton = document.createElement("button");
                                removeButton.type = "button";
                                removeButton.classList.add("btn", "btn-danger", "btn-sm", "mt-1",
                                    "remove-image-btn");
                                removeButton.textContent = "Remove";
                                removeButton.addEventListener("click", () => {
                                    imgDiv.remove(); // Remove the preview
                                    input.files = removeFileFromInput(input.files,
                                        index); // Update file input
                                });

                                // Append image and remove button to container
                                imgDiv.appendChild(imgElement);
                                imgDiv.appendChild(removeButton);
                                previewContainer.appendChild(imgDiv);
                            };
                            reader.readAsDataURL(file);
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Oops...",
                                text: `Skipped file: ${file.name}. Not an image.`,
                            });

                        }
                    });
                } else {
                    console.log("No files selected or browser does not support file inputs.");
                    Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "No files selected or browser does not support file inputs.",
                    });

                }
            }

            $(document).ready(function() {
                $('#updateProduct').on('submit', function(event) {
                    event.preventDefault(); // Prevent default form submission
                    const form = $(this);
                    const updateButton = $("#updatebtn");

                    // Change button content to spinner
                    updateButton.html(`
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...`);
                    updateButton.prop("disabled", true); // Disable the button

                    const formData = new FormData(this);
                    const id = form.find('[name="product_id"]').val();
                    if (!id) {

                        Swal.fire({
                            type: "error",
                            title: "Oops...",
                            text: "Product ID is missing",
                        });

                        resetButton(updateButton); // Reset button state
                        return;
                    }

                    // Add the PUT method explicitly for Laravel
                    formData.append('_method', 'PUT');
                    $.ajax({
                        url: "{{ route('admin.product.update', '') }}/" +
                            id, // Correct route for updating
                        type: 'POST', // Use POST to comply with Laravel's PUT emulation
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'), // Add CSRF token for security
                        },
                        success: function(response) {
                            resetButton(updateButton); // Reset button state
                            if (response.status === 'success') {
                                $('#update').modal('hide'); // Hide the modal
                                $('#updateProduct')[0].reset(); // Reset the form
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: response.message,
                                });
                                $('#productTable').DataTable().ajax
                                    .reload(); // Reload the table data
                            } else {
                                Swal.fire({
                                    type: "error",
                                    title: "Oops...",
                                    text: "Failed to update product. Please try again.",
                                });
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseJSON || xhr.responseText || 'Unknown error');
                            Swal.fire({
                                type: "error",
                                title: "Oops...",
                                text: "An error occurred while updating the product.",
                            });

                            resetButton(updateButton); // Reset button state
                        },
                    });
                });

                /**
                 * Reset button to original state
                 * @param {jQuery} button
                 */
                $('#updateProduct')[0].reset(); // Reset the form
                function resetButton(button) {
                    button.html('Update Product'); // Restore original button text
                    button.prop("disabled", false); // Enable the button
                }
            });



            document.getElementById('categoryDropdown').addEventListener('change', function() {
                const categoryId = this.value;
                const attributeContainer = document.getElementById('attributeContainer');
                // Clear previous attributes
                attributeContainer.innerHTML = '';
                if (categoryId) {
                    // Fetch attributes using AJAX
                    $.ajax({
                        url: "{{ route('admin.product.attributes', '') }}/" + categoryId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.length > 0) {
                                response.forEach(attribute => {
                                    const attributeHtml = `
                            <div class="mb-3">
                                <label for="attribute_${attribute.id}" class="form-label">${attribute.name}</label>
                                <input type="text" class="form-control" name="attributes[${attribute.id}]" id="attribute_${attribute.id}" placeholder="Enter value for ${attribute.name}" required>
                            </div>`;
                                    attributeContainer.insertAdjacentHTML('beforeend',
                                        attributeHtml);
                                });
                            } else {
                                attributeContainer.innerHTML =
                                    '<p class="text-muted">No attributes available for this category.</p>';
                            }
                        },
                        error: function(xhr) {
                            attributeContainer.innerHTML =
                                '<p class="text-danger">Unable to fetch attributes. Please try again.</p>';
                        }
                    });
                } else {
                    attributeContainer.innerHTML =
                        '<p class="text-muted">Please select a category to view its attributes.</p>';
                }
            });
        </script>
    @endsection
