import { SizePizza, Pizza, Topping, SizeTopping, Order } from "./Pizza.js";

let sizeSmall = new SizePizza("Маленькая", 100, 100);
let sizeBig = new SizePizza("Большая", 200, 200);

let pizzaMargarita = new Pizza("Маргарита", 500, 300);
let pizzaPepperoni = new Pizza("Пепперони", 800, 400);
let pizzaBavarskaya = new Pizza("Баварская", 700, 450);

let toppMozzarella = new Topping("Сливочная моцарелла");
toppMozzarella.addSize(new SizeTopping(sizeSmall, 50, 20));
toppMozzarella.addSize(new SizeTopping(sizeBig, 100, 40));

let toppCheeseBort = new Topping("Сырный борт");
toppCheeseBort.addSize(new SizeTopping(sizeSmall,150,50));
toppCheeseBort.addSize(new SizeTopping(sizeBig,300,100));

let toppChederParmesan = new Topping("Чеддер и пармезан");
toppChederParmesan.addSize(new SizeTopping(sizeSmall,150,50));
toppChederParmesan.addSize(new SizeTopping(sizeBig,300,100));

let toppings = {
    "addBort" : toppCheeseBort,
    "addMozz" : toppMozzarella,
    "addParm": toppChederParmesan
};

let pizzas = {
    "margaritta": pizzaMargarita,
    "pepperoni": pizzaPepperoni,
    "bavarskaya": pizzaBavarskaya
}


let pizzaButtons = document.querySelectorAll("button.button");
let toppingButtons = document.querySelectorAll("button.buttonTopping");
let bigButton = document.querySelector("#sizeBig");
let smallButton = document.querySelector("#sizeSmall");

var order = null;

smallButton.addEventListener("click", function(){
    if(order == null) {
        alert("Выберите пиццу!");
        return;
    }
    order.changeSize(sizeSmall);
    Calculate();
});

bigButton.addEventListener("click", function(){
    if(order == null) {
        alert("Выберите пиццу!");
        return;
    }
    order.changeSize(sizeBig);
    Calculate();
});


toppingButtons.forEach(button => {
    button.onclick = function(){
        if(order == null) {
            alert("Выберите пиццу!");
            return;
        }
        else {
            if (order.toppings.find(item => item.name == toppings[button.id].name) == null) {
                order.addTopping(toppings[button.id]);
                Calculate();
            }
            // Чтобы убрать добавку, нужно еще раз кликнуть по кнопке
            else {
                order.removeTopping(toppings[button.id]);
                Calculate();
            }
        }

    }
});

pizzaButtons.forEach(button => {
    button.onclick = function(){
        order = new Order(pizzas[button.id], sizeSmall);
        Calculate();
    }
});

function Calculate() {
    let ButtonOrder = document.querySelector("#order");
    ButtonOrder.textContent = `Добавить в корзину за ${order.calculatePrice()}  руб (${order.calculateCalorie()}  кКалл)`;
}

