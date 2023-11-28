function findPrefix(stringArray) {
    if (stringArray.length == 0) {
        return ""
    }
    if (stringArray.length == 1) {
        return stringArray[0]
    }
    let l = 1;
    let currentString = stringArray[0]
    let j = currentString.length - 1;
    let i = 0;
    while ((j - i) != 0) {
        let count = 0;
        let res = currentString.slice(i,j+1);
        for (let k = 1; k < stringArray.length; k++) {
            let nextString = stringArray[k]
            if (nextString.includes(res)) {
                count++;
            }
            else {
                count = 0;
            }
        }
        if (count == stringArray.length - 1) {
            return res;
        }
        
        if (j == currentString.length - 1) {
            i = 0;
            j = j - l;
            l++;
        }
        else {
            i++;
            j++;
        }
    }
    return "";
    
}

console.log("Задание 5:");
let strs = ["цветок","поток","хлопок"];
let strs2 = ["собака","гоночная машина","машина"];
console.log(findPrefix(strs));
console.log(findPrefix(strs2));
