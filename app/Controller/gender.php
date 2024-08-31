<?php 

if(isset($_POST['genderForm'])){
    ?>
    <select name="militaryService" class="form-select" required>
        <option value="">سربازی</option>
        <option <?= (isset($_POST['militaryService']) and $_POST['militaryService'] == 0)?"SELECTED":"" ?> value="0">معافیت</option>
        <option <?= (isset($_POST['militaryService']) and $_POST['militaryService'] == 1)?"SELECTED":"" ?> value="1">در حال انجام وظیفه</option>
        <option <?= (isset($_POST['militaryService']) and $_POST['militaryService'] == 2)?"SELECTED":"" ?> value="2">پایان خدمت</option>
    </select>
    <div class="invalid-feedback">
        فیلد سربازی نباید خالی باشد
    </div>
    <?php
    exit;                              
}

?>