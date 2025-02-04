const btnOrders = document.getElementsByClassName("btn-order")
const blurrer = document.getElementById("blurrer")
const checkout = document.getElementById("checkout")
const itemId = document.getElementById("item_id")
const itemHarga = document.getElementById("item_harga")
const itemImage = document.getElementById("item_image")
const itemNama = document.getElementById("item_nama")

let batasStok = 0;

Array.from(btnOrders).forEach(btn => {
    btn.addEventListener("click", e => {
        blurrer.classList.remove('hidden')
        checkout.classList.remove('hidden')

        blurrer.classList.add('block')
        checkout.classList.add('flex')

        batasStok = parseInt(e.target.parentElement.dataset.stok)
        itemNama.textContent = e.target.parentElement.dataset.nama
        itemId.value = e.target.parentElement.dataset.id
        itemHarga.value = e.target.parentElement.dataset.harga
        itemImage.src = "/storage/" + e.target.parentElement.dataset.image
    })
})


const kuantitasDisplayer = document.getElementById('kuantitas-displayer');
const kuantitas = document.getElementById('kuantitas');
const plus = document.getElementById('plus');
const minus = document.getElementById('minus');

blurrer.addEventListener("click", e => {
    blurrer.classList.add('hidden')
    checkout.classList.add('hidden')

    blurrer.classList.remove('block')
    checkout.classList.remove('flex')
    kuantitas.value = 0
    kuantitasDisplayer.textContent = 0
})

plus.addEventListener("click", () => {
    if (kuantitas.value < batasStok) {
        kuantitas.value++;
        kuantitasDisplayer.textContent = kuantitas.value
    }
})

minus.addEventListener("click", () => {
    if (kuantitas.value > 0) {
        kuantitas.value--;
        kuantitasDisplayer.textContent = kuantitas.value
    }
})