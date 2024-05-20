export class Pizza {
    constructor(name, price, calorie) {
        this.name = name;
        this.price = price;
        this.calorie = calorie;
    }

    getPrice() {
        return this.price;
    }

    getCalorie() {
        return this.calorie;
    }
}

export class Topping {
    constructor(name) {
        this.name = name;
        this.sizeToppings = [];
    }
    
    addSize(sizeTopping) {
        this.sizeToppings.push(sizeTopping);
    }

    getPrice(size) {
        let sizeTopping = this.sizeToppings.find(item => item.size == size);
        let result = sizeTopping.getPrice();
        return result;
    }

    getCalorie(size) {
        let sizeTopping = this.sizeToppings.find(item => item.size == size);
        let result = sizeTopping.getCalorie();
        return result;
    }
} 

export class SizePizza {
    constructor(name, price, calorie) {
        this.name = name;
        this.price = price;
        this.calorie = calorie;
    }

    getPrice() {
        return this.price;
    }

    getCalorie() {
        return this.calorie;
    }

 }

export class SizeTopping {
    constructor(size, price, colorie) {
        this.size = size;
        this.price = price;
        this.calorie = colorie;
    }

    getPrice() {
        return this.price;
    }

    getCalorie() {
        return this.calorie;
    }
 }

export class Order {
    constructor(pizza, size) {
        this.pizza = pizza;
        this.size = size;
        this.toppings = [];
    }

    addTopping(topping) {
        this.toppings.push(topping);
    }

    removeTopping(topping) {
        let index = this.toppings.find(item => item == topping);
        this.toppings.splice(index, 1);
    }

    getToppings() {
        let toppingsStr = "";
        this.toppings.forEach(element => {
            toppingsStr += " " + element.name;
        });
        console.log("В пиццу добавлены:" + toppingsStr);
        return this.toppings;
    }

    getSize() {
        console.log("Размер пиццы: " + this.size.name);
        return this.size;
    }

    changeSize(size) {
        this.size = size;
    }

    getStuffing() {
        console.log("Пицца: " + this.pizza.name);
        this.getToppings();
        this.getSize();
    }

    calculatePrice() {
        let result = this.pizza.getPrice();
        result += this.size.getPrice();
        this.toppings.forEach(topp => {
            result += topp.getPrice(this.size);
        }); 
        return result;
    }

    calculateCalorie() {
        let result = this.pizza.calorie;
        result += this.size.getCalorie();
        this.toppings.forEach(topp => {
            result += topp.getCalorie(this.size);
        }); 
        return result;
    }
 }
