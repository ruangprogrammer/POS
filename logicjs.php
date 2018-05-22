<script>
    function kalkulatorTambah(type1, type2) {
        var hasil = eval(type1) * eval(type2);
      document.getElementById('resulte').innerHTML = hasil;
    }
</script>


<input type="text" id="type1" onkeyup="kalkulatorTambah(this.value, getElementById('type2').value);" />x
    <input type="text" id="type2" onkeyup="kalkulatorTambah(getElementById('type1').value, this.value);" />
    =
    <span id="resulte">        
    </span>