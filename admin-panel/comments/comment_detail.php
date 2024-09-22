<?php
require_once('../../app/loader.php');
if (isset($_GET['id'])) {
    $id = securityCheck($_GET['id']);
    $read = $db->where('id', $id)->getValue('comment', 'is_read');
    if ($read != 1) {
        $db->where('id', $id)
            ->update(
                'comment',
                [
                    'is_read' => 1,
                    'readed_at' => $date
                ]
            );
    }
}
if(isset($_POST['changeStatus'])){
    $status = securityCheck($_POST['status']);
    $db->where('id', $id)
    ->update('comment', [
        'status'=>$status
    ]);
    redirect('comments_list.php', 13);
}
?>
<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:27 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    require_once('../../layout/css.php');
    ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        @media (min-width: 0) {
            .g-mr-15 {
                margin-right: 1.07143rem !important;
            }
        }

        @media (min-width: 0) {
            .g-mt-3 {
                margin-top: 0.21429rem !important;
            }
        }

        .g-height-50 {
            height: 50px;
        }

        .g-width-50 {
            width: 50px !important;
        }

        @media (min-width: 0) {
            .g-pa-30 {
                padding: 2.14286rem !important;
            }
        }

        .g-bg-secondary {
            background-color: #fafafa !important;
        }

        .u-shadow-v18 {
            box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
        }

        .g-color-gray-dark-v4 {
            color: #777 !important;
        }

        .g-font-size-12 {
            font-size: 0.85714rem !important;
        }

        .media-comment {
            margin-top: 20px
        }
    </style>
    <title>کامنت</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <?php
        require_once('../../layout/header.php');
        ?>
        <!--end top header-->

        <!--start sidebar -->
        <?php
        require_once('../../layout/asidebar.php');
        ?>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0 text-uppercase">کامنت</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="card border shadow-none w-100">
                                <div class="card-body">
                                        <div class="container d-flex justify-content-center">
                                            <?php 
                                            
                                            if(isset($_GET['id'])){
                                                $comment = $db->where('comment.id', $id)
                                                ->join('members', 'members.id = comment.member_id', 'LEFT')
                                                ->getOne('comment', "CONCAT(members.fname, ' ', members.lname) as name, description, subject, comment.setdate, members.image, comment.status");
                                            }
                                            
                                            ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="media g-mb-30 media-comment d-flex justify-content-center">
                                                        <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                                                            src="../../<?= isset($comment['image']) ? $comment['image'] : "assets/images/admin/placeholder.png" ?>"
                                                            alt="Image Description">
                                                        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                                            <div class="g-mb-15">
                                                                <h5 class="h5 g-color-gray-dark-v1 mb-0"><?= $comment['name'] ?></h5>
                                                                <span class="g-color-gray-dark-v4 g-font-size-12"><?= jdate('Y/m/d', strtotime($comment['setdate'])) ?></span>
                                                                </div>
                                                                <div>
                                                                    <p class="text-start"><?= $comment['description'] ?></p>
                                                                </div>
                                                                <div class="container">
                                                                    <form class="row d-flex justify-content-between" action="" method="post">
                                                                        <div class="col-md-6 mt-3">
                                                                            <select name="status" id="status" class="form-select">
                                                                                <option <?= $comment['status'] == 1 ?> value="1">تایید</option>
                                                                                <option <?= $comment['status'] == 2 ?> value="2">رد</option>
                                                                                <option <?= $comment['status'] == 0 ?> value="0">در حال بررسی</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-end">
                                                                            <div class="btn-group mt-3">
                                                                                <button class="btn btn-primary w-100" type="submit" name="changeStatus">ثبت</button>
                                                                                <a href="comments_list.php" class="btn btn-danger w-100" type="submit">لغو</a>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
    </div>
    </main>
    <!--end page main-->

    <?php
    require_once('../../layout/footer.php');
    ?>

    </div>
    <!--end wrapper-->

    <?php
    require_once('../../layout/js.php');
    ?>
    <script src="assets/js/comment_page.js"></script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->

</html>