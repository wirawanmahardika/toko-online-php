const statusToggle = document.getElementsByClassName("status-toggle")
const statusToggleCloser = document.getElementById("status-toggle-closer")
const blurrer = document.getElementById("blurer")
const statusChanger = document.getElementById("status-changer")


const pengemasan = document.getElementById("pengemasan")
const dikirim = document.getElementById("dikirim")
const selesai = document.getElementById("selesai")


Array.from(statusToggle).forEach(s => {
    s.addEventListener("click", (e) => {
        blurrer.classList.add("flex")
        statusChanger.classList.add("flex")

        blurrer.classList.remove("hidden")
        statusChanger.classList.remove("hidden")


        // console.log(e.target.dataset.id_order)
        pengemasan.href = "/set-status/" + e.target.dataset.id_order + "?status=pengemasan"
        dikirim.href = "/set-status/" + e.target.dataset.id_order + "?status=dikirim"
        selesai.href = "/set-status/" + e.target.dataset.id_order + "?status=selesai"
    })
})

statusToggleCloser.addEventListener("click", () => {
    blurrer.classList.add("hidden")
    statusChanger.classList.add("hidden")

    blurrer.classList.remove("flex")
    statusChanger.classList.remove("flex")
})


const toggleAlamat = document.getElementsByClassName("alamat-toggle")
const alamatElement = document.getElementById("alamat")
const jalan = document.getElementById("jalan")
const koordinat = document.getElementById("koordinat")


Array.from(toggleAlamat).forEach(t => {
    t.addEventListener("click", (e) => {
        blurrer.classList.add("flex")
        alamatElement.classList.add("flex")

        blurrer.classList.remove("hidden")
        alamatElement.classList.remove("hidden")


        jalan.textContent = e.target.dataset.alamat
        koordinat.textContent = e.target.dataset.koordinat
    })
})

const toggleDetail = document.getElementsByClassName("detail-toggle")
const detail = document.getElementById("detail")
const orderDetailDisplayer = document.getElementById("order-detail-displayer")

Array.from(toggleDetail).forEach(t => {
    t.addEventListener("click", async (e) => {
        const res = await fetch("/order-detail/" + e.target.dataset.id_order)
        const data = await res.json()
        console.log(data)

        let htmlText = "";
        data.items.forEach(i => {
            htmlText += `
                            <img src="${i.imageUrl}" alt="${i.name}" class="w-1/2" />
                            <div class="flex flex-col gap-y-3">
                                <span class="font-bold text-xl">
                                    ${i.name} (x${i.pivot.kuantitas})
                                </span>
                                <span class="text-center font-bold">
                                    Rp ${i.harga}
                                </span>
                            </div>
                        `
        })

        orderDetailDisplayer.innerHTML = htmlText

        blurrer.classList.add("flex")
        detail.classList.add("flex")

        blurrer.classList.remove("hidden")
        detail.classList.remove("hidden")
    })
})

blurrer.addEventListener("click", () => {
    blurrer.classList.add("hidden")
    alamatElement.classList.add("hidden")
    statusChanger.classList.add("hidden")
    detail.classList.add("hidden")

    blurrer.classList.remove("flex")
    alamatElement.classList.remove("flex")
    statusChanger.classList.remove("flex")
    detail.classList.remove("flex")
})
