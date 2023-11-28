function findTuple(array, target) {
    for (let i = 0; i < array.length; i++) {
        for (let j = 0; j < array.length; j++) {
            if (i != j) {
                if (array[i] + array[j] == target) {
                    return [i, j]
                }
            }
        }
    }
    return ""
}
console.log("Задание 4.1:")
console.log(findTuple([2, 7,  11, 15], 9))
console.log("Задание 4.2:")
console.log(findTuple([2, 8,  13, 15], 9)) 