<style>
    :root {
        --hue: 223;
        --bg: hsl(var(--hue), 90%, 90%);
        --fg: hsl(var(--hue), 90%, 10%);
        --trans-dur: 0.3s;
        --trans-timing: cubic-bezier(0.65, 0, 0.35, 1);
    }

    #status-container>p {
        margin: auto 0 !important;
    }

    #confirm {
        position: absolute;
        right: 3em;
    }

    .switch,
    .switch__input {
        -webkit-tap-highlight-color: transparent;
    }

    .switch {
        position: relative;
        width: 4em;
        height: 2em;
        margin: auto 0;
        left: 1.5em;
    }

    .switch__check {
        display: block;
        transform: translateX(0) rotate(0);
        transition: transform var(--trans-dur) var(--trans-timing);
        z-index: 1;
    }

    .switch__check-line {
        background-color: red;
        transform: translate(0, 0);
        transition:
            stroke var(--trans-dur) var(--trans-timing),
            stroke-dashoffset var(--trans-dur) var(--trans-timing),
            transform var(--trans-dur) var(--trans-timing);
    }

    .switch__input {
        background-color: hsl(0deg 100% 46.77% / 100%);
        border-radius: 2em;
        box-shadow:
            0 0 0 0.0625em hsl(var(--hue), 10%, 50%) inset,
            0 0.25em 1em hsla(var(--hue), 90%, 10%, 0);
        cursor: pointer;
        display: block;
        outline: transparent;
        width: 100%;
        height: 100%;
        transition:
            background-color var(--trans-dur) var(--trans-timing),
            box-shadow var(--trans-dur) var(--trans-timing);
        -webkit-appearance: none;
        appearance: none;
    }

    .switch__input:before,
    .switch__input:after {
        content: "";
        display: block;
    }

    .switch__input:before {
        background-color: hsl(0, 0%, 100%);
        border-radius: 50%;
        box-shadow: 0 0.125em 0.25em hsla(var(--hue), 90%, 10%, 0);
        transition:
            box-shadow var(--trans-dur) var(--trans-timing),
            transform var(--trans-dur) var(--trans-timing);
    }

    .switch__input:after {
        border-radius: 0.75em;
        box-shadow: 0 0 0 0.125em hsla(var(--hue), 90%, 70%, 0);
        width: 100%;
        height: 100%;
        transition: box-shadow 0.15s linear;
    }

    .switch__input:focus-visible:after {
        box-shadow: 0 0 0 0.125em hsla(var(--hue), 90%, 70%, 1);
    }

    .switch__check,
    .switch__input:before {
        position: absolute;
        top: 0.25em;
        left: 0.25em;
        width: 1.5em;
        height: 1.5em;
    }

    .switch__input:checked {
        background-color: hsla(var(--hue), 90%, 50%, 1);
        box-shadow:
            0 0 0 0.0625em hsl(var(--hue), 90%, 50%) inset,
            0 0.25em 1em hsla(var(--hue), 90%, 10%, 0.5);
    }

    .switch__input:checked:before {
        box-shadow: 0 0.125em 0.25em hsla(var(--hue), 90%, 10%, 0.5);
        transform: translateX(2em);
    }

    .switch__input:checked+.switch__check {
        animation: switch-check var(--trans-dur) var(--trans-timing);
        transform: translateX(2em) rotate(-225deg);
    }

    .switch__input:checked+.switch__check .switch__check-line {
        stroke: hsl(var(--hue), 90%, 50%);
        stroke-dashoffset: 0;
        transform: translate(-1px, -1px);
        transition-delay: 0s, calc(var(--trans-dur) / 2), 0s;
    }

    .switch__sr {
        overflow: hidden;
        position: absolute;
        width: 3px;
        height: 3px;
    }

    /* Dark theme */
    @media (prefers-color-scheme: dark) {
        :root {
            --bg: hsl(var(--hue), 90%, 10%);
            --fg: hsl(var(--hue), 90%, 90%);
        }
    }

    /* Animations */
    @keyframes switch-check {
        from {
            transform: translateX(0) rotate(0);
        }

        to {
            transform: translateX(2em) rotate(135deg);
        }
    }

    .row.align-items-center {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
    }

    .app-search.d-none.d-md-block.me-3 {
        width: 50%;
        margin: auto 0;
        display: flex !important;
        align-items: center;
    }

    .active {
        position: relative;
        left: -2em;
    }

    .col-lg-9.col-sm-8.col-md-8.col-xs-12 {
        width: max-content;
    }
</style>
<div class="modal fade" id="addexampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-md  modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-body py-0">
                <div class="d-flex main-content">
                    <div class="content-text p-4" style="width:100%">
                        <h3 style="margin:0 auto; width:fit-content">Add volume</h3>
                        <form action="<?php echo site_url('admin/article/add_volume'); ?>" method="post">
                            <div class="form-group">
                                <label for="add-name">Name</label>
                                <input type="text" name="add-name" class="form-control" id="add-name"
                                    placeholder="Enter Name">
                            </div>
                            <input type="submit" value="Confirm" class="btn btn-primary mr-3 px-5" id="confirm">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="header row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" style="width: fit-content;margin: unset;padding: unset;">
                <h4 class="page-title" style="margin:">Manage Articles</h4>
            </div>
            <form role="search" class="header app-search d-none d-md-block me-3" id="searchForm"
                style="width: 400px;margin: unset;padding: unset;">
                <input type="text" placeholder="Search..." class="header form-control mt-0" id="searchInput">
                <a href="" class="active">
                    <i class="fa fa-search"></i>
                </a>
            </form>
            <form style="width: fit-content;margin: unset;" action="<?php site_url("admin/articles") ?>" method="post">
                <label for='volume'>Filter Volume</label>
                <select name='volume' id='volume' style='width:100px;'>
                    <option value="none" selected>None</option>
                    <?php foreach ($volumes as $volume): ?>
                        <option value="<?= $volume['volume_id'] ?>" <?= !is_null($selected_id) && $volume['volume_id'] == $selected_id ? 'selected' : '' ?>>
                            <?= $volume['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
            <!-- <form style="width: fit-content;margin: unset;    padding: unset;">
                <a href="" id="editUserLink" data-toggle="modal" data-target="#addexampleModalCenter"
                    class="btn btn-danger d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add
                    Volumes</a>
            </form> -->
            <div class="header col-lg-9 col-sm-8 col-md-8 col-xs-12"
                style="width: fit-content;margin: unset;    padding: unset;">
                <div class="header d-md-flex" style="width: fit-content;margin: unset;    padding: unset;">
                    <form style="width: fit-content;margin: unset;    padding: unset;">
                        <a href="<?php echo site_url("admin/article/add") ?>" id="editUserLink"
                            class="btn btn-danger d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add
                            Articles</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Basic Table</h3>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Volume</th>
                                    <th class="border-top-0">DOI</th>
                                    <th class="border-top-0">Title</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0" style="text-align: center;">Date</th>
                                    <th class="border-top-0" style="text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($articles as $article): ?>
                                    <tr>
                                        <td>
                                            <?php echo $article['volume_id'] ?>
                                        </td>
                                        <td>
                                            <p style="width: 100px;text-overflow: ellipsis;overflow: hidden;">
                                                <?php echo $article['doi'] ?>
                                            </p>
                                        </td>
                                        <td style="">
                                            <form action="<?php echo site_url("admin/articles/view") ?>"
                                                id="article_view_form_<?php echo $article['articles_id']; ?>" method="post">
                                                <input type="hidden" name="id"
                                                    value="<?php echo $article['articles_id']; ?>" />
                                                <a href="#"
                                                    onclick="handleFormSubmission('article_view_form_<?php echo $article['articles_id']; ?>');"
                                                    class="submit-form-button"
                                                    data-form-id="article_view_form_<?php echo $article['articles_id']; ?>">
                                                    <p style="width: 25em;text-overflow: ellipsis;overflow: hidden;">
                                                        <?php echo $article['title']; ?>
                                                    </p>
                                                </a>
                                            </form>
                                        </td>
                                        <td>
                                            <?php
                                            if ($article['published'] == 0) {
                                                echo ("Unpublished");
                                            } else {
                                                echo ("Published");
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php $formattedDate = date('F j, Y', strtotime($article['date_published']));
                                            echo $formattedDate; ?>
                                        </td>
                                        <td
                                            style="display: flex;flex-direction: row;align-content: center;align-items: center;">
                                            <form action="<?php echo site_url('admin/articles/delete'); ?>" method="post"
                                                style="margin:unset">
                                                <input type="hidden" name="id"
                                                    value="<?php echo $article['articles_id']; ?>">
                                                <button type="submit" style="border-style: none; background-color: unset;">
                                                    <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                            <form style="margin:unset;"
                                                action="<?php echo base_url('admin/article/update'); ?>" method="post">
                                                <input type="hidden" name="article_id"
                                                    value="<?php echo $article['articles_id'] ?>" />
                                                <button style="width: 5em;" type="submit"
                                                    data-user-id="<?php echo $article['articles_id']; ?>"
                                                    data-toggle="modal" data-target="#exampleModalCenter"
                                                    class="edit-btn btn btn-danger d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Edit</button>
                                            </form>
                                            <a style="width: 5em;"
                                                href="<?php echo base_url("assets/uploads/" . $article['filename']) ?>"
                                                class="edit-btn btn btn-danger d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">
                                                PDF
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
            href="https://www.wrappixel.com/">wrappixel.com</a>
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<script src="<?php echo base_url("assets/js/jquery-3.3.1.min.js") ?>"></script>
<script src="<?php echo base_url("assets/js/popper.min.js") ?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
<script src="<?php echo base_url("assets/js/main.js") ?>"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#volume').on('change', function () {
            $('form[action="<?php site_url("admin/articles") ?>"]').submit();
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        function handleFormSubmission(formId) {
            var formData = document.getElementById(formId);
            formData.submit();
        }

        // Attach the event handler to each form button
        document.querySelectorAll('.submit-form-button').forEach(function (button) {
            button.addEventListener('click', function () {
                // Extract the formId from the button's dataset
                var formId = this.dataset.formId;
                handleFormSubmission(formId);
            });
        });
    });

    $(document).ready(function () {
        $('#searchForm').on('keyup', function (e) {
            var searchInput = $('#searchInput').val();
            e.preventDefault();
            console.log(searchInput);
            console.log("searching");
            $.ajax({
                url: '<?php echo site_url("admin/article/search"); ?>',
                type: 'GET',
                data: { query: searchInput },
                dataType: 'json',
                success: function (response) {
                    // Clear existing table content
                    $('.table tbody').empty();

                    // Loop through the JSON data and create table rows
                    $.each(response, function (index, article) {
                        console.log(article.title)
                        const BASE_URL = '<?php echo base_url('assets/uploads/') ?>';
                        console.log(BASE_URL);
                        // console.log(user.complete_name)
                        var row = $('<tr></tr>');
                        row.append(`<td>${article.volume_id}</td>`);
                        row.append(`<td><p style="width: 100px;text-overflow: ellipsis;overflow: hidden;">${article.doi}</p></td>`);
                        row.append(`<td><form action='"<?php echo site_url('admin/articles/view') ?>'" id="article_view_form_${article.articles_id}" method="post"><input type="hidden" name="id" value="${article.articles_id}"/><a href="#" onclick="handleFormSubmission('article_view_form_${article.articles_id}');" class="submit-form-button" data-form-id="article_view_form_${article.articles_id}"><p style="width: 25em;text-overflow: ellipsis;overflow: hidden;">${article.title}</p></a></form></td>`);

                        console.log(article.published)
                        // // Append published status
                        row.append(`<td>${article.published == 1 ? "Published" : "unPublished"}</td>`);

                        // // Append formatted publication date
                        row.append(`<td>${new Date(article.date_published).toLocaleDateString()}</td>`);

                        // // Append delete button
                        // // Append delete button
                        row.append(`<td style="display: flex;flex-direction: row;align-content: center;align-items: center;"><form action='"<?php echo site_url('admin/articles/delete') ?>'" method="post" style="margin:unset"><input type="hidden" name="id" value="${article.articles_id}"><button type="submit" style="border-style: none; background-color: unset;"><i class="fas fa-trash-alt" aria-hidden="true"></i></button></form>`)
                        // row.append(`
                        //             <td>
                        //                 <form action="${site_url('admin/articles/delete')}" method="post" style="margin:unset">
                        //                     <input type="hidden" name="id" value="${article.articles_id}">
                        //                     <button type="submit" style="border-style: none; background-color: unset;"><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
                        //                 </form>
                        //             </td>
                        //         `);
                        row.append(`
                                    <td>
                                        <form action="<?php echo site_url('admin/article/update') ?>" method="post" style="margin:unset">
                                            <input type="hidden" name="article_id" value="${article.articles_id}" />
                                            <button type="submit" style="width: 5em;" data-user-id="${article.articles_id}" data-toggle="modal" data-target="#exampleModalCenter" class="edit-btn btn btn-danger d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Edit</button>
                                        </form>
                                    </td>
                                `);
                        // Append PDF link

                        row.append(`
                                    <td>
                                        <a href="${BASE_URL}/${article.filename}" class="edit-btn btn btn-danger d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">PDF</a>
                                    </td>
                                `);
                        $('.table tbody').append(row);
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching search results:', textStatus, errorThrown);
                }
            });
        })
    });

</script>