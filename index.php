<?php include('database.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping List</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Shopping List</h2>
    <div class="card p-4">
            <ul class="list-group" id="item-list">
                <!-- Daftar belanja akan muncul di sini -->
            </ul>
        </div>
        <div class="mt-3 d-flex justify-content-between">
            <button id="add-item-btn" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Item</button>
            <button id="save-list-btn" class="btn btn-success">Save List</button>
        </div>
    </div>
</div>

<script>
document.getElementById("add-item-btn").addEventListener("click", function() {
    const ul = document.getElementById("item-list");
    const li = document.createElement("li");
    li.classList.add("list-group-item", "d-flex", "justify-content-between", "align-items-center");
    li.innerHTML = `
        <input type="text" class="form-control me-2" placeholder="Nama barang">
        <button class="btn btn-danger btn-sm remove-btn">&times;</button>
    `;
    ul.appendChild(li);

    li.querySelector(".remove-btn").addEventListener("click", function() {
        li.remove();
    });
});

document.getElementById("save-list-btn").addEventListener("click", function() {
    const items = [];
    document.querySelectorAll("#item-list input").forEach(input => {
        if (input.value.trim() !== "") {
            items.push(input.value.trim());
        }
    });

    if (items.length === 0) {
        alert("Daftar belanja kosong!");
        return;
    }

    fetch("save_list.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ items })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Daftar belanja berhasil disimpan!");
        } else {
            alert("Gagal menyimpan daftar belanja!");
        }
    });
});
</script>
</body>
</html>
