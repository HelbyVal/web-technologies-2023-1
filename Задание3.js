function spinWords (string) {
    let result = "";
    let words = string.split(" ");
    words.forEach(word => {
        if (word.length >= 5) {
            let spinWord = "";
            for (let i = word.length - 1; i >= 0; i--) {
                spinWord = spinWord + word[i]; 
            }
            result = result + spinWord + " ";
        }
        else {
            result = result + word + " ";
        }
    }); 
    
    return result;
}

const string = "У попа была собака"
console.log("Задание 3:")
console.log(spinWords(string));