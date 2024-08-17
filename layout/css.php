    <link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/icons.css" rel="stylesheet">
    <link href="../assets/fonts/googlefonts.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fonts/bootstrap-icons.css">

    <!-- loader-->
    <link href="../assets/css/pace.min.css" rel="stylesheet" />


    <!--Theme Styles-->
    <link href="../assets/css/dark-theme.css" rel="stylesheet" />
    <link href="../assets/css/light-theme.css" rel="stylesheet" />
    <link href="../assets/css/semi-dark.css" rel="stylesheet" />
    <link href="../assets/css/header-colors.css" rel="stylesheet" />    

    <style>
        .disabled{
            pointer-events: auto !important;
        }
        .table thead tr th a {
            position: relative;
        }

        .sort-table::after {
            left: 1em;
            content: "↓";
            position: absolute;
            cursor: pointer;
            color: #ccc;
        }
        
        .sort-table::before {
            left: 1.5em;
            content: "↑";
            position: absolute;
            cursor: pointer;
            color: #ccc;
        }

        .active::after {
            color:
                <?= (isset($_SESSION[$prefix.'_sort_order']) and $_SESSION[$prefix.'_sort_order'] == 'DESC') ? '#000' : '#ccc' ?>
            ;
        }

        .active::before {
            color:
                <?= (isset($_SESSION[$prefix.'_sort_order']) and $_SESSION[$prefix.'_sort_order'] == 'ASC') ? '#000' : '#ccc' ?>
            ;
        }
    </style>

<style>
        @media screen and (max-width: 767px) {
            
            .button-filter{
                width: 100% !important;
            }
        }
    </style>