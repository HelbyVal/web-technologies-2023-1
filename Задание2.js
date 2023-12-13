function createCounter() {
    let count = 0;
    return function () {
        count++;
        return count;
    }
}
console.log("Задание 2:")
const counter = createCounter()
console.log(counter())
console.log(counter())
console.log(counter())
console.log(counter())