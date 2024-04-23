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
