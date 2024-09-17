<?php 
// require_once('../Controller/functions.php');
class Filter{
    private $filter = [];


    function __construct(public $table_name, public $prefix){}
    private function sessionSet($data){
        if(isset($_POST[$data]) and $_POST[$data]!= ''){
            $_SESSION[$this->prefix][$data] = $_POST[$data];
        }else{
            unset($_SESSION[$this->prefix][$data]);
        }
    }
    function filterCheck($db, $data, $condition, $loc,$join = [], $limit = 1, $sortField = 'id', $sortOrder = 'ASC',$con=''){
        if(!isset($_SESSION[$this->prefix])){
            $_SESSION[$this->prefix][$condition] = [];
        }
        if(isset($_POST['filtered'])){
            foreach($data as $data=>$type){
                    $this->sessionSet(str_replace('.', '_', $data));
                    if (isset($_SESSION[$this->prefix][str_replace('.', '_', $data)]) && ($_SESSION[$this->prefix][str_replace('.', '_', $data)] != '')) {
                        if ($type === 'like') {
                            $this->filter[] = $data." LIKE '%" . $_POST[str_replace('.', '_', $data)] . "%'";
                        }elseif ($type === '=') {
                            $this->filter[] = $data." = '" . $_POST[str_replace('.', '_', $data)] . "'";
                        }elseif($type === 'find_in_set'){
                            $field = implode(',', $_POST[str_replace('.', '_', $data)]);
                            // var_dump("find_in_set($data, $field)");die;
                                $this->filter[] = "find_in_set('$field', $data)";
                        }
                        elseif($type === 'date'){
                            $date = changeDate($_POST[str_replace('.', '_', $data)]);
                            $this->filter[] = $data." LIKE '%" . $date . "%'";
                        }
                    elseif($type == 'in' and isset($_POST[str_replace('.', '_', $data)])){
                        $input = implode(', ', $_POST[str_replace('.', '_', $data)]);
                        $this->filter[] = $data." IN ($input)";
                    }
                    elseif($type == 'price' and isset($_POST[str_replace('.', '_', $data)])){
                        $input = intval(str_replace(',', '', (securityCheck($_POST[str_replace('.', '_', $data)]))));
                        $this->filter[] = $data." LIKE '%$input%'";
                    }
                }
            }
            $_SESSION[$this->prefix][$condition] = $this->returnValue();
        }
        if(isset($_POST['unFilter'])){
            unset($_SESSION[$this->prefix]);
            redirect($loc);
    }   

    if(!empty($join)){
        return $this->joinCondition($db,$join, $condition, $limit, $sortField, $sortOrder,$con);
        }
}

    function is_exist($data){
        return isset($_SESSION[$this->prefix][$data])?$_SESSION[$this->prefix][$data]:'';
    }
    private function returnValue(){
        return $this->filter;
    }

    function loopQuery($db, $data){
        $condition = [];
        if (isset($data) and !empty($data)) {
            $condition = $data;
        }
        if (!empty($condition)) {
            if (gettype($condition) == 'array') {
                foreach ($condition as $conn) {
                    if (!empty($conn)) {
                        $db->where($conn);
                    }
                }
            } else {
                $db->where($condition);
            }
        }
    }

    private function joinCondition($db,$query,$cond,$limit, $sortField, $sortOrder,$con='')  {
        global $pages;
        global $page;
        $condition = [];
        if(!empty($_SESSION[$this->prefix][$cond]) and count($_SESSION[$this->prefix][$cond]) > 0){
            $condition = ($_SESSION[$this->prefix][$cond]);
        }
        if(!empty($condition)){
            $db->pageLimit = $limit;
            $condition=(implode(' AND ', $condition));
            $total=$db->rawQuery($query[0].' '.$condition);

            if (isset($_GET['page'])) 
            $page = $_GET['page'];
            $limitation = ($page - 1)*$limit;
            $pages = ceil($total[0]['total'] / $db->pageLimit);
        
            return $db->rawQuery($query[1]. ((isset($con) and !empty($con)) ? " AND " : " WHERE ") .$condition." ORDER BY $sortField $sortOrder LIMIT $limitation, $limit");

            }else{
            $con = ((isset($con) and !empty($con)) ? $con : null);
            pageLimit( $this->table_name, $limit, false, $con);
            $limitation = ($page - 1)*$limit;   
            return $db->rawQuery($query[1]." ORDER BY $sortField $sortOrder LIMIT $limitation, $limit");                    
        }
    }
}
