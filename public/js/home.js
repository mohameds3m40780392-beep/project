

    const products = [
        {
            name: "LG TV",
            price: "20,000.00 ج.م",
            img: "img/LG 22inch monitor.jfif"
        },
        {
            name: "Samsung Screen",
            price: "15,500.00 ج.م",
            img: "img/Apple Pro Display XDR.jfif"
        },
        {
            name: "Sony Display",
            price: "22,300.00 ج.م",
            img: "img/Samsung LS32D600UAUXEN S6.jfif"
        }
    ];

    let currentIndex = 0;

    function changeContent() {

        currentIndex = (currentIndex + 1) % products.length;

        document.getElementById("product-name").innerText = products[currentIndex].name;
        document.getElementById("product-price").innerText = products[currentIndex].price;
        document.getElementById("product-img").src = products[currentIndex].img;
    }


    setInterval(changeContent, 1000);


    const textElement = document.getElementById("typing-text");
const text = "BuyBye...";
let index = 0;
let isDeleting = false;

function playTyping() {
    const currentWord = text.substring(0, index);
    textElement.textContent = currentWord;

    // سرعة متغيرة: المسح أسرع من الكتابة عشان السلاسة
    let typeSpeed = isDeleting ? 50 : 150;

    if (!isDeleting && index === text.length) {
        // لما يخلص كتابة، يستنى شوية قبل ما يمسح
        typeSpeed = 1000;
        isDeleting = true;
    } else if (isDeleting && index === 0) {
        // لما يخلص مسح، يستنى شوية قبل ما يبدأ تاني
        isDeleting = false;
        typeSpeed = 500;
    }

    index += isDeleting ? -1 : 1;
    setTimeout(playTyping, typeSpeed);
}

document.addEventListener("DOMContentLoaded", playTyping);


// كود بسيط للفلترة بالـ JS
function filterByPrice(min, max) {
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        // بنجيب الرقم من جوا نص السعر (مثلاً "EGP 500")
        const price = parseFloat(card.querySelector('.price').innerText.replace(/[^0-9.]/g, ""));
        if (price >= min && price <= max) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}



