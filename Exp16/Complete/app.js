// app.js
const math = require("./math"); // 引入自訂的 math 模組

const num1 = 10;
const num2 = 5;

console.log(`Addition: ${num1} + ${num2} = ${math.add(num1, num2)}`);
console.log(`Subtraction: ${num1} - ${num2} = ${math.subtract(num1, num2)}`);
console.log(`Multiplication: ${num1} * ${num2} = ${math.multiply(num1, num2)}`);
console.log(`Division: ${num1} / ${num2} = ${math.divide(num1, num2)}`);
