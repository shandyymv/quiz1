<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kalkulator Bangun Ruang</title>
<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    #calculatorBox {
        width: 400px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    #judul {
        text-align: center;
        margin-bottom: 20px;
        font-size: 1.2em;
        font-weight: bold;
    }
    form {
        margin: 20px 0;
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="number"] {
        width: 100px;
        margin-bottom: 10px;
    }
    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }
    button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<div id="calculatorBox">
    <div id="judul">Kalkulator Bangun Ruang</div>

    <form id="calculatorForm">
        <label><input type="checkbox" name="bangunRuang" value="balok" onclick="uncheckOthers(this)">Balok</label>
        <label><input type="checkbox" name="bangunRuang" value="kubus" onclick="uncheckOthers(this)">Kubus</label>
        <label><input type="checkbox" name="bangunRuang" value="tabung" onclick="uncheckOthers(this)">Tabung</label>

        <div id="inputFields" style="display: none;">
            <label for="panjang">Panjang (cm):</label>
            <input type="number" id="panjang" name="panjang">

            <label for="lebar">Lebar (cm):</label>
            <input type="number" id="lebar" name="lebar">

            <label for="tinggi">Tinggi (cm):</label>
            <input type="number" id="tinggi" name="tinggi">
        </div>

        <button type="button" onclick="hitung()">Hitung</button>
    </form>

    <div id="hasil" style="margin-top: 20px;"></div>
</div>

<script>
function uncheckOthers(checkbox) {
    var checkboxes = document.getElementsByName('bangunRuang');
    checkboxes.forEach(function(item) {
        if (item !== checkbox) item.checked = false;
    });
}

function hitung() {
    var checkboxes = document.querySelectorAll('input[name="bangunRuang"]:checked');
    var inputFields = document.getElementById('inputFields');
    var hasilDiv = document.getElementById('hasil');
    var hasil = '';

    if (checkboxes.length === 0) {
        hasilDiv.innerHTML = 'Pilih setidaknya satu bangun ruang.';
        return;
    }

    var selectedBangunRuang = checkboxes[0].value;

    if (selectedBangunRuang === 'balok' || selectedBangunRuang === 'kubus') {
        inputFields.style.display = 'block';
    } else {
        inputFields.style.display = 'none';
    }

    if (selectedBangunRuang === 'tabung') {
        inputFields.style.display = 'block'; // Menampilkan inputFields untuk tabung
    }

    var panjang = parseFloat(document.getElementById('panjang').value);
    var lebar = parseFloat(document.getElementById('lebar').value);
    var tinggi = parseFloat(document.getElementById('tinggi').value);

    if (selectedBangunRuang === 'balok') {
        var volume = panjang * lebar * tinggi;
        var luasPermukaan = 2 * ((panjang * lebar) + (panjang * tinggi) + (lebar * tinggi));
        hasil = 'Volume Balok: ' + volume.toFixed(2) + ' cm³<br>';
        hasil += 'Luas Permukaan Balok: ' + luasPermukaan.toFixed(2) + ' cm²';
    } else if (selectedBangunRuang === 'kubus') {
        var volume = Math.pow(panjang, 3);
        var luasPermukaan = 6 * Math.pow(panjang, 2);
        hasil = 'Volume Kubus: ' + volume.toFixed(2) + ' cm³<br>';
        hasil += 'Luas Permukaan Kubus: ' + luasPermukaan.toFixed(2) + ' cm²';
    } else if (selectedBangunRuang === 'tabung') {
        var volume = Math.PI * Math.pow(panjang, 2) * tinggi;
        var luasPermukaan = 2 * Math.PI * panjang * (panjang + tinggi);
        hasil = 'Volume Tabung: ' + volume.toFixed(2) + ' cm³<br>';
        hasil += 'Luas Permukaan Tabung: ' + luasPermukaan.toFixed(2) + ' cm²';
    }

    hasilDiv.innerHTML = hasil;
}
</script>

</body>
</html>