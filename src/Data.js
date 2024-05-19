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


let order1 = new Order(pizzaMargarita, sizeBig);
order1.addTopping(toppMozzarella);
order1.addTopping(toppCheeseBort);
order1.getToppings();
order1.getSize();
order1.getStuffing();
console.log(order1.calculatePrice());
console.log(order1.calculateCalorie());