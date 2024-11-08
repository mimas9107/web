"use strict";

// 變數宣告練習
let onelet;                                 
let myInt = 123;                            // 整數
let myFloat = 123.123;                      // 浮點數
let myBool = true;                          // Boolean
let myString = 'leech';                     // String (字串)
let myString2 = "leech";                    // String (字串)
let myString3 = `myString2=${myString2}`;   // Template String：可夾帶letiable

console.log(myString3);

// if練習
let height = 123;
if(height < 165) {
    console.log('矮');
} else if(height >= 165 && height < 175) {
    console.log('平均');
} else {
    console.log('高');
}

// switch練習
let day = new Date().getDay();
switch(day) {
    case 6:
       console.log('Today is Saturday');
       break;
    case 0: 
       console.log('Today is Sunday');    
       break;
    default: 
       console.log('Today is not weekend');
}

// for練習
let sum=0;
let i;
for(i = 0; i < 5; i ++) {
  sum = sum + i;
}
console.log(sum);  // 10

// while練習
let a = 0;
while(a < 5) {
  console.log(a);
  a++;   // a = a + 1
}

// do-while練習
let b = 0;
do {
  console.log(b);
  b++;
} while(b < 5); 

// array練習
let myArray = [];
let myArray2 = new Array();
//
let num = [1, 3, 7, 9, 21, 43];
let hybrid = [1, '3', [21, 43] ];
let names = ['Simen', 'Hedy', 'Peter'];
console.log(num.length);   // 6
console.log(names.length); // 3
//
let myArray3 = ['Hello', ' World', '!'];
console.log(myArray3.at(0));
myArray3[1] = 'JavaScript'; 
//
//console.log(myArray3.at(1));

// array - forEach練習
var numbers = [45, 4, 9, 16, 25];
var txt = "";

numbers.forEach( function myFunction(value, index, array) {
        txt += value + "|";
    }
);
console.log(txt);

// operators練習
console.log( 2 ** 4 ); // 2⁴ = 16
console.log( '1' + 2 ); // "12"

// for-in練習
let aperson = { fname:"John", lname:"Doe", age:25 };
let text = "";

for (let x in aperson) {
    text += aperson[x];
}

// for-of練習
let cars = ["BMW", "Volvo", "Mini"];
let text2 = "";

for(let x of cars) {
    text2 += x;
}

// function練習
function greet(name) {
    console.log('Hello ' + name + '!');
}
greet('Simen');
//
function add(x, y) {
    return x + y;
}
let sum2 = add(2, 3);

// function expression練習
let greet2 = function (name) {
    console.log('Hello ' + name + '!');
}
let greet3 = greet2;
greet2('Simen');
greet3('leech');

// arrow function練習
let hello = () => {
    return "Hello World!";
};

let hello2 = (val) => val+" Hello World!";

let person = {
    name: 'Jack',
    age: 26
};

let person2 = {};
person2.name = 'Jack';
person2['age'] = 26;

let person3 = {
    name: 'Jack',
    age: 26,
    friends: ['Hedy', 'Peter', 'Simen'],

    parents: {
      father: 'Eric',
      mother: 'Ann'
    },

    speak: function(text) {
      console.log(text);
    }
};
  
person3.speak('Hello');

// BOM練習 
// (開啟新頁面會被攔截、阻擋，給予權限後可正常使用)
window.open('https://www.ntut.edu.tw');
//
console.log( '高:'+ window.innerHeight + ' 寬:' + window.innerWidth );

