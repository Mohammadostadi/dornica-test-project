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