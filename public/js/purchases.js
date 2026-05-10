// const cartItems = [
//     { id: 1, title: 'Polo T-Shirt', price: 200, img: 'path_to_image.jpg', qty: 1 }
// ];

// function displayCart() {
//     const tbody = document.getElementById('cart-items-body');
//     tbody.innerHTML = cartItems.map(item => `
//         <tr>
//             <td><img src="${item.img}" width="60" style="border-radius:5px;"></td>
//             <td>${item.title}</td>
//             <td>EGP ${item.price.toFixed(2)}</td>
//             <td>
//                 <div class="qty-input">
//                     <button>-</button>
//                     <input type="text" value="${item.qty}">
//                     <button>+</button>
//                 </div>
//             </td>
//             <td>EGP ${(item.price * item.qty).toFixed(2)}</td>
//             <td><button style="color:red; border:none; background:none; cursor:pointer;"><i class="fas fa-trash"></i></button></td>
//         </tr>
//     `).join('');
// }

// displayCart();
