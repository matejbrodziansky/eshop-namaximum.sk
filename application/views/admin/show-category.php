<div style="margin-left: 2em;" class=" mt-4">
    <a class="btn btn-primary" href="<?= base_url('admin/create') ?>">Create</a>
</div>

<div class="container mt-5">

    <h1>Navigation bar items</h1>

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Parent Id</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php $num = 1 ?>
            <?php foreach ($nav_categories as $nav_category) : ?>
                <tr id="<?= $nav_category['id'] ?>">
                    <th scope="row"><?= $num++; ?></th>
                    <td><?= $nav_category['id'] ?></td>
                    <td><?= $nav_category['name'] ?></td>
                    <td><?= $nav_category['parent_id'] ?></td>
                    <td><a class="btn btn-danger btn-sm delbtn" href="<?= base_url('admin/delete/category/' . $nav_category['id']) ?>">X</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="container mt-5">

    <h1>Subcategory items</h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Parent Id</th>
                <th scope="col">Slug</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php $num = 1 ?>
            <?php foreach ($categories as $category) : ?>
                <tr>
                    <th scope="row"><?= $num++; ?></th>
                    <td><?= $category['id'] ?></td>
                    <td><?= $category['name'] ?></td>
                    <td><?= $category['parent_id'] ?></td>
                    <td><?= $category['slug'] ?></td>
                    <td><a class="btn btn-danger btn-sm delbtn" href="<?= base_url('admin/delete/category/' . $category['id']) ?>">X</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>

    // DELETE CATEGORY OR SUBCATEGORY
    var delBtn = $('.delbtn');

    delBtn.on('click', function(e) {

        confirm('Are you sure ?');

        var body = $("body"),
            _selfHref = $(this).attr('href'),
            _parent = $(this).parents('td').parents('tr');


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
            url: _selfHref,
            type: 'POST',
            success: function(data) {
                _parent.hide();
            },
            error: function(xhr, ajaxOptions, thrownerror) {}
        });
        e.preventDefault();
    });
</script>

</body>

</html>