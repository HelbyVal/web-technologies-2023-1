function createCounter() {
    let count = 1;
    return function () {
        mem = count;
        count++;
        return mem;
    }
}
console.log("Задание 2:")
const counter = createCounter()
console.log(counter())
console.log(counter())
console.log(counter())
console.log(counter())