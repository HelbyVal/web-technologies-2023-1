function pickPropArray(array, property) {
    result = new Array();
    array.forEach(element => {
        if (element.hasOwnProperty(property)) {
            result.push(element[property]);
        }
    });
    return result;
}

const students = [
   { name: 'Павел', age: 20 },
   { name: 'Иван', age: 20 },
   { name: 'Эдем', age: 20 },
   { name: 'Денис', age: 20 },
   { name: 'Виктория', age: 20 },
   { age: 40 }
]

console.log("Задание 1:")
console.log(pickPropArray(students, 'name'));