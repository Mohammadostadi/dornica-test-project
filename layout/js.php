
<!-- Bootstrap bundle JS -->
<script  src="../../assets/model/jquery.min.js"></script>
<script  src="../../assets/model/bootstrap.bundle.min.js"></script>
<!-- <script src="../assets/js/bootstrap.bundle.min.js"></script> -->
<!--plugins-->
<!-- <script src="../assets/js/jquery.min.js"></script> -->
<script  src="../../assets/model/jquery.eModal.js"></script>
<script  src="../../assets/js/jquery.number.min.js"></script>
<script  src="../../assets/plugins/simplebar/js/simplebar.min.js"></script>
<script  src="../../assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script  src="../../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script  src="../../assets/js/pace.min.js"></script>
<script  src="../../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script  src="../../assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script  src="../../assets/js/table-datatable.js"></script>

<!--app-->
<script  src="../../assets/js/app.js"></script>


<script>
        $(document).ready(function () {
            $("#filter-row").hide();
            $('#_filter').click(function () {
				if($('#filter-row').hasClass('d-none')){
					$('#filter-row').removeClass('d-none');
				}
                $('#filter-row').toggle(400);
            });
        });
</script>

<script>
    $(document).ready(function(){
        

        function confirmDemo(){
            
            const deleteId =  $(this).val();
            // console.log('deleteId', deleteId);
		params = {
			title: 'حذف کردن',
			message: 'ایا مطمعن هستید؟',
			confirm: {
				label: 'تایید',
				style: [
					'btn-success',
					'btn-danger',
				]
			},
			onHide: hiddenModal
		};
	
		return $.eModal
			.label('تایید', 'لغو')
			.confirm(params)
			.then(function(){
                window.location.href = `${path}?id=${deleteId}`;
			});
			
		function hiddenModal(e){
			
			console.info('Confirm modal is close.');
		}
	}
    $('.open-confirm').on('click', confirmDemo);
})
	
</script>

<script>
    $(document).ready(function() {
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#alert").slideUp(500);
});
    });
</script>
<script>
	(() => {
	'use strict'
	const forms = document.querySelectorAll('.needs-validation')
	Array.from(forms).forEach(form => {
		form.addEventListener('submit', event => {
		if (!form.checkValidity()) {
			event.preventDefault()
			event.stopPropagation()
		}
		form.classList.add('was-validated')
		}, false)
	})
})()
</script>

<!--توابع jquery-->
<script>
//اعداد
function number(input){
    input.value=input.value.replace(/[^0-9]/g,'');
    if (input.value.length > 8) {
                input.value = input.value.slice(0, 8);
            }
}
//رمز
function passwordjs(input){
    input.value=input.value.replace(/[^a-zA-Z0-9@_-]/g,'');
    if (input.value.length > 8) {
                input.value = input.value.slice(0, 8);
            }
}
//نام کاربری
function usernamejs(input){
    input.value=input.value.replace(/[^a-zA-Z0-9@_-]/g,'');
}

</script>


<script>
	$(document).ready(function(){
		$('.dropdown-toggle').click(function(){
			if(!$('.dropdown-toggle').hasClass('show')){
				$('.dropdown-toggle').addClass('show');
				$('.myShow-menu').addClass('show');
			}else{
				$('.dropdown-toggle').removeClass('show');
				$('.myShow-menu').removeClass('show');
			}
		})
	})
</script>