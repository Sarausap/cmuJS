<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ckeditor4@4.16.2/full/contents.css">
<style>
    .ck-blurred.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline {
        height: 200px !important;
    }

    .ck-focused.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline {
        min-height: 200px !important;
    }

    .input-container {
        position: relative;
        width: 200px;
    }

    .input-container input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .input-container.dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        border: 1px solid #ccc;
        border-top: none;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px;
        display: none;
    }

    .input-container.dropdown li {
        padding: 10px;
        cursor: pointer;
    }

    .input-container.dropdown li:hover {
        background-color: #f0f0f0;
    }

    .input-container.dropdown li.active {
        background-color: #e0e0e0;
    }
</style>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="shadow-none position-relative overflow-hidden mb-4">
            <div class="d-sm-flex d-block justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold text-uppercase"> Form Basic</h5>
                <nav aria-label="breadcrumb" class="d-flex align-items-center">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none" href="../main/index.html">Home
                            </a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">
                            Form Basic
                        </li>
                    </ol>

                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- ----------------------------------------- -->
                <!-- 1. Basic Form -->
                <!-- ----------------------------------------- -->
                <!-- start Basic Form -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Create Article</h4>
                        <form action="<?php echo base_url('user/article/add/insert'); ?>" method="post"
                            enctype="multipart/form-data">
                            <div class=" mb-3">
                                <label class="form-label">Title
                                </label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">DOI</label>
                                    <input type="text" class="form-control" name="doi" required>
                                </div>
                                <div class="col-md-6 mb-3 has-success">
                                    <label class="form-label">Volume</label>
                                    <select class="form-select" name="volume">
                                        <?php foreach ($volumes as $volume) {
                                            echo "<option value='" . $volume["volume_id"] . "'>" . $volume["name"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="authors mb-3">
                                        <label class="form-label">Authors</label>
                                        <div class="author-input row" style="margin-top: 15px;">
                                            <div class="col">
                                                <select class="choose form-select" name="author[]">
                                                    <?php foreach ($authors as $author) {
                                                        echo "<option value=" . $author["user_id"] . ">" . $author["complete_name"] . "</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <div class="mt-3 mt-md-0" style="display:none;">
                                                    <button type="button" class="deleteAuthor btn hstack gap-6"
                                                        id="deleteAuthorButton">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-md-flex align-items-center">
                                        <div class="mt-3 mt-md-0 ms-auto">
                                            <button type="button" class="btn btn-success hstack gap-6" id="addButton">
                                                <i class="ti ti-send me-2 fs-4"></i>
                                                Add Author
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="keywords mb-3">
                                        <label class="form-label">Keywords</label>
                                        <div class="keyword-input row">
                                            <div class="col">
                                                <input type="text" class="form-control mt-3" id="keyword1"
                                                    name="keyword[]" placeholder="Type Keywords..." required>
                                            </div>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <div class="mt-3 mt-md-0" style="display:none;">
                                                    <button type="button" class="deleteKeyword btn hstack gap-6"
                                                        id="deleteKeywordButton">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-md-flex align-items-center">
                                        <div class="mt-3 mt-md-0 ms-auto">
                                            <button type="button" class="btn btn-success hstack gap-6" id="addKeyword">
                                                <i class="ti ti-send me-2 fs-4"></i>
                                                Add Keywords
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Abstract</label>
                                    <textarea class="form-control" rows="5" id="editor" name="abstract"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="formFile" class="form-label">Upload PDF File</label>
                                        <input class="form-control" type="file" name="formFile" id="formFile"
                                            accept="application/pdf" required>
                                    </div>
                                    <div class="col-lg-6 d-md-flex align-items-center justify-content-end">
                                        <div class="ms-auto mt-3 mt-md-0">
                                            <button type="submit" class="btn btn-primary hstack gap-6" id="myForm">
                                                <i class="ti ti-send fs-4"></i>
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var authorElementId = 2
    var keywordElementId = 1

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });


    // document.getElementById('addButton').addEventListener('click', function () {
    //     // Clone the author-input.row element
    //     var newInput = document.querySelector('.author-input.row').cloneNode(true);
    //     // Remove the 'id' attribute to avoid duplicate IDs
    //     newInput.id = 'author' + (document.querySelectorAll('.author-input.row').length + 1);
    //     // Clear the value of the new input field
    //     newInput.querySelector('.choose').value = ''; // Assuming you want to clear the select value
    //     // Append the cloned input to the container
    //     document.querySelector('.authors').appendChild(newInput);

    //     // Optionally, clear the original input field
    //     document.querySelector('.author-input.col input').value = '';
    //     console.log(document.querySelector('.author-input.col input'));
    //     // Check if the new input is the first child of its parent
    //     if (newInput === document.querySelector('.authors').firstElementChild) {
    //         console.log(newInput)
    //         // Remove the delete button from the first input
    //         var deleteButton = newInput.querySelector('.deleteAuthor');
    //         deleteButton.style.display = 'block'
    //         if (deleteButton) {
    //             deleteButton.remove();
    //         }
    //     }

    //     // Initialize the dropdown for the new input
    //     var dropdowns = newInput.querySelectorAll('.dropdown-toggle');
    //     dropdowns.forEach(function (dropdown) {
    //         var dropdownElement = new bootstrap.Dropdown(dropdown);
    //     });

    //     // Optionally, show the input field if it's hidden
    //     var inputField = newInput.querySelector('.text.form-control.mt-3');
    //     if (inputField) {
    //         inputField.style.display = "block";
    //     }
    // });


    document.getElementById('addButton').addEventListener('click', function () {
        var newInput = document.querySelector('.author-input.row').cloneNode(true);
        // Remove the 'id' attribute to avoid duplicate IDs
        var lastChild = newInput.lastElementChild;
        var grandChild = lastChild.lastElementChild;

        var buttonChild = grandChild.lastElementChild;

        var inputChild = newInput.firstElementChild;
        var inputGrandchild = inputChild.firstElementChild;

        console.log(grandChild)
        grandChild.style.display = "block"
        keywordElementId += 1
        console.log(keywordElementId)
        finalKeywordId = "author" + keywordElementId
        inputChild.id = finalKeywordId;
        console.log(inputChild)
        console.log(newInput)
        newInput.querySelector('.col select').value = '';
        // Append the cloned input to the container

        document.querySelector('.authors').appendChild(newInput);
        // Optionally, clear the original input field
        document.querySelector('.newAuthorInput').value = '';

        // Check if the new input is the first child of its parent
        if (newInput === document.querySelector('.author').firstElementChild) {
            // Remove the delete button from the first input
            var deleteButton = newInput.querySelector('.deleteAuthor');
            if (deleteButton) {
                deleteButton.remove();
            }
        }
    });


    document.getElementById('addKeyword').addEventListener('click', function () {
        var newInput = document.querySelector('.keyword-input.row').cloneNode(true);
        // Remove the 'id' attribute to avoid duplicate IDs
        var lastChild = newInput.lastElementChild;
        var grandChild = lastChild.lastElementChild;

        var buttonChild = grandChild.lastElementChild;

        var inputChild = newInput.firstElementChild;
        var inputGrandchild = inputChild.firstElementChild;

        console.log(grandChild)
        grandChild.style.display = "block"
        keywordElementId += 1
        console.log(keywordElementId)
        finalKeywordId = "keyword" + keywordElementId
        inputChild.id = finalKeywordId;
        console.log(inputChild)
        console.log(newInput)
        newInput.querySelector('.col input').value = '';
        // Append the cloned input to the container
        document.querySelector('.keywords').appendChild(newInput);
        // Optionally, clear the original input field
        document.querySelector('.newKeywordInput').value = '';

        // Check if the new input is the first child of its parent
        if (newInput === document.querySelector('.keywords').firstElementChild) {
            // Remove the delete button from the first input
            var deleteButton = newInput.querySelector('.deleteKeyword');
            if (deleteButton) {
                deleteButton.remove();
            }
        }
    });


    $(document).ready(function () {
        $(document).on('click', '.deleteAuthor', function (event) {
            var depth = 3;
            var currentElement = this;
            var elementsToRemove = [];

            for (var i = 0; i < depth; i++) {
                if (currentElement.parentElement) {
                    elementsToRemove.push(currentElement.parentElement);
                    currentElement = currentElement.parentElement;
                } else {
                    break;
                }
            }

            elementsToRemove.forEach(function (element) {
                element.remove();
            });
        });
    });

    $(document).ready(function () {
        $(document).on('click', '.deleteKeyword', function (event) {
            keywordElementId -= 1
            var depth = 3;
            var currentElement = this;
            var elementsToRemove = [];

            for (var i = 0; i < depth; i++) {
                if (currentElement.parentElement) {
                    elementsToRemove.push(currentElement.parentElement);
                    currentElement = currentElement.parentElement;
                } else {
                    break;
                }
            }

            elementsToRemove.forEach(function (element) {
                element.remove();
            });
        });
    });

    document.getElementById('myForm').addEventListener('submit', function (event) {
        // Prevent the default form submission
        event.preventDefault();

        // Get the CKEditor instance
        var editor = CKEDITOR.instances.editor;

        // Get the CKEditor content
        var content = editor.getData();

        // Add the CKEditor content to the form data
        this.elements.namedItem('abstract').value = content;

        // Manually submit the form
        this.submit();
    });

    function initializeDropdownsAndHandleClicks(element) {
        console.log("clicked");
        console.log(element);
        var dropdown = element.nextElementSibling;

        // Access the parent of the element
        var parent = $(element).parent();

        // Access the input and select elements by their index
        var input = parent.children().eq(2);
        var Select = parent.children().eq(3);

        $(element).each(function () {
            var dropdown = new bootstrap.Dropdown(element);
        });

        // Handle dropdown item click
        $(dropdown).on('click', function (event) {
            event.preventDefault();
            var buttonText;
            var options = $(dropdown).find('.dropdown-item'); // Correctly select dropdown items

            if ($(event.target).hasClass('dropdown-item')) {
                // Change the button text to the selected author
                buttonText = $(event.target).text();
                $(element).text(buttonText);

                // Show or hide the input and select elements based on the button text
                if (buttonText === 'Choose Author') {
                    input.show();
                    Select.hide();
                    console.log('Choose Author button clicked');
                    // Additional actions for "Choose Author" can be added here
                } else if (buttonText === 'New Author') {
                    // Action for "New Author" button
                    input.hide();
                    Select.show();
                    console.log('New Author button clicked');
                    // Additional actions for "New Author" can be added here
                }
            }
        });
    }





    // Call the function when the document is ready
    document.addEventListener('DOMContentLoaded', function () {
        // Assuming 'element' is the DOM element you want to initialize
        var element = document.getElementById('yourElementId'); // Replace 'yourElementId' with the actual ID
        initializeDropdownsAndHandleClicks(element);
    });



</script>