<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(255, 255, 255, .8) url('http://i.stack.imgur.com/FhHRx.gif') 50% 50% no-repeat;
    }

    body.loading .modal {
        overflow: hidden;
    }

    body.loading .modal {
        display: block;
    }
</style>

<div style="margin-left: 2em;" class=" mt-4">
    <a class="btn btn-primary" href="<?= base_url('admin/showcategories') ?>">Show</a>
</div>


<div style="background-color: #ccc;" class="col container mt-4 mb-5">

    <h1>Add Category</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <li>DOPLNKY VÝŽIVY ID = 1</li>
                    <li>ZDRAVÉ POTRAVINY ID = 2</li>
                    <li>OBLEČENIE A PRÍSLUŠENSTVO ID = 3</li>
                    <li>EKO DROGÉRIA ID = 4</li>
                    <li>TVOJE CIELE ID = 5</li>
                </ul>

            </div>
            <div class="col">
                <ul>
                    <li>Navigation_id = 0, will be main button in navbar</li>
                    <li>Parent_id - will be in dropdown menu under main category</li>
                </ul>

            </div>
        </div>
    </div>

    <form method="post">

        <div class="form-group">
            <label for="exampleFormControlInput1">In main navbar ?</label>
            <select name="navigation_id" id="">
                <option value="0">Yes</option>
                <option value="1">No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Parent Id</label>
            <select name="parent_id" id="">
                <option default value="0">none</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" class="form-control" name="name" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Slug</label>
            <input type="text" class="form-control" name="slug" id="exampleFormControlInput1">
        </div>
    

        <input type="hidden" class="form-control" name="category" id="exampleFormControlInput1" value="category">

        <input type="submit" class="btn btn-success mb-3 mt-3" value="Uložiť" id="formConfirm">

    </form>
</div>

<div style="background-color: #ccc;" class="col container mt-3 mb-4">
    <h1>Add Subcategory</h1>
    <form method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Parent id</label>
            <input type="text" class="form-control" name="parent_id" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" class="form-control" name="name" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Slug</label>
            <input type="text" class="form-control" name="slug" id="exampleFormControlInput1">
        </div>


        <input type="hidden" class="form-control" name="category" id="exampleFormControlInput1" value="subcategory">

        <input type="submit" class="btn btn-success mb-3 mt-3"  value="Uložiť" id="formConfirm">
    </form>
</div>



<div style="background-color: #ccc;" class="col container mt-3 mb-4">
    <h1>Add Product</h1>
    <form method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" class="form-control" name="name" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Text</label>
            <input type="text" class="form-control" name="text" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type="text" class="form-control" name="price" id="exampleFormControlInput1">
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Photo of product</label>
            <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
        </div>

        <input type="hidden" class="form-control" name="product" id="exampleFormControlInput1" value="subcategory">

        <input type="submit" class="btn btn-success mb-3 mt-3" value="Save" id="formConfirm">
    </form>
</div>


<div class="modal"></div>


<script>
    // CREATE CATEGORY OR SUBCATEGORY
    $('form').submit(function(e) {

        var createUrl = '<?= base_url('admin/create') ?>',
            body = $("body");

        e.preventDefault();
        $(document).on({
            ajaxStart: function() {
                body.addClass("loading").css({
                    backgroundColor: 'gray'
                });
            },
            ajaxStop: function() {
                body.removeClass("loading").css({
                    backgroundColor: '#F4F3F3'
                });

            }
        });

        $.ajax({
            url: createUrl,
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data) {},
            error: function(xhr, ajaxOptions, thrownerror) {}
        });
        e.preventDefault();
    });
</script>

</body>

</html>