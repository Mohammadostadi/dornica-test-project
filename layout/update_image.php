<script>
        $(document).ready(function(){
    $("#fileToUpload").change(function(){
        const fd = new FormData();
        const files = $('#fileToUpload')[0].files[0];
        fd.append('fileToUpload',files);
        $.ajax({
            url: '../app/Controller/upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response != 0){
                    $("#img").attr("src",response); 
                    $(".preview img").show(); // Display image element
                }else{
                    alert('file not uploaded');
                }
            },
        });
    });
});
    </script>