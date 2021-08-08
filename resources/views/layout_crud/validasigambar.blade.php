
<script>
    function validasiFile(){
    var inputFile = document.getElementById('gambar');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!ekstensiOk.exec(pathFile)){
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Hanya menerima gambar berekstensi jpg/jpeg/png/gif!',
        })

        inputFile.value = '';
        return false;
    }else{
        //Pratinjau gambar
        if (inputFile.files && inputFile.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('pratinjauGambar').innerHTML = '<img src="'+e.target.result+'" width="200px" height="150px"/>';
            };
            reader.readAsDataURL(inputFile.files[0]);
        }
    }
}

$('#gambar').change(validasFile);
function hapusGambar () {
    $("#pratinjauGambar").empty()
    $("#gambar").val("");
};

</script>

